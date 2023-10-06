<?php

namespace App\Http\Controllers;

use App\Models\OperationalAgenda;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OperationalAgendaController extends Controller
{
    /**
     * @param Request $request
     * @param $operational
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function index(Request $request, $operational)
    {
        if ($request->ajax()){
            $agenda = OperationalAgenda::where('operational_id', $operational)->orderByDesc('created_at')->get();
            return DataTables::of($agenda)
                ->addIndexColumn()
                ->toJson();
        }
    }

    public function create()
    {
        // Tampilkan formulir pembuatan data
        return view('operational_agenda.create');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data baru
        $validation = $request->validate([
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

        return response()->json([
            'success' => "Operational Agenda added succescfully"
        ], 200);
    }

    public function show(Request $request, string $agenda)
    {
        $attrAgenda = OperationalAgenda::where('id', $agenda)->get();

        return response()->json($attrAgenda);
    }

    public function edit(OperationalAgenda $operationalAgenda)
    {
        // Tampilkan formulir pengeditan data
        return view('operational_agenda.edit', compact('operationalAgenda'));
    }

    public function update(Request $request, OperationalAgenda $agenda)
    {
        // Validasi data yang dikirim dari formulir
        $request->validate([
            'description' => 'required',
            'due_date' => 'required',
            'status' => 'required',
        ]);

        // Perbarui data yang ada dalam tabel "operational_agenda"
        $agenda->update($request->all());

        return response()->json([
            'success' => 'Operational Agenda updated successfully!'
        ], 200);
    }

    public function delete(OperationalAgenda $agenda)
    {

        $agenda->delete();

        return response()->json([
            'success' => 'Operational Agenda deleted successfully!'
        ], 200);
     }

    /**
     * @param Request $request
     * @param string $agenda
     * @return JsonResponse
     */
    public function showAgenda(Request $request, string $agenda)
     {
         $attrAgenda = OperationalAgenda::where('id', $agenda)->get();

         return response()->json($attrAgenda);
     }
}
