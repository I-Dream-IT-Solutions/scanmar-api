<?php

namespace App\Action\Profile;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewProfile;

class PersonalInformationUpdateAction
{

  public function execute($request)
  {
    $data = $request->all();

    $profile = CrewProfile::find(Auth::user()->crew_profile_id);

    $profile->update([
      'first_name'  => isset($data['first_name'])?$data['first_name']:null,
      'middle_name'  => isset($data['middle_name'])?$data['middle_name']:null,
      'last_name'  => isset($data['last_name'])?$data['last_name']:null,
      'gender'  => isset($data['gender'])?$data['gender']:null,
      'civil_status'  => isset($data['civil_status'])?$data['civil_status']:null,
      'date_of_birth'  => isset($data['date_of_birth'])?$data['date_of_birth']:null,
      'place_of_birth'  => isset($data['place_of_birth'])?$data['place_of_birth']:null,
      'nationality'  => isset($data['nationality'])?$data['nationality']:null,
      'religion'  => isset($data['religion'])?$data['religion']:null,
      'height'  => isset($data['height'])?$data['height']:null,
      'weight'  => isset($data['weight'])?$data['weight']:null,
      'footsize'  => isset($data['footsize'])?$data['footsize']:null,
      'eyes_color'  => isset($data['eyes_color'])?$data['eyes_color']:null,
      'dismark'  => isset($data['dismark'])?$data['dismark']:null,
      'bloodtype'  => isset($data['bloodtype'])?$data['bloodtype']:null,
      'waistline'  => isset($data['waistline'])?$data['waistline']:null,
      'parka'  => isset($data['parka'])?$data['parka']:null,
      'coverall'  => isset($data['coverall'])?$data['coverall']:null,
      'foreignid'  => isset($data['foreignid'])?$data['foreignid']:null,
      'sss'  => isset($data['sss'])?$data['sss']:null,
      'tin'  => isset($data['tin'])?$data['tin']:null,
      'pagibig'  => isset($data['pagibig'])?$data['pagibig']:null,
      'phealth'  => isset($data['phealth'])?$data['phealth']:null,
      'recommend'  => isset($data['recommend'])?$data['recommend']:null,
      'relation'  => isset($data['relation'])?$data['relation']:null,
    ]);

    return $profile;
  }


}
