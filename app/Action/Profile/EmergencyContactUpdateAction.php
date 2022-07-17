<?php

namespace App\Action\Profile;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewProfile;
use App\Action\User\MyProfileAction;

class EmergencyContactUpdateAction
{

  public function execute($request)
  {
    $data = $request->all();

    $profile = CrewProfile::find(Auth::user()->crew_profile_id);

    $profile->update([
      'emerlname'  => isset($data['lastName'])?$data['lastName']:null,
      'emerfname'  => isset($data['firstName'])?$data['firstName']:null,
      'emermname'  => isset($data['middleName'])?$data['middleName']:null,
      'emeradd'  => isset($data['address'])?$data['address']:null,
      'emerrelat'  => isset($data['relation'])?$data['relation']:null,
      'emertel'  => isset($data['contact'])?$data['contact']:null,
    ]);

    $action = new MyProfileAction();

    return $action->execute($request);
  }


}
