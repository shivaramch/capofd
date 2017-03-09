<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Accident extends Model
{
    public $timestamps = false;

    protected $primaryKey = 'ofd6aID';

    public static function boot()
    {
        parent::boot();

        static::saving(function($table)  {
            $table->User_Login_employeeID = Auth::user()->id;
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
