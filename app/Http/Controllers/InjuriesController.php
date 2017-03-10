<?php
namespace App\Http\Controllers;
use App\Attachment;
use App\Injury;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStationsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Controllers\Traits\FormFileUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;
class InjuriesController extends Controller
{
    use FileUploadTrait;
    use FormFileUploadTrait;
    public function index()
    {
        $injuries = Injury::all();
        $attachments = Attachment::all();
        return view('injuries.index', compact('injuries'));
    }
	
	public function create()
    {

        return view('injuries.create');
    }

    public function store(StoreStationsRequest $request)
    {
        $request = $this->saveFiles($request);
        Injury::create($request->all());
        $last_insert_id = DB::getPdo()->lastInsertId();
        $this->InjuriesUpload($request, $last_insert_id);
        //$request->session()->flash('alert-success', 'Form was successfully Submitted!');
        return redirect()->route('injuries.index');
    }
	
	 public function edit($id)
    {
        $injury = Injury::findOrFail($id);
        return view('injuries.edit', compact('injury', ''));
    }

    public function show($id)
    {

        $injury = Injury::findOrFail($id);
        $attachments = Attachment::all();

        //show history code start
        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
        //show history code end
        return view('injuries.show',compact('injury','attachments'));
    }

	
	public function update(UpdateInjuriesRequest $request, $id)
    {
        //$accident = $this->saveFiles($request);
        $injury = Injury::findOrFail($id);

        \DB::table('injuries')->where('ofd6ID', $injury->ofd6ID)->update([
        'reportNum'=> $injury->reportNum,
        'createDate'=>$injury->createDate,
        'injuryDate'=>$injury->injuryDate,
        'injuredEmployeeName'=>$injury->injuredEmployeeName,
        'injuredEmployeeID'=>$injury->injuredEmployeeID,
        'assignmentInjury'=>$injury->assignmentInjury,
        'shift'=>$injury->shift,
        'frmsIncidentNum'=>$injury->frmsIncidentNum,
        'callFSupSwdBC'=>$injury->callFSupSwdBC,
        'User_Login_ID'=>$injury->User_Login_ID,
        'policeOfficerCompleteSign'=>$injury->policeOfficerCompleteSign,
        'callFireSupervisor'=>$injury->callFireSupervisor,
        'createdby'=>$injury->createdby,
        'updatedby'=>$injury->updatedby,
        'corVelID'=>$injury->corVelID,
        'captainID'=>$injury->captainID,
        'battalionChiefID'=>$injury->battalionChiefID,
        'acOnDutyID'=>$injury->acOnDutyID]
        );

        //end history code
        $injury->update($request->all());

        return redirect()->route('injuries.index');
    }
	
//    public function show($id)
//    {
//        $relations = [
//            'unittypes' => \App\UnitType::get()->pluck('name', 'id')->prepend('Please select', ''),
//            'grants' => \App\Grant::get()->pluck('grant_name', 'id')->prepend('Please select', ''),
//            'statuses' => \App\Status::get()->pluck('status', 'id')->prepend('Please select', ''),
//            'stations' => \App\Station::get()->pluck('station_number', 'id')->prepend('Please select', ''),
//            'restations' => \App\Station::get()->pluck('station_name', 'id'),
//            'vendors' => \App\Vendor::get()->pluck('vendor_name', 'id')->prepend('Please select', ''),
//            'vehicles' => \App\Vehicle::get()->pluck('van', 'id')->prepend('Please select', ''),
//
//        ];
//        $station = Station::findOrFail($id);
//
//        //show history code start
//        //below one line code is for storing all history related to the $id in variable, which is to be used to display in show page.
//
//        $stationhis2 = Stationhis::where('station_id', $id)->get();
//        //show history code end
//        return view('stations.show', compact('station', 'stationhis2') + $relations);
//    }
//
//    public function reassign(Request $request)
//    {
//        $arrayValues = $request->reassignval;
//        $newStationID = $request->station_id;
//        if ($arrayValues != null) {
//            foreach ($arrayValues as $key => $value) {
//                $allAsset = AllAsset::findOrFail($value);
//                $allAsset->station_id = $newStationID;
//                $allAsset->save();
//            }
//            $stations = Station::all();
//            return view('stations.index', compact('stations'));
//        } else
//            return Redirect::back()->withInput();
//    }
//
//    public function edit($id)
//    {
//
//        $relations = [
//            'grants' => \App\Grant::get()->pluck('grant_name', 'id')->prepend('Please select', ''),
//            'statuses' => \App\Status::get()->pluck('status', 'id')->prepend('Please select', ''),
//            'vendors' => \App\Vendor::get()->pluck('vendor_name', 'id')->prepend('Please select', ''),
//        ];
//
//        $station = Station::findOrFail($id);
//        return view('stations.edit', compact('station', '') + $relations);
//    }
//
//    public function update(UpdateStationsRequest $request, $id)
//    {
//        $request = $this->saveFiles($request);
//        $station = Station::findOrFail($id);
//
//        //history code begin
//        $grantid = $station->grant_id;
//        $vendorid = $station->vendor_id;
//
//        $grant = Grant::find($grantid);
//        $vendor = Vendor::find($vendorid);
//
//        if ($grant) {
//            $grant_name = $grant->grant_name;
//
//        } else {
//            $grant_name = null;
//        }
//
//        if ($vendor) {
//            $vendor_name = $vendor->vendor_name;
//
//        } else {
//            $vendor_name = null;
//        }
//
//
//        \DB::table('stationhis')->insert([
//                'station_id' => $station->id,
//                'station_name' => $station->station_name,
//                'station_number' => $station->station_number,
//                'station_date' => $station->station_date,
//                'address' => $station->address,
//                'city' => $station->city,
//                'zipcode' => $station->zipcode,
//                'district' => $station->district,
//                'vendor_id' => $station->vendor_id,
//                'vendor_name' => $vendor_name,
//                'grant_id' => $station->grant_id,
//                'grant_name' => $grant_name,
//                "created_at" => \Carbon\Carbon::now('America/Chicago'),
//                "updated_at" => \Carbon\Carbon::now('America/Chicago')]
//        );
//
//        //end history code
//        $station->update($request->all());
//
//        return redirect()->route('stations.index');
//    }
//
//    public function destroy($id)
//    {
//        $station = Station::findOrFail($id);
////history code begin
//        $grantid = $station->grant_id;
//        $vendorid = $station->vendor_id;
//
//        $grant = Grant::find($grantid);
//        $vendor = Vendor::find($vendorid);
//
//        if ($grant) {
//            $grant_name = $grant->grant_name;
//
//        } else {
//            $grant_name = null;
//        }
//
//        if ($vendor) {
//            $vendor_name = $vendor->vendor_name;
//
//        } else {
//            $vendor_name = null;
//        }
//
//
//        \DB::table('stationhis')->insert(
//            ['station_id' => $station->id, 'station_name' => $station->station_name, 'station_number' => $station->station_number, 'station_date' => $station->station_date, 'address' => $station->address, 'city' => $station->city, 'zipcode' => $station->zipcode, 'district' => $station->district, 'vendor_id' => $station->vendor_id, 'vendor_name' => $vendor_name, 'grant_id' => $station->grant_id, 'grant_name' => $grant_name, "created_at" => \Carbon\Carbon::now('America/Chicago'), "updated_at" => \Carbon\Carbon::now('America/Chicago')]
//        );
//
//        //end history code
//
//
//        $station->delete();
//
//        return redirect()->route('stations.index');
//    }
}