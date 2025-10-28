<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class estructuraController extends Controller
{
    public function index()
    {
        return view('EstructuraOrg.index');
    }
}
