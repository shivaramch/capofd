<?php

namespace App\Http\Controllers;

use App\Attachment;
use App\Biological;
use App\Comment;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class BiologicalsController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;

    public function index()
    {
        $biologicals = Biological::all();
        return view('biologicals.index', compact('biologicals'));
    }

    public function create()
    {
        return view('biologicals.create');
    }

    public function edit($id)
    {
        $biological = Biological::findOrFail($id);
        $attachments = Attachment::where('ofd6bid', $id)->get();
        $comments = Comment::where('applicationid', $id)->get();
        $users = User::all();
        $rejectstatus = DB::table('status')->where('statustype', 'Rejected')->value('statusid');
        $draftstatus = DB::table('status')->where('statustype', 'Draft')->value('statusid');

        if (($biological->employeeid == Auth::user()->id
                && ($biological->applicationstatus == $rejectstatus
                    || $biological->applicationstatus == $draftstatus))
            || Auth::user()->roleid == 1
        ) {
            return view('biologicals.edit', compact('biological', 'attachments', 'comments', 'users'));
        } else {
            return view('errors.access');
        }
    }

    public function show($id)
    {
        $biological = Biological::findOrFail($id);
        $attachments = Attachment::where('ofd6bid', $id)->get();
        $comments = Comment::where('applicationid', $id)->get();
        $users = User::all();
        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        $applicationStatus = DB::table('status')->where('statustype', 'Application under Primary IDCO')->value('statusid');

        if ($biological->employeeid == Auth::user()->id ||
            ($biological->primaryidconumber == Auth::user()->id && $biological->applicationstatus == $applicationStatus) ||
            Auth::user()->roleid == 1
        ) {
            return view('biologicals.show', compact('biological', 'attachments', 'comments', 'users'));
        } else {
            return view('errors.access');
        }
    }

    public function save(Request $requestSave)
    {
        if (Input::get('store')) {
            $this->store($requestSave);
            return redirect()->route('biologicals.index')->with('message', 'Form Submitted Successfully');
        }

        if (Input::get('partialSave')) {
            $this->partialSave($requestSave);
            return redirect()->route('biologicals.index')->with('message', 'Form has been partially saved');
        }
        return redirect()->route('biologicals.index');

    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        $statusid = DB::table('status')->where('statustype', 'Application under Primary IDCO')->value('statusid');
        $request->offsetSet('applicationstatus', $statusid);
        $request = $this->saveFiles($request);
        Biological::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->BiologicalUpload($request, $last_insert_id);
        $link = $request->url() . "/$last_insert_id";
//write code for email notification here
        $formname = "biologicals";
        $rawlink = request()->headers->get('referer');
        $link = preg_replace('#\/[^/]*$#', '', $rawlink) . "/$last_insert_id";

        (new EmailController)->Email($request, $link, $formname, $statusid);
        return redirect()->route('biologicals.index')->with('message', 'Form Submitted Successfully');
    }

    public function partialSave(Request $request)
    {
        $this->requestPratialValidation($request);

        $statusid = DB::table('status')->where('statustype', 'Draft')->value('statusid');
        $request->offsetSet('applicationstatus', $statusid);

        $request = $this->saveFiles($request);
        Biological::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->BiologicalUpload($request, $last_insert_id);
        $link = $request->url() . "/$last_insert_id";
        return redirect()->route('biologicals.index')->with('message', 'Form Saved Successfully');;

    }

    public function update(Request $requestSave, $id)
    {
        if (Input::get('store')) {
            $this->updateRecord($requestSave, $id);
            //$this->partialUpdate($requestSave, $id);
            return redirect()->route('biologicals.index')->with('message', 'Form Submitted Successfully');
        }

        if (Input::get('partialSave')) {
            $this->partialUpdate($requestSave, $id);
            return redirect()->route('biologicals.index')->with('message', 'Form has been partially saved');
        }


    }

    public function partialUpdate(Request $request, $id)
    {
        $this->requestPratialValidation($request);

        $statusid = DB::table('status')->where('statustype', 'Draft')->value('statusid');

        $biological = Biological::findOrFail($id);
        \DB::table('biologicals')->where('ofd6bid', $biological->ofd6bid)->update([
                'exposedemployeename' => $biological->exposedemployeename,
                'trueofd184' => 'max:20480|mimes:pdf',
                'potofd184' => 'max:20480|mimes:pdf',
                'dateofexposure' => $biological->dateofexposure,
                'employeeid' => $biological->employeeid,
                'assignmentbiological' => $biological->assignmentbiological,
                'shift' => $biological->shift,
                'primaryidconumber' => $biological->primaryidconumber,
                'epcrincidentnum' => $biological->epcrincidentnum,
                'exposure' => $biological->exposure,
                'applicationstatus' => $statusid,
                'frmsincidentnum' => $biological->frmsincidentnum,
                'exposureinjury' => $biological->exposureinjury,
                ]
        );
        //end history code
        $request = $this->saveFiles($request);
        $biological->update($request->all());
        $this->BiologicalUpload($request, $id);
        //email notification-start


        //email notification-end
        return redirect()->route('biologicals.index')->with('message', 'Form Saved Successfully');;


    }

    public function updateRecord(Request $request, $id)
    {

        $this->requestPratialValidation($request);

        $statusid = DB::table('status')->where('statustype', 'Application under Primary IDCO')->value('statusid');


        $biological = Biological::findOrFail($id);
        \DB::table('biologicals')->where('ofd6bid', $biological->ofd6bid)->update([
                'exposedemployeename' => $biological->exposedemployeename,
                'trueofd184' => 'max:20480|mimes:pdf',
                'potofd184' => 'max:20480|mimes:pdf',
                'dateofexposure' => $biological->dateofexposure,
                'employeeid' => $biological->employeeid,
                'assignmentbiological' => $biological->assignmentbiological,
                'shift' => $biological->shift,
                'primaryidconumber' => $biological->primaryidconumber,
                'epcrincidentnum' => $biological->epcrincidentnum,
                'exposure' => $biological->exposure,
                'applicationstatus' => $statusid,
                'frmsincidentnum' => $biological->frmsincidentnum,
                'exposureinjury' => $biological->exposureinjury,
                ]
        );
        //end history code
        $request = $this->saveFiles($request);
        $biological->update($request->all());
        $this->BiologicalUpload($request, $id);
        //email notification-start
        $link = $request->url();
        $formname = "biologicals";
        (new EmailController)->Email($request, $link, $formname, $statusid);
        //email notification-end
        return redirect()->route('biologicals.index')->with('message', 'Form Updated Successfully');
    }

    public function validateRequest(Request $request)
    {
        $this->validate($request, [
            'employeeid' => 'required|integer:biological,employeeid',
            'dateofexposure' => 'required|date:biological,dateofexposure|before_or_equal:today',
            'exposedemployeename' => 'required|regex:/^[a-zA-Z\s]+$/ |string:biological,exposedemployeename',
            'assignmentbiological' => 'required|string:biological,assignmentbiological',
            'shift' => 'required|string:biological,shift',
            'primaryidconumber' => 'required|integer:biological,primaryidconumber',
            'epcrincidentnum' => 'required|integer:biological,epcrincidentnum',
            'frmsincidentnum1' => 'required|integer:biological,frmsincidentnumber',
            'exposureinjury' => 'required|string:biological,exposureinjury',
            'exposure' => 'required|integer:biological,exposure',
            'trueofd184' => 'file:biological,trueofd184|mimes:pdf|max:10000',
            'potofd184' => 'file:biological,potofd184|mimes:pdf|max:10000',
        ]);
    }

    public function requestPratialValidation(Request $request)
    {
        $this->validate($request, [
            'employeeid' => 'required|integer:biological,employeeid',
            'dateofexposure' => 'required|date:biological,dateofexposure|before_or_equal:today',
            'exposedemployeename' => 'required|regex:/^[a-zA-Z\s]+$/ |string:biological,exposedemployeename',
            'assignmentbiological' => 'required|string:biological,assignmentbiological',
            'shift' => 'required|string:biological,shift',
            'primaryidconumber' => 'required|integer:biological,primaryidconumber',
            'epcrincidentnum' => 'required|integer:biological,epcrincidentnum',
            'frmsincidentnum1' => 'integer:biological,frmsincidentnumber',
            'exposureinjury' => 'string:biological,exposureinjury',
            'exposure' => 'integer:biological,exposure',
            'trueofd184' => 'file:biological,trueofd184|mimes:pdf|max:10000',
            'potofd184' => 'file:biological,potofd184|mimes:pdf|max:10000',
        ]);
    }

    public function Approve($id)
    {

        $biological = DB::table('biologicals')->where('ofd6bid', $id)->first();
        $formname = "biologicals";

        $rawlink = request()->headers->get('referer');
        $link = preg_replace('#\/[^/]*$#', '', $rawlink);
        $currentuserid = Auth::user()->id;
        $primaryidconumber = DB::table('biologicals')->where([
            ['primaryidconumber', '=', $currentuserid],
            ['ofd6bid', '=', $id],
        ])->pluck('primaryidconumber');
        $Finalapprovalstatusidraw = DB::table('status')->where('statustype', 'Approved')->pluck('statusid');
        $Finalpprovalstatusid = str_replace(array('[', ']'), '', $Finalapprovalstatusidraw);

        if ($primaryidconumber) {

            $Biological = Biological::find($id);

            $Biological->applicationstatus = $Finalpprovalstatusid;

            $Biological->save();
            (new EmailController)->Email($biological, $rawlink, $formname, $Finalpprovalstatusid);
        }

        return redirect()->route('biologicals.index')->with('message', 'Form has been Approved');
    }

    public function Reject($id)
    {
        $biological = DB::table('biologicals')->where('ofd6bid', $id)->first();
        $formname = "biologicals";

        $rawlink = request()->headers->get('referer');
        $link = preg_replace('#\/[^/]*$#', '', $rawlink);

        $currentuserid = Auth::user()->id;
        $primaryidconumber = DB::table('biologicals')->where([
            ['primaryidconumber', '=', $currentuserid],
            ['ofd6bid', '=', $id],
        ])->pluck('primaryidconumber');

        $statusid = DB::table('status')->where('statustype', 'Rejected')->value('statusid');

        if ($primaryidconumber) {

            $Biological = Biological::find($id);

            $Biological->applicationstatus = $statusid;

            $Biological->save();

            (new EmailController)->Email($biological, $rawlink, $formname, $statusid);
        }

        return redirect()->route('biologicals.index')->with('message', 'Form has been Rejected');

    }
}