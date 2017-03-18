<?php
namespace App\Http\Requests;
use App\Biological;
use Illuminate\Foundation\Http\FormRequest;
class StoreBiologicalsRequest extends FormRequest
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
            //'trueofd184' => 'mimes:pdf,PDF,X-PDF,acrobat|max:20480'.$this->route('biological'),
            //'potofd184' => 'mimes:pdf,PDF,X-PDF,acrobat|max:20480'.$this->route('biological'),
            //'todaysdate' => 'required|date:biological,todaysdate,'.$this->route('biological'),
            'employeeid' => 'required|integer:biological,employeeid'.$this->route('biological'),
            'exposedemployeename' => 'required|string:biological,exposedemployeename'.$this->route('biological'),
            'dateofexposure' => 'required|before_or_equal:biological,dateofexposure'.$this->route('biological'),
            'assignmentbiological' => 'required|string:biological,assignmentbiological'.$this->route('biological'),
            'shift' => 'required|string:biological,shift'.$this->route('biological'),
            'primaryidconumber' => 'required|integer:biological,primaryidconumber'.$this->route('biological'),
            'epcrincidentnum' => 'required|numeric:biological,epcrincidentnum'.$this->route('biological'),
            'frmsincidentnum' => 'required|numeric:biological,frmsincidentnumber'.$this->route('biological'),
            'exposureinjury'=>'required|string:biological,exposureinjury'.$this->route('biological'),
            'exposure'=>'required|string:biological,exposure'.$this->route('biological'),
        ];
    }
}