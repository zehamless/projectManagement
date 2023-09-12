<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Menampilkan daftar project
    public function index()
    {
        $projects = Project::select('po', 'so', 'label', 'location', 'project_manager', 'sales_executive', 'start_date', 'end_date', 'preliminary_cost', 'po_amount', 'expense_budget', 'customers.id as customer_id', 'customers.companyName')
            ->join('customers', 'projects.customer_id', '=', 'customers.id')
            ->get();


        return view('projects',  [
            'projects' => $projects,
        ]);
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
            // Definisikan aturan validasi di sini sesuai dengan kebutuhan Anda
        ]);

        // Simpan data ke dalam database
        Project::create($validatedData);

        return redirect('/projects')->with('success', 'Project berhasil dibuat.');
    }

    // Menampilkan detail project
    public function show($id)
    {
        try {
            $project = Project::findOrFailWithModel(Project::class, $id);
            dd($project);
        } catch (ModelNotFoundException $e) {
            return abort(404, 'Data tidak ditemukan');
        }
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
            // Definisikan aturan validasi di sini sesuai dengan kebutuhan Anda
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
