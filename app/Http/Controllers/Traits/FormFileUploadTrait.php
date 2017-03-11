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
            $attachment->ofd6id = $id;
            $attachment->attachmenttype = '611';
            $attachment->save();
        }
        if ($attachmentName = $request['InvestigationAttachment']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6id = $id;
            $attachment->attachmenttype = '612';
            $attachment->save();
        }
        if ($attachmentName = $request['StatementAttachment']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6id = $id;
            $attachment->attachmenttype = '613';
            $attachment->save();
        }
        if ($attachmentName = $request['EmployeeAttachment']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6id = $id;
            $attachment->attachmenttype = '614';
            $attachment->save();
        }
        if ($attachmentName = $request['Ofd25Attachment']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6id = $id;
            $attachment->attachmenttype = '615';
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
}