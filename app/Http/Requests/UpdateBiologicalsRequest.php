<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBiologicalsRequest extends FormRequest
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
            'employeeID_1' => 'required|max:255',
            'exposedEmployeeName' => 'required|max:255',
            'dateOfExposure' => 'required|date|before_or_equal:today',
            'assignmentBiological' => 'required|max:255',
            'shift' => 'required|max:255',
            'idcoNumber' => 'required|numeric',
            'epcrIncidentNum' => 'required|numeric',


            
        ];
    }
}

