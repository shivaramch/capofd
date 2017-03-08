<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Http\Request;


use App\Attachment;
use App\Injury;
use App\Biological;
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

        if ($attachmentName = $request['CorvelAttachmentName']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType = 'Corvel Work Ability Report';
            $attachment->save();
        }

        if ($attachmentName = $request['InvestigationAttachment']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType = 'Investigation Report for Occupational Injury or Illness';
            $attachment->save();
        }

        if ($attachmentName = $request['StatementAttachment']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType = 'Statement of Witness of Accident';
            $attachment->save();
        }

        if ($attachmentName = $request['EmployeeAttachment']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType = 'Employee\'s Choice of Physician or Doctor Form';
            $attachment->save();
        }

        if ($attachmentName = $request['Ofd25Attachment']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType = 'OFD - 25 Injury on Job';
            $attachment->save();
        }
    }

    public function AccidentUpload(Request $request, $id)
    {
        if ($attachmentName = $request['LRS101']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType = '611';
            $attachment->save();
        }

        if ($attachmentName = $request['OFD295']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType = '612';
            $attachment->save();
        }

        if ($attachmentName = $request['OFD025a']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType = '613';
            $attachment->save();
        }

        if ($attachmentName = $request['OFD025b']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType = '614';
            $attachment->save();
        }
        if ($attachmentName = $request['OFD025c']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType = '615';
            $attachment->save();
        }

        if ($attachmentName = $request['OFD31']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType = '616';
            $attachment->save();
        }

        if ($attachmentName = $request['OFD127']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType = '617';
            $attachment->save();
        }

        if ($attachmentName = $request['DR41']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType = '618';
            $attachment->save();
        }
    }

    public function BiologicalUpload(Request $request, $id)
    {
        if ($attachmentName = $request['trueOFD184']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->ofd6bID = $id;
            $attachment->attachmentType = '619';
            $attachment->save();
        }

        if ($attachmentName = $request['potOFD184']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->ofd6bID = $id;
            $attachment->attachmentType = '620';
            $attachment->save();
        }
    }
}
