<?php

namespace App\Http\Controllers;

use App\Accident;
use App\Attachment;
use App\Comment;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use App\Http\Requests\UpdateAccidentsRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class AccidentsController extends EmailController
{
    use FileUploadTrait;
    use FormFileUploadTrait;



    public function Approve($id)
    {
        $accident = DB::table('accidents')->where('ofd6aid', $id)->first();
        $formname = "accidents";

        $rawlink = request()->headers->get('referer');
        $link = preg_replace('#\/[^/]*$#', '', $rawlink);

        //check the application status id
        //if appstatus->2 then check the current user id and the captain id if same then put appstatus as 3
        $currentuserid = Auth::user()->id;

        //   $captainid=DB::table('accidents')->where('captainid',$currentuserid,'ofd6aid',$id)->pluck('captainid');

        $captainid = DB::table('accidents')->where([
            ['captainid', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->value('captainid');


        //   $BCid=DB::table('accidents')->where('battalionchiefid',$currentuserid,'ofd6aid',$id)->pluck('battalionchiefid');
        $BCid = DB::table('accidents')->where([
            ['battalionchiefid', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->value('battalionchiefid');

        //    $ACid=DB::table('accidents')->where('aconduty',$currentuserid,'ofd6aid',$id)->pluck('aconduty');

        $ACid = DB::table('accidents')->where([
            ['aconduty', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->value('aconduty');

        $currentapplicationstatus = DB::table('accidents')->where('ofd6aid', $id)->value('applicationstatus');
        //   $currentapplicationstatus=  str_replace (array('["', '"]'), '',$currentapplicationstatusraw);


        $captainapprovalstatusid = DB::table('status')->where('statustype', 'Application under Captain')->value('statusid');
        //   $captainapprovalstatusid=str_replace (array('[', ']'), '',$captainapprovalstatusidraw);

        $BCapprovalstatusid = DB::table('status')->where('statustype', 'Application under Batallion Chief')->value('statusid');
        //   $BCapprovalstatusid=str_replace (array('[', ']'), '',$BCapprovalstatusidraw);

        $ACapprovalstatusid = DB::table('status')->where('statustype', 'Application under Assistant Chief')->value('statusid');
        //   $ACapprovalstatusid=str_replace (array('[', ']'), '',$ACapprovalstatusidraw);

        $Finalapprovalstatusid = DB::table('status')->where('statustype', 'Approved')->value('statusid');
        //   $Finalpprovalstatusid=str_replace (array('[', ']'), '',$Finalapprovalstatusidraw);

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

        //   var_dump($accident);

        $currentuserid = Auth::user()->id;

        //   $captainid=DB::table('accidents')->where('captainid',$currentuserid,'ofd6aid',$id)->pluck('captainid');

        $captainid = DB::table('accidents')->where([
            ['captainid', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->value('captainid');


        //   $BCid=DB::table('accidents')->where('battalionchiefid',$currentuserid,'ofd6aid',$id)->pluck('battalionchiefid');
        $BCid = DB::table('accidents')->where([
            ['battalionchiefid', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->value('captainid');

        //    $ACid=DB::table('accidents')->where('aconduty',$currentuserid,'ofd6aid',$id)->pluck('aconduty');

        $ACid = DB::table('accidents')->where([
            ['aconduty', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->value('captainid');
        $statusid = DB::table('status')->where('statustype', 'Rejected')->value('statusid');
        //      $statusid=str_replace (array('[', ']'), '', $statusid);
        if ($captainid || $BCid || $ACid) {
            $Accident = Accident::find($id);

            $Accident->applicationstatus = $statusid;

            $Accident->save();
        }

        //Send email to super admin and fire fighter
        $formname = "accidents";

        $rawlink = request()->headers->get('referer');
        $link = preg_replace('#\/[^/]*$#', '', $rawlink);
        // $link=request()->headers->get('referer');
        (new EmailController)->Email($accident, $rawlink, $formname, $statusid);
        //     $numsent = (new EmailController)->Email($request, $link,$formname,$statusid);

        return redirect()->route('accidents.index')->with('message', 'Form has been Rejected');

    }


    public function index()
    {
        $accidents = Accident::all();
            return view('accidents.index', compact('accidents'));
    }

    public function create()
    {
        return view('accidents.create');
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


    public function update(Request $requestSave,$id)
    {
        if (Input::get('store')) {
            $this->updateRecords($requestSave,$id);
            return redirect()->route('accidents.index')->with('message', 'Form Submitted Successfully');
        }

        if (Input::get('partialSave')) {
            $this->partialUpdate($requestSave, $id);
			return redirect()->route('accidents.index')->with('message', 'Form has been Partially Saved');
        }

        
    }



    public function store(Request $request)

    {


        // 'applicationstatus' => $request->applicationstatus,

        $this->validate($request, [
            'accidentdate' => 'required|date:accidents,accidentdate,',
            'driverid' => 'required|integer:accidents,driverid,',
            'drivername' => 'required|alpha|string:accidents,drivername,',
            'assignmentaccident' => 'required|string:accidents,assignmentaccident',
            'apparatus' => 'required|string:accidents,apparatus',
            'captainid' => 'required|integer:accidents,captainid',
            'battalionchiefid' => 'required|integer:accidents,battalionchiefid',
            'aconduty' => 'required|integer:accidents,aconduty',
            'frmsincidentnum' => 'required|string:accidents,frmsincidentnum',
            'calllaw' => 'required|integer:accidents,calllaw',
            'daybook' => 'required|integer:accidents,daybook',
            'commemail' => 'required|integer:accidents,commemail',
        ]);//request will have all values filled by firefighter
        //check if the user*/


        $statusid = DB::table('status')->where('statustype', 'Application under Captain')->value('statusid');

        $request->offsetSet('applicationstatus', $statusid);

        $request = $this->saveFiles($request);
        Accident::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->AccidentUpload($request, $last_insert_id);
        $link = $request->url() . "/$last_insert_id";
//write code for email notification here
        $formname = "accidents";
        $rawlink = request()->headers->get('referer');
        $link = preg_replace('#\/[^/]*$#', '', $rawlink) . "/$last_insert_id";
//   (new EmailController)->Email($accident, $rawlink,$formname,$statusid);
        (new EmailController)->Email($request, $link, $formname, $statusid);
        //$request->session()->flash('alert-success', 'User was successful added!');
		return redirect()->route('accidents.index')->with('message', 'Form Submitted Successfully');
    }


    public function partialSave(Request $request)
    {
        // 'applicationstatus' => $request->applicationstatus,


        //request will have all values filled by firefighter
        //check if the user


        $this->validate($request, [
            'accidentdate' => 'required|date:accidents,accidentdate,',
        ]);
        $statusid = DB::table('status')->where('statustype', 'Draft')->value('statusid');

        $request->offsetSet('applicationstatus', $statusid);

        $request = $this->saveFiles($request);
        Accident::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->AccidentUpload($request, $last_insert_id);
        $link = $request->url() . "/$last_insert_id";
//write code for email notification here

        return redirect()->route('accidents.index');
    }


    public function edit($id)
    {

        $attachments = Attachment::where('ofd6aid', $id)->get();
        $accident = Accident::findOrFail($id);
        $comments = Comment::all();
        $users = User::all();

        if (($accident->driverid == Auth::user()->id &&
                ($accident->applicationstatus == 1 || $accident->applicationstatus == 5)) ||
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
        $comments = Comment::all();
        $users = User::all();
        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        if ($accident->driverid == Auth::user()->id ||
        ($accident->captainid == Auth::user()->id && $accident->applicationstatus == 2) ||
        ($accident->battalionchiefid == Auth::user()->id && $accident->applicationstatus == 3) ||
        ($accident->aconduty == Auth::user()->id && $accident->applicationstatus == 4) ||
        Auth::user()->roleid == 1
    ) {
        return view('accidents.show', compact('accident', 'attachments', 'comments', 'users'));
    } else {
        return view('errors.access');
    }

    }

    public function updateRecords(Request $request, $id)
    {

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

        return redirect()->route('accidents.index');
    }

}