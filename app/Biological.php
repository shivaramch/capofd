<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Biological extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ofd6bID';


    protected  $table = 'biologicals';
    //
    protected $fillable = [
        'ofd6bID',
        'exposedEmployeeName',
        'dateOfExposure',
        'employeeID_1',
        'assignmentBiological',
        'shift',
        'idcoNumber',
        'epcrIncidentNum',
        'todaysDate',
        'trueDecontaminate',
        'confirmSource',
        'trueOFD184',
        'bloodReport',
        'exposureTab',
        'trueBagTag',
        'notifyPSS',
        'truePPE',
        'trueDocumentDayBook',
        'potDecontaminate',
        'potBagTag',
        'potOFD184',
        'potPPE',
        'potDocumentDayBook',
        'trueInjury',
        'potInjury'

    ];

public function setDateAccidentDate($input)
{
    if ($input != null) {
        $this->attributes['dateOfExposure'] = Carbon::createFromFormat('Y-m-d', $input)->format('Y-m-d');
    } else {
        $this->attributes['dateOfExposure'] = null;
    }
    if ($input != null) {
        $this->attributes['todaysDate'] = Carbon::createFromFormat('Y-m-d', $input)->format('Y-m-d');
    } else {
        $this->attributes['todaysDate'] = null;
    }
}

}