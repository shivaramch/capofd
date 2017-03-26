<?php
namespace App\Http\Controllers\Traits;

use App\Attachment;
use Auth;
use Illuminate\Http\Request;

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
        if ($attachmentName = $request['miscinjuries']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6id = $id;
            $attachment->attachmenttype = '616';
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
        if ($attachmentName = $request['miscaccidents']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6aid = $id;
            $attachment->attachmenttype = '6a9';
            $attachment->save();
        }
    }

    public function BiologicalUpload(Request $request, $id)
    {
        if ($attachmentName = $request['trueofd184']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6bid = $id;
            $attachment->attachmenttype = '6b1';
            $attachment->save();
        }
        if ($attachmentName = $request['potofd184']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6bid = $id;
            $attachment->attachmenttype = '6b2';
            $attachment->save();
        }
        if ($attachmentName = $request['miscbiological1']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6bid = $id;
            $attachment->attachmenttype = '6b3';
            $attachment->save();
        }
        if ($attachmentName = $request['miscbiological2']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6bid = $id;
            $attachment->attachmenttype = '6b4';
            $attachment->save();
        }
    }


    public function HazmatUpload(Request $request, $id)

    {
        if ($attachmentName = $request['OFD025']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6cid = $id;
            $attachment->attachmenttype = '6c';
            $attachment->save();
        }
        if ($attachmentName = $request['mischazmat']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->ofd6cid = $id;
            $attachment->attachmenttype = '6c1';
            $attachment->save();
        }

    }

    public function LimiteddutyUpload(Request $request, $id)
    {
        if ($attachmentName = $request['limitedduty']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->limiteddutyid = $id;
            $attachment->attachmenttype = 'ltdduty';
            $attachment->save();
        }
    }

    public function FmlaUpload(Request $request, $id)
    {
        if ($attachmentName = $request['fmla']) {
            $attachment = new Attachment();
            $attachment->attachmentname = $attachmentName;
            $attachment->fmlaid = $id;
            $attachment->attachmenttype = 'fmla';
            $attachment->save();
        }
    }
}
