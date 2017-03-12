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
        $request = $this->saveFiles($request);
        Biological::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->BiologicalUpload($request, $last_insert_id);
        //$link = $request->url() . "/$last_insert_id";
        //write code for email notification here
        //$numsent = (new EmailController)->Email($request, $link);

        //email notification-start
        $formname="biologicals";
        $rawlink=request()->headers->get('referer');
        $link=preg_replace('#\/[^/]*$#', '', $rawlink)."/$last_insert_id";

        $numsent = (new EmailController)->Email($request, $link,$formname);

        //email notification-end
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
        \DB::table('biological')->where('ofd6bid', $biological->ofd6bid)->update([
                'exposedemployeename' => $biological->exposedemployeename,
                'dateofexposure' => $biological->dateofexposure,
                'employeeid' => $biological->employeeid,
                'assignmentbiological' => $biological->assignmentbiological,
                'shift' => $biological->shift,
                'primaryidconumber' => $biological->primaryidconumber,
                'epcrincidentnum' => $biological->epcrincidentnum,
                'todaysdate' => $biological->todaysdate,
                'exposure'=>$biological->exposure,
                'frmsincidentnum'=>$biological->frmsincidentnum,
                'exposureinjury'=>$biological->exposureinjury]
        );
        $request = $this->saveFiles($request);
        $biological->update($request->all());
        $this->BiologicalUpload($request, $id);


        //email notification-start
        $formname="biologicals";

        $rawlink=request()->headers->get('referer');
        $link=preg_replace('#\/[^/]*$#', '', $rawlink);
        $numsent = (new EmailController)->Email($request, $link,$formname);
        //email notification-end


        return redirect()->route('biologicals.index');


        //add email code here
        //$numsent = (new EmailController)->Email($request, $link);
        //return redirect()->route('biologicals.index');
    }
}