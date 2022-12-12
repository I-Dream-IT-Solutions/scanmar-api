<?php

namespace App\Action\SettingsContact;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\SystemUser;
use App\Models\CrewProfile;
use App\Action\OTPEmail\OTPEmailVerifyOTPAction;
use App\Action\OTPSMS\OTPSMSVerifyOTPAction;
use Illuminate\Support\Facades\Hash;
use Auth;
use Cache;
use Twilio\Rest\Client;

class SettingsContactCreateAction
{

  public function execute($request)
  {

    $record = SystemUser::find(Auth::user()->id);
    $profile = CrewProfile::where('id',$record->crew_profile_id)->first();

    $verify = false;

    if($request->get('type') == 'email'){
      $verification_data = [
        'email'=>$request->get('value'),
        'otp'=>$request->get('otp'),
      ];

      $value = Cache::get($verification_data['email']);
      if($value == $request->otp){
        $verify = true;
      }

    }
    else{
      // $verification_data = [
      //   'phone_number'=>$request->get('value'),
      //   'code'=>$request->get('otp'),
      // ];

      try {

        $account_sid = "AC13f382348256d45b532b2fa0bd8988e5";
        $auth_token = "f6847b0d842bd41d0504dbe1acb34a58";
        $twilio_number = "+19288578973";


        $client = new Client($account_sid, $auth_token);


        $verification = $client->verify->v2->services('VA733256db98b67a28ec3f5c6c777823e9')
                                     ->verificationChecks
                                     ->create([
                                                  "to" => $request->get('value'),
                                                  "code" => $request->otp
                                              ]
                                     );
        $verify = true;
        // return $verification->status;
    } catch (Exception $e) {
        // dd("Error: ". $e->getMessage());
        return response(["status" => 401, 'message' => 'Invalid']);
    }

      
      // $action = new OTPSMSVerifyOTPAction();
      // $actiondata = $action->execute((object) $verification_data);
      // $actiondata = $actiondata->json();
      // $actiondata = json_decode($actiondata);
      // if($actiondata['status'] == 200)
      
    }

    if($verify){
      if($request->get('type') == 'email'){
        if(!$record->email){
          $record->email = $request->get('value');
          $profile->email = $request->get('value');

        }
        else if(!$record->alt_email){
          $record->alt_email = $request->get('value');
          $profile->alt_email = $request->get('value');
        }
      }else{
        if(!$record->mobile_number){
          $record->mobile_number = $request->get('value');
          $profile->mobile_no = $request->get('value');

        }
        else if(!$record->alt_mobile){
          $record->alt_mobile = $request->get('value');
          $profile->altmobile = $request->get('value');

        }
      }
      $record->save();
      $profile->save();

      $mobile = [];
      $email = [];
      if($profile->mobile_no)
      $mobile[] = $profile->mobile_no;

      if($profile->altmobile)
      $mobile[] = $profile->altmobile;

      if($profile->email)
      $email[] = $profile->email;

      if($profile->alt_email)
      $email[] = $profile->alt_email;

      $contact = [
        'mobile'=> $mobile,
        'email'=> $email,
        'default'=>Auth::user()->defaultotp
      ];

      return $contact;
    }
    else{
      return response()->json(['message'=>'invalidOTP'], 422);
    }
  }



}
