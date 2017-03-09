<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\hazmat;
use App\Http\Requests\StoreHazmatRequest;
use App\Http\Requests\UpdateHazmatRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;

class HazmatController extends Controller
{

    public function index()
    {
        $hazmat = hazmat::all();
        return view('hazmat.index', compact('hazmat'));
    }

    public function create()
    {

        return view('hazmat.create');
    }

    public function store(StoreHazmatRequest $request)
    {
        //$request = $this->saveFiles($request);

        hazmat::create($request->all());

        return redirect()->route('hazmat.index');
    }

    public function edit($id)
    {

      $hazmat = hazmat::findOrFail($id);
      return view('hazmat.edit', compact('hazmat', ''));
    }

    public function show($id)
    {

        $hazmat = hazmat::findOrFail($id);

        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        return view('hazmat.show',compact('hazmat'));
    }

    public function update(UpdateHazmatRequest $request, $id)
    {
        //$accident = $this->saveFiles($request);
        $hazmat = hazmat::findOrFail($id);

        \DB::table('hazmat')->where('ofd6cID', $hazmat->ofd6cID)->update([
                'employeeID' => $hazmat->employeeID,
                'exposedEmployeeName' => $hazmat->exposedEmployeeName,
                'dateOfExposure' => $hazmat->dateOfExposure,
                'idconumber' => $hazmat->idconumber,
                'epcrIncidentNum' => $hazmat->epcrIncidentNum,
                'assignmentHazmat' => $hazmat->assignmentHazmat,
                'shift' => $hazmat->shift,
                'corvelID' => $hazmat->corvelID ]
        );

        //end history code
        $hazmat->update($request->all());

        return redirect()->route('hazmat.index');
    }
}
