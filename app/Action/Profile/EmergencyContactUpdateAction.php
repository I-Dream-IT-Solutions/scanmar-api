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

    $metadata = str_replace('\\','',$profile->metadata);
    $metadata = json_decode($metadata,true);

    $profile->fill([
      'emerlname'  => isset($data['lastName'])?$data['lastName']:null,
      'emerfname'  => isset($data['firstName'])?$data['firstName']:null,
      'emermname'  => isset($data['middleName'])?$data['middleName']:null,
      'emeradd'  => isset($data['address'])?$data['address']:null,
      'emerrelat'  => isset($data['relation'])?$data['relation']:null,
      'emertel'  => isset($data['contact'])?$data['contact']:null,
    ]);

    $changes = $profile->getDirty();

    $changes = array_merge($metadata,$changes);
    $profile = CrewProfile::find(Auth::user()->crew_profile_id);
    $profile->metadata = json_encode($changes);
    $profile->save();

    $action = new MyProfileAction();

    return $action->execute($request);
  }


}
