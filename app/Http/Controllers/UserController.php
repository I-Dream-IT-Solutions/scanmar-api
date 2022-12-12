<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\User\LoginAction;
use App\Action\User\MyProfileAction;
use App\Action\User\RegisterAction;
use App\Action\User\UserChangePasswordAction;
use App\Action\User\ForgotPasswordAction;
use App\Action\User\SetMPINAction;
use App\Http\Requests\User\ChangePasswordRequest;
use App\Http\Requests\User\ForgotPasswordRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\MPINRequest;
use Auth;
use Validator;
use Log;
use DB;
use Illuminate\Support\Facades\Hash;


  class UserController extends Controller
{
  public function login(Request $request){
    $action = new LoginAction();
    $data = $action->execute($request);
    return $data;
  }

  public function register(RegisterRequest $request)
  {
    $action = new RegisterAction();
    $data = $action->execute($request);
    return $data;
  }

  public function setMpin(MPINRequest $request)
  {
    $action = new SetMPINAction();
    $data = $action->execute($request);
    return $data;
  }

  public function myProfile(Request $request)
  {
    $action = new MyProfileAction();
    $data = $action->execute($request);
    return $data;
  }

  public function me(Request $request)
  {
    return Auth::user();
  }

  public function changePassword(ChangePasswordRequest $request){
    $user = Auth::user();
    if (Hash::check($request->get('current_password') == $user->password)) {
      $user->password = Hash::make($request->get('new_password'));
      $user->save();
      return response()->json(['message'=>'success'],200);
    }
      return response()->json(['message'=>'invalid password'],400);
  }

  public function forgotPassword(ForgotPasswordRequest $request){
    $action = new ForgotPasswordAction();
    $data = $action->execute($request);
    return $data;
  }

  public function logout(){
    Auth::logout();
    return response()->json(['status'=>200]);
  }

}
