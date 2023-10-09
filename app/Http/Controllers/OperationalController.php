<?php

namespace App\Http\Controllers;

use App\Models\Operational;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use PhpParser\Node\Scalar\String_;

class OperationalController extends Controller
{
    public function index()
    {
        $salesOrder = Project::select('id', 'so')->get();
        return view('operational.index', compact('salesOrder'));
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
            'vehicle_number' => [
                Rule::requiredIf(function () use ($request) {
                    return $request->transportation_mode === 'mobil';
                }),
                'regex:/^[A-Za-z0-9]+$/',
            ],
        ], [
            'vehicle_number.required' => 'Vehicle Number is required when Transportation Mode is "mobil".',
            'vehicle_number.regex' => 'Vehicle Number should only contain alphabets and numbers.',
            // Menambahkan pesan kesalahan lainnya sesuai kebutuhan
        ]);
        // Simpan data ke dalam database
        Operational::create($validatedData); // Ganti 'Operational' dengan model yang sesuai

        // Redirect pengguna ke halaman project.show dengan project_id sebagai parameter jika penyimpanan berhasil
        return redirect()->route('projects.show', ['id' => $validatedData['project_id']])
            ->with('success', 'Data berhasil disimpan');
    }


    public function updateForm(Operational $operational)
    {
        return view('operational.update', compact('operational'));
    }

    public function update(Request $request, Operational $operational)
    {
        $request->validate([
            'date' => 'date',
            'spk_code' => 'string|max:10',
            'spk_number' => 'string|max:10',
            'type' => 'string',
            'team' => 'array',
            'description' => 'max:255',
            'transportation_mode' => 'string',
            'vehicle_number' => 'string|max:12',
        ]);

        $operational->update([
            'date' => $request->date ?? $operational->date,
            'spk_code' => $request->spk_code ?? $operational->spk_code,
            'spk_number' => $request->spk_number ?? $operational->spk_number,
            'type' => $request->type ?? $operational->type,
            'description' => $request->description ?? $operational->description,
            'transportation' => $request->transportation ?? $operational->transportation,
            'vehicle_number' => $request->vehicle_number ?? $operational->vehicle_number,
        ]);
        if ($request->team) {
            $operational->team()->sync($request->team);
        }
        return redirect()->route('operational.index')->with('success', 'Operational updated successfully.');
    }

    public function delete(Operational $operational)
    {
        if ($operational->team()->exists()) {
            $operational->team()->detach();
        }
        $operational->delete();
        return redirect()->route('operational.index')->with('success', 'Operational deleted successfully.');
    }

    public function approve(Request $request, Operational $operational)
    {
        $request->validate([
            'approved_by' => 'required|string',
        ]);
        $operational->approved_by = $request->approved_by;
        $operational->save();
        return redirect()->route('operational.index')->with('success', 'Operational approved successfully.');
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
        $operationals = Operational::where('id', $operational->id)->with('team', 'project:id,label')->get();
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
}
