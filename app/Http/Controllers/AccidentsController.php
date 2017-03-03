<?php

namespace App\Http\Controllers;

use App\Accident;
use App\Http\Requests\UpdateAccidentsRequest;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAccidentsRequest;

class AccidentsController extends Controller
{
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
        //$accident = $this->saveFiles($request);
        Accident::create($request->all());

        return redirect()->route('accidents.index');
    }

    public function edit($id)
    {
        $accident = Accident::findOrFail($id);
        return view('accidents.edit', compact('accident', ''));
    }

    public function show($id)
    {

        $accident = Accident::findOrFail($id);

        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        return view('accidents.show',compact('accident'));
    }

    public function update(UpdateAccidentsRequest $request, $id)
    {
        //$accident = $this->saveFiles($request);
        $accident = Accident::findOrFail($id);

        \DB::table('ofd6a')->where('ofd6aID', $accident->ofd6aID)->update([
                'accidentDate' => $accident->accidentDate,
                'driverName' => $accident->driverName,
                'driverID' => $accident->station_date,
                'assignmentAccident' => $accident->assignmentAccident,
                'appratus' => $accident->appratus,
                'captainID' => $accident->captainID,
                'battalionChiefID' => $accident->battalionChiefID,
                'acOnDutyID' => $accident->acOnDutyID ]
        );

        //end history code
        $accident->update($request->all());

        return redirect()->route('accidents.index');
    }
}
