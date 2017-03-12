<?php
namespace App\Http\Controllers;
use App\Accident;
use App\Attachment;
use App\Http\Requests\UpdateAccidentsRequest;
use App\Http\Requests\StoreStationsRequest;
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
        $request = $this->saveFiles($request);
        Accident::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->AccidentUpload($request, $last_insert_id);
        $link = $request->url() . "/$last_insert_id";
//write code for email notification here
        $formname="accidents";
        $numsent = (new EmailController)->Email($request, $link,$formname);
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
        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        return view('accidents.show', compact('accident', 'attachments'));
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
        $link = $request->url();
        $formname="accidents";
        $numsent = (new EmailController)->Email($request, $link,$formname);
        //email notification-end
        return redirect()->route('accidents.index');
    }
}