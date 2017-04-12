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
        if (Auth::user()->roleid == 1) {
            return view('adminpanel.index');
        }
        else {
            return view('errors.access');
        }

    }

    public function search()
    {
        $accidents = Accident::all();
        $biologicals = Biological::all();
        $hazmat = hazmat::all();
        $injuries = Injury::all();
        if (Auth::user()->roleid == 1) {
            return view('adminpanel.search', compact('accidents', 'injuries', 'hazmat', 'biologicals'));
        }
        else {
            return view('errors.access');
        }

    }
}
