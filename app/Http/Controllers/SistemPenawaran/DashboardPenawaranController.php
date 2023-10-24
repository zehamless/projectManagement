<?php

namespace App\Http\Controllers\SistemPenawaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardPenawaranController extends Controller
{
    //
    public function index(){
        return view('sistemPenawaran.dashboardPenawaran');
    }
}
