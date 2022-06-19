<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\User\LoginAction;
use App\Action\Users\ListOfUsers;
use Auth;
use Validator;
use Log;
use DB;


class UserController extends Controller
{
  public function login(Request $request){
    $action = new LoginAction();
    $data = $action->execute($request);
    return $data;
  }

  public function register(Request $request)
  {
    $action = new RegisterAction();
    $data = $action->execute($request);
    return $data;
  }

  public function me(Request $request)
  {

    return Auth::user();
  }

  public function logout(){
    Auth::logout();
    return response()->json(['status'=>200]);
  }

}
