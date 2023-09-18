<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OperationalAgenda;

class OperationalAgendaController extends Controller
{
    public function index()
    {
        $operationalAgenda = OperationalAgenda::all();
        return view('operational_agenda.index', compact('operationalAgenda'));
    }

    public function create()
    {
        // Tampilkan formulir pembuatan data
        return view('operational_agenda.create');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data baru
        $request->validate([
            'operational_id' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'status' => 'required',
        ]);

        // Simpan data baru ke dalam tabel "operational_agenda"
        OperationalAgenda::create([
            'operational_id' => $request->input('operational_id'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('operational_agenda.index')
            ->with('success', 'Data operational agenda berhasil ditambahkan.');
    }

    public function show(OperationalAgenda $operationalAgenda)
    {
        // Tampilkan detail data
        return view('operational_agenda.show');
    }

    public function edit(OperationalAgenda $operationalAgenda)
    {
        // Tampilkan formulir pengeditan data
        return view('operational_agenda.edit', compact('operationalAgenda'));
    }

    public function update(Request $request, OperationalAgenda $operationalAgenda)
    {
        // Validasi data yang dikirim dari formulir
        $request->validate([
            'operational_id' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'status' => 'required',
        ]);

        // Perbarui data yang ada dalam tabel "operational_agenda"
        $operationalAgenda->update([
            'operational_id' => $request->input('operational_id'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('operational-agendas.index')
            ->with('success', 'Data operational agenda berhasil diperbarui.');
    }

    public function delete(OperationalAgenda $operationalAgenda)
    {

        // Hapus data dari tabel "operational_agenda"
        $operationalAgenda->delete();

        return redirect()->route('operational_agenda.index')
            ->with('success', 'Data operational agenda berhasil dihapus.');
     }
}
