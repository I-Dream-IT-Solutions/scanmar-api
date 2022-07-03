<?php

namespace App\Action\Profile;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewProfile;

class EmergencyContactUpdateAction
{

  public function execute($request)
  {
    $data = $request->all();

    $profile = CrewProfile::find(Auth::user()->crew_profile_id);

    $profile->update([
      'emerlname'  => isset($data['emerlname'])?$data['emerlname']:null,
      'emerfname'  => isset($data['emerfname'])?$data['emerfname']:null,
      'emermname'  => isset($data['emermname'])?$data['emermname']:null,
      'emeradd'  => isset($data['emeradd'])?$data['emeradd']:null,
      'emerrelat'  => isset($data['emerrelat'])?$data['emerrelat']:null,
      'emertel'  => isset($data['emertel'])?$data['emertel']:null,
    ]);

    return $profile;
  }


}
