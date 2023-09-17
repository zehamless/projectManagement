<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    // Menampilkan daftar project
    public function index(Request $request)
    {
        $query = Project::select('po', 'so', 'label', 'location', 'project_manager', 'sales_executive', 'start_date', 'end_date', 'preliminary_cost', 'po_amount', 'expense_budget', 'customers.id as customer_id', 'customers.companyName')
            ->orderBy('projects.created_at', 'desc');

        $query = Project::with('customer')
            ->get();
        if ($request->has('search')) {
            $search = $request->input('search');

            $query->where(function ($query) use ($search) {
                $query->where('label', 'like', "%$search%")
                    ->orWhereHas('customer', function ($query) use ($search) {
                        $query->where('companyName', 'like', "%$search%");
                    })
                    ->orWhere('project_manager', 'like', "%$search%")
                    ->orWhere('sales_executive', 'like', "%$search%")
                    ->orWhere('so', 'like', "%$search%");
            });
        }

        $projects = $query;

        return view('projects.projects', compact('projects'));
    }

    // Menampilkan form untuk membuat project baru
    public function create()
    {
        // Mengambil pengguna dengan peran "Project Manager" atau "Sales Executive"
        $usersWithRoles = DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->join('roles', 'user_roles.role_id', '=', 'roles.id')
            ->whereIn('roles.name', ['Project Manager', 'Sales Executive'])
            ->select('users.id', 'users.first_name', 'users.last_name', 'roles.name as role') // Menggunakan kolom first_name dan last_name
            ->distinct()
            ->get();

        // Mengelompokkan pengguna berdasarkan peran (PM atau SE)
        $usersByRole = [];
        foreach ($usersWithRoles as $user) {
            $role = $user->role;
            if (!isset($usersByRole[$role])) {
                $usersByRole[$role] = [];
            }
            $fullName = $user->first_name . ' ' . $user->last_name;
            $usersByRole[$role][] = ['id' => $user->id, 'name' => $fullName];
        }

        return view('projects.createProjects', compact('usersByRole'));
    }


    // Menyimpan project baru ke dalam database
    public function store(Request $request)
    {
        // Validasi data input dari form
        $validatedData = $request->validate([
            'po' => 'required|string',
            'customer_id' => 'required|string',
            'label' => 'required|string',
            'location' => 'required|string',
            'project_manager' => 'required|string',
            'sales_executive' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'preliminary_cost' => 'required|numeric',
            'po_amount' => 'required|numeric',
            'expense_budget' => 'nullable|numeric',
            'so' => [
                'nullable',
                'string',
                'regex:/^(S\d{1}\/\d{2}\/\d{4}|S\d{1}-\d{2}-\d{4}|S\d{1}\/\d{2}\/[A-Z\s]+)$/i',
            ],
            'memo' => 'nullable|required_without_all:so|string',
        ], [
            'memo.required_without_all' => 'Memo harus diisi jika SO Number tidak diisi.',
        ]);
        $validatedData['id'] = Str::uuid();

        // Simpan data ke dalam database
        Project::create($validatedData);

        return dd("Berhasil");
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);

        // Ambil data proyek, serta data customer_id, customerContact_id, companyName, dan customerContactName
        $projectData = Project::select('projects.*', 'customers.id as customer_id', 'customer_contacts.id as customerContactId', 'customers.companyName', 'customer_contacts.name as contactName')
            ->leftJoin('customers', 'projects.customer_id', '=', 'customers.id')
            ->leftJoin('customer_contacts', 'customers.id', '=', 'customer_contacts.customer_id')
            ->where('projects.id', $id)
            ->first();

        // Ambil semua Milestone yang terkait dengan proyek ini dan urutkan berdasarkan created_at terbaru
        $milestones = $project->milestones;

        // Hitung jumlah Milestone "done"
        $doneMilestones = $milestones->where('progress', 'done')->count();

        // Hitung total jumlah Milestone
        $totalMilestones = $milestones->count();

        // Hitung persentase "done"
        $percentageDone = $totalMilestones > 0 ? ($doneMilestones / $totalMilestones) * 100 : 0;

        $productionCost = $project->productionCost()->orderBy('created_at', 'desc')->get();

        return view('projects.detailProjects', compact('milestones', 'projectData', 'productionCost', 'percentageDone'));
    }




    // Menampilkan form untuk mengedit project
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.edit', ['project' => $project]);
    }

    // Mengupdate project ke dalam database
    public function update(Request $request, $id)
    {
        // Validasi data input dari form
        $validatedData = $request->validate([
            'po' => 'string',
            'customer_id' => 'string',
            'label' => 'string',
            'location' => 'string',
            'project_manager' => 'string',
            'sales_executive' => 'string',
            'start_date' => 'date',
            'end_date' => 'date|after:start_date',
            'preliminary_cost' => 'numeric',
            'po_amount' => 'numeric',
            'expense_budget' => 'nullable|numeric',
            'so' => 'nullable|string',
            'memo' => 'nullable|required_without_all:so|string'
        ]);

        // Update data di dalam database
        $project = Project::findOrFail($id);
        $project->update($validatedData);

        return redirect('/projects/projects')->with('success', 'Project berhasil diperbarui.');
    }

    // Menghapus project dari database
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect('/projects/projects')->with('success', 'Project berhasil dihapus.');
    }
}
