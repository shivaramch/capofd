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
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class BiologicalsController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;

    public function Approve($id)
    {

        $biological=DB::table('biologicals')->where('ofd6bid',$id)->first();
        $formname="biologicals";

        $rawlink=request()->headers->get('referer');
        $link=preg_replace('#\/[^/]*$#', '', $rawlink);
        $currentuserid = Auth::user()->id;
        $primaryidconumber=DB::table('biologicals')->where ([
            ['primaryidconumber', '=', $currentuserid],
            ['ofd6bid', '=', $id],
        ])->pluck('primaryidconumber');
        $Finalapprovalstatusidraw=DB::table('status')->where('statustype','Approved')->pluck('statusid');
        $Finalpprovalstatusid=str_replace (array('[', ']'), '',$Finalapprovalstatusidraw);

        if($primaryidconumber){

            $Biological = Biological::find($id);

            $Biological->applicationstatus =$Finalpprovalstatusid ;

            $Biological->save();
            (new EmailController)->Email($biological, $rawlink,$formname,$Finalpprovalstatusid);
        }

        return redirect()->route('biologicals.index');
    }


    public  function Reject($id)
    {
        $biological=DB::table('biologicals')->where('ofd6bid',$id)->first();
        $formname="biologicals";

        $rawlink=request()->headers->get('referer');
        $link=preg_replace('#\/[^/]*$#', '', $rawlink);

        $currentuserid = Auth::user()->id;
        $primaryidconumber=DB::table('biologicals')->where ([
            ['primaryidconumber', '=', $currentuserid],
            ['ofd6bid', '=', $id],
        ])->pluck('primaryidconumber');

        $statusidraw=DB::table('status')->where('statustype','Rejected')->pluck('statusid');
        $statusid=str_replace (array('[', ']'), '', $statusidraw);
        if($primaryidconumber) {

            $Biological = Biological::find($id);

            $Biological->applicationstatus =$statusid ;

            $Biological->save();

            (new EmailController)->Email($biological, $rawlink,$formname,$statusid);
        }

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


    public function save( Request $requestSave)
    {
        if(Input::get('store')) {
            $this->store($requestSave);
        }

        if(Input::get('partialSave')) {
            $this->partialSave($requestSave);
        }
        return redirect()->route('biologicals.index');

    }




    public function partialSave(Request $request)
    {
        $this->validate($request, [

           'dateofexposure'=> 'required|date:biological,todaysdate,',
            ]);


        $statusid=DB::table('status')->where('statustype','Draft')->value('statusid');
        $request->offsetSet('applicationstatus',$statusid);

        $request = $this->saveFiles($request);
        Biological::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->BiologicalUpload($request, $last_insert_id);
        $link = $request->url() . "/$last_insert_id";
        return redirect()->route('biologicals.index');

    }

    public function store(Request $request)
    {

        $this->validate($request, [

            'trueofd184' => 'max:20480|mimes:pdf',
            'potofd184' => 'max:20480|mimes:pdf',
            //'todaysdate' => 'required|date:biological,todaysdate,',
            'employeeid' => 'required|integer:biological,employeeid',
            'exposedemployeename' => 'required|alpha|string:biological,exposedemployeename',
            //'dateofexposure' => 'required|before_or_equal:biological,dateofexposure',
            'assignmentbiological' => 'required|string:biological,assignmentbiological',
            'shift' => 'required|string:biological,shift',
            'primaryidconumber' => 'required|integer:biological,primaryidconumber',
            'epcrincidentnum' => 'required|numeric:biological,epcrincidentnum',
            'frmsincidentnum' => 'required|string:biological,frmsincidentnumber',
            //'exposureinjury'=>'required|string:biological,exposureinjury',
            'exposure'=>'required|string:biological,exposure',
            ]);

        $statusid=DB::table('status')->where('statustype','Application under Captain')->value('statusid');
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

        (new EmailController)->Email($request, $link,$formname,$statusid);
       return redirect()->route('biologicals.index');
    }
    public function edit($id)
    {
        $attachments = Attachment::all();
        $biological = Biological::findOrFail($id);
        $comments = Comment::all();
        $users = User::all();

        return view('biologicals.edit', compact('biological', 'attachments','comments', 'users'));
    }
    public function show($id)
    {
        $biological = Biological::findOrFail($id);
        $attachments = Attachment::all();
        $comments = Comment::all();
        $users = User::all();
        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        return view('biologicals.show', compact('biological', 'attachments','comments', 'users'));
    }
    public function update(UpdateBiologicalsRequest $request, $id)
    {

        $statusidraw=DB::table('status')->where('statustype','Application under Captain')->pluck('statusid');
        $statusid=str_replace (array('[', ']'), '', $statusidraw);

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
                'applicationstatus' => $statusid,
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
        (new EmailController)->Email($request, $link,$formname,$statusid);
        //email notification-end
        return redirect()->route('biologicals.index');
    }
}