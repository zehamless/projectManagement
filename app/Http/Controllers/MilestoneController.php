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
            'file' => 'nullable|file|mimes:jpg,png,jpeg,pdf,docx|max:2048', // Validasi file gambar
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

    public function update(Request $request)
    {
        // Validasi data yang dikirim dari formulir
        $validatedData = $request->validate([
            'milestone_id' => 'required',
            'submitted_date' => 'required|date',
            'description' => 'required',
            'due_date' => 'required|date',
            'progress' => 'required|in:Planned,On Progress,Done', // Pilihan yang valid
            'file' => 'nullable|file|mimes:jpg,png,jpeg,pdf,docx|max:2048', // Contoh validasi untuk tipe file
        ]);

        $milestone = Milestone::findOrFail($request->milestone_id);

        // Mengupdate data milestone dengan data yang validasi
        $milestone->update($validatedData);

        // Upload file jika ada
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('milestone_files', $fileName, 'public');
            $milestone->file = $fileName;
            $milestone->save();
        }

        return redirect()->route('projects.show', ['id' => $milestone->project_id])->with('success', 'Milestone berhasil diubah.');
    }

    // Kirim data json untuk edit milestone
    public function getMilestoneData($id)
    {
        // Cari data milestone berdasarkan ID
        $milestone = Milestone::find($id);

        if (!$milestone) {
            return response()->json(['error' => 'Milestone not found'], 404);
        }

        // Mengembalikan data milestone sebagai respons JSON
        return response()->json($milestone);
    }






    public function create($id)
    {
        $project = $id;
        return view('projects.createMilestone', compact('project'));
    }

    // Hapus milestone
    public function destroy($id)
    {
        try {
            $milestone = Milestone::findOrFail($id);
            $milestone->delete();
            return response()->json(['message' => 'Milestone berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus Milestone.'], 500);
        }
    }
}
