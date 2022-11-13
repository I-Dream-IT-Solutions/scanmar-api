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
    $data = $request->all();

    $data['password'] = Hash::make($request->get('new_password'));

    $record->update($data);



    return $record;
  }



}
