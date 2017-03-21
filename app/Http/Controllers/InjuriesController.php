<?php
namespace App\Http\Controllers;

use App\Attachment;
use App\Http\Requests\StoreInjuriesRequest;
use App\Injury;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStationsRequest;
use App\Http\Requests\UpdateInjuriesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\User;

class InjuriesController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;
    public  function Approve($id)
    {

        //check the application status id
        //if appstatus->2 then check the current user id and the captain id if same then put appstatus as 3
        $currentuserid=Auth::user()->id;
        $captainid=DB::table('injuries')->where ([
            ['captainid', '=', $currentuserid],
            ['ofd6id', '=', $id],
        ])->pluck('captainid');
      //  $captainid=DB::table('injuries')->where('captainid',$currentuserid)->pluck('captainid');

        $BCid=DB::table('injuries')->where ([
            ['battalionchiefid', '=', $currentuserid],
            ['ofd6id', '=', $id],
        ])->pluck('battalionchiefid');

  //      $BCid=DB::table('injuries')->where('battalionchiefid',$currentuserid)->pluck('battalionchiefid');
     //   $ACid=DB::table('injuries')->where('aconduty',$currentuserid)->pluck('aconduty');
        $ACid=DB::table('injuries')->where ([
            ['aconduty', '=', $currentuserid],
            ['ofd6id', '=', $id],
        ])->pluck('aconduty');
        $currentapplicationstatusraw=DB::table('injuries')->where('ofd6ID',$id)->pluck('applicationstatus');
        $currentapplicationstatus=  str_replace (array('["', '"]'), '',$currentapplicationstatusraw);


        $captainapprovalstatusidraw=DB::table('status')->where('statustype','Application under Captain')->pluck('statusid');
        $captainapprovalstatusid=str_replace (array('[', ']'), '',$captainapprovalstatusidraw);

        $BCapprovalstatusidraw=DB::table('status')->where('statustype','Application under Batallion Chief')->pluck('statusid');
        $BCapprovalstatusid=str_replace (array('[', ']'), '',$BCapprovalstatusidraw);

        $ACapprovalstatusidraw=DB::table('status')->where('statustype','Application under Assistant Chief')->pluck('statusid');
        $ACapprovalstatusid=str_replace (array('[', ']'), '',$ACapprovalstatusidraw);

        $Finalapprovalstatusidraw=DB::table('status')->where('statustype','Approved')->pluck('statusid');
        $Finalpprovalstatusid=str_replace (array('[', ']'), '',$Finalapprovalstatusidraw);

        if($captainid){
            if($currentapplicationstatus==$captainapprovalstatusid)
            {

                $injury = Injury::find($id);

                $injury->applicationstatus =$BCapprovalstatusid ;

                $injury->save();
            }
        }


        if($BCid){
            if($currentapplicationstatus==$BCapprovalstatusid)
            {


                $injury = Injury::find($id);

                $injury->applicationstatus =$ACapprovalstatusid ;

                $injury->save();
            }
        }
        if($ACid){
            if($currentapplicationstatus==$ACapprovalstatusid)
            {
                $injury = Injury::find($id);

                $injury->applicationstatus =$Finalpprovalstatusid ;

                $injury->save();
            }
        }

       return redirect()->route('injuries.index');


    }


    public  function Reject($id){
        $currentuserid=Auth::user()->id;
        $captainid=DB::table('injuries')->where ([
            ['captainid', '=', $currentuserid],
            ['ofd6id', '=', $id],
        ])->pluck('captainid');
        //  $captainid=DB::table('injuries')->where('captainid',$currentuserid)->pluck('captainid');

        $BCid=DB::table('injuries')->where ([
            ['battalionchiefid', '=', $currentuserid],
            ['ofd6id', '=', $id],
        ])->pluck('battalionchiefid');

        //      $BCid=DB::table('injuries')->where('battalionchiefid',$currentuserid)->pluck('battalionchiefid');
        //   $ACid=DB::table('injuries')->where('aconduty',$currentuserid)->pluck('aconduty');
        $ACid=DB::table('injuries')->where ([
            ['aconduty', '=', $currentuserid],
            ['ofd6id', '=', $id],
        ])->pluck('aconduty');

        $statusidraw=DB::table('status')->where('statustype','Rejected')->pluck('statusid');
        $statusid=str_replace (array('[', ']'), '', $statusidraw);
        if($captainid|| $BCid || $ACid) {
            $injury = Injury::find($id);

            $injury->applicationstatus = $statusid;

            $injury->save();
        }
        return redirect()->route('injuries.index');

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

    public function store(StoreInjuriesRequest $request)
    {

        $statusidraw=DB::table('status')->where('statustype','Application under Captain')->pluck('statusid');
        $statusid=str_replace (array('[', ']'), '', $statusidraw);
        $request->offsetSet('applicationstatus',$statusid);

        $request = $this->saveFiles($request);
        Injury::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->InjuriesUpload($request, $last_insert_id);
        //$request->session()->flash('alert-success', 'Form was successfully Submitted!');

        //email notification-start
        $formname="injuries";
        $rawlink=request()->headers->get('referer');
        $link=preg_replace('#\/[^/]*$#', '', $rawlink)."/$last_insert_id";

        $numsent = (new EmailController)->Email($request, $link,$formname);
        //email notification-end
        return redirect()->route('injuries.index');
    }

    public function edit($id)
    {
        $attachments = Attachment::all();
        $injury = Injury::findOrFail($id);
        return view('injuries.edit', compact('injury', 'attachments'));

    }

    public function show($id)
    {

        $injury = Injury::findOrFail($id);
        $attachments = Attachment::all();

        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        return view('injuries.show', compact('injury', 'attachments'));
    }


    public function update(UpdateInjuriesRequest $request, $id)
    {
        $injury = Injury::findOrFail($id);

        \DB::table('injuries')->where('ofd6id', $injury->ofd6id)->update([
                'reportnum' => $injury->reportnum,
                'createdate' => $injury->createdate,
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
                'createdby' => $injury->createdby,
                'updatedby' => $injury->updatedby]
        );
        $request = $this->saveFiles($request);

        $injury->update($request->all());

        $this->InjuriesUpload($request, $id);
        //$request->session()->flash('alert-success', 'Form was successfully Submitted!');

        //email notification-start
        $formname="injuries";
        $rawlink=request()->headers->get('referer');
        $link=preg_replace('#\/[^/]*$#', '', $rawlink);
        $numsent = (new EmailController)->Email($request, $link,$formname);
        //email notification-end

        return redirect()->route('injuries.index');
    }
}