<?php

namespace App\Action\User;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewProfile;

class MyProfileAction
{

  public function execute($request)
  {
    $user = Auth::user();
    $profile = CrewProfile::where('crew_no',$user->crew_no)->first();


    return $profile;

  }



}
