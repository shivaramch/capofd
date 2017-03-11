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
    //
    public  function Email(Request $request, $link ,$formname ){

        //Get id of the form submitted

        $allemails = new Collection();
        if($formname=="accidents" || $formname=="injuries")

        {


            $captainemail = DB::table('users')->where('ID', $request->captainid)->pluck('email');
            $captainame = DB::table('users')->where('ID', $request->captainid)->pluck('name');
            $BCemail = DB::table('users')->where('ID', $request->battalionChiefid)->pluck('email');
            $BCname = DB::table('users')->where('ID', $request->battalionChiefid)->pluck('name');
            $ACemail = DB::table('users')->where('ID', $request->acOnDuty)->pluck('email');

            $ACname = DB::table('users')->where('ID', $request->acOnDuty)->pluck('name');
            $persons = [];




            if(count($captainemail)) {
                $allemails->push(["$captainemail" => "$captainame"]);
                var_dump("in cp");

            }
            if(count($BCemail)) {
                $allemails->push(["$BCemail" => "$BCname"]);

            }
            if(count($ACemail)) {

                $allemails->push(["$ACemail" => "$ACname"]);


            }


        }





        if($formname=="biologicals" ||$formname=="hazmat"){


            $primaryidconame=DB::table('users')->where('id', $request->primaryidconumber)->pluck('name');
            $primaryidcoemail = DB::table('users')->where('id', $request->primaryidconumber)->pluck('email');

            if(count($primaryidcoemail)) {

                $allemails->push(["$primaryidcoemail" => "$primaryidconame"]);
            }
        }



















        //   var_dump($allemails);
        $superAdmin = new Collection();
        $superAdmin=DB::table('users')->where('roleid',1)->pluck('email','name');

        if(count($superAdmin)!=0) {
            foreach ($superAdmin as $item => $value) {

                $allemails->push(["$value" => "$item"]);
            }

        }

        //Add superadmin email end

        // Configuration
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

        $view = View::make('email_template', [
            'message' => 'Please review the application submitted !','link'=>$link
        ]);

        $html = $view->render();
        $numSent = 0;



        $message = \Swift_Message::newInstance('Omaha Fire Department')
            ->setFrom(['ofdservicedesk@gmail.com' => 'Omaha Fire Department'])
            ->setBody($html, 'text/html');

        foreach ($allemails as $index => $item) {


            foreach ($item as $email => $name) {
                $testemail=str_replace (array('["', '"]'), '', $email);
                //     var_dump($testemail);
                $testname=str_replace (array('["', '"]'), '' ,$name);
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


        return $numSent;
    }

}
