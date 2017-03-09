<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hazmat extends Model
{
    protected $table='ofd6c';

    protected $primaryKey='ofd6cid';
    protected $fillable = [

        'createdby',
        'updatedby',
        'ofd6cid',
        'employeeID',
        'exposedEmployeeName',
        'dateOfExposure',
        'idconumber',
        'epcrIncidentNum',
        'assignmentHazmat',
        'shift',
        'contactCorVel',
        'corvelID',
        'attachOFD25',
        'pathOFD25',


    ];

    /**
     * Set attribute to date format
     * @param $input
     */

    public function setDatedateOfExposure($input)
    {
        if ($input != null) {
            $this->attributes['dateOfExposure'] = Carbon::createFromFormat('Y-m-d', $input)->format('Y-m-d');
        } else {
            $this->attributes['dateOfExposure'] = null;
        }
    }
}
