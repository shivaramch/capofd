<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Fmla;
class UpdateFmlasRequest extends FormRequest
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
            'employeeid' => 'required|integer:fmla,employeeid'.$this->route('fmlas'),
            'employeename' => 'required|regex:/^[a-zA-Z\s]+$/|string:fmla,exposedemployeename'.$this->route('fmlas'),
            'fromdate' => 'required|date:fmla,fromdate'.$this->route('fmlas'),
            'todate' => 'required|date:fmla,todate|after_or_equal:fromdate'.$this->route('fmlas'),
        ];
    }
}