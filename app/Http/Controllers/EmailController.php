<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Mail;
use View;


use App\user_role;
use Illuminate\Database\Eloquent\Model;
use App\Injury;
use App\user_login;

use App\Http\Requests\StoreStationsRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\Collection;


use Auth;


class EmailController extends Controller
{


    public function Email( $request, $link, $formname, $appstatus)
    {

        $personname = null;
        $personemail = null;
        $templateform = null;
        $approvalemails = new Collection();
        $superadminemails = new Collection();
        $numSent = 0;
        $extracontent = null;
        $personid = null;
        var_dump($appstatus);

        $currentformstatus = DB::table('status')->where('statusid', $appstatus)->value('statustype');

       // var_dump($link);
       // var_dump($request1);
      //  var_dump($formname);


        //approval for injuries and accidents is same->C,BC,AC
        //approval for biologicals and hazmat is same->primaryidconumber

        /*
         * Accidents and Injuries
         * Firefighter fills form Injuries->personnel id Accidents->Driver id
         *Mail is sent to super admin saying name of fire fighter has submitted email to captain name on time and status of form
         * Mail is sent to captain  when appcn status is 2 for approval saying firegighter with id has submitted email with link please approve
         *Similarly to BC when sts is 3 and AC sts is 4
         *Approval email is sent to super admin and also firefighter
         * Rejection email is sent to super admin and also firefighter
         */

        if ($formname == "accidents" || $formname == "injuries") {

            //Get the firefighter information and add his email in list
            //FFEmail func->sets person name and email and also gives sets email for firefighter
            //Use FFEmail only when the form status is approved or rejected
            if ($appstatus == 5) {


                list($FFemails,$FFid,$FFName,$templateform)=(new EmailController)->FireFEmail($request,$formname);

                 $extracontent="Your application has been Rejected";

                (new EmailController)->SendEmail($FFemails,$templateform,$link,$FFid,$FFName,$extracontent,$appstatus);
                (new EmailController)->SuperAdminEmail($request,$templateform,$link,$appstatus,$FFName,$FFid);
            }

            if ($appstatus == 6) {


                list($FFemails,$FFid,$FFName,$templateform)=(new EmailController)->FireFEmail($request,$formname);
                var_dump($FFemails);
                var_dump($FFName);
                $extracontent="Your application has been Approved";
              (new EmailController)->SendEmail($FFemails,$templateform,$link,$FFid,$FFName,$extracontent,$appstatus);
                (new EmailController)->SuperAdminEmail($request,$templateform,$link,$appstatus,$FFName,$FFid);
            }


            if($appstatus==2){
                $extracontent="Please review carefully as part of approval process and make a decision.";
                list($FFemails,$FFid,$FFName,$templateform)=(new EmailController)->FireFEmail($request,$formname);
                list($captainemail,$captainname)=(new EmailController)->CapApproval($request);
                (new EmailController)->SendEmail($captainemail,$templateform,$link,$FFid,$FFName,$extracontent,$appstatus);
               (new EmailController)->SuperAdminEmail($request,$templateform,$link,$appstatus,$FFName,$FFid);
            }

            if($appstatus==3){
                $extracontent="Please review carefully as part of approval process and make a decision.";
                list($FFemails,$FFid,$FFName,$templateform)=(new EmailController)->FireFEmail($request,$formname);
                list($BCemail,$BCname)=(new EmailController)->BCApproval($request);

                (new EmailController)->SendEmail($BCemail,$templateform,$link,$FFid,$FFName,$extracontent,$appstatus);
               (new EmailController)->SuperAdminEmail($request,$templateform,$link,$appstatus,$FFName,$FFid);
            }

            if($appstatus==4){
                $extracontent="Please review carefully as part of approval process and make a decision.";
                list($FFemails,$FFid,$FFName,$templateform)=(new EmailController)->FireFEmail($request,$formname);
                  list($ACemail,$ACname)=(new EmailController)->ACApproval($request);
              //  var_dump($ACemail);
                 (new EmailController)->SendEmail($ACemail,$templateform,$link,$FFid,$FFName,$extracontent,$appstatus);
               (new EmailController)->SuperAdminEmail($request,$templateform,$link,$appstatus,$FFName,$FFid);
            }


        }



        if ($formname == "biologicals" || $formname == "hazmat") {
//primaryidco
            if($appstatus==2){
                $extracontent="Please review carefully as part of approval process and make a decision.";
                list($FFemails,$FFid,$FFName,$templateform)=(new EmailController)->FireFEmail($request,$formname);

                list($PIdcoemail,$PIdconame)=(new EmailController)->PIdcoApproval($request);
                (new EmailController)->SendEmail($PIdcoemail,$templateform,$link,$FFid,$FFName,$extracontent,$appstatus);
                (new EmailController)->SuperAdminEmail($request,$templateform,$link,$appstatus,$FFName,$FFid);
            }

            if ($appstatus == 6) {


                list($FFemails,$FFid,$FFName,$templateform)=(new EmailController)->FireFEmail($request,$formname);
                $extracontent="Your application has been Approved";
                (new EmailController)->SendEmail($FFemails,$templateform,$link,$FFid,$FFName,$extracontent,$appstatus);
                (new EmailController)->SuperAdminEmail($request,$templateform,$link,$appstatus,$FFName,$FFid);
            }

            if ($appstatus == 5) {


                list($FFemails,$FFid,$FFName,$templateform)=(new EmailController)->FireFEmail($request,$formname);
                $extracontent="Your application has been Rejected";
                (new EmailController)->SendEmail($FFemails,$templateform,$link,$FFid,$FFName,$extracontent,$appstatus);
                (new EmailController)->SuperAdminEmail($request,$templateform,$link,$appstatus,$FFName,$FFid);
            }

        }




    }


    public function  SendEmail($allemails,$templateform,$link,$personid,$personname,$extracontent,$formstatus){

        //if super admin use different template

        //if others use one single same template

        //if form status is rejected or approved


        //

        $smtpAddress = 'smtp.gmail.com';
        $port = 587;
        $encryption = 'tls';
        $yourEmail = 'ofdservicedesk@gmail.com';
        $yourPassword = 'Mesh2017';

        // Prepare transport
        $transport = \Swift_SmtpTransport::newInstance($smtpAddress, $port, $encryption)
            ->setUsername($yourEmail)
            ->setPassword($yourPassword);

        $mailer = \Swift_Mailer::newInstance($transport);
        foreach ($allemails as $index => $item) {

            foreach ($item as $email => $name) {
                $testemail=str_replace (array('["', '"]'), '', $email);
                //     var_dump($testemail);
                $testname=str_replace (array('["', '"]'), '' ,$name);
               /* $view = View::make('email_template', [
                    'message'=>$templateform.'Report Tracking Document Submitted',
                    'link'=>$link,'firefighter'=>str_replace (array('["', '"]'), '', $personname),
                    'formname'=>$templateform,'officername'=>$testname,'content'=>$extracontent,'personid'=>$personid
                ]);*/


                $view = View::make('email_template', [
                    'message'=>$templateform.'Report Tracking Document Submitted',
                    'link'=>$link,'firefighter'=>str_replace (array('["', '"]'), '', $personname),
                    'formname'=>$templateform,'officername'=>$testname,'content'=>$extracontent,'personid'=>$personid,'appstatus'=>$formstatus,'personname'=>$personname,'superadmin'=>'no'
                ]);

                $html = $view->render();
                $numSent = 0;



                $message = \Swift_Message::newInstance($templateform.'Report Tracking Document Submitted')
                    ->setFrom(['ofdservicedesk@gmail.com' =>'Omaha Fire Department' ])
                    ->setBody($html, 'text/html');


                //     var_dump($testname);
                //
                //
                //      var_dump("$testemail" ."$testname");

                if (is_int($email)) {
                    $message->setTo($name);
                } else {
                    $message->setTo(array($testemail => $testname));

                }

                $numSent += $mailer->send($message, $failedRecipients);
            }

            printf("Sent %d messages\n", $numSent);

        }







    }


    public function PIdcoApproval($request)
    {
        $pidcoemails=new Collection();
        $primaryidconame=DB::table('users')->where('id', $request->primaryidconumber)->pluck('name');
        $primaryidcoemail = DB::table('users')->where('id', $request->primaryidconumber)->pluck('email');

        if(count($primaryidcoemail)) {
            var_dump($primaryidconame);
            $pidcoemails->push(["$primaryidcoemail" => "$primaryidconame"]);
        }
        return array($pidcoemails,$primaryidconame);
    }

    public function CapApproval($request)
    {

        //Captainemail
        $captainemails=new Collection();
        $captainemail = DB::table('users')->where('id', $request->captainid)->pluck('email');
        $captainame = DB::table('users')->where('id', $request->captainid)->pluck('name');
        if (count($captainemail)) {
            $captainemails->push(["$captainemail" => "$captainame"]);
            //     var_dump("in cp");
        }

        return array($captainemails,$captainame);

    }


    public function BCApproval($request)
    {
        $BCemails=new Collection();
        $BCemail = DB::table('users')->where('id', $request->battalionchiefid)->pluck('email');
        $BCname = DB::table('users')->where('id', $request->battalionchiefid)->pluck('name');
        if (count($BCemail)) {
            $BCemails->push(["$BCemail" => "$BCname"]);

        }
        return array($BCemails,$BCname);

    }

    public function ACApproval($request)
    {
        $ACemails=new Collection();
        $ACemail = DB::table('users')->where('id', $request->aconduty)->pluck('email');

        $ACname = DB::table('users')->where('id', $request->aconduty)->pluck('name');

        if (count($ACemail)) {

            $ACemails->push(["$ACemail" => "$ACname"]);


        }
        return array($ACemails,$ACname);
    }

//(new EmailController)->SuperAdminEmail($request,$formname,$link,$appstatus);
    public function SuperAdminEmail($SAdminrequest,$templateform,$link,$formstatus,$personname,$personid)
    {
        $currentformstatus = DB::table('status')->where('statusid', $formstatus)->value('statustype');
        $superAdmin = new Collection();
        $superAdminEmails=new Collection();
        $superAdmin=DB::table('users')->where('roleid',1)->pluck('email','name');

        if(count($superAdmin)!=0) {
            foreach ($superAdmin as $item => $value) {

                $superAdminEmails->push(["$value" => "$item"]);
            }
        }


        //send email to all super admins
//
        $smtpAddress = 'smtp.gmail.com';
        $port = 587;
        $encryption = 'tls';
        $yourEmail = 'ofdservicedesk@gmail.com';
        $yourPassword = 'Mesh2017';

        // Prepare transport
        $transport = \Swift_SmtpTransport::newInstance($smtpAddress, $port, $encryption)
            ->setUsername($yourEmail)
            ->setPassword($yourPassword);

        $mailer = \Swift_Mailer::newInstance($transport);


        // Prepare content
        foreach ($superAdminEmails as $index => $item) {


            foreach ($item as $email => $name) {
                $testemail=str_replace (array('["', '"]'), '', $email);
                //     var_dump($testemail);
                $testname=str_replace (array('["', '"]'), '' ,$name);
             /*   $view = View::make('email_template', [
                    'message'=>$templateform.'Report Tracking Document Submitted',
                    'link'=>$link,'firefighter'=>str_replace (array('["', '"]'), '', $personname),
                    'formname'=>$templateform,'officername'=>$testname,'content'=>$extracontent,'personid'=>$personid
                ]);*/

                $view = View::make('email_template', [
                    'message'=>$templateform.'Report Tracking Document Submitted',
                    'link'=>$link,'firefighter'=>str_replace (array('["', '"]'), '', $personname),
                    'formname'=>$templateform,'superadminname'=>$testname,'personid'=>$personid,'appstatus'=>$formstatus,'personname'=>$personname,'superadmin'=>'yes'
                    ,'statustype'=> $currentformstatus
                ]);
                $html = $view->render();
                $numSent = 0;



                $message = \Swift_Message::newInstance($templateform.'Report Tracking Document Submitted')
                    ->setFrom(['ofdservicedesk@gmail.com' =>'Omaha Fire Department' ])
                    ->setBody($html, 'text/html');


                //     var_dump($testname);
                //
                //
                //      var_dump("$testemail" ."$testname");

                if (is_int($email)) {
                    $message->setTo($name);
                } else {
                    $message->setTo(array($testemail => $testname));

                }

                $numSent += $mailer->send($message, $failedRecipients);
            }

            printf("Sent %d messages\n", $numSent);

        }



        //all mails end

    }

    public function FireFEmail( $FFrequest, $frmname)
    {
        $FFemails = new Collection();

        if ($frmname == "accidents") {
            $personemail = DB::table('users')->where('id', $FFrequest->driverid)->pluck('email');
            $personname = DB::table('users')->where('id', $FFrequest->driverid)->pluck('name');
            $personid = $FFrequest->driverid;

     //       var_dump($personname);

            $templateform = "OFD 6A";
            if (count($personemail)) {

                $FFemails->push(["$personemail" => "$personname"]);
            }

            return array($FFemails,$personid,$personname,$templateform);
        }

        if ($frmname == "injuries") {

            $templateform = "OFD 6";
            $personemail = DB::table('users')->where('id', $FFrequest->injuredemployeeid)->pluck('email');
            $personname = DB::table('users')->where('id', $FFrequest->injuredemployeeid)->pluck('name');
            $personid=$FFrequest->injuredemployeeid;
            if (count($personemail)) {

                $FFemails->push(["$personemail" => "$personname"]);
            }
            return array($FFemails,$personid,$personname,$templateform);

        }

        if ($frmname == "biologicals") {
            $personemail =DB::table('users')->where('id', $FFrequest->employeeid)->pluck('email');
            $personname= DB::table('users')->where('id', $FFrequest->employeeid)->pluck('name');
            $personid=$FFrequest->employeeid;
            $templateform="OFD 6B";
            if(count($personemail)){

                $FFemails->push(["$personemail" => "$personname"]);
            }
            return array($FFemails,$personid,$personname,$templateform);
        }

        if ($frmname == "hazmat") {

            $personemail =DB::table('users')->where('id', $FFrequest->employeeid)->pluck('email');
            $personname= DB::table('users')->where('id', $FFrequest->employeeid)->pluck('name');
            $personid=$FFrequest->employeeid;
            $templateform="OFD 6C";
            if(count($personemail)){

                $FFemails->push(["$personemail" => "$personname"]);
            }
            return array($FFemails,$personid,$personname,$templateform);
        }


    }


}
