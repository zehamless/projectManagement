<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Top;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class TopController extends Controller
{
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
        $title = "Add Payment";
        return view('projects.createPayment', compact('title', 'label', 'projectId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan oleh pengguna
        $request->validate([
            'project_id' => 'required|exists:projects,id',
            'type' => 'string|required',
            'description' => 'string|required',
            'progress' => 'required|numeric|min:0',
            'status' => 'required|in:On Progress,Done', // Validasi status
            'file' => $request->input('status') === 'Done' ? 'required|file|mimes:jpg,png,jpeg,pdf' : 'nullable|mimes:jpg,png,jpeg,pdf',
        ], [
            'file.required' => 'Sertakan bukti pembayaran jika payment sudah selesai.'
        ]);

        $projectId = $request->input('project_id');
        $progress = $request->input('progress');

        // Menghitung total progress pembayaran saat ini pada proyek
        $currentProgress = Top::where('project_id', $projectId)->sum('progress');
        if (($currentProgress + $progress) > 100) {
            return redirect()->back()->with('error', 'Total progress melebihi batas maksimum.');
        }

        // Jika validasi berhasil, tambahkan data Top
        $top = new Top([
            'project_id' => $projectId,
            'type' => $request->input('type'),
            'description' => $request->input('description'),
            'progress' => $progress,
            'status' => $request->input('status')
        ]);

        // Simpan file jika status adalah "Done"
        if ($request->input('status') === 'Done' && $request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = 'payment_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('payment_files'), $fileName);
            $top->file = $fileName;
        }

        $top->save();

        return redirect()->route('projects.show', ['id' => $projectId])->with('success', 'Payment berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // Validasi data yang dikirimkan oleh pengguna
        $validator = Validator::make($request->all(), [
            'project_id' => 'required|exists:projects,id',
            'type' => 'string|required',
            'description' => 'string|required',
            'progress' => 'required|numeric|min:0',
            'status' => 'required|in:On Progress,Done', // Validasi status
            'file' => [
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->input('status') === 'Done' && !$request->hasFile('file')) {
                        $fail('Sertakan bukti pembayaran jika progress sudah selesai.');
                    }
                },
                'nullable',
                'mimes:jpg,png,jpeg,pdf',
            ],
        ], [
            'file.required' => 'Sertakan bukti pembayaran jika progress sudah selesai.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('projects.show', ['id' => $request->input('project_id')])
                ->with('error', 'Gagal memperbarui')->withErrors($validator)->withInput();
        }

        $projectId = $request->input('project_id');
        $progress = $request->input('progress');

        // Menghitung total progress pembayaran saat ini pada proyek
        $currentProgress = Top::where('project_id', $projectId)->sum('progress');
        if (($currentProgress + $progress) > 100) {
            return redirect()->route('projects.show', ['id' => $projectId])
                ->with('error', 'Total progress melebihi batas maksimum.');
        }


        // Jika validasi berhasil, perbarui data Top
        $top = Top::findOrFail($request->input('id'));
        $top->project_id = $projectId;
        $top->type = $request->input('type');
        $top->description = $request->input('description');
        $top->progress = $progress;
        $top->status = $request->input('status');


        // Hapus file sebelumnya jika ada
        if ($top->file && $request->hasFile('file')) {
            $previousFilePath = public_path('payment_files/' . $top->file);
            if (file_exists($previousFilePath)) {
                unlink($previousFilePath);
            }
        }
        // Simpan file jika status adalah "Done"
        if ($request->input('status') === 'Done' && $request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = 'payment_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('payment_files'), $fileName);
            $top->file = $fileName;
        } elseif ($request->input('status') === 'On Progress' && $request->has('file_removed')) {
            // Hapus file jika status diubah dari "Done" ke "On Progress"
            $top->file = null;
        }

        $top->save();

        return redirect()->route('projects.show', ['id' => $projectId])
            ->with('success', 'Payment berhasil diperbarui.');
    }


    public function getTopData($id)
    {
        // Cari data top berdasarkan ID
        $top = Top::find($id);

        if (!$top) {
            return response()->json(['error' => 'Payment not found'], 404);
        }

        // Mengembalikan data top sebagai respons JSON
        return response()->json($top);
    }

    /**
     * Remove the specified resource from storage.
     */
    // Hapus top
    public function destroy($id)
    {
        try {
            $payment = Top::findOrFail($id);
            $payment->delete();
            return response()->json(['message' => 'Payment berhasil dihapus.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus payment.'], 500);
        }
    }

    // Download file
    public function downloadfile($file)
    {
        $filePath = public_path('payment_files/' . $file);

        if (file_exists($filePath)) {
            return response()->download($filePath, $file);
        } else {
            return abort(404, 'File not found');
        }
    }
}
