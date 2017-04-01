<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Comment;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use App\Http\Requests\UpdateInjuriesRequest;
use App\Injury;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class InjuriesController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;

    public function Approve($id)
    {

        $injury = DB::table('injuries')->where('ofd6id', $id)->first();
        $formname = "injuries";

        $rawlink = request()->headers->get('referer');
        $link = preg_replace('#\/[^/]*$#', '', $rawlink);

        $currentuserid = Auth::user()->id;
        $captainid = DB::table('injuries')->where([
            ['captainid', '=', $currentuserid],
            ['ofd6id', '=', $id],
        ])->value('captainid');


        $BCid = DB::table('injuries')->where([
            ['battalionchiefid', '=', $currentuserid],
            ['ofd6id', '=', $id],
        ])->value('battalionchiefid');

        $ACid = DB::table('injuries')->where([
            ['aconduty', '=', $currentuserid],
            ['ofd6id', '=', $id],
        ])->value('aconduty');

        $currentapplicationstatus = DB::table('injuries')->where('ofd6id', $id)->value('applicationstatus');

        $captainapprovalstatusid = DB::table('status')->where('statustype', 'Application under Captain')->value('statusid');


        $BCapprovalstatusid = DB::table('status')->where('statustype', 'Application under Batallion Chief')->value('statusid');

        $ACapprovalstatusid = DB::table('status')->where('statustype', 'Application under Assistant Chief')->value('statusid');


        $Finalapprovalstatusid = DB::table('status')->where('statustype', 'Approved')->value('statusid');


        if ($captainid) {
            if ($currentapplicationstatus == $captainapprovalstatusid) {

                $injury = Injury::find($id);

                $injury->applicationstatus = $BCapprovalstatusid;

                $injury->save();
                (new EmailController)->Email($injury, $rawlink, $formname, $BCapprovalstatusid);
            }
        }


        if ($BCid) {
            if ($currentapplicationstatus == $BCapprovalstatusid) {
                $injury = Injury::find($id);

                $injury->applicationstatus = $ACapprovalstatusid;

                $injury->save();
                (new EmailController)->Email($injury, $rawlink, $formname, $ACapprovalstatusid);
            }
        }
        if ($ACid) {
            if ($currentapplicationstatus == $ACapprovalstatusid) {
                $injury = Injury::find($id);

                $injury->applicationstatus = $Finalapprovalstatusid;

                $injury->save();

                (new EmailController)->Email($injury, $rawlink, $formname, $Finalapprovalstatusid);
            }
        }

        return redirect()->route('injuries.index')->with('message', 'Form has been Approved');


    }


    public function Reject($id)
    {

        $injury = DB::table('injuries')->where('ofd6id', $id)->first();

        $formname = "injuries";

        $rawlink = request()->headers->get('referer');
        $link = preg_replace('#\/[^/]*$#', '', $rawlink);

        $currentuserid = Auth::user()->id;
        $captainid = DB::table('injuries')->where([
            ['captainid', '=', $currentuserid],
            ['ofd6id', '=', $id],
        ])->value('captainid');
        //  $captainid=DB::table('injuries')->where('captainid',$currentuserid)->pluck('captainid');

        $BCid = DB::table('injuries')->where([
            ['battalionchiefid', '=', $currentuserid],
            ['ofd6id', '=', $id],
        ])->value('battalionchiefid');

        //      $BCid=DB::table('injuries')->where('battalionchiefid',$currentuserid)->pluck('battalionchiefid');
        //   $ACid=DB::table('injuries')->where('aconduty',$currentuserid)->pluck('aconduty');
        $ACid = DB::table('injuries')->where([
            ['aconduty', '=', $currentuserid],
            ['ofd6id', '=', $id],
        ])->value('aconduty');

        $statusid = DB::table('status')->where('statustype', 'Rejected')->value('statusid');
        //  $statusid=str_replace (array('[', ']'), '', $statusidraw);
        if ($captainid || $BCid || $ACid) {
            $injury = Injury::find($id);

            $injury->applicationstatus = $statusid;

            $injury->save();
        }

        (new EmailController)->Email($injury, $rawlink, $formname, $statusid);

        return redirect()->route('injuries.index')->with('message', 'Form has been Rejected');

    }

    public function index()
    {
        $injuries = Injury::all();
        $attachments = Attachment::all();
        return view('injuries.index', compact('injuries', 'attachments'));
    }

    public function create()
    {

        return view('injuries.create');
    }


    public function update(Request $requestSave,$id)
    {
        if (Input::get('store')) {
            $this->updateRecord($requestSave,$id);
        }

        if (Input::get('partialSave')) {
            $this->partialUpdate($requestSave, $id);
			return redirect()->route('injuries.index')->with('message', 'Form has been partially saved');
        }
        

    }


    public function save(Request $requestSave)
    {
        if (Input::get('store')) {
            $this->store($requestSave);
        }

        if (Input::get('partialSave')) {
            $this->partialSave($requestSave);
			return redirect()->route('injuries.index')->with('message', 'Form has been partially saved');
        }
        

    }


    public function partialSave(Request $request)
    {
        $this->validate($request, [
            'injurydate' => 'required|date:injury,injurydate,',
        ]);


        $statusid = DB::table('status')->where('statustype', 'Draft')->value('statusid');
        $request->offsetSet('applicationstatus', $statusid);
        $request = $this->saveFiles($request);
        Injury::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->InjuriesUpload($request, $last_insert_id);

    }


    public function store(Request $request)
    {

        $this-> requestValidation($request);

        $statusid = DB::table('status')->where('statustype', 'Application under Captain')->value('statusid');

        $request->offsetSet('applicationstatus', $statusid);

        $request = $this->saveFiles($request);
        Injury::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->InjuriesUpload($request, $last_insert_id);
        //$request->session()->flash('alert-success', 'Form was successfully Submitted!');

        //email notification-start
        $formname = "injuries";
        $rawlink = request()->headers->get('referer');
        $link = preg_replace('#\/[^/]*$#', '', $rawlink) . "/$last_insert_id";

        (new EmailController)->Email($request, $link, $formname, $statusid);
        //email notification-end
        return redirect()->route('injuries.index')->with('message', 'Form Submitted Successfully');
    }

  public  function requestValidation(Request $request)
    {
        $this->validate($request, [
            'injurydate' => 'required|date:injury,injurydate,',
            //'injuredemployeename' => 'required|alpha|string:injuries,injuredemployeename,',
            'injuredemployeeid' => 'required|integer:injury,injuredemployeeid,',
            'assignmentinjury' => 'required|string:injury,assignmentinjury,',
            'corvelid' => 'required|integer:injury,corvelid,',
            'captainid' => 'required|integer:injury,captainid',
            'battalionchiefid' => 'required|integer:injury,battalionchiefid',
            'aconduty' => 'required|integer:injury,aconduty',
            'documentworkforce' => 'required',
            'documentoperationalday' => 'required',
            'shift' => 'required|string:injury,shift,',
            'trainingassigned' => 'required|string:injury,shift,',
            'frmsincidentnum' => 'required|string:injury,frmsincidentnum',
            'policeofficercompletesign' => 'required',
            'callsupervisor' => 'required',

        ]);

    }

    public function edit($id)
    {
        $attachments = Attachment::all();
        $injury = Injury::findOrFail($id);
        $comments = Comment::all();
        $users = User::all();

        if (($injury->injuredemployeeid == Auth::user()->id &&
                ($injury->applicationstatus == 1 || $injury->applicationstatus == 5)) ||
            Auth::user()->roleid == 1
        ) {
            return view('injuries.edit', compact('injury', 'attachments', 'comments', 'users'));
        } else {
            return view('errors.access');
        }

    }

    public function show($id)
    {

        $injury = Injury::findOrFail($id);
        $attachments = Attachment::all();
        $comments = Comment::all();
        $users = User::all();

        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        if ($injury->driverid == Auth::user()->id ||
            ($injury->captainid == Auth::user()->id && $injury->applicationstatus == 2) ||
            ($injury->battalionchiefid == Auth::user()->id && $injury->applicationstatus == 3) ||
            ($injury->aconduty == Auth::user()->id && $injury->applicationstatus == 4) ||
            Auth::user()->roleid == 1
        ) {
            return view('injuries.show', compact('injury', 'attachments', 'comments', 'users'));
        }
        else {
            return view('errors.access');
        }
    }


    public function updateRecord(Request $request, $id)
    {

        $this-> requestValidation($request);
        $injury = Injury::findOrFail($id);
       $statusid = DB::table('status')->where('statustype', 'Application under Captain')->value('statusid');
      /*  $statusid = str_replace(array('[', ']'), '', $statusidraw);*/
        \DB::table('injuries')->where('ofd6id', $injury->ofd6id)->update([
                'reportnum' => $injury->reportnum,
                'injurydate' => $injury->injurydate,
                'injuredemployeename' => $injury->injuredemployeename,
                'injuredemployeeid' => $injury->injuredemployeeid,
                'assignmentinjury' => $injury->assignmentinjury,
                'corvelid' => $injury->corvelid,
                'captainid' => $injury->captainid,
                'battalionchiefid' => $injury->battalionchiefid,
                'aconduty' => $injury->aconduty,
                'shift' => $injury->shift,
                'frmsincidentnum' => $injury->frmsincidentnum,
                'policeofficercompletesign' => $injury->policeofficercompletesign,
                'callsupervisor' => $injury->callsupervisor,
              'applicationstatus' => $statusid,
                'createdby' => $injury->createdby,
                'updatedby' => $injury->updatedby]
        );

        $request = $this->saveFiles($request);

        $injury->update($request->all());

        $this->InjuriesUpload($request, $id);
        //$request->session()->flash('alert-success', 'Form was successfully Submitted!');

        //email notification-start
        $formname = "injuries";
        $rawlink = request()->headers->get('referer');
        $link = preg_replace('#\/[^/]*$#', '', $rawlink);
        (new EmailController)->Email($request, $link, $formname, $statusid);
        //email notification-end

        return redirect()->route('injuries.index')->with('message', 'Form Updated Successfully');
    }

    public function partialUpdate(Request $request, $id)
    {
        $injury = Injury::findOrFail($id);
        $statusid = DB::table('status')->where('statustype', 'Application under Captain')->value('statusid');
        /*  $statusid = str_replace(array('[', ']'), '', $statusidraw);*/
        \DB::table('injuries')->where('ofd6id', $injury->ofd6id)->update([
                'reportnum' => $injury->reportnum,
                'injurydate' => $injury->injurydate,
                'injuredemployeename' => $injury->injuredemployeename,
                'injuredemployeeid' => $injury->injuredemployeeid,
                'assignmentinjury' => $injury->assignmentinjury,
                'corvelid' => $injury->corvelid,
                'captainid' => $injury->captainid,
                'battalionchiefid' => $injury->battalionchiefid,
                'aconduty' => $injury->aconduty,
                'shift' => $injury->shift,
                'frmsincidentnum' => $injury->frmsincidentnum,
                'policeofficercompletesign' => $injury->policeofficercompletesign,
                'callsupervisor' => $injury->callsupervisor,
                'applicationstatus' => $statusid,
                'createdby' => $injury->createdby,
                'updatedby' => $injury->updatedby]
        );

        $request = $this->saveFiles($request);

        $injury->update($request->all());

        $this->InjuriesUpload($request, $id);
        //$request->session()->flash('alert-success', 'Form was successfully Submitted!');



        return redirect()->route('injuries.index');
    }

}