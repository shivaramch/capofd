<?php
namespace App\Http\Controllers;

use App\Accident;
use App\Attachment;
use App\Comment;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAccidentsRequest;
use Illuminate\Support\Facades\Auth;
class AccidentsController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;



    public function Approve($id)
    {

        //check the application status id
        //if appstatus->2 then check the current user id and the captain id if same then put appstatus as 3
        $currentuserid=Auth::user()->id;

     //   $captainid=DB::table('accidents')->where('captainid',$currentuserid,'ofd6aid',$id)->pluck('captainid');

        $captainid=DB::table('accidents')->where ([
            ['captainid', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->pluck('captainid');



     //   $BCid=DB::table('accidents')->where('battalionchiefid',$currentuserid,'ofd6aid',$id)->pluck('battalionchiefid');
        $BCid=DB::table('accidents')->where ([
            ['battalionchiefid', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->pluck('battalionchiefid');

    //    $ACid=DB::table('accidents')->where('aconduty',$currentuserid,'ofd6aid',$id)->pluck('aconduty');

        $ACid=DB::table('accidents')->where ([
            ['aconduty', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->pluck('aconduty');

        $currentapplicationstatusraw=DB::table('accidents')->where('ofd6aid',$id)->pluck('applicationstatus');
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
              $Accident = Accident::find($id);

              $Accident->applicationstatus =$BCapprovalstatusid ;

              $Accident->save();
          }
        }


        if($BCid){
            if($currentapplicationstatus==$BCapprovalstatusid)
            {
                $Accident = Accident::find($id);

                $Accident->applicationstatus =$ACapprovalstatusid ;

                $Accident->save();
            }
        }
        if($ACid){
            if($currentapplicationstatus==$ACapprovalstatusid)
            {
                $Accident = Accident::find($id);

                $Accident->applicationstatus =$Finalpprovalstatusid ;

                $Accident->save();
            }
        }

        return redirect()->route('accidents.index');


    }

    public  function Reject($id){
        $currentuserid=Auth::user()->id;

        //   $captainid=DB::table('accidents')->where('captainid',$currentuserid,'ofd6aid',$id)->pluck('captainid');

        $captainid=DB::table('accidents')->where ([
            ['captainid', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->pluck('captainid');



        //   $BCid=DB::table('accidents')->where('battalionchiefid',$currentuserid,'ofd6aid',$id)->pluck('battalionchiefid');
        $BCid=DB::table('accidents')->where ([
            ['battalionchiefid', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->pluck('captainid');

        //    $ACid=DB::table('accidents')->where('aconduty',$currentuserid,'ofd6aid',$id)->pluck('aconduty');

        $ACid=DB::table('accidents')->where ([
            ['aconduty', '=', $currentuserid],
            ['ofd6aid', '=', $id],
        ])->pluck('captainid');
        $statusidraw=DB::table('status')->where('statustype','Rejected')->pluck('statusid');
        $statusid=str_replace (array('[', ']'), '', $statusidraw);
             if($captainid|| $BCid || $ACid) {
                          $Accident = Accident::find($id);

                           $Accident->applicationstatus = $statusid;

                         $Accident->save();
                     }

        return redirect()->route('accidents.index');

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
    public function store(StoreAccidentsRequest $request)
    {
       // 'applicationstatus' => $request->applicationstatus,


        //request will have all values filled by firefighter
        //check if the user
        $statusidraw=DB::table('status')->where('statustype','Application under Captain')->pluck('statusid');
        $statusid=str_replace (array('[', ']'), '', $statusidraw);
        $request->offsetSet('applicationstatus',$statusid);

        $request = $this->saveFiles($request);
        Accident::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->AccidentUpload($request, $last_insert_id);
        $link = $request->url() . "/$last_insert_id";
//write code for email notification here
        $formname="accidents";
        $rawlink=request()->headers->get('referer');
        $link=preg_replace('#\/[^/]*$#', '', $rawlink)."/$last_insert_id";

      //  $numsent = (new EmailController)->Email($request, $link,$formname);
        return redirect()->route('accidents.index');
    }

    public function edit($id)
    {
        $attachments = Attachment::all();
        $accident = Accident::findOrFail($id);
        return view('accidents.edit', compact('accident', 'attachments'));
    }

    public function show($id)
    {
        $accident = Accident::findOrFail($id);
        $attachments = Attachment::all();
        $comments = Comment::all();
        $users = User::all();
        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        return view('accidents.show', compact('accident', 'attachments', 'comments','users'));
    }

    public function update(UpdateAccidentsRequest $request, $id)
    {
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
                'applicationstatus' => $accident->applicationstatus,
                'frmsincidentnum' => $accident->frmsincidentnum,
                'calllaw' => $accident->calllaw,
                'daybook' => $accident->daybook,
                'commemail' => $accident->commemail ]
        );
        //end history code
        $request = $this->saveFiles($request);
        $accident->update($request->all());
        $this->AccidentUpload($request, $id);
        //email notification-start
       // $link = $request->url();
          $formname="accidents";
    //    var_dump( env('APP_URL')."/"."$formname"."/$id");
        $rawlink=request()->headers->get('referer');
        $link=preg_replace('#\/[^/]*$#', '', $rawlink);
        $numsent = (new EmailController)->Email($request, $link,$formname);
        //email notification-end
      return redirect()->route('accidents.index');
    }
}