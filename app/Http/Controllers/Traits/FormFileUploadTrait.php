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
        if ($attachmentName = $request['CorvelAttachmentName']) {
            $attachment = new Attachment();
            $attachment->attachmentName = $attachmentName;
            $attachment->Injury_ofd6ID = $id;
            $attachment->attachmentType = 'Corvel Work Ability Report';
            $attachment->save();

            if ($attachmentName = $request['InvestigationAttachment']) {
                $attachment = new Attachment();
                $attachment->attachmentName = $attachmentName;
                $attachment->Injury_ofd6ID = $id;
                $attachment->attachmentType = 'Investigation Report for Occupational Injury or Illness';
                $attachment->save();
            }
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

            if ($attachmentName = $request['OFD295']) {
                $attachment = new Attachment();
                $attachment->attachmentName = $attachmentName;
                $attachment->Injury_ofd6ID = $id;
                $attachment->attachmentType = '612';
                $attachment->save();

                if ($attachmentName = $request['OFD025a']) {
                    $attachment = new Attachment();
                    $attachment->attachmentName = $attachmentName;
                    $attachment->Injury_ofd6ID = $id;
                    $attachment->attachmentType = '613';
                    $attachment->save();
                    if ($attachmentName = $request['OFD025b']) {
                        $attachment = new Attachment();
                        $attachment->attachmentName = $attachmentName;
                        $attachment->Injury_ofd6ID = $id;
                        $attachment->attachmentType = '614';
                        $attachment->save();
                        if ($attachmentName = $request['OFD025c']) {
                            $attachment = new Attachment();
                            $attachment->attachmentName = $attachmentName;
                            $attachment->Injury_ofd6ID = $id;
                            $attachment->attachmentType = '615';
                            $attachment->save();

                            if ($attachmentName = $request['OFD31']) {
                                $attachment = new Attachment();
                                $attachment->attachmentName = $attachmentName;
                                $attachment->Injury_ofd6ID = $id;
                                $attachment->attachmentType = '616';
                                $attachment->save();

                                if ($attachmentName = $request['OFD127']) {
                                    $attachment = new Attachment();
                                    $attachment->attachmentName = $attachmentName;
                                    $attachment->Injury_ofd6ID = $id;
                                    $attachment->attachmentType = '617';
                                    $attachment->save();

                                    if ($attachmentName = $request['DR41']) {
                                        $attachment = new Attachment();
                                        $attachment->attachmentName = $attachmentName;
                                        $attachment->Injury_ofd6ID = $id;
                                        $attachment->attachmentType = '618';
                                        $attachment->save();

                                    }

                                }

                            }
                        }
                    }
                }
            }
        }
    }
}
