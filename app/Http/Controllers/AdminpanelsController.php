<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Accident;
use App\Biological;
use App\hazmat;
use App\Injury;
use Illuminate\Support\Facades\Auth;

class AdminpanelsController extends Controller
{
    public function index()
    {
        $accidents = Accident::all();
        $biologicals = Biological::all();
        $hazmat = hazmat::all();
        $injuries = Injury::all();
        if (Auth::user()->roleid == 1) {
            return view('adminpanel.index', compact('accidents', 'injuries', 'hazmat', 'biologicals'));
        }
        else {
            return view('errors.access');
        }

    }
}
