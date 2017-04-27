<?php

namespace App\Http\Controllers;

use App\Accident;
use App\Attachment;
use App\Comment;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AccidentsController extends EmailController
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

    public function edit($id)
    {

        $attachments = Attachment::where('ofd6aid', $id)->get();
        $accident = Accident::findOrFail($id);
        $comments = Comment::where('applicationid', $id)->get();
        $users = User::all();
        $rejectstatus = DB::table('status')->where('statustype', 'Rejected')->value('statusid');
        $draftstatus = DB::table('status')->where('statustype', 'Draft')->value('statusid');


        if (($accident->driverid == Auth::user()->id &&
                ($accident->applicationstatus == $rejectstatus
                    || $accident->applicationstatus == $draftstatus)) ||
            Auth::user()->roleid == 1
        ) {
            return view('accidents.edit', compact('accident', 'attachments', 'comments', 'users'));
        } else {
            return view('errors.access');
        }
    }

    public function show($id)
    {
        $accident = Accident::findOrFail($id);
        $attachments = Attachment::where('ofd6aid', $id)->get();
        $comments = Comment::where('applicationid', $id)->get();
        $users = User::all();
        $capstatus = DB::table('status')->where('statustype', 'Application under Captain')->value('statusid');
        $bcstatus = DB::table('status')->where('statustype', 'Application under Batallion Chief')->value('statusid');
        $acstatus = DB::table('status')->where('statustype', 'Application under Assistant Chief')->value('statusid');

        if ($accident->driverid == Auth::user()->id ||
            ($accident->captainid == Auth::user()->id && $accident->applicationstatus == $capstatus) ||
            ($accident->battalionchiefid == Auth::user()->id && $accident->applicationstatus == $bcstatus) ||
            ($accident->aconduty == Auth::user()->id && $accident->applicationstatus == $acstatus) ||
            Auth::user()->roleid == 1
        ) {
            return view('accidents.show', compact('accident', 'attachments', 'comments', 'users'));
        } else {
            return view('errors.access');
        }

    }

    public function save(Request $requestSave)
    {
        if (Input::get('store')) {
            $this->store($requestSave);
            return redirect()->route('accidents.index')->with('message', 'Form Submitted Successfully');
        }

        if (Input::get('partialSave')) {
            $this->partialSave($requestSave);
            return redirect()->route('accidents.index')->with('message', 'Form has been Partially Saved');
        }

    }

    public function store(Request $request)

    {
        $this->validateRequest($request);

        $statusid = DB::table('status')->where('statustype', 'Application under Captain')->value('statusid');

        $request->offsetSet('applicationstatus', $statusid);

        //upload files
        $request = $this->saveFiles($request);

        //store information in table
        Accident::create($request->all());

        //store attachment information in attachment table
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->AccidentUpload($request, $last_insert_id);
        $link = $request->url() . "/$last_insert_id";

        //email notification
        $formname = "accidents";
        $rawlink = request()->headers->get('referer');
        $link = preg_replace('#\/[^/]*$#', '', $rawlink) . "/$last_insert_id";

        (new EmailController)->Email($request, $link, $formname, $statusid);

        return redirect()->route('accidents.index')->with('message', 'Form Submitted Successfully');
    }

    public function partialSave(Request $request)
    {
        $this->requestPratialValidation($request);

        $statusid = DB::table('status')->where('statustype', 'Draft')->value('statusid');

        $request->offsetSet('applicationstatus', $statusid);

        $request = $this->saveFiles($request);
        Accident::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->AccidentUpload($request, $last_insert_id);
        $link = $request->url() . "/$last_insert_id";

        return redirect()->route('accidents.index');
    }

    public function update(Request $requestSave, $id)
    {
        if (Input::get('store')) {
            $this->updateRecords($requestSave, $id);
            return redirect()->route('accidents.index')->with('message', 'Form Submitted Successfully');
        }

        if (Input::get('partialSave')) {
            $this->partialUpdate($requestSave, $id);
            return redirect()->route('accidents.index')->with('message', 'Form has been Partially Saved');
        }
    }

    public function updateRecords(Request $request, $id)
    {

        $this->requestPratialValidation($request);

        $statusid = DB::table('status')->where('statustype', 'Application under Captain')->value('statusid');

        $accident = Accident::findOrFail($id);
        \DB::table('accidents')->where('ofd6aid', $accident->ofd6aid)->update([
                'accidentdate' => $accident->accidentdate,
                'drivername' => $accident->drivername,
                'driverid' => $accident->driverid,
                'assignmentaccident' => $accident->assignmentaccident,
                'apparatus' => $accident->apparatus,
                'captainid' => $accident->captainid,
                'battalionchiefid' => $accident->battalionchiefid,
                'aconduty' => $accident->aconduty,
                'applicationstatus' => $statusid,
                'frmsincidentnum' => $accident->frmsincidentnum,
                'calllaw' => $accident->calllaw,
                'daybook' => $accident->daybook,
                'commemail' => $accident->commemail]
        );
        //end history code
        $request = $this->saveFiles($request);
        $accident->update($request->all());
        $this->AccidentUpload($request, $id);
        //email notification-start
        // $link = $request->url();
        $formname = "accidents";
        //    var_dump( env('APP_URL')."/"."$formname"."/$id");
        $rawlink = request()->headers->get('referer');
        $link = preg_replace('#\/[^/]*$#', '', $rawlink);


        (new EmailController)->Email($request, $link, $formname, $statusid);
        //email notification-end
        return redirect()->route('accidents.index')->with('message', 'Form Updated Successfully');
    }

    public function partialUpdate(Request $request, $id)
    {

        $this->requestPratialValidation($request);

        $statusid = DB::table('status')->where('statustype', 'Draft')->value('statusid');

        $accident = Accident::findOrFail($id);
        \DB::table('accidents')->where('ofd6aid', $accident->ofd6aid)->update([
                'accidentdate' => $accident->accidentdate,
                'drivername' => $accident->drivername,
                'driverid' => $accident->driverid,
                'assignmentaccident' => $accident->assignmentaccident,
                'apparatus' => $accident->apparatus,
                'captainid' => $accident->captainid,
                'battalionchiefid' => $accident->battalionchiefid,
                'aconduty' => $accident->aconduty,
                'applicationstatus' => $statusid,
                'frmsincidentnum' => $accident->frmsincidentnum,
                'calllaw' => $accident->calllaw,
                'daybook' => $accident->daybook,
                'commemail' => $accident->commemail]
        );
        //end history code
        $request = $this->saveFiles($request);
        $accident->update($request->all());
        $this->AccidentUpload($request, $id);

        return redirect()->route('accidents.index');
    }

    public function validateRequest(Request $request)
    {
        $this->validate($request, [
            'accidentdate' => 'required|date:accidents,accidentdate|before_or_equal:today',
            'driverid' => 'required|integer:accidents,driverid,',
            'drivername' => 'required|regex:/^[a-zA-Z\s,.\'-\pL]+$/u |string:accidents,drivername,',
            'assignmentaccident' => 'required|string:accidents,assignmentaccident',
            'apparatus' => 'required|string:accidents,apparatus',
            'captainid' => 'required|integer:accidents,captainid',
            'battalionchiefid' => 'required|integer:accidents,battalionchiefid',
            'aconduty' => 'required|integer:accidents,aconduty',
            'frmsincidentnum1' => 'required|integer:accidents,frmsincidentnum',
            'calllaw' => 'required|integer:accidents,calllaw',
            'daybook' => 'required|integer:accidents,daybook',
            'commemail' => 'required|integer:accidents,commemail',
            'LRS101' => 'required|file:accidents,LRS101|mimes:pdf|max:10000',
            'OFD295' => 'required|file:accidents,OFD295|mimes:pdf|max:10000',
            'OFD025a' => 'required|file:accidents,OFD025a|mimes:pdf|max:10000',
            'OFD025b' => 'required|file:accidents,OFD025b|mimes:pdf|max:10000',
            'OFD025c' => 'required|file:accidents,OFD025c|mimes:pdf|max:10000',
            'OFD31' => 'required|file:accidents,OFD31|mimes:pdf|max:10000',
            'OFD127' => 'required|file:accidents,OFD127|mimes:pdf|max:10000',
            'DR41' => 'required|file:accidents,DR41|mimes:pdf|max:10000',

        ]);
    }

    public function requestPratialValidation(Request $request)
    {
        $this->validate($request, [
            'accidentdate' => 'required|date:accidents,accidentdate,',
            'driverid' => 'required|integer:accidents,driverid,',
            'drivername' => 'required|regex:/^[a-zA-Z\s,.\'-\pL]+$/u |string:accidents,drivername,',
            'assignmentaccident' => 'required|string:accidents,assignmentaccident',
            'apparatus' => 'required|string:accidents,apparatus',
            'captainid' => 'required|integer:accidents,captainid',
            'battalionchiefid' => 'required|integer:accidents,battalionchiefid',
            'aconduty' => 'required|integer:accidents,aconduty',
            'frmsincidentnum1' => 'required|integer:accidents,frmsincidentnum',
            'calllaw' => 'integer:accidents,calllaw',
            'daybook' => 'integer:accidents,daybook',
            'commemail' => 'integer:accidents,commemail',
            'LRS101' => 'file:accidents,LRS101|mimes:pdf|max:10000',
            'OFD295' => 'file:accidents,OFD295|mimes:pdf|max:10000',
            'OFD025a' => 'file:accidents,OFD025a|mimes:pdf|max:10000',
            'OFD025b' => 'file:accidents,OFD025b|mimes:pdf|max:10000',
            'OFD025c' => 'file:accidents,OFD025c|mimes:pdf|max:10000',
            'OFD31' => 'file:accidents,OFD31|mimes:pdf|max:10000',
            'OFD127' => 'file:accidents,OFD127|mimes:pdf|max:10000',
            'DR41' => 'file:accidents,DR41|mimes:pdf|max:10000',

        ]);
    }
    public function Approve($id)
    {
        $accident = DB::table('accidents')->where('ofd6aid', $id)->first();
        $formname = "accidents";

        $rawlink = request()->headers->get('referer');
        $link = preg_replace('#\/[^/]*$#', '', $rawlink);

        //check the application status id
        //if appstatus->2 then check the current user id and the captain id if same then put appstatus as 3
        $currentuserid = Auth::user()->id;

        $captainid = DB::table('accidents')->where([
            ['captainid', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->value('captainid');

        $BCid = DB::table('accidents')->where([
            ['battalionchiefid', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->value('battalionchiefid');

        $ACid = DB::table('accidents')->where([
            ['aconduty', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->value('aconduty');

        $currentapplicationstatus = DB::table('accidents')->where('ofd6aid', $id)->value('applicationstatus');

        $captainapprovalstatusid = DB::table('status')->where('statustype', 'Application under Captain')->value('statusid');

        $BCapprovalstatusid = DB::table('status')->where('statustype', 'Application under Batallion Chief')->value('statusid');

        $ACapprovalstatusid = DB::table('status')->where('statustype', 'Application under Assistant Chief')->value('statusid');

        $Finalapprovalstatusid = DB::table('status')->where('statustype', 'Approved')->value('statusid');

        if ($captainid) {
            if ($currentapplicationstatus == $captainapprovalstatusid) {
                $Accident = Accident::find($id);

                $Accident->applicationstatus = $BCapprovalstatusid;

                $Accident->save();
                (new EmailController)->Email($accident, $rawlink, $formname, $BCapprovalstatusid);
            }
        }


        if ($BCid) {
            if ($currentapplicationstatus == $BCapprovalstatusid) {
                $Accident = Accident::find($id);

                $Accident->applicationstatus = $ACapprovalstatusid;

                $Accident->save();
                (new EmailController)->Email($accident, $rawlink, $formname, $ACapprovalstatusid);
            }
        }
        if ($ACid) {
            if ($currentapplicationstatus == $ACapprovalstatusid) {
                $Accident = Accident::find($id);

                $Accident->applicationstatus = $Finalapprovalstatusid;

                $Accident->save();

                (new EmailController)->Email($accident, $rawlink, $formname, $Finalapprovalstatusid);


            }
        }


        return redirect()->route('accidents.index')->with('message', 'Form has been Approved');
    }

    public function Reject($id)
    {

        //Get all details for tht record
        $accident = DB::table('accidents')->where('ofd6aid', $id)->first();

        $currentuserid = Auth::user()->id;

        $captainid = DB::table('accidents')->where([
            ['captainid', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->value('captainid');

        $BCid = DB::table('accidents')->where([
            ['battalionchiefid', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->value('captainid');

        $ACid = DB::table('accidents')->where([
            ['aconduty', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->value('captainid');
        $statusid = DB::table('status')->where('statustype', 'Rejected')->value('statusid');

        if ($captainid || $BCid || $ACid) {
            $Accident = Accident::find($id);

            $Accident->applicationstatus = $statusid;

            $Accident->save();
        }

        //Send email to super admin and fire fighter
        $formname = "accidents";

        $rawlink = request()->headers->get('referer');
        $link = preg_replace('#\/[^/]*$#', '', $rawlink);

        (new EmailController)->Email($accident, $rawlink, $formname, $statusid);

        return redirect()->route('accidents.index')->with('message', 'Form has been Rejected');

    }
}