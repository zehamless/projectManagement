<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    // Menampilkan daftar project
    public function index(Request $request)
    {
        $query = Project::select('po', 'so', 'label', 'location', 'project_manager', 'sales_executive', 'start_date', 'end_date', 'preliminary_cost', 'po_amount', 'expense_budget', 'customers.id as customer_id', 'customers.companyName')
            ->join('customers', 'projects.customer_id', '=', 'customers.id')
            ->orderBy('projects.created_at', 'desc');

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

        $projects = $query->get();

        return view('/projects', compact('projects'));
    }

    // Menampilkan form untuk membuat project baru
    public function create()
    {
        return view('projects.create');
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
            'so' => 'nullable|string',
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
        // Ambil semua Milestone yang terkait dengan proyek ini dan urutkan berdasarkan created_at terbaru
        $milestones = $project->milestones()->orderBy('created_at', 'desc')->get();
        return dd($project, $milestones);
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

        return redirect('/projects')->with('success', 'Project berhasil diperbarui.');
    }

    // Menghapus project dari database
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect('/projects')->with('success', 'Project berhasil dihapus.');
    }
}
