<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BiologicalsController extends Controller
{
    public function index()
    {
        return view('biologicals.index', compact('biologicals'));
    }
    public function store()
    {
        return view('biologicals.index', compact('biologicals'));
    }
}
