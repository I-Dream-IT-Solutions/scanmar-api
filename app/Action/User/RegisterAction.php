<?php

namespace App\Action\User;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\User;
use Validator;

class RegisterAction
{

  public $successStatus = 200;
  public function execute($request)
  {
    $validator = Validator::make($request->all(), [
      'first_name' => 'required',
      'last_name' => 'required',
      'email' => 'required|unique:users',
      'password' => 'required',
      'c_password' => 'required|same:password',
    ]);
    if ($validator->fails()) {
      return response()->json(['error'=>$validator->errors()], 401);
    }
    $input = $request->all();
    $input['password'] = bcrypt($input['password']);
    unset($input['c_password']);
    $user = User::create($input);
    $success['token'] =  $user->createToken('eat-bulaga')->accessToken;
    $success['name'] =  $user->name;
    return response()->json(['success'=>$success], $this->successStatus);
  }



}
