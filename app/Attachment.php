<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $fillable = [
        'attachmentID',
        'attachmentName',
        'attachmentPath',
        'updatedBy',
        'createdBy',
        'attachmentType',
    ];
    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub

        static::saving(function($table)  {
            $table->createdBy = Auth::user()->id;
        });
    }

    public function injury(){
        return $this->belongsTo(\App\Injury::class);
    }

    public function accident(){
        return $this->belongsTo(\App\Accident::class);
    }
}
