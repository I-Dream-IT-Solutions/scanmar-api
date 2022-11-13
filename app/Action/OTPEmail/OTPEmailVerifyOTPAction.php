<?php

namespace App\Action\OTPEmail;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\SystemUser;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmail;
use Cache;

class OTPEmailVerifyOTPAction
{

  public function execute($request)
  {

    // $user  = SystemUser::where([['email','=','harvzmendoza.dev@gmail.com'], $request->otp])->first();

    // $user  = SystemUser::where([['email','=',$request->email],['otp','=',$request->otp]])->first();
    $value = Cache::get($request->email);
    if($value == $request->otp){
        // auth()->login($user, true);
        // SystemUser::where('email','=','harvzmendoza.dev@gmail.com')->update(['otp' => null]);
        // SystemUser::where('email','=',$request->email)->update(['otp' => null]);

        return response(["status" => 200, "message" => "Success"]);
    }
    else{
        return response(["status" => 401, 'message' => 'Invalid']);
    }

  }



}
