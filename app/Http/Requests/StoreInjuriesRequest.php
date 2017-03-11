<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInjuriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     *
     *
     *
     *  'reportnum',
    'createdate',
    'injurydate',
    'injuredemployeename',
    'injuredemployeeid',
    'assignmentinjury',
    'corvelid',
    'captainid',
    'battalionchiefid',
    'aconduty',
    'shift',
    'frmsincidentnum',
    'policeofficercompletesign',
    'callsupervisor',
    'createdby',
    'updatedby',
     */
    public function rules()
    {
        return [
            'reportnum' => 'required|string:accidents,reportnum,'. $this->route('accident'),
            'injurydate' => 'required|date:accidents,injurydate,'. $this->route('accident'),
            'createdate' => 'required|date:accidents,createdate,'. $this->route('accident'),
            'injuredemployeename' => 'required|string:accidents,injuredemployeename,'. $this->route('accident'),
            'injuredemployeeid' => 'required|integer:accidents,injuredemployeeid,' . $this->route('accident'),
            'injuredemployeename' => 'required|string:accidents,injuredemployeename,'. $this->route('accident'),
            'assignmentinjury' => 'required|string:accidents,assignmentinjury,'. $this->route('accident'),
            'corvelid' => 'required|integer:accidents,corvelid,' . $this->route('accident'),
            'captainid' => 'required|integer:accidents,captainid'. $this->route('accident'),
            'battalionchiefid' => 'required|integer:accidents,battalionchiefid'. $this->route('accident'),
            'aconduty' => 'required|integer:accidents,aconduty'. $this->route('accident'),
            'shift' => 'required|string:accidents,shift,'. $this->route('accident'),
            'frmsincidentnum' => 'required|string:accidents,frmsincidentnum'. $this->route('accident'),
            'policeofficercompletesign' => 'required|string:accidents,policeofficercompletesign'. $this->route('accident'),
            'callsupervisor' => 'required|string:accidents,callsupervisor'. $this->route('accident')
        ];
    }
}
