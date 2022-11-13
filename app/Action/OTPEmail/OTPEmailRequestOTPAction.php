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
use Cache;

class OTPEmailRequestOTPAction
{

  public function execute($request)
    {

        $otp = rand(100000,999999);

        // $user = SystemUser::where('email','=',$request->email)->update(['otp' => $otp]);
        Cache::put($request->email, $otp);

        $mail_details = [
            'subject' => 'Scanmar OTP',
            'body' => 'Your OTP is : '. $otp
        ];
        info($request->email);
        \Mail::to($request->email)->send(new sendEmail($mail_details));
        info($mail_details);
        return response(["status" => 200, "message" => "OTP sent successfully"]);
        // }
        // else{
        //     return response(["status" => 401, 'message' => 'Invalid']);
        // }

    }


}
