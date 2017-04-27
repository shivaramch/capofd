<?php
namespace App\Http\Requests;
use App\Accident;
use Illuminate\Foundation\Http\FormRequest;
class StoreAccidentsRequest extends FormRequest
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
            'drivername' => 'required|alpha|string:accidents,drivername,'. $this->route('accident'),
            'assignmentaccident' => 'required|string:accidents,assignmentaccident'. $this->route('accident'),
            'apparatus' => 'required|string:accidents,apparatus'. $this->route('accident'),
            'captainid' => 'required|integer:accidents,captainid'. $this->route('accident'),
            'battalionchiefid' => 'required|integer:accidents,battalionchiefid'. $this->route('accident'),
            'aconduty' => 'required|integer:accidents,aconduty'. $this->route('accident'),
            'frmsincidentnum1' => 'required|integer:accidents,frmsincidentnum'. $this->route('accident'),
            'calllaw' =>'required|integer:accidents,calllaw'. $this->route('accident'),
            'daybook' =>'required|integer:accidents,daybook'. $this->route('accident'),
            'commemail' =>'required|integer:accidents,commemail'. $this->route('accident'),
        ];
    }
}