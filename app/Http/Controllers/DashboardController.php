<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil 10 proyek terakhir
        $projects = Project::latest()->take(10)->get();

        // Menghitung total proyek
        $totalProjects = Project::count();
        $totalUser = User::count();

        return view('dashboard', compact('projects', 'totalProjects', 'totalUser'));
    }
}
