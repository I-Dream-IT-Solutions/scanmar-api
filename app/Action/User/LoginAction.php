<?php

namespace App\Action\User;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewProfile;

class LoginAction
{

  public $successStatus = 200;
  public function execute($request)
  {
    if(Auth::attempt(['username' => request('username'), 'password' => request('password'),'is_crew' =>'Y' ])){
      $user = Auth::user();
      $success['token'] =  $user->createToken('scanmar')->accessToken;
      return response()->json($success, $this->successStatus);
    }
    else{
      return response()->json(['error'=>'Unauthorized'], 401);
    }

  }



}
