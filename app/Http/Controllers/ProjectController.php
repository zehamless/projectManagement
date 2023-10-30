<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerContact;
use App\Models\Project;
use App\Models\User;
use App\Notifications\projectNotification;
use Auth;
use Illuminate\Contracts\Pagination\Paginator as PaginationPaginator;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class ProjectController extends Controller
{
    // Menampilkan daftar project
    public function index(Request $request)
    {
        $query = Project::with(['customer', 'projectManager', 'salesExecutive']);

        if ($request->has('search')) {
            $search = $request->input('search');

            $query->where(function ($query) use ($search) {
                $query->where('label', 'like', "%$search%")
                    ->orWhereHas('customer', function ($query) use ($search) {
                        $query->where('companyName', 'like', "%$search%");
                    })
                    ->orWhere(function ($query) use ($search) {
                        $query->whereHas('projectManager', function ($query) use ($search) {
                            $query->where('first_name', 'like', "%$search%")
                                ->orWhere('last_name', 'like', "%$search%");
                        })
                            ->orWhereHas('salesExecutive', function ($query) use ($search) {
                                $query->where('first_name', 'like', "%$search%")
                                    ->orWhere('last_name', 'like', "%$search%");
                            });
                    })
                    ->orWhere('so', 'like', "%$search%");
            });
        }

        $projects = $query->whereHas('customer')->get();
        if ($request->has('search') && $projects->count() === 0) {
            return redirect()->route('projects.index')->with('error', 'Tidak ada project ditemukan!');
        }

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
        $customers = Customer::all();
        return view('projects.createProjects', compact('usersByRole', 'customers'));
    }


    // Menyimpan project baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'label' => 'required',
            'customers' => 'required',
            'customers-name' => 'required',
            'project_manager' => 'required',
            'sales_executive' => 'required',
            'location' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'preliminary_cost' => 'required|numeric',
            'po_amount' => 'required|numeric',
            'expense_budget' => 'required|numeric',
            'so-1' => 'nullable|string',
            'so-2' => 'nullable|string',
            'so-3' => 'nullable|string',
            'memo-1' => 'nullable|required_without_all:so-1,so-2,so-3|string',
            'memo-2' => 'nullable|required_without_all:so-1,so-2,so-3|string',
            'memo-3' => 'nullable|required_without_all:so-1,so-2,so-3|string',
            'memo-4' => 'nullable|required_without_all:so-1,so-2,so-3|string',
            'memo-5' => 'nullable|required_without_all:so-1,so-2,so-3|string',
        ], [
            'end_date.after' => 'Tanggal akhir harus setelah tanggal awal.',
            'so-1.required_if' => 'SO Number harus diisi jika salah satu so-2 atau so-3 diisi.',
            'so-2.required_if' => 'SO Number harus diisi jika salah satu so-1 atau so-3 diisi.',
            'so-3.required_if' => 'SO Number harus diisi jika salah satu so-1 atau so-2 diisi.',
            'memo-1.required' => 'Memo harus diisi jika SO Number tidak diisi.',
        ]);


        // Menggabungkan kolom PO, Memo, dan SO menjadi satu nilai
        $po = $request->input('po-1') . '/' . $request->input('po-2');
        $so = $request->filled('so-1') ? $request->input('so-1') . "/" . $request->input('so-2') . "/" . $request->input('so-3') : "Nomor SO Belum diisi";
        $memo = $request->input('memo-1') . "/" . $request->input('memo-2') . "/" . $request->input('memo-3') . "/" . $request->input('memo-4') . "/" . $request->input('memo-5');


        // Simpan data ke dalam database
        $project = new Project;
        $project->label = $request->input('label');
        $project->customer_id = $request->input('customers'); // Menggunakan ID pelanggan yang ada atau yang baru dibuat
        $project->customer_contact_id = $request->input('customers-name'); // Menggunakan ID kontak pelanggan yang ada atau yang baru dibuat
        $project->project_manager = $request->input('project_manager');
        $project->sales_executive = $request->input('sales_executive');
        $project->location = $request->input('location');
        $project->start_date = $request->input('start_date');
        $project->end_date = $request->input('end_date');
        $project->preliminary_cost = $request->input('preliminary_cost');
        $project->po = $po;
        $project->memo = $memo;
        $project->so = $so;
        $project->po_amount = $request->input('po_amount');
        $project->expense_budget = $request->input('expense_budget');
        $project->save();

        if ($so === "Nomor SO Belum diisi") {
            //Notification
            $projectID = $project->id;
            $label = $project->label;
            $name = auth()->user()->first_name;
            $users = User::Role(['Project Manager', 'Sales Executive'])->get();
            \Illuminate\Support\Facades\Notification::send($users, new projectNotification(
                'SO project ' . '""' . $label . '""' . ' perlu diisi',
                $name,
                'warning',
                route('projects.show', $projectID)
            ));
        }

        // Redirect dengan pesan sukses
        return redirect('projects')->with('success', 'Project berhasil ditambahkan');
    }


    public function show($id)
    {
        // Paginator::useBootstrap();
        $project = Project::with(['projectManager', 'salesExecutive'])
            ->findOrFail($id);

        // Ambil data proyek, serta data customer_id, customerContact_id, companyName, dan customerContactName
        $projectData = Project::select('projects.*', 'customers.id as customer_id', 'customer_contacts.id as customerContactId', 'customers.companyName as companyName', 'customer_contacts.name as contactName')
            ->leftJoin('customers', 'projects.customer_id', '=', 'customers.id')
            ->leftJoin('customer_contacts', 'projects.customer_contact_id', '=', 'customer_contacts.id')
            ->where('projects.id', $id)
            ->first();

        // Ambil semua Milestone yang terkait dengan proyek ini dan urutkan berdasarkan created_at terbaru
        $milestones = $project->milestones()->orderBy('created_at', 'asc')->paginate(3);
        $doneMilestones = $project->milestones()->where('progress', 'Done')->count();
        $totalMilestones = $project->milestones()->count();
        $realCost = $project->productionCost->sum('amount');
        $realService = $project->operationals->sum('amount');
        $percentageDone = $totalMilestones > 0 ? ($doneMilestones / $totalMilestones) * 100 : 0;
        $productionCost = $project->productionCost()->orderBy('created_at', 'desc')->get();
        $operationals = $project->operationals()->orderBy('created_at', 'desc')->get();
        $tops = $project->tops()->orderBy('created_at', 'desc')->get();
        $topProgress = $tops->where('status', 'Done')->sum('progress');

        return view('projects.detailProjects', compact('milestones', 'projectData', 'productionCost', 'tops', 'operationals', 'percentageDone', 'realCost', 'realService', 'topProgress', 'project'));
    }


    // Menampilkan form untuk mengedit project
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('projects.editProjects', ['project' => $project]);
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

    public function getProjects()
    {
        $projects = Project::pluck('label', 'id');

        return response()->json(['projects' => $projects]);
    }


    // Menghapus project dari database
    public function destroy($id)
    {
        try {
            $project = Project::findOrFail($id);
            $project->delete();
            return response()->json(['message' => 'Project berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus proyek.'], 500);
        }
    }
}
