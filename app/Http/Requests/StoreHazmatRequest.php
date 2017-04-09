<?php

namespace App\Http\Requests;

use App\hazmat;
use Illuminate\Foundation\Http\FormRequest;


class StoreHazmatRequest extends FormRequest
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
            'employeename' => 'required|alpha|string:hazmat,employeename,' . $this->route('hazmat'),
            'dateofexposure' => 'required|date:hazmat,dateofexposure,'. $this->route('hazmat'),
            'primaryidconumber' => 'required|integer:hazmat,primaryidconumber'. $this->route('hazmat'),
            'contactcorvel' => 'required|string:hazmat,contactcorvel'. $this->route('hazmat'),
            'corvelid' => 'required|integer:hazmat,corvelid'. $this->route('hazmat'),
            'epcrincidentnum' => 'required|integer:hazmat,epcrincidentnum'. $this->route('hazmat'),
            'assignment' => 'required|string:hazmat,assignment'. $this->route('hazmat'),
            'frmsincidentnum' => 'required|integer:hazmat,frmsincidentnum'. $this->route('hazmat'),
            'shift' => 'required|string:hazmat,shift,'. $this->route('hazmat'),
            'exposurehazmat' => 'required|string:hazmat,exposurehazmat'.$this->route('hazmat'),
            'applicationstatus' =>'required|string:hazmat,applicationstatus'. $this->route('hazmat'),
        ];
    }
}
