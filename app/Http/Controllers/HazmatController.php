<?php

namespace App\Http\Controllers;

use App\hazmat;
use App\Attachment;
use App\Http\Requests\UpdateHazmatRequest;
use App\Http\Requests\StoreStationsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHazmatRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class HazmatController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;
    public function Approve($id)
    {

        //$hazmat->ofd6cid

        $hazmat=DB::table('hazmats')->where('ofd6cid',$id)->first();
        $formname="hazmat";

        $rawlink=request()->headers->get('referer');
        $link=preg_replace('#\/[^/]*$#', '', $rawlink);
        $currentuserid = Auth::user()->id;
        $primaryidconumber=DB::table('hazmats')->where ([
            ['primaryidconumber', '=', $currentuserid],
            ['ofd6cid', '=', $id],
        ])->pluck('primaryidconumber');
        $Finalapprovalstatusidraw=DB::table('status')->where('statustype','Approved')->pluck('statusid');
        $Finalpprovalstatusid=str_replace (array('[', ']'), '',$Finalapprovalstatusidraw);

        if($primaryidconumber){

            $hazmat = hazmat::find($id);

            $hazmat->applicationstatus =$Finalpprovalstatusid ;

            $hazmat->save();
            (new EmailController)->Email($hazmat, $rawlink,$formname,$Finalpprovalstatusid);
        }

        return redirect()->route('hazmat.index');
    }

    public  function Reject($id)
    {
        $hazmat=DB::table('hazmats')->where('ofd6cid',$id)->first();
        $formname="hazmat";

        $rawlink=request()->headers->get('referer');
        $link=preg_replace('#\/[^/]*$#', '', $rawlink);

        $currentuserid = Auth::user()->id;
        $primaryidconumber=DB::table('hazmats')->where ([
            ['primaryidconumber', '=', $currentuserid],
            ['ofd6cid', '=', $id],
        ])->pluck('primaryidconumber');

        $statusidraw=DB::table('status')->where('statustype','Rejected')->pluck('statusid');
        $statusid=str_replace (array('[', ']'), '', $statusidraw);
        if($primaryidconumber) {

            $hazmat = hazmat::find($id);

            $hazmat->applicationstatus =$statusid ;

            $hazmat->save();

            (new EmailController)->Email( $hazmat, $rawlink,$formname,$statusid);
        }

        return redirect()->route('hazmat.index');

    }

    public function index()
    {
        $hazmat = hazmat::all();
        return view('hazmat.index', compact('hazmat'));
    }

    public function create()
    {

        return view('hazmat.create');
    }





    public function save( Request $requestSave)
    {
        if(Input::get('store')) {
            $this->store($requestSave);
        }

        if(Input::get('partialSave')) {
            $this->partialSave($requestSave);
        }
        return redirect()->route('hazmat.index');

    }



    public function partialSave(Request $request)
    {


        $this->validate($request, [



            'dateofexposure' => 'required|date:hazmat,dateofexposure,',
            'corvelid' => 'required|integer:hazmat,corvelid',
            'contactcorvel' => 'required|string:hazmat,contactcorvel',
            ]);

        $statusid=DB::table('status')->where('statustype','Draft')->value('statusid');
        $request->offsetSet('applicationstatus',$statusid);
        $request = $this->saveFiles($request);
        hazmat::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->HazmatUpload($request, $last_insert_id);

        $link = $request->url() . "/$last_insert_id";

    }

    public function store(Request $request)
    {





        $this->validate($request, [


            'employeeid' => 'required|integer:hazmat,employeeid,',
            'employeename' => 'required|alpha|string:hazmat,employeename,' ,
            'dateofexposure' => 'required|date:hazmat,dateofexposure,',
            'primaryidconumber' => 'required|integer:hazmat,primaryidconumber',
            'contactcorvel' => 'required|string:hazmat,contactcorvel',
            'corvelid' => 'required|integer:hazmat,corvelid',
            'epcrincidentnum' => 'required|integer:hazmat,epcrincidentnum',
            'assignment' => 'required|string:hazmat,assignment',
            'frmsincidentnum' => 'required|integer:hazmat,frmsincidentnum',
            'shift' => 'required|string:hazmat,shift,',
            ]);


        $statusid=DB::table('status')->where('statustype','Application under Captain')->value('statusid');

        $request->offsetSet('applicationstatus',$statusid);

        $request = $this->saveFiles($request);
        hazmat::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->HazmatUpload($request, $last_insert_id);

        $link = $request->url() . "/$last_insert_id";
//write code for email notification here
        //email notification-start
        $formname="hazmat";
        $rawlink=request()->headers->get('referer');
        $link=preg_replace('#\/[^/]*$#', '', $rawlink)."/$last_insert_id";

        (new EmailController)->Email($request, $link,$formname,$statusid);
        //email notification-end
        return redirect()->route('hazmat.index');
    }

    public function edit($id)
    {

        $attachments = Attachment::all();
        $hazmat = hazmat::findOrFail($id);
        return view('hazmat.edit', compact('hazmat', 'attachments'));
    }

    public function show($id)
    {

        $hazmat = hazmat::findOrFail($id);
        $attachments = Attachment::all();

        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        return view('hazmat.show',compact('hazmat', 'attachments'));
    }

    public function update(UpdateHazmatRequest $request, $id)
    {
        //$accident = $this->saveFiles($request);

        $statusidraw=DB::table('status')->where('statustype','Application under Captain')->pluck('statusid');
        $statusid=str_replace (array('[', ']'), '', $statusidraw);

        $hazmat = hazmat::findOrFail($id);

        \DB::table('hazmats')->where('ofd6cid', $hazmat->ofd6cid)->update([
                'employeeid' => $hazmat->employeeid,
                'employeename' => $hazmat->employeename,
                'dateofexposure' => $hazmat->dateofexposure,
                'primaryidconumber' => $hazmat->primaryidconumber,
                'epcrincidentnum' => $hazmat->epcrincidentnum,
                'frmsincidentnum' => $hazmat->frmsincidentnum,
                'assignment' => $hazmat->assignment,
                'shift' => $hazmat->shift,
                'applicationstatus' => $statusid,
                'corvelid' => $hazmat->corvelid,
                //'exposurehazmat' => $hazmat->exposurehazmat
        ]
        );

        //end history code
        $request = $this->saveFiles($request);
        $hazmat->update($request->all());

        $this->HazmatUpload($request, $id);

        $link=$request->url();

        //email notification-start
        $formname="hazmat";
        $rawlink=request()->headers->get('referer');
        $link=preg_replace('#\/[^/]*$#', '', $rawlink);
    (new EmailController)->Email($request, $link,$formname,$statusid);

        //email notification-end


        return redirect()->route('hazmat.index');
    }
}
