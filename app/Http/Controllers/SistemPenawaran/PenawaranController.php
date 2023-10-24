<?php

namespace App\Http\Controllers\SistemPenawaran;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenawaranController extends Controller
{
    public function index(){
        return view('sistemPenawaran.penawaran.index');
    }
}
