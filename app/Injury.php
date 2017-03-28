<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Injury extends Model
{
    protected $primaryKey = 'ofd6id';

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::creating(function($table)  {
            $table->createdby = Auth::user()->id;
            $table->ip_address=\Request::getClientIp();
        });



        static::updating(function($model)
        {
            $model->updatedby = Auth::user()->id;
            $model->ip_address=\Request::getClientIp();
        });
    }
    protected $fillable = [

        'reportnum',
        'createdate',
        'injurydate',
        'injuredemployeename',
        'injuredemployeeid',
        'assignmentinjury',
        'corvelid',
        'captainid',
        'battalionchiefid',
        'aconduty',
        'shift',
        'frmsincidentnum',
        'trainingassigned',
        'documentworkforce',
        'documentoperationalday',
        'policeofficercompletesign',
        'callsupervisor',
        'applicationstatus',
        'checkbox1',
        'checkbox2',
        'checkbox3',
        'checkbox4',
        'checkbox5',
        'checkbox6',
        'createdby',
        'updatedby',
    ];


    public function attachment(){
        return $this->hasMany(\App\Attachment::class);
    }
}
