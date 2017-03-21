<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Comment extends Model
{
    protected $primaryKey = 'commentid';

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->createdby = Auth::user()->id;
        });
    }

    protected $fillable = [

        'comment',
        'createdby',
        'applicationtype',
        'applicationid',
        'ip_address',
        'isvisible'
    ];

}
