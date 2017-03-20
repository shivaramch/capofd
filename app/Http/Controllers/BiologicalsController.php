<?php
namespace App\Http\Controllers;
use App\Biological;
use App\Attachment;
use App\Http\Requests\UpdateBiologicalsRequest;
use App\Http\Requests\StoreBiologicalsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class BiologicalsController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;




    public  function Approve($id)
    {
        //this function will be used to update the application status
        //if the user id is same as primary idco then approve and set status to Approved(6)
        //from database get the primary idco and user id

        $statusidraw=DB::table('status')->where('statustype','Approved')->pluck('statusid');
        $statusid=str_replace (array('[', ']'), '', $statusidraw);

        $biological = Biological::find($id);

        $biological->applicationstatus = $statusid;

        $biological->save();

       return redirect()->route('biologicals.index');

     //   return view('biologicals.index', compact('biologicals'));
//ofd6b->primaryidco

        //if prmaryidco equals user id then approve and set status as approved
    }

    public  function Reject($id){

        $statusidraw=DB::table('status')->where('statustype','Rejected')->pluck('statusid');
        $statusid=str_replace (array('[', ']'), '', $statusidraw);

        $biological = Biological::find($id);

        $biological->applicationstatus = $statusid;

        $biological->save();

        return redirect()->route('biologicals.index');

    }
    public function index()
    {
        $biologicals = Biological::all();
        return view('biologicals.index', compact('biologicals'));
    }
    public function create()
    {
        return view('biologicals.create');
    }
    public function store(StoreBiologicalsRequest $request)
    {

        //no condition when the the form is submitted for first time->application status as 2
        //if the application is 2 and captain is same as user id then ->application status as 3
        //if the application is 3 and bcid is user id then appstatus is 4
        //if the application is 4 and acid is user id then appstatus is 5

        //get the id where the status is
        $statusidraw=DB::table('status')->where('statustype','Application under Captain')->pluck('statusid');
        $statusid=str_replace (array('[', ']'), '', $statusidraw);

        $request->offsetSet('applicationstatus',$statusid);

        $request = $this->saveFiles($request);
        Biological::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->BiologicalUpload($request, $last_insert_id);
        $link = $request->url() . "/$last_insert_id";
//write code for email notification here
        $formname="biologicals";
        $rawlink=request()->headers->get('referer');
        $link=preg_replace('#\/[^/]*$#', '', $rawlink)."/$last_insert_id";

    //    $numsent = (new EmailController)->Email($request, $link,$formname);
        return redirect()->route('biologicals.index');
    }
    public function edit($id)
    {
        $attachments = Attachment::all();
        $biological = Biological::findOrFail($id);
        return view('biologicals.edit', compact('biological', 'attachments'));
    }
    public function show($id)
    {

        $biological = Biological::findOrFail($id);
        $attachments = Attachment::all();
        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        return view('biologicals.show', compact('biological', 'attachments'));
    }
    public function update(UpdateBiologicalsRequest $request, $id)
    {
        $biological = Biological::findOrFail($id);
        \DB::table('biologicals')->where('ofd6bid', $biological->ofd6bid)->update([
                'exposedemployeename' => $biological->exposedemployeename,
                'dateofexposure' => $biological->dateofexposure,
                'employeeid' => $biological->employeeid,
                'assignmentbiological' => $biological->assignmentbiological,
                'shift' => $biological->shift,
                'primaryidconumber' => $biological->primaryidconumber,
                'epcrincidentnum' => $biological->epcrincidentnum,
                //'todaysdate' => $biological->todaysdate,
                'exposure'=>$biological->exposure,
                'frmsincidentnum'=>$biological->frmsincidentnum,
                'exposureinjury'=>$biological->exposureinjury]
        );
        //end history code
        $request = $this->saveFiles($request);
        $biological->update($request->all());
        $this->BiologicalUpload($request, $id);
        //email notification-start
        $link = $request->url();
        $formname="biologicals";
        $numsent = (new EmailController)->Email($request, $link,$formname);
        //email notification-end
        return redirect()->route('biologicals.index');
    }
}