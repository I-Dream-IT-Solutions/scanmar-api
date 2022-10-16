<?php

namespace App\Action\User;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\SystemUser;
use Illuminate\Support\Facades\Hash;
use App\Rules\MatchOldPassword;
use Validator;


class ChangePasswordAction
{

  public function execute($request)
  {
    $validator = Validator::make($request->all(), [
        'current_password' => ['required', new MatchOldPassword],
        'new_password' => 'required',
        'new_confirm_password' => 'required|same:new_password',
      ]);
    if ($validator->fails()) {
        return response()->json(['error'=>$validator->errors()], 401);
    }
    
    $user_id = Auth::user()->id;
    $user = SystemUser::find($user_id)->update(['password'=> Hash::make($request->new_password)]);

    if($user){
        
        return response(["status" => 200, "message" => "Password changed successfully"]);
        }
        else{
            return response(["status" => 401, 'message' => 'Invalid']);
        }

  }

}
