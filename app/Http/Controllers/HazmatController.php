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

class HazmatController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;

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
        $request = $this->saveFiles($request);
        hazmat::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->HazmatUpload($request, $last_insert_id);

        $link = $request->url() . "/$last_insert_id";
//write code for email notification here
        $numsent = (new EmailController)->Email($request, $link);

        return redirect()->route('hazmat.index');
    }

    public function edit($id)
    {

        $attachments = Attachment::all();
        $hazmat = hazmat::findOrFail($id);
        return view('hazmat.edit', compact('hazmat', 'attachments'));
    }

    public function show($id)
    {

        $hazmat = hazmat::findOrFail($id);
        $attachments = Attachment::all();

        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        return view('hazmat.show',compact('hazmat', 'attachments'));
    }

    public function update(UpdateHazmatRequest $request, $id)
    {
        //$accident = $this->saveFiles($request);
        $hazmat = hazmat::findOrFail($id);

        \DB::table('hazmat')->where('ofd6cid', $hazmat->ofd6cid)->update([
                'employeeid' => $hazmat->employeeid,
                'employeename' => $hazmat->employeename,
                'dateofexposure' => $hazmat->dateofexposure,
                'primaryidconumber' => $hazmat->primaryidconumber,
                'epcrincidentnum' => $hazmat->epcrincidentnum,
                'frmsincidentnum' => $hazmat->frmsincidentnum,
                'assignment' => $hazmat->assignment,
                'shift' => $hazmat->shift,
                'corvelid' => $hazmat->corvelid,
                'exposurehazmat' => $hazmat->exposurehazmat]
        );

        //end history code
        $request = $this->saveFiles($request);
        $hazmat->update($request->all());

        $this->HazmatUpload($request, $id);

        $link=$request->url();

        //add email code here
      //  $numsent = (new EmailController)->Email($request, $link);


        return redirect()->route('hazmat.index');
    }
}
