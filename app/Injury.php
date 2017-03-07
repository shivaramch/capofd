<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Injury extends Model
{
    protected $fillable = [

        'reportNum',
        'createDate',
        'injuryDate',
        'injuredEmployeeName',
        'injuredEmployeeID',
        'assignmentInjury',
        'shift',
        'frmsIncidentNum',
        'callFSupSwdBC',
        'User_Login_ID',
        'policeOfficerCompleteSign',
        'callFireSupervisor',
        'createdby',
        'updatedby',
        'corVelID',
        'captainID',
        'battalionChiefID',
        'acOnDutyID',
        'status1',
    ];


    public function attachment(){
        return $this->hasMany(\App\Attachment::class);
    }
}
