<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\Project;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    public function store(Request $request)
    {
        $projectId = '9a22dce4-69f9-44bf-9eb2-189a495e10a4';
        // Validasi data input dari form
        $validatedData = $request->validate([
            'submitted_date' => 'required|date',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'progress' => 'required|string',
            // Jangan lupa menambahkan validasi lainnya sesuai kebutuhan Anda
        ]);

        // Simpan data Milestone ke dalam database dengan mengaitkannya dengan ID proyek
        $project = Project::findOrFail($projectId);
        $milestone = new Milestone($validatedData);
        $project->milestones()->save($milestone);

        return dd("Berhasil");
    }



    public function create()
    {
        return view('testform');
    }
}
