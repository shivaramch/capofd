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
        $request = $this->saveFiles($request);
        Injury::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->InjuriesUpload($request, $last_insert_id);
        //$request->session()->flash('alert-success', 'Form was successfully Submitted!');

        //email notification-start
//        $formname="injuries";
//        $link = $request->url() . "/$last_insert_id";
//        $numsent = (new EmailController)->Email($request, $link,$formname);
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
        //$accident = $this->saveFiles($request);
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
        $link = $request->url();
        $numsent = (new EmailController)->Email($request, $link,$formname);
        //email notification-end

        return redirect()->route('injuries.index');
    }
}