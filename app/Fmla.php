<?php

namespace App;
use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;

class Fmla extends Model
{
    protected $primaryKey = 'fmlaid';
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
        'fmlaid',
        'employeename',
        'employeeid',
//        'corvelid',
//        'incidentid',
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
