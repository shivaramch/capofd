<?php

namespace App\Http\Controllers;

use App\Accident;
use App\Attachment;
use App\Http\Requests\UpdateAccidentsRequest;
use App\Http\Requests\StoreStationsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAccidentsRequest;
use Illuminate\Support\Facades\Auth;

class AccidentsController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;

    public function index()
    {
        $accidents = Accident::all();
        return view('accidents.index', compact('accidents'));
    }

    public function create()
    {

        return view('accidents.create');
    }

    public function store(StoreAccidentsRequest $request)
    {
        $request = $this->saveFiles($request);
        Accident::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->AccidentUpload($request, $last_insert_id);

        return redirect()->route('accidents.index');
    }

    public function edit($id)
    {
        $attachments = Attachment::all();
        $accident = Accident::findOrFail($id);
        return view('accidents.edit', compact('accident', 'attachments'));
    }

    public function show($id)
    {

        $accident = Accident::findOrFail($id);
        $attachments = Attachment::all();

        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        return view('accidents.show',compact('accident', 'attachments'));
    }

    public function update(UpdateAccidentsRequest $request, $id)
    {
        $accident = Accident::findOrFail($id);


        \DB::table('ofd6a')->where('ofd6aID', $accident->ofd6aID)->update([
                'accidentDate' => $accident->accidentDate,
                'driverName' => $accident->driverName,
                'driverID' => $accident->driverID,
                'assignmentAccident' => $accident->assignmentAccident,
                'appratus' => $accident->appratus,
                'captainID' => $accident->captainID,
                'battalionChiefID' => $accident->battalionChiefID,
                'acOnDutyID' => $accident->acOnDutyID ]
        );

        //end history code
        $request = $this->saveFiles($request);
        $accident->update($request->all());

        $this->AccidentUpload($request, $id);

        return redirect()->route('accidents.index');
    }
}
