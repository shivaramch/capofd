<?php

namespace App\Http\Controllers;

use App\Biological;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\StoreBiologicalsRequest;
use App\Http\Requests\UpdateBiologicalsRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Traits\FileUploadTrait;

class BiologicalsController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        $biologicals = Biological::all();
        return view('biologicals.index', compact('biologicals'));
    }

    public function create()
    {

        return view('biologicals.create');
    }

    public function store(StoreBiologicalsRequest $request)
    {
        //$accident = $this->saveFiles($request);
        Biological::create($request->all());

        return redirect()->route('biologicals.index');
    }

    public function edit($id)
    {
        $biological = Biological::findOrFail($id);
        return view('biologicals.edit', compact('biological', ''));
    }

    public function show($id)
    {

        $biological = Biological::findOrFail($id);

        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        return view('biologicals.show',compact('biological'));
    }

    public function update(UpdateBiologicalsRequest $request, $id)
    {
        $request = $this->saveFiles($request);

        $biological = Biological::findOrFail($id);


        //$accident = $this->saveFiles($request);
        //$biologicals = Biological::findOrFail($id);

        \DB::table('biologicals')->where('ofd6bID', $biological->ofd6bID)->update([
                'exposedEmployeeName' => $biological->exposedEmployeeName,
                'dateOfExposure' => $biological->dateOfExposure,
                'employeeID_1' => $biological->employeeID_1,
                'assignmentBiological' => $biological->assignmentBiological,
                'shift' => $biological->shift,
                'idcoNumber' => $biological->idcoNumber,
                'epcrIncidentNum' => $biological->epcrIncidentNum,
                'todaysDate' => $biological->todaysDate ]
        );


        $biological->update($request->all());
        return redirect()->route('biologicals.index');




    }
}