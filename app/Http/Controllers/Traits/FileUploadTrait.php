<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;


trait FileUploadTrait
{

    /**
     * File upload trait used in controllers to upload files
     */


    public function saveFiles(Request $request)
    {
        if (!file_exists(public_path('uploads'))) {
            mkdir(public_path('uploads'), 0777);
        }

        $finalRequest = $request;

        foreach ($request->all() as $key => $value) {

            if ($request->hasFile($key)) {


                        $filename = time() .'-'.rand().'-' . $request->file($key)->getClientOriginalName();
                        $request->file($key)->move(public_path('uploads'), $filename);
                        $finalRequest = new Request(array_merge($finalRequest->all(), [$key => $filename]));


            }
        }

        return $finalRequest;
    }
}

