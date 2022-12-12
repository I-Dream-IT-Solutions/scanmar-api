<?php

namespace App\Action\SettingsContact;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\SystemUser;
use Illuminate\Support\Facades\Hash;
use Auth;

class SettingsContactSetDefaultAction
{

  public function execute($request)
  {
    $record = SystemUser::find(Auth::user()->id);
    $data['defaultotp'] = $request->get('value');
    $record->update($data);

    $mobile = [];
    $email = [];
    if($record->mobile_no)
      $mobile[] = $record->mobile_no;

    if($record->altmobile)
      $mobile[] = $record->altmobile;

    if($record->email)
      $email[] = $record->email;

    if($record->alt_email)
      $email[] = $record->alt_email;

    $contact = [
      'mobile'=> $mobile,
      'email'=> $email,
      'default'=>Auth::user()->defaultotp
  	];

    return $contact;
  }



}
