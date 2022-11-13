<?php

namespace App\Action\Profile;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewProfile;
use App\Action\User\MyProfileAction;
use App\Models\MasterProfileApprovalFields;
use Storage;
use App\Action\Notification\NotificationCreateAction;
use Http;

class PersonalInformationUpdateAction
{

  public function execute($request)
  {
    $data = $request->all();
    $profile = CrewProfile::find(Auth::user()->crew_profile_id);

    $forApprovals = MasterProfileApprovalFields::get()->pluck('fieldname')->toArray();

    $photo = $profile->getOriginal('photo');
    if($profile->getOriginal('tmp_photo'))
      $photo = $profile->getOriginal('tmp_photo');

    if ($request->hasFile('photo')) {

      $file = $request->file("photo");
      $response = Http::attach(
        'file', file_get_contents($file),$file->getClientOriginalName().'.'.$file->extension()
          )->post('https://scanmar.ph/crew-application/api/doc/upload',['crew_no'=>Auth::user()->crew_no]);

      // $newFilename = time() . '.' . $file->getClientOriginalName();
      // $path = Storage::put($newFilename,file_get_contents($file));
      // $photo = $newFilename;
        $photo = $response['file_name'];

    }

    // $metadata = str_replace('\\','',$profile->metadata);
    // $metadata = json_decode($metadata,true);


    $newData = [
      // 'tmp_photo'  => $photo,
      'first_name'  => isset($data['firstName'])?$data['firstName']:'',
      'middle_name'  => isset($data['middleName'])?$data['middleName']:'',
      'last_name'  => isset($data['lastName'])?$data['lastName']:'',
      'gender'  => isset($data['gender'])?substr($data['gender'], 0, 1):'',
      'civil_status'  => isset($data['civilStatus'])?$data['civilStatus']:'',
      'date_of_birth'  => isset($data['birthday'])?date('Y-m-d',strtotime($data['birthday'])):'',
      'place_of_birth'  => isset($data['placeOfBirth'])?$data['placeOfBirth']:'',
      'nationality'  => isset($data['nationality'])?$data['nationality']:'',
      'religion'  => isset($data['religion'])?$data['religion']:'',
      'height'  => isset($data['height'])?$data['height']:'',
      'weight'  => isset($data['weight'])?$data['weight']:'',
      'footsize'  => isset($data['footSize'])?$data['footSize']:'',
      'eyes_color'  => isset($data['eyesColor'])?$data['eyesColor']:'',
      'dismark'  => isset($data['dismark'])?$data['dismark']:'',
      'bloodtype'  => isset($data['bloodType'])?$data['bloodType']:'',
      'waistline'  => isset($data['waistline'])?$data['waistline']:'',
      'parka'  => isset($data['parka'])?$data['parka']:'',
      'coverall'  => isset($data['coverAll'])?$data['coverAll']:'',
      'foreignid'  => isset($data['foreignId'])?$data['foreignId']:'',
      'sss'  => isset($data['sss'])?$data['sss']:'',
      'tin'  => isset($data['tin'])?$data['tin']:'',
      'pagibig'  => isset($data['pagibig'])?$data['pagibig']:'',
      'phealth'  => isset($data['philhealth'])?$data['philhealth']:'',
      'recommend'  => isset($data['recommendedBy'])?$data['recommendedBy']:'',
      'relation'  => isset($data['relation'])?$data['relation']:'',
    ];

    if ($request->hasFile('photo'))
      $newData['tmp_photo'] = $photo;

    $newMetadata = [];
    $setValue = [];
    foreach($newData as $key => $value){
      if(in_array($key,$forApprovals))
        $newMetadata[$key] = $value;
      else
        $setValue[$key] = $value;
    }

    // if($metadata)
    // $changes = array_merge($metadata,$newMetadata);
    $profile->fill($setValue);
    $profile->metadata = json_encode($newMetadata);
    if(count($newMetadata))
    $profile->status = config('constants.STAT_FOR_APPROVAL');
    $profile->save();

    if(count($newMetadata)){
      $notifData =[
        'id'=>$profile->id,
        'name'=>$profile->first_name.' '.$profile->last_name,
      ];
      $notif_action = new NotificationCreateAction();
      $notif_action->execute($notifData,'edit_profile');
    }

    $action = new MyProfileAction();

    return $action->execute($request);
  }


}
