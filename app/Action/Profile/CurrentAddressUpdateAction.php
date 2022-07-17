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

    $profile->update([
      'address'  => isset($data['address'])?$data['address']:null,
      'address_province_code'  => isset($data['provinceCode'])?$data['provinceCode']:null,
      'address_city_muni_code'  => isset($data['cityCode'])?$data['cityCode']:null,
      'address_barangay_code'  => isset($data['barangayCode'])?$data['barangayCode']:null,
    ]);

    $action = new MyProfileAction();

    return $action->execute($request);
  }


}
