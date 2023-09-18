<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\Project;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    public function store(Request $request, $projectId)
    {
        // Validasi data input dari form
        $validatedData = $request->validate([
            'entry_date' => 'required|date',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'progress' => 'required|string',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Simpan file ke penyimpanan (misalnya, penyimpanan lokal)
        $uploadedFile = $request->file('file');
        $fileExtension = $uploadedFile->getClientOriginalExtension();
        $fileName = 'milestone_' . time() . '.' . $fileExtension;
        $filePath = $uploadedFile->storeAs('milestones', $fileName); // Simpan file dalam direktori "milestones"

        // Simpan data Milestone ke dalam database dengan mengaitkannya dengan ID proyek
        $project = Project::findOrFail($projectId);
        $milestone = new Milestone($validatedData);
        $milestone->file_path = $filePath; // Simpan path file ke dalam kolom "file_path" (sesuaikan dengan struktur database Anda)
        $project->milestones()->save($milestone);

        return redirect()->route('projects.index', $projectId)->with('success', 'Milestone berhasil ditambahkan');
    }
}
