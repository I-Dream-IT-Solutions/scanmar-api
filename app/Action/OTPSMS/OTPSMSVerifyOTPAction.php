<?php

namespace App\Action\OTPSMS;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\SystemUser;
use Auth;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

class OTPSMSVerifyOTPAction
{

  public function execute($request)
    {
      // $receiverNumber = "+639171138864";
      $receiverNumber = $request->phone_number;
      try {

          $account_sid = "AC13f382348256d45b532b2fa0bd8988e5";
          $auth_token = "f6847b0d842bd41d0504dbe1acb34a58";
          $twilio_number = "+19288578973";


          $client = new Client($account_sid, $auth_token);


          $verification = $client->verify->v2->services('VA733256db98b67a28ec3f5c6c777823e9')
                                       ->verificationChecks
                                       ->create([
                                                    "to" => $receiverNumber,
                                                    "code" => $request->code
                                                ]
                                       );

          if($verification->status == 'approved')
          return response(["status" => 200, "message" => $verification->status]);
          else
          return response(["status" => 401, 'message' => 'Invalid']);
          // return $verification->status;
      } catch (Exception $e) {
          // dd("Error: ". $e->getMessage());
          return response(["status" => 401, 'message' => 'Invalid']);
      }

    }


}
