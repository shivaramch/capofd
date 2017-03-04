<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biological extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ofd6bID';

    protected  $table = 'OFD6B';
    //
    protected $fillable = [
        'ofd6aID',
        'exposedEmployeeName',
        'dateOfExposure',
        'employeeID_1',
        'assignmentBiological',
        'shift',
        'idcoNumber',
        'epcrIncidentNum',
        'todaysDate',
        'decontaminate',
        'callChi',
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
        'potDocumentDayBook'

    ];
}
