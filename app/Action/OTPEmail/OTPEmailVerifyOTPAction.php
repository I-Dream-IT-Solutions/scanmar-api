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

    $value = Cache::get($request->email);
    if($value == $request->otp){
        return response(["status" => 200, "message" => "Success"]);
    }
    else{
        return response(["status" => 401, 'message' => 'Invalid']);
    }

  }



}
