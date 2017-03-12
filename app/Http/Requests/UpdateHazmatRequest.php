<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\hazmat;
class UpdateHazmatRequest extends FormRequest
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
            'employeeid' => 'required|integer:hazmat,employeeid,'. $this->route('hazmat'),
            'employeename' => 'required|string:hazmat,employeename,' . $this->route('hazmat'),
            'dateofexposure' => 'required|date:hazmat,dateofexposure,'. $this->route('hazmat'),
            'primaryidconumber' => 'required|integer:hazmat,primaryidconumber'. $this->route('hazmat'),
            'contactcorvel' => 'required|string:hazmat,contactcorvel'. $this->route('hazmat'),
            'corvelid' => 'required|integer:hazmat,corvelid'. $this->route('hazmat'),
            'epcrincidentnum' => 'required|integer:hazmat,epcrincidentnum'. $this->route('hazmat'),
            'assignment' => 'required|string:hazmat,assignment'. $this->route('hazmat'),
            'frmsincidentnum' => 'required|integer:hazmat,frmsincidentnum'. $this->route('hazmat'),
            //'applicationstatus' =>'required|string:hazmat,applicationstatus'. $this->route('hazmat'),
        ];
    }
}
