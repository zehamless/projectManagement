<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::all();
        return view('materials.index', compact('materials'));
    }

    public function create()
    {
        return view('materials.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $request->validate([
            'operational_id' => 'required',
            'memo' => 'required',
            'do' => 'required',
            'np' => 'required',
            'status' => 'required',
        ]);

        // Simpan data baru ke dalam tabel "materials"
        Material::create([
            'operational_id' => $request->input('operational_id'),
            'memo' => $request->input('memo'),
            'do' => $request->input('do'),
            'np' => $request->input('np'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('materials.index')
            ->with('success', 'Data material berhasil ditambahkan.');
    }

    public function show(Material $material)
    {
        // Tampilkan detail data
        return view('materials.show', compact('material'));
    }

    public function edit(Material $material)
    {
        return view('materials.edit', compact('material'));
    }

    public function update(Request $request, Material $material)
    {
        // Validasi data yang dikirim dari formulir
        $request->validate([
            'operational_id' => 'required',
            'memo' => 'required',
            'do' => 'required',
            'np' => 'required',
            'status' => 'required',
        ]);

        // Perbarui data yang ada dalam tabel "materials"
        $material->update([
            'operational_id' => $request->input('operational_id'),
            'memo' => $request->input('memo'),
            'do' => $request->input('do'),
            'np' => $request->input('np'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('materials.index')
            ->with('success', 'Data material berhasil diperbarui.');
    }

    public function delete(Material $material)
    {
        $material->delete();

        return redirect()->route('materials.index')
            ->with('success', 'Data material berhasil dihapus.');
    }
}
