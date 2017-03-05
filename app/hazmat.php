<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hazmat extends Model
{
    protected $table='hazmat';

    protected $primaryKey='ofd6cID';
    protected $fillable = [

        'createdby',
        'updatedby',
        'ofd6cID',
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
        'pathOFD625',


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
