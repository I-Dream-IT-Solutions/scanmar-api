<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\OTPEmail\OTPEmailRequestOTPAction;
use App\Action\OTPEmail\OTPEmailVerifyOTPAction;
use Auth;
use Validator;
use Log;
use DB;

class OTPEmailController extends Controller
{

    public function requestOTP(Request $request){
        $action = new OTPEmailRequestOTPAction();
        $data = $action->execute($request);
        return $data;
      }
    
      public function verifyOTP(Request $request){
        $action = new OTPEmailVerifyOTPAction();
        $data = $action->execute($request);
        return $data;
      }
    
}
