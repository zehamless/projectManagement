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

        OperationalMaterial::create($request->all());
        return response()->json([
            'success' => "Operational Material added successfully"
        ], 200);
    }

    public function show(string $operationalMaterial)
    {
        $material = OperationalMaterial::find($operationalMaterial);
        return response()->json($material);
    }

    public function update(Request $request, OperationalMaterial $material)
    {
        $request->validate([
            'memo' => 'required',
            'do' => 'required',
        ]);

        $req = $request->all();
        $material->update($request->all());
        //return request as json
        return response()->json([
            'success' => "Operational Material updated successfully",
            'data'=> [
                'req' => $req,
                'operationalMaterial' => $material
                ]
        ], 200);
    }

    public function destroy(OperationalMaterial $material)
    {
        $material->delete();

        return response()->json([
            'success' => "Operational Material deleted successfully"
        ], 200);
    }
}
