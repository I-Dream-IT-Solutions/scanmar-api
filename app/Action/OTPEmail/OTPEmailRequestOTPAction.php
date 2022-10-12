<?php

namespace App\Action\OTPEmail;

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
use App\Mail\sendEmail;

class OTPEmailRequestOTPAction
{
  
  public function execute($request)
    {

        $otp = rand(1000,9999);
        Log::info("otp = ".$otp);
        // $user = SystemUser::where('email','=','harvzmendoza.dev@gmail.com')->update(['otp' => $otp]);
        $user = SystemUser::where('email','=',$request->email)->update(['otp' => $otp]);

        if($user){

        $mail_details = [
            'subject' => 'Testing Application OTP',
            'body' => 'Your OTP is : '. $otp
        ];
        
        \Mail::to($request->email)->send(new sendEmail($mail_details));
        
        return response(["status" => 200, "message" => "OTP sent successfully"]);
        }
        else{
            return response(["status" => 401, 'message' => 'Invalid']);
        }

    }


}
