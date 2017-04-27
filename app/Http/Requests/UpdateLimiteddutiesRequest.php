<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Limitedduty;
class UpdateLimiteddutiesRequest extends FormRequest
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
            'employeeid' => 'required|integer:limitedduty,employeeid'.$this->route('limitedduty'),
            'employeename' => 'required|regex:/^[a-zA-Z\s]+$/|string:limitedduty,exposedemployeename'.$this->route('limitedduty'),
            'fromdate' => 'required|date_format:Y-m-d,fromdate'.$this->route('limitedduty'),
            'todate' => 'required|date_format:Y-m-d,todate'.$this->route('limitedduty'),
            'corvelid' => 'required|string:limitedduty,corvelid'.$this->route('limitedduty'),
            'incidenttype' => 'required|string:limitedduty,incidenttype'.$this->route('limitedduty'),
            'incidentid' => 'required|integer:limitedduty,incidentid'.$this->route('limitedduty'),
            'comments'=>'string:limitedduty,comments'.$this->route('limitedduty'),
        ];
    }
}