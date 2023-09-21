<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\Project;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data input dari form
        $validatedData = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'submitted_date' => 'required|date',
            'description' => 'required|string',
            'due_date' => 'required|date',
            'progress' => 'required|string',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file gambar
        ]);

        // Simpan data Milestone ke dalam database dengan mengaitkannya dengan ID proyek
        $milestone = new Milestone([
            'submitted_date' => $request->input('submitted_date'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date'),
            'progress' => $request->input('progress'),
        ]);

        // Simpan file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('milestone_files'), $fileName);
            $milestone->file = $fileName;
        }

        $project = Project::find($validatedData['project_id']);
        $project->milestones()->save($milestone);

        return redirect()->route('projects.show', $validatedData['project_id'])->with('success', 'Milestone berhasil ditambahkan');
    }





    public function create($id)
    {
        $project = $id;
        return view('projects.createMilestone', compact('project'));
    }
}