<?php

namespace App\Http\Controllers;

use App\hazmat;
use App\Attachment;
use App\Http\Requests\UpdateHazmatRequest;
use App\Http\Requests\StoreStationsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHazmatRequest;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;

    public function index()
    {
       // $hazmat = hazmat::all();
        return view('search.index', compact('search'));
    }


}
