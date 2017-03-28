<?php

namespace App\Http\Controllers;
use App\Fmla;
use App\Attachment;
use App\Http\Requests\UpdateFmlasRequest;
use App\Http\Requests\StoreFmlasRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class FmlaController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;

    public function index()
    {
        $fmlas = Fmla::all();
        if (Auth::user()->roleid == 1) {
            return view('fmlas.index', compact('fmlas'));
        }
        else {
            return view('errors.access');
        }
    }

    public function create()
    {
        if (Auth::user()->roleid == 1) {
            return view('fmlas.create');
        }
        else {
            return view('errors.access');
        }
    }

    public function store(StoreFmlasRequest $request)
    {
        $request = $this->saveFiles($request);
        Fmla::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->FmlaUpload($request, $last_insert_id);
        $link = $request->url() . "/$last_insert_id";
//write code for email notification here
        //$formname="limitedduties";
        //$rawlink=request()->headers->get('referer');
        //$link=preg_replace('#\/[^/]*$#', '', $rawlink)."/$last_insert_id";

        //$numsent = (new EmailController)->Email($request, $link,$formname);
        //return redirect()->route('biologicals.index');
    }

    public function edit($id)
    {
        $attachments = Attachment::all();
        $fmla = Fmla::findOrFail($id);
        if (Auth::user()->roleid == 1) {
            return view('limitedduties.edit', compact('limitedduty', 'attachments'));
        }
        else {
            return view('errors.access');
        }
    }

    public function show($id)
    {
        $fmla = Fmla::findOrFail($id);
        $attachments = Attachment::all();
        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        if (Auth::user()->roleid == 1) {
            return view('fmlas.show', compact('fmla', 'attachments'));
        }
        else {
            return view('errors.access');
        }
    }

    public function update(UpdateFmlasRequest $request, $id)
    {
        $fmla = Fmla::findOrFail($id);
        \DB::table('fmlas')->where('fmlaid', $fmla->fmlaid)->update([
                'employeename' => $fmla->employeename,
                'employeeid' => $fmla->employeeid,
//                'corvelid' => $fmla->corvelid,
//                'incidentid' => $fmla->incidentid,
                'incidenttype' => $fmla->incidenttype,
                'fromdate' => $fmla->fromdate,
                'todate' => $fmla->todate,
                //'todaysdate' => $biological->todaysdate,
                'comments' => $fmla->comments]
        );
        //end history code
        $request = $this->saveFiles($request);
        $fmla->update($request->all());
        $this->FmlaUpload($request, $id);
        //email notification-start
        //$link = $request->url();
        //$formname="limitedduties";
        //$numsent = (new EmailController)->Email($request, $link,$formname);
        //email notification-end
        return redirect()->route('fmlas.index');
    }
}
