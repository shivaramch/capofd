<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;


use App\Attachment;
use App\Injury;
use App\Http\Requests\StoreStationsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;

trait FormFileUploadTrait
{
    public function InjuriesUpload(Request $request, $id)
    {

            if($attachmentName = $request['CorvelAttachmentName']) {
                $attachment = new Attachment();
                $attachment->attachmentName = $attachmentName;
                $attachment->Injury_ofd6ID = $id;
                $attachment->attachmentType = 'Corvel Work Ability Report';
                $attachment->save();
            }
            if ($attachmentName = $request['InvestigationAttachment']){
                    $attachment = new Attachment();
                    $attachment->attachmentName = $attachmentName;
                    $attachment->Injury_ofd6ID = $id;
                    $attachment->attachmentType='Investigation Report for Occupational Injury or Illness';
                    $attachment->save();
            }
            if ($attachmentName = $request['StatementAttachment']){
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType='Statement of Witness of Accident';
            $attachment->save();
            }
            if ($attachmentName = $request['EmployeeAttachment']){
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType='Employee\'s Choice of Physician or Doctor Form';
            $attachment->save();
            }
        if ($attachmentName = $request['Ofd25Attachment']){
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType='OFD - 25 Injury on Job';
            $attachment->save();
        }
//                if ($attachmentName = $request['StatementAttachment']){
//                    $attachment = new Attachment();
//                    $attachment->attachmentName = $attachmentName;
//                    $attachment->Injury_ofd6ID = $id;
//                    $attachment->attachmentType='Statement of Witness of Accident';
//                    $attachment->save();
//                }
            }
//        }
}
