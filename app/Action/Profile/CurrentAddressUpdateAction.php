<?php

namespace App\Action\Profile;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewProfile;
use App\Action\User\MyProfileAction;

class CurrentAddressUpdateAction
{

  public function execute($request)
  {
    $data = $request->all();

    $profile = CrewProfile::find(Auth::user()->crew_profile_id);

    $metadata = str_replace('\\','',$profile->metadata);
    $metadata = json_decode($metadata,true);

    $profile->fill([
      'address'  => isset($data['address'])?$data['address']:null,
      'address_province_code'  => isset($data['provinceCode'])?$data['provinceCode']:null,
      'address_city_muni_code'  => isset($data['cityCode'])?$data['cityCode']:null,
      'address_barangay_code'  => isset($data['barangayCode'])?$data['barangayCode']:null,
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
