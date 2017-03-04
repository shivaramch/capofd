<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class hazmat extends Model
{
    protected $table = 'ofd6c';
    protected $primaryKey='ofd6cid';
    protected $fillable = [


        'createdby',
        'updatedby',
        'ofd6cID',
        'contactCorVel',
        'corVelID',
        'attachOFD6d',
        'pathOFD6d'


    ];
}
