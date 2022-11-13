<?php

namespace App\Action\CrewContact;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\CrewProfile;
use Auth;

class CrewPrimaryContactListAction
{

  public function execute($request)
  {

    $profile = CrewProfile::where('id',Auth::user()->crew_profile_id)->with(['barangay','province','city','prov_barangay','prov_province','prov_city','position'])->first();

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

    $records = [
      'mobile'=> $mobile,
      'email'=> $email
  	];

    return $records;

  }

}
