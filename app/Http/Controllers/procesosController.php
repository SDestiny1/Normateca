<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class procesosController extends Controller
{
    public function index()
    {
        return view('Procesos.index');
    }
}
