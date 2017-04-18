<?php
namespace App\Http\Requests;
use App\Fmla;
use Illuminate\Foundation\Http\FormRequest;
class StoreFmlasRequest extends FormRequest
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
            'employeename' => 'required|string:fmla,exposedemployeename'.$this->route('fmlas'),
            'fromdate' => 'required|date_format:Y-m-d,fromdate'.$this->route('fmlas'),
            'todate' => 'required|date_format:Y-m-d,todate'.$this->route('fmlas'),
            'comments'=>'string:fmla,comments'.$this->route('fmlas'),
        ];
    }
}