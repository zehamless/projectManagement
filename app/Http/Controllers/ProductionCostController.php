<?php

namespace App\Http\Controllers;

use App\Models\ProductionCost;
use App\Models\Project;
use Illuminate\Http\Request;

class ProductionCostController extends Controller
{
    public function create($id)
    {
        // Mengambil data project berdasarkan ID
        $project = Project::find($id);

        // Memeriksa apakah project ditemukan
        if (!$project) {
            return redirect()->route('projects.index')->with('error', 'Project tidak ditemukan.');
        }

        // Mengambil label dan ID project
        $label = $project->label;
        $projectId = $project->id;

        return view('projects.createProductionCost', compact('label', 'projectId'));
    }

    public function store(Request $request)
    {
        // Validasi data input dari form
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'description' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        // Simpan data ProductionCost ke dalam database
        $productionCost = new ProductionCost([
            'project_id' => $request->input('project_id'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount'),
        ]);

        $productionCost->save();

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('projects.show', $request->input('project_id'))->with('success', 'Production Cost berhasil ditambahkan');
    }
}
