<?php

namespace App\Action\User;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\SystemUser;
use Illuminate\Support\Facades\Hash;

class UserChangePasswordAction
{

  public function execute($request)
  {
    $record = SystemUser::find(Auth::user()->id);
    
    if(Hash::make($input['current_password'] == $record->get('current_password'))){
      $data = $request->all();
  
      $data['password'] = Hash::make($request->get('new_password'));
  
      $record->update($data);
  
      return $record;

    }
    else{
      return response()->json(['message'=>'invalidPassword'], 422);
    }
  }



}
