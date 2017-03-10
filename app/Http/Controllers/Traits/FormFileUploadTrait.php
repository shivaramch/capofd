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
            $attachment->attachmentname = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmenttype = 'Corvel Work Ability Report';
            $attachment->save();
        }

        if ($attachmentName = $request['InvestigationAttachment']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmenttype = 'Investigation Report for Occupational Injury or Illness';
            $attachment->save();
        }

        if ($attachmentName = $request['StatementAttachment']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmenttype = 'Statement of Witness of Accident';
            $attachment->save();
        }

        if ($attachmentName = $request['EmployeeAttachment']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmenttype = 'Employee\'s Choice of Physician or Doctor Form';
            $attachment->save();
        }

        if ($attachmentName = $request['Ofd25Attachment']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmenttype = 'OFD - 25 Injury on Job';
            $attachment->save();
        }
    }

    public function AccidentUpload(Request $request, $id)
    {
        if ($attachmentName = $request['LRS101']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6aid = $id;
            $attachment->attachmenttype = '6a1';
            $attachment->save();
        }

        if ($attachmentName = $request['OFD295']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6aid = $id;
            $attachment->attachmenttype = '6a2';
            $attachment->save();
        }

        if ($attachmentName = $request['OFD025a']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6aid = $id;
            $attachment->attachmenttype = '6a3';
            $attachment->save();
        }

        if ($attachmentName = $request['OFD025b']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6aid = $id;
            $attachment->attachmenttype = '6a4';
            $attachment->save();
        }
        if ($attachmentName = $request['OFD025c']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6aid = $id;
            $attachment->attachmenttype = '6a5';
            $attachment->save();
        }

        if ($attachmentName = $request['OFD31']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6aid = $id;
            $attachment->attachmenttype = '6a6';
            $attachment->save();
        }

        if ($attachmentName = $request['OFD127']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6aid = $id;
            $attachment->attachmenttype = '6a7';
            $attachment->save();
        }

        if ($attachmentName = $request['DR41']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6aid = $id;
            $attachment->attachmenttype = '6a8';
            $attachment->save();
        }
    }

    public function BiologicalUpload(Request $request, $id)
    {
        if ($attachmentName = $request['trueOFD184']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6bID = $id;
            $attachment->attachmenttype = '619';
            $attachment->save();
        }

        if ($attachmentName = $request['potOFD184']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6bID = $id;
            $attachment->attachmenttype = '620';
            $attachment->save();
        }
    }

    public function HazmatUpload(Request $request, $id)
    {
        if ($attachmentName = $request['OFD025']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->ofd6cid = $id;
            $attachment->attachmentType = '6c';
            $attachment->save();
        }
    }
}
