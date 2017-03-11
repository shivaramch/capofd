<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Accident extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ofd6aID';

    protected $table = 'accident';

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

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

        'accidentDate',
        'driverName',
        'driverID',
        'assignmentAccident',
        'Apparatus',
        'captainID',
        'battalionChiefID',
        'acOnDutyID',
        'CommEmail',
        'CallLaw',
        'DayBook',
        'Status'

      ];

    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateAccidentDate($input)
    {
        if ($input != null) {
            $this->attributes['accidentDate'] = Carbon::createFromFormat('Y-m-d', $input)->format('Y-m-d');
        } else {
            $this->attributes['accidentDate'] = null;
        }
    }

    public function attachment(){
        return $this->hasMany(\App\Attachment::class);
    }

}
