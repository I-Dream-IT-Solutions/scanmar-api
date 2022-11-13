<?php

namespace App\Action\User;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\SystemUser;
use Illuminate\Support\Facades\Hash;
use Auth;

class SetMPINAction
{

  public function execute($request)
  {
    $record = SystemUser::find(Auth::user()->id);
    // $data = $request->all();
    $data['defaultmpin'] = $request->get('mpin');
    $record->update($data);

    return $record;
  }



}
