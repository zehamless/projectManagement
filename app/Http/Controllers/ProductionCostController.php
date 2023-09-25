<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductionCostController extends Controller
{
    public function create(Request $id)
    {
        $project = $id;
        return view('projects.createProductionCost', compact('project'));
    }
}
