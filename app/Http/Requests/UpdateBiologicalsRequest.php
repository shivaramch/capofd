<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use App\Biological;
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
//            'trueofd184' => 'max:20480|mimes:pdf'.$this->route('biological'),
//            'potofd184' => 'max:20480|mimes:pdf'.$this->route('biological'),
//            'miscbiological1' => 'max:20480|mimes:pdf'.$this->route('biological'),
//            'miscbiological2' => 'max:20480|mimes:pdf'.$this->route('biological'),
            'employeeid' => 'required|integer:biological,employeeid'.$this->route('biological'),
            'dateofexposure' => 'required|date:biological,dateofexposure|before_or_equal:today'.$this->route('biological'),
            'exposedemployeename' => 'required|alpha|string:biological,exposedemployeename'.$this->route('biological'),
            //'dateofexposure' => 'required|before_or_equal:biological,dateofexposure'.$this->route('biological'),
            'assignmentbiological' => 'required|string:biological,assignmentbiological'.$this->route('biological'),
            'shift' => 'required|string:biological,shift'.$this->route('biological'),
            'primaryidconumber' => 'required|integer:biological,primaryidconumber'.$this->route('biological'),
            'epcrincidentnum' => 'required|numeric:biological,epcrincidentnum'.$this->route('biological'),
            'frmsincidentnum1' => 'required|integer:biological,frmsincidentnumber'.$this->route('biological'),
            'exposureinjury'=>'required|string:biological,exposureinjury'.$this->route('biological'),
            'exposure'=>'required|string:biological,exposure'.$this->route('biological'),
        ];
    }
}