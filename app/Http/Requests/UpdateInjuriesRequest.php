<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInjuriesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'injurydate' => 'required|date:injury,injurydate,'. $this->route('injury'),
            'createdate' => 'required|date:injury,createdate,'. $this->route('injury'),
            'injuredemployeename' => 'required|string:injury,injuredemployeename,'. $this->route('injury'),
            'injuredemployeeid' => 'required|integer:injury,injuredemployeeid,' . $this->route('injury'),

            'assignmentinjury' => 'required|string:injury,assignmentinjury,'. $this->route('injury'),
            'corvelid' => 'required|integer:injury,corvelid,' . $this->route('injury'),
            'captainid' => 'required|integer:injury,captainid'. $this->route('injury'),
            'battalionchiefid' => 'required|integer:injury,battalionchiefid'. $this->route('injury'),
            'aconduty' => 'required|integer:injury,aconduty'. $this->route('injury'),
            'shift' => 'required|string:injury,shift,'. $this->route('injury'),
            'frmsincidentnum' => 'required|string:injury,frmsincidentnum'. $this->route('injury')
        ];
    }
}
