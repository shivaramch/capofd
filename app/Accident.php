<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Accident extends Model
{
    protected $primaryKey = 'ofd6aid';

    protected $table = 'accident';

    public static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
            $model->createdby = Auth::user()->id;
            $model->updatedby = Auth::user()->id;
        });

        static::updating(function($model)
        {
            $model->updatedby = Auth::user()->id;
        });
    }

    protected $fillable = [

        'accidentdate',
        'drivername',
        'driverid',
        'assignmentaccident',
        'apparatus',
        'captainid',
        'battalionchiefid',
        'aconduty',
        'commemail',
        'calllaw',
        'daybook',
        'applicationstatus',
        'frmsincidentnum'

      ];

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateAccidentDate($input)
    {
        if ($input != null) {
            $this->attributes['accidentdate'] = Carbon::createFromFormat('Y-m-d', $input)->format('Y-m-d');
        } else {
            $this->attributes['accidentdate'] = null;
        }
    }

    public function attachment(){
        return $this->hasMany(\App\Attachment::class);
    }

}
