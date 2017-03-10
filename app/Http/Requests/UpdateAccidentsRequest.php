<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UpdateAccidentsRequest extends FormRequest
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
            'accidentdate' => 'required|date:accidents,accidentdate,'. $this->route('accident'),
            'driverid' => 'required|integer:accidents,driverid,' . $this->route('accident'),
            'drivername' => 'required|string:accidents,drivername,'. $this->route('accident'),
            'assignmentaccident' => 'required|string:accidents,assignmentaccident'. $this->route('accident'),
            'apparatus' => 'required|string:accidents,apparatus'. $this->route('accident'),
            'captainid' => 'required|integer:accidents,captainid'. $this->route('accident'),
            'battalionchiefid' => 'required|integer:accidents,battalionchiefid'. $this->route('accident'),
            'aconduty' => 'required|integer:accidents,aconduty'. $this->route('accident'),
        ];
    }
}