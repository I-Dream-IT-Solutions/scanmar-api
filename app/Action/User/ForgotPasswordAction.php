<?php

namespace App\Action\User;

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

class ForgotPasswordAction
{

  public function execute($request)
  {

    $record = SystemUser::where('email',$request->get('value'))
                          ->orWhere('alt_email',$request->get('value'))
                          ->orWhere('alt_mobile',$request->get('value'))
                          ->orWhere('mobile_number',$request->get('value'))
                          ->first();

    // $verify = false;

    // if($request->get('type') == 'email'){
    //   $verification_data = [
    //     'email'=>$request->get('value'),
    //     'otp'=>$request->get('otp'),
    //   ];

    //   $value = Cache::get($verification_data['email']);
    //   if($value == $request->otp){
    //     $verify = true;
    //   }

    // }
    // else{
    //   $verification_data = [
    //     'phone_number'=>$request->get('value'),
    //     'code'=>$request->get('otp'),
    //   ];

    //   $action = new OTPSMSVerifyOTPAction();
    //   $actiondata = $action->execute((object) $verification_data);

    //   if($actiondata['status'] == 200)
    //   $verify = true;
    // }

    // if($verify){
        $data = $request->all();
  
        $newData['password'] = Hash::make($request->get('new_password'));

        $record->update($newData);

      return $record;
    // }
    // else{
    //   return response()->json(['message'=>'invalidOTP'], 422);
    // }
  }



}
