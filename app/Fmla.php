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
            $model->ip_address=\Request::getClientIp();
        });
        static::updating(function($model)
        {
            $model->updatedby = Auth::user()->id;
            $model->ip_address=\Request::getClientIp();

        });
    }
    protected $fillable = [
        'fmlaid',
        'employeename',
        'employeeid',
        'incidenttype',
        'fromdate',
        'todate',
        'comments',
    ];
    public function attachment(){
        return $this->hasMany(\App\Attachment::class);
    }
}
