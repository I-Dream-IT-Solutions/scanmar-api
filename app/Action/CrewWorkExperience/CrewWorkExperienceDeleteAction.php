<?php

namespace App\Action\CrewWorkExperience;

use Illuminate\Pagination\Paginator;
use Session;
use Storage;
use Log;
use App\Models\CrewWorkExperience;
use App\Action\Notification\NotificationCreateAction;
use Auth;

class CrewWorkExperienceDeleteAction
{

  public function execute($id)
  {
    $data = CrewWorkExperience::find($id);

    $newData = [
      'is_deleted'=>'Y',
      'deleted_by'=>Auth::user()->id
    ];

    if($data->status == config('constants.STAT_NEW'))
      $data->fill($newData);
    else{
      $data->metadata = json_encode($newData);
      $data->delete_reason ="For Deletion";
      $data->status = config('constants.STAT_FOR_APPROVAL');
    }

    $data->save();

    $notifData =[
      'id'=>$data->id,
      'name'=>$data->pos_name,
    ];

    $notif_action = new NotificationCreateAction();
    $notif_action->execute($notifData,'delete_work_experience');

    return $data;
  }



}
