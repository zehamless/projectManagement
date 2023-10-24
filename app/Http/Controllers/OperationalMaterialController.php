<?php

namespace App\Http\Controllers;

use App\Models\Operational;
use App\Models\OperationalMaterial;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class OperationalMaterialController extends Controller
{
    /**
     * @throws \Exception
     */
    public function index(Request $request, $operational)
    {
        if ($request->ajax()){
            $material = OperationalMaterial::where('operational_id', $operational)->orderByDesc('created_at')->get();
            return DataTables::of($material)
                ->addIndexColumn()
                ->toJson();
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'operational_id' => 'required',
            'memo' => 'required',
            'do' => 'required',
        ]);

        OperationalMaterial::create($request->validated());
        return response()->json([
            'success' => "Operational Material added succescfully"
        ], 200);
    }

    public function show(OperationalMaterial $operationalMaterial)
    {
        return response()->json($operationalMaterial);
    }

    public function update(Request $request, OperationalMaterial $operationalMaterial)
    {
        $request->validate([
            'memo' => 'required',
            'do' => 'required',
            'status' => 'required',
        ]);

        $operationalMaterial->update($request->validated());

        return response()->json([
            'success' => "Operational Material updated succescfully"
        ], 200);
    }

    public function destroy(OperationalMaterial $operationalMaterial)
    {
        $operationalMaterial->delete();

        return response()->json();
    }
}
