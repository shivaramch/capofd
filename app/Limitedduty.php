<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;

class Limitedduty extends Model
{
    protected $primaryKey = 'limiteddutyid';
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
        'limiteddutyid',
        'employeename',
        'employeeid',
        'corvelid',
        'incidentid',
        'incidenttype',
        'fromdate',
        'todate',
        'commments',
        ];
    public function attachment(){
        return $this->hasMany(\App\Attachment::class);
    }
    //public function incident(){
        //return $this->hasMany(\App\Incident::class);
    //}
}
