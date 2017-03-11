<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Biological extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ofd6bID';

    protected $table = 'biologicals';

    //public static function boot()
    //{
    //parent::boot(); //TODO: Change the autogenerated stub

    //static::saving(function($table)  {
    //$table->User_Login_employeeID = Auth::user()->id;
    //});
    //}

    protected $fillable = [
        'ofd6bID',
        'exposedEmployeeName',
        'dateOfExposure',
        'employeeID_1',
        'assignmentBiological',
        'shift',
        'idcoNumber',
        'epcrIncidentNum',
        'exposureInjury',
        'todaysDate',
        'trueDecontaminate',
        'confirmSource',
        'bloodReport',
        'exposureTab',
        'trueBagTag',
        'notifyPSS',
        'truePPE',
        'trueDocumentDayBook',
        'potDecontaminate',
        'potBagTag',
        'potPPE',
        'potDocumentDayBook',
        'exposureInjury',
        //'trueInjury',
        //'potInjury'

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

    public function attachment()
    {
        return $this->hasMany(\App\Attachment::class);
    }

    public function injury()
    {
        return $this->hasOne(\App\Injury::class);
    }

}