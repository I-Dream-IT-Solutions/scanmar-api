<?php

namespace App\Action\Profile;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewProfile;
use App\Action\User\MyProfileAction;
use App\Models\MasterProfileApprovalFields;
use App\Action\Notification\NotificationCreateAction;

class CurrentAddressUpdateAction
{

  public function execute($request)
  {
    $data = $request->all();
    $sendNotif = true;
    $profile = CrewProfile::find(Auth::user()->crew_profile_id);
    $forApprovals = MasterProfileApprovalFields::get()->pluck('fieldname')->toArray();

    if($profile->status == config('constants.STAT_FOR_APPROVAL'))
      $sendNotif = false;

    $metadata = str_replace('\\','',$profile->metadata);
    $metadata = json_decode($metadata,true);

    $newData =[
      'address'  => isset($data['address'])?$data['address']:'',
      'address_province_code'  => isset($data['provinceCode'])?$data['provinceCode']:'',
      'address_citymun_code'  => isset($data['cityCode'])?$data['cityCode']:'',
      'address_barangay_code'  => isset($data['barangayCode'])?$data['barangayCode']:'',
    ];

    $newMetadata = [];
    $setValue = [];
    foreach($newData as $key => $value){
      if(in_array($key,$forApprovals))
        $newMetadata[$key] = $value;
      else
        $setValue[$key] = $value;
    }

    if($metadata)
    $newMetadata = array_merge($metadata,$newMetadata);

    $profile->fill($setValue);
    $profile->metadata = json_encode($newMetadata);
    if(count($newMetadata))
    $profile->status = config('constants.STAT_FOR_APPROVAL');
    $profile->save();

    if(count($newMetadata) && $sendNotif){
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
