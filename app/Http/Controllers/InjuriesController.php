<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Comment;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use App\Http\Requests\UpdateInjuriesRequest;
use App\Injury;
use App\User;
use App\Assignment;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class InjuriesController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;

    public function index()
    {
        $injuries = Injury::all();
        $attachments = Attachment::all();
        $assignments = Assignment::all();
        return view('injuries.index', compact('injuries', 'attachments', 'assignments'));
    }

    public function create()
    {

        return view('injuries.create');
    }

    public function edit($id)
    {
        $injury = Injury::findOrFail($id);
        $attachments = Attachment::where('ofd6id', $id)->get();
        $comments = Comment::where('applicationid', $id)->get();
        $users = User::all();
        $rejectstatus = DB::table('status')->where('statustype', 'Rejected')->value('statusid');
        $draftstatus = DB::table('status')->where('statustype', 'Draft')->value('statusid');


        if (($injury->injuredemployeeid == Auth::user()->id &&
                ($injury->applicationstatus == $rejectstatus
                    || $injury->applicationstatus == $draftstatus)) ||
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
        $attachments = Attachment::where('ofd6id', $id)->get();
        $comments = Comment::where('applicationid', $id)->get();
        $users = User::all();
        $capstatus = DB::table('status')->where('statustype', 'Application under Captain')->value('statusid');
        $bcstatus = DB::table('status')->where('statustype', 'Application under Batallion Chief')->value('statusid');
        $acstatus = DB::table('status')->where('statustype', 'Application under Assistant Chief')->value('statusid');


        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        if ($injury->injuredemployeeid == Auth::user()->id ||
            ($injury->captainid == Auth::user()->id && $injury->applicationstatus == $capstatus) ||
            ($injury->battalionchiefid == Auth::user()->id && $injury->applicationstatus == $bcstatus) ||
            ($injury->aconduty == Auth::user()->id && $injury->applicationstatus == $acstatus) ||
            Auth::user()->roleid == 1
        ) {
            return view('injuries.show', compact('injury', 'attachments', 'comments', 'users'));
        } else {
            return view('errors.access');
        }
    }

    public function save(Request $requestSave)
    {
        if (Input::get('store')) {
            $this->store($requestSave);
            return redirect()->route('injuries.index')->with('message', 'Form Submitted Successfully');
        }

        if (Input::get('partialSave')) {
            $this->partialSave($requestSave);
            return redirect()->route('injuries.index')->with('message', 'Form has been partially saved');
        }


    }

    public function store(Request $request)
    {

        $this->requestValidation($request);

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

    public function partialSave(Request $request)
    {
        $this->requestPratialValidation($request);

        $statusid = DB::table('status')->where('statustype', 'Draft')->value('statusid');
        $request->offsetSet('applicationstatus', $statusid);
        $request = $this->saveFiles($request);
        Injury::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->InjuriesUpload($request, $last_insert_id);

    }

    public function update(Request $requestSave, $id)
    {
        if (Input::get('store')) {
            $this->updateRecord($requestSave, $id);
            return redirect()->route('injuries.index')->with('message', 'Form Submitted Successfully');
        }

        if (Input::get('partialSave')) {
            $this->partialUpdate($requestSave, $id);
            return redirect()->route('injuries.index')->with('message', 'Form has been partially saved');
        }


    }

    public function updateRecord(Request $request, $id)
    {

        $this->requestPratialValidation($request);
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
                'completeepcr' => $injury->completeepcr,
                'completefrms' => $injury->completefrms,
                'applicationstatus' => $statusid,
                'createdby' => $injury->createdby,
                'updatedby' => $injury->updatedby,
                'epcrincidentnum'=> $injury->epcrincidentnum,]
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
        $this->requestPratialValidation($request);
        $injury = Injury::findOrFail($id);
        $statusid = DB::table('status')->where('statustype', 'Draft')->value('statusid');
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
                'completeepcr' => $injury->completeepcr,
                'completefrms' => $injury->completefrms,
                'createdby' => $injury->createdby,
                'updatedby' => $injury->updatedby,
                'epcrincidentnum'=> $injury->epcrincidentnum,]
        );

        $request = $this->saveFiles($request);

        $injury->update($request->all());

        $this->InjuriesUpload($request, $id);
        //$request->session()->flash('alert-success', 'Form was successfully Submitted!');


        return redirect()->route('injuries.index');
    }

    public function requestValidation(Request $request)
    {
        $this->validate($request, [
            'injurydate' => 'required|date:injury,injurydate|before_or_equal:today',
            'injuredemployeename' => 'required|regex:/^[a-zA-Z\s]+$/ |string:injuries,injuredemployeename,',
            'injuredemployeeid' => 'required|integer:injury,injuredemployeeid,',
            'assignmentinjury' => 'required|string:injury,assignmentinjury,',
            'corvelid' => 'required|integer:injury,corvelid,',
            'captainid' => 'required|integer:injury,captainid',
            'battalionchiefid' => 'required|integer:injury,battalionchiefid',
            'aconduty' => 'required|integer:injury,aconduty',
            'documentworkforce' => 'required',
            'documentoperationalday' => 'required',
            'shift' => 'required|string:injury,shift,',
            'completeepcr' => 'required|string:injury,completeepcr',
            'completefrms' => 'required|string:injury,completefrms',
            'trainingassigned' => 'required|string:injury,shift,',
            'frmsincidentnum1' => 'required|integer:injury,frmsincidentnum',
            'epcrincidentnum' => 'required|integer:injury,epcrincidentnum',
            'CorvelAttachmentName' => 'required|file:injury,CorvelAttachmentName|mimes:pdf|max:10000',
            'InvestigationAttachment' => 'required|file:injury,InvestigationAttachment|mimes:pdf|max:10000',
            'StatementAttachment' => 'required|file:injury,StatementAttachment|mimes:pdf|max:10000',
            'EmployeeAttachment' => 'required|file:injury,EmployeeAttachment|mimes:pdf|max:10000',
            'Ofd25Attachment' => 'required|file:injury,Ofd25Attachment|mimes:pdf|max:10000',
        ]);
    }

    public function requestPratialValidation(Request $request)
    {
        $this->validate($request, [
            'injurydate' => 'required|date:injury,injurydate|before_or_equal:today',
            'injuredemployeename' => 'required|regex:/^[a-zA-Z\s]+$/ |string:injuries,injuredemployeename,',
            'injuredemployeeid' => 'required|integer:injury,injuredemployeeid,',
            'assignmentinjury' => 'required|string:injury,assignmentinjury,',
            'corvelid' => 'required|integer:injury,corvelid,',
            'captainid' => 'required|integer:injury,captainid',
            'battalionchiefid' => 'required|integer:injury,battalionchiefid',
            'aconduty' => 'required|integer:injury,aconduty',
            'shift' => 'required|string:injury,shift,',
            'frmsincidentnum1' => 'integer:injury,frmsincidentnum',
            'epcrincidentnum' => 'required|integer:injury,epcrincidentnum',
            'CorvelAttachmentName' => 'file:injury,CorvelAttachmentName|mimes:pdf|max:10000',
            'InvestigationAttachment' => 'file:injury,InvestigationAttachment|mimes:pdf|max:10000',
            'StatementAttachment' => 'file:injury,StatementAttachment|mimes:pdf|max:10000',
            'EmployeeAttachment' => 'file:injury,EmployeeAttachment|mimes:pdf|max:10000',
            'Ofd25Attachment' => 'file:injury,Ofd25Attachment|mimes:pdf|max:10000',
        ]);
    }

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
}