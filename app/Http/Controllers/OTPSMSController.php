<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\OTPSMS\OTPSMSRequestOTPAction;
use App\Action\OTPSMS\OTPSMSVerifyOTPAction;

use App\Http\Requests\SMSOTP\SMSOTPRequest;
use App\Http\Requests\SMSOTP\SMSOTPVerifyRequest;
use Auth;
use Validator;
use Log;
use DB;

class OTPSMSController extends Controller
{

    public function requestOTP(SMSOTPRequest $request){
        $action = new OTPSMSRequestOTPAction();
        $data = $action->execute($request);
        return $data;
      }

      public function verifyOTP(SMSOTPVerifyRequest $request){
        $action = new OTPSMSVerifyOTPAction();
        $data = $action->execute($request);
        return $data;
      }

}
