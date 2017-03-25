<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class hazmat extends Model
{
    protected $primaryKey = 'ofd6cid';

    public static function boot()
    {
        parent::boot();

        static::creating(function($model)
        {
            $model->createdby = Auth::user()->id;
            $model->updatedby = Auth::user()->id;
            $model->ip_address=\Request::getClientIp();
        });

        static::updating(function($model)
        {
            $model->updatedby = Auth::user()->id;
            $model->ip_address=\Request::getClientIp();
        });
    }

    protected $fillable = [

        'ofd6cid',
        'employeeid',
        'employeename',
        'dateofexposure',
        'primaryidconumber',
        'epcrincidentnum',
        'frmsincidentnum',
        'assignment',
        'shift',
        'contactcorvel',
        'corvelid',
        'applicationstatus',
        'exposurehazmat'


    ];

    /**
     * Set attribute to date format
     * @param $input
     */

    public function setDatedateofexposure($input)
    {
        if ($input != null) {
           $this->attributes['dateofexposure'] = Carbon::createFromFormat('Y-m-d', $input)->format('Y-m-d');
        } else {
            $this->attributes['dateofexposure'] = null;
        }
    }
    public function attachment(){
        return $this->hasMany(\App\Attachment::class);
    }
}
