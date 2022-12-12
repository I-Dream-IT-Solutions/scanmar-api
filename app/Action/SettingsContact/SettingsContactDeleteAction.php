<?php

namespace App\Action\SettingsContact;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\SystemUser;
use App\Models\CrewProfile;
use Illuminate\Support\Facades\Hash;
use Auth;

class SettingsContactDeleteAction
{

  public function execute($request)
  {

    $record = SystemUser::find(Auth::user()->id);
    $profile = CrewProfile::where('id',$record->crew_profile_id)->first();
    if($record->email == $request->get('value') || $profile->email == $request->get('value')){
      $record->email = '';
      $profile->email = '';
    }
    if($record->alt_email == $request->get('value') || $profile->alt_email == $request->get('value')){
      $record->alt_email = '';
      $profile->alt_email = '';
    }
    if($record->mobile_number == $request->get('value') || $profile->mobile_no == $request->get('value')){
      $record->mobile_number = '';
      $profile->mobile_no = '';
    }
    if($record->alt_mobile == $request->get('value') || $profile->altmobile == $request->get('value')){
      $record->alt_mobile = '';
      $profile->altmobile = '';
    }

    $record->save();
    $profile->save();

    $mobile = [];
    $email = [];
    if($profile->mobile_no)
      $mobile[] = $profile->mobile_no;

    if($profile->altmobile)
      $mobile[] = $profile->altmobile;

    if($profile->email)
      $email[] = $profile->email;

    if($profile->alt_email)
      $email[] = $profile->alt_email;

    $contact = [
      'mobile'=> $mobile,
      'email'=> $email,
      'default'=>Auth::user()->defaultotp
  	];

    return $contact;
  }



}
