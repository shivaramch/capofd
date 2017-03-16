<?php

namespace App\Http\Controllers;


use App\Biological;
use App\Attachment;
use App\Http\Requests\UpdateBiologicalsRequest;
use App\Http\Requests\StoreBiologicalsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiologicalsController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;

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
        $request = $this->saveFiles($request);
        Biological::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->BiologicalUpload($request, $last_insert_id);

        return redirect()->route('biologicals.index');
    }

    public function edit($id)
    {
        $attachments = Attachment::all();
        $biological = Biological::findOrFail($id);
        return view('biologicals.edit', compact('biological', 'attachments'));
    }

    public function show($id)
    {

        $biological = Biological::findOrFail($id);
        $attachments = Attachment::all();

        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        return view('biologicals.show', compact('biological', 'attachments'));
    }

    public function update(UpdateBiologicalsRequest $request, $id)
    {
        $biological = Biological::findOrFail($id);


        \DB::table('biologicals')->where('ofd6bID', $biological->ofd6bID)->update([
                'exposedEmployeeName' => $biological->exposedEmployeeName,
                'dateOfExposure' => $biological->dateOfExposure,
                'employeeID_1' => $biological->employeeID_1,
                'assignmentBiological' => $biological->assignmentBiological,
                'shift' => $biological->shift,
                'idcoNumber' => $biological->idcoNumber,
                'epcrIncidentNum' => $biological->epcrIncidentNum,
                'todaysDate' => $biological->todaysDate]
        );

        $request = $this->saveFiles($request);
        $biological->update($request->all());

        $this->BiologicalUpload($request, $id);

        return redirect()->route('biologicals.index');


    }
}