<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Assignment;

class AutoCompleteController extends Controller
{
    public function autoComplete(Request $request) {
        $query = $request->get('term','');
        $assignments=Assignment::where('assignment','LIKE','%'.$query.'%')->get();
        $data = array();

        foreach($assignments as $assignment){
            $data[]=array('value'=>$assignment->assignment);
        }
        if(count($data))
            return $data;

        else
            return ['value'=>'No Result Found'];
    }
}
