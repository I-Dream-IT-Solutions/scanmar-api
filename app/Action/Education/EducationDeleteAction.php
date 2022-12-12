<?php

namespace App\Action\Education;

use Illuminate\Pagination\Paginator;
use Session;
use Storage;
use Log;
use App\Models\CrewEducation;
use App\Action\Notification\NotificationCreateAction;
use Auth;

class EducationDeleteAction
{

  public function execute($id)
  {
    $data = CrewEducation::find($id);

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
      'name'=>$data->level,
    ];
    $notif_action = new NotificationCreateAction();
    $notif_action->execute($notifData,'delete_education');

    return $data;
  }



}
