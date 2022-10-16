<?php

namespace App\Action\Profile;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewProfile;
use App\Action\User\MyProfileAction;
use Storage;

class PersonalInformationUpdateAction
{

  public function execute($request)
  {
    $data = $request->all();
    info($request->all());
    $profile = CrewProfile::find(Auth::user()->crew_profile_id);

    $photo = $profile->photo;
    if ($request->hasFile('photo')) {
      $file = $request->file("photo");
      $newFilename = time() . '.' . $file->getClientOriginalName();
      $path = Storage::put($newFilename,file_get_contents($file));
      $photo = $newFilename;
    }

    $metadata = str_replace('\\','',$profile->metadata);
    $metadata = json_decode($metadata,true);

    $profile->fill([
      'photo'  => $photo,
      'first_name'  => isset($data['firstName'])?$data['firstName']:null,
      'middle_name'  => isset($data['middleName'])?$data['middleName']:null,
      'last_name'  => isset($data['lastName'])?$data['lastName']:null,
      'gender'  => isset($data['gender'])?$data['gender']:null,
      'civil_status'  => isset($data['civilStatus'])?$data['civilStatus']:null,
      'date_of_birth'  => isset($data['birthday'])?date('Y-m-d',strtotime($data['birthday'])):null,
      'place_of_birth'  => isset($data['placeOfBirth'])?$data['placeOfBirth']:null,
      'nationality'  => isset($data['nationality'])?$data['nationality']:null,
      'religion'  => isset($data['religion'])?$data['religion']:null,
      'height'  => isset($data['height'])?$data['height']:null,
      'weight'  => isset($data['weight'])?$data['weight']:null,
      'footsize'  => isset($data['footSize'])?$data['footSize']:null,
      'eyes_color'  => isset($data['eyesColor'])?$data['eyesColor']:null,
      'dismark'  => isset($data['dismark'])?$data['dismark']:null,
      'bloodtype'  => isset($data['bloodType'])?$data['bloodType']:null,
      'waistline'  => isset($data['waistline'])?$data['waistline']:null,
      'parka'  => isset($data['parka'])?$data['parka']:null,
      'coverall'  => isset($data['coverAll'])?$data['coverAll']:null,
      'foreignid'  => isset($data['foreignId'])?$data['foreignId']:null,
      'sss'  => isset($data['sss'])?$data['sss']:null,
      'tin'  => isset($data['tin'])?$data['tin']:null,
      'pagibig'  => isset($data['pagibig'])?$data['pagibig']:null,
      'phealth'  => isset($data['philhealth'])?$data['philhealth']:null,
      'recommend'  => isset($data['recommendedBy'])?$data['recommendedBy']:null,
      'relation'  => isset($data['relation'])?$data['relation']:null,
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
