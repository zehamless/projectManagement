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

    public function update(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $validatedData = $request->validate([
            'cost_id' => 'required',
            'description' => 'required',
            'amount' => 'required|numeric',
        ]);

        $production_cost = ProductionCost::findOrFail($request->cost_id);

        // Mengupdate data production_cost dengan data yang validasi
        $production_cost->update($validatedData);

        return redirect()->route('projects.show', ['id' => $production_cost->project_id])->with('success', 'Production Cost berhasil diubah.');
    }

    public function getPCostData($id)
    {
        // Cari data p_cost berdasarkan ID
        $p_cost = ProductionCost::find($id);

        if (!$p_cost) {
            return response()->json(['error' => 'Production Cost not found'], 404);
        }

        // Mengembalikan data p_cost sebagai respons JSON
        return response()->json($p_cost);
    }

    // Hapus production cost
    public function destroy($id)
    {
        try {
            $productionCost = ProductionCost::findOrFail($id);
            $productionCost->delete();
            return response()->json(['message' => 'Production Cost berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus Production Cost.'], 500);
        }
    }
}
