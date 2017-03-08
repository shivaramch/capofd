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
    public  function Email(Request $request, $link  ){

        //Get id of the form submitted

        //Make collection which will store emails of all people for whom email is to be sent
        $allemails = new Collection();

        $captainemail = DB::table('users')->where('ID', $request->captainID)->pluck('Email');
        $captainame = DB::table('users')->where('ID', $request->captainID)->pluck('Name');
        $BCemail = DB::table('users')->where('ID', $request->battalionChiefID)->pluck('Email');
        $BCname = DB::table('users')->where('ID', $request->battalionChiefID)->pluck('Name');
        $ACemail = DB::table('users')->where('ID', $request->acOnDutyID)->pluck('Email');

        $ACname = DB::table('users')->where('ID', $request->acOnDutyID)->pluck('Name');
        $persons = [];

        $allemails = collect();
        if(!isEmptyOrNullString($captainemail)) {
            $allemails->push(["$captainemail" => "$captainame"]);
        }
        if(!isEmptyOrNullString($BCemail)) {
            $allemails->push(["$BCemail" => "$BCname"]);
        }
        var_dump($ACemail);
        if(!isEmptyOrNullString($ACemail)) {

            $allemails->push(["$ACemail" => "$ACname"]);
        }
        //   var_dump($allemails);


        //Add superadmin email
        $superAdmin = new Collection();
        $superAdmin=DB::table('users')

            ->Join('user_role', 'User_Role_roleID', '=', 'user_role.RoleID')
            ->where('User_Role_roleID',1)->pluck('Email','Name');


        foreach ($superAdmin as $item=>$value){
            //$allemails->push([""=>""]);
            $allemails->push(["$value" => "$item"]);
            //   var_dump(["$value" => "$item"]);

        }
        var_dump($allemails);

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
