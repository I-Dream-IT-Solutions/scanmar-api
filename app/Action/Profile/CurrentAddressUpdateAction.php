<?php

namespace App\Action\Profile;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewProfile;

class CurrentAddressUpdateAction
{

  public function execute($request)
  {
    $data = $request->all();

    $profile = CrewProfile::find(Auth::user()->crew_profile_id);

    $profile->update([
      'address'  => isset($data['address'])?$data['address']:null,
      'address_region_code'  => isset($data['address_region_code'])?$data['address_region_code']:null,
      'address_province_code'  => isset($data['address_province_code'])?$data['address_province_code']:null,
      'address_city_muni_code'  => isset($data['address_city_muni_code'])?$data['address_city_muni_code']:null,
    ]);

    return $profile;
  }


}
