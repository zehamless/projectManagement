<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Operational;
use App\Models\Project;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PDF;
use Yajra\DataTables\Facades\DataTables;

class OperationalController extends Controller
{
    public function index()
    {
        $salesOrder = Project::select('id', 'so')->get();
        return view('operational.index', compact('salesOrder'));
    }

    public function showById($id)
    {
        $operational = Operational::find($id);

        if (!$operational) {
            return redirect()->route('projects.index')->with('error', 'Terjadi kesalahan');
        }

        $projectId = $operational->project_id;

        $project = Project::find($projectId);

        if (!$project) {
            return redirect()->route('projects.index')->with('error', 'Terjadi kesalahan');
        }
        $salesOrder = Project::select('id', 'so')->get();
        $spkNumber = $operational->spk_number;
        $spkNumber_id = $id;
        $soNumber = $project->so;

        return view('operational.index', compact('spkNumber', 'spkNumber_id', 'soNumber', 'salesOrder'));
    }

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
        $title = "Add Operational";
        return view('projects.createOperational', compact('title', 'label', 'projectId'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'date' => 'required|date',
            'type' => 'required',
            'transportation_mode' => 'required',
            'spk_code' => 'required',
            'spk_number' => 'required',
            'description' => 'required',
            'created_by' => 'required',
        ]);

        // Setel Vehicle Number menjadi '-' jika Transportation Mode tidak sama dengan 'mobil'
        $validatedData['vehicle_number'] = ($request->input('transportation_mode') === 'mobil')
            ? $request->input('vehicle_number')
            : '-';

        // Validasi Vehicle Number hanya jika Transportation Mode adalah 'mobil'
        if ($request->input('transportation_mode') === 'mobil') {
            $request->validate([
                'vehicle_number' => 'required|regex:/^[A-Za-z0-9]+$/',
            ], [
                'vehicle_number.required' => 'Vehicle Number is required when Transportation Mode is "mobil".',
                'vehicle_number.regex' => 'If using a "mobil" as transportation, you must provide a vehicle number.',
            ]);
        }

        // Gabungkan spk_code dan spk_number
        $combinedSPK = $request->input('spk_code') . '-' . $request->input('spk_number');
        $validatedData['spk_number'] = $combinedSPK;
        $validatedData['amount'] = 0;
        // Simpan data ke dalam database
        Operational::create($validatedData); // Ganti 'Operational' dengan model yang sesuai

        // Redirect pengguna ke halaman project.show dengan project_id sebagai parameter jika penyimpanan berhasil
        return redirect()->route('projects.show', ['id' => $validatedData['project_id']])
            ->with('success', 'Data operational berhasil ditambahkan');
    }


    public function updateForm(Operational $operational)
    {
        return view('operational.update', compact('operational'));
    }

    public function update(Request $request)
    {
        try {
            // Validasi data yang dikirim dari formulir
            $validatedData = $request->validate([
                'id' => 'required',
                'date' => 'required|date',
                'type' => 'required',
                'transportation_mode' => 'required',
                'spk_code' => 'required',
                'spk_number' => 'required',
                'description' => 'required',
            ]);

            $combinedSPK = $request->input('spk_code') . '-' . $request->input('spk_number');
            $validatedData['spk_number'] = $combinedSPK;
            $operational = Operational::findOrFail($request->id);

            // Mengupdate data operational dengan data yang validasi
            $operational->update($validatedData);

            return redirect()->route('projects.show', ['id' => $request->project_id])->with('success', 'Operational berhasil diubah.');
        } catch (Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengubah Operational: ' . $e->getMessage());
        }
    }


    public function getOperationalData($id)
    {
        // Cari data Operational berdasarkan ID
        $Operational = Operational::find($id);

        if (!$Operational) {
            return response()->json(['error' => 'Operational not found'], 404);
        }

        // Mengembalikan data Operational sebagai respons JSON
        return response()->json($Operational);
    }

    public function destroy(Operational $operational)
    {
        try {
            if ($operational->team()->exists()) {
                $operational->team()->detach();
            }
            $operational->delete();
            return response()->json(['message' => 'Operational berhasil dihapus.']);
        } catch (Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus Operational.'], 500);
        }
    }

    /**
     * @return JsonResponse
     */
    public function getOperational($salesOrder): JsonResponse
    {
        $operationals = Operational::select('id', 'spk_number')->where('project_id', $salesOrder)->get();
        return response()->json($operationals);
    }

    /**
     * @param Operational $operational
     * @return JsonResponse
     */
    public function show(Operational $operational)
    {
        $operationals = Operational::where('id', $operational->id)->with('team', 'project:id,label', 'creator', 'approver')->get();
        return response()->json($operationals);
    }

    public function detachTeam(Operational $operational, Request $request)
    {
        $operational->team()->detach($request->user_id);
        return response()->json([
            '200'
        ]);
    }

    public function attachTeam(Operational $operational, Request $request)
    {
        $operational->team()->attach($request->user_id);
        return response()->json([
            '200'
        ]);
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application|JsonResponse
     * @throws Exception
     */
    public function approval()
    {
        $operationals = Operational::with('project:id,label')->where('approved_by', null)->select('id', 'spk_number', 'project_id', 'date', 'created_by')->get();
        if (\request()->ajax()) {
            return DataTables::of($operationals)
                ->addIndexColumn()
                ->addColumn('created_by', function ($operationals) {
                    return $operationals->creator->first_name . ' ' . $operationals->creator->last_name;
                })
                ->addColumn('action', function ($operationals) {
                    return '<a href="' . route('operational.approve', $operationals->id) . '" class="btn btn-approval btn-sm" type="button">Approve</a>' .
                        '<a href="' . route('operational.download', $operationals->id) . '" class="btn btn-info btn-sm" type="button">Download</a>' .
                        '<a href="' . route('operational.preview', $operationals->id) . '" class="btn btn-success btn-sm" type="button">Preview</a>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
//        dd($operationals);
        return view('approval');
    }

    public function approve(Operational $operational)
    {
        $operational->approved_by = auth()->user()->id;
        $operational->save();
        return redirect()->back()->with('success', 'Operational berhasil diapprove');
    }

    public function preview(Operational $operational)
    {
        $operational = $operational->load('project', 'team', 'agendas', 'creator');
        $customerId = Customer::where('id', $operational->project->customer_id)->first();
        $currentUser = auth()->user();
        $currentDate = date('d-m-Y');
        return view('operational.operationalDocument', compact('operational', 'customerId', 'currentUser', 'currentDate'));
    }

    public function downloadFile(Operational $operational)
    {
        $operational = $operational->load('project', 'team', 'agendas', 'creator');
        $customerId = Customer::where('id', $operational->project->customer_id)->first();
        $currentUser = auth()->user();
        $currentDate = date('d-m-Y');
        $file = PDF::loadView('operational.operationalDocument', compact('operational', 'customerId', 'currentUser', 'currentDate'));
        return $file->download($operational->spk_number . '.pdf');
    }
}

