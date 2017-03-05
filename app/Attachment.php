<?php

namespace App;

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

    public function injury(){
        return $this->belongsTo(\App\Injury::class);
    }
}
