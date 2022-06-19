<?php

namespace App\Action\User;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\Entry;
use Auth;

class LoginAction
{

  public $successStatus = 200;
  public $api_key = '$oVnZgwS52sJjLWxebNR44XbXFFGyOZGa';
  public function execute($request)
  {
    if($this->api_key == $request->get('api_key')){
      if(Auth::attempt(['email' => request('email'), 'password' => request('password') ])){
        $user = Auth::user();
        $success['token'] =  $user->createToken('eat-bulaga')->accessToken;
        return response()->json($success, $this->successStatus);
      }
      else{
        return response()->json(['error'=>'Unauthorized'], 401);
      }
    }
    else{
      return response()->json(['error'=>'Unauthorized'], 401);
    }
  }



}
