<?php

namespace App\Http\Controllers;

use App\Limitedduty;
use App\Attachment;
use App\Http\Requests\UpdateLimiteddutiesRequest;
use App\Http\Requests\StoreLimiteddutiesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LimiteddutyController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;

    public function index()
    {
        $limitedduties = Limitedduty::all();
        if (Auth::user()->roleid == 1) {
            return view('limitedduties.index', compact('limitedduties'));
        }
        else {
            return view('errors.access');
        }
    }

    public function create()
    {
        if (Auth::user()->roleid == 1) {
            return view('limitedduties.create');
        }
        else {
            return view('errors.access');
        }
    }

    public function store(StoreLimiteddutiesRequest $request)
    {
        $request = $this->saveFiles($request);
        Limitedduty::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->LimiteddutyUpload($request, $last_insert_id);
        $link = $request->url() . "/$last_insert_id";
//write code for email notification here
        //$formname="limitedduties";
        //$rawlink=request()->headers->get('referer');
        //$link=preg_replace('#\/[^/]*$#', '', $rawlink)."/$last_insert_id";

        //$numsent = (new EmailController)->Email($request, $link,$formname);

            return redirect()->route('limitedduties.index');

    }

    public function edit($id)
    {
        $attachments = Attachment::all();
        $limitedduty = Limitedduty::findOrFail($id);
        if (Auth::user()->roleid == 1) {
            return view('limitedduties.edit', compact('limitedduty', 'attachments'));
        }
        else {
            return view('errors.access');
        }
    }

    public function show($id)
    {
        $limitedduty = Limitedduty::findOrFail($id);
        $attachments = Attachment::all();
        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        if (Auth::user()->roleid == 1) {
            return view('limitedduties.show', compact('limitedduty', 'attachments'));
        }
        else {
            return view('errors.access');
        }
    }

    public function update(UpdateLimiteddutiesRequest $request, $id)
    {
        $limitedduty = Limitedduty::findOrFail($id);
        \DB::table('limitedduties')->where('limiteddutyid', $limitedduty->limiteddutyid)->update([
                'employeename' => $limitedduty->employeename,
                'employeeid' => $limitedduty->employeeid,
                'corvelid' => $limitedduty->corvelid,
                'incidentid' => $limitedduty->incidentid,
                'incidenttype' => $limitedduty->incidenttype,
                'fromdate' => $limitedduty->fromdate,
                'todate' => $limitedduty->todate,
                'comments' => $limitedduty->comments]
        );
        //end history code
        $request = $this->saveFiles($request);
        $limitedduty->update($request->all());
        $this->LimiteddutyUpload($request, $id);
        //email notification-start
        //$link = $request->url();
        //$formname="limitedduties";
        //$numsent = (new EmailController)->Email($request, $link,$formname);
        //email notification-end
        return redirect()->route('limitedduties.index');
    }
}
