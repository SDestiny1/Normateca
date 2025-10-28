<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class indicadoresController extends Controller
{
    public function index()
    {
        return view('Indicadores.index');
    }
}
