<?php

namespace App\Http\Controllers;

use App\Models\Operational;
use App\Models\Project;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PhpParser\Node\Scalar\String_;

class OperationalController extends Controller
{
    public function index()
    {
        $salesOrder = Project::select('id', 'so')->get();
        return view('operational.index', compact('salesOrder'));
    }

    public function createForm()
    {
        return view('operational.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'spk_code' => 'required|string|max:10',
            'spk_number' => 'max:10',
            'type' => 'required',
            'team' => 'required|array',
            'description' => 'string|max:255',
            'transportation_mode' => 'required|string',
            'vehicle_number' => 'required|max:12|string',
            'created_by' => 'required|string',
        ]);


        $operational = Operational::create([
            'project_id' => $request->project_id,
            'date' => $request->date,
            'spk_code' => $request->spk_code,
            'spk_number' => $request->spk_number,
            'type' => $request->type,
            'description' => $request->description,
            'transportation_mode' => $request->transportation_mode,
            'vehicle_number' => $request->vehicle_number,
            'created_by' => $request->created_by,
        ]);
        $operational->team()->sync($request->team);
        return redirect()->route('operational.index')->with('success', 'Operational created successfully.');
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
        if ($request->team){
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

}
