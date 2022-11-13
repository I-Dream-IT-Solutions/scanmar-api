<?php

namespace App\Action\Allottee;

use Illuminate\Pagination\Paginator;
use Session;
use Storage;
use Log;
use App\Models\CrewAllottee;
use App\Action\Notification\NotificationCreateAction;
use Auth;

class AllotteeDeleteAction
{

  public function execute($id)
  {
    $data = CrewAllottee::find($id);

    $newData = [
      'is_deleted'=>'Y',
      'deleted_by'=>Auth::user()->id,
    ];

    if($data->status == config('constants.STAT_NEW'))
      $data->fill($newData);
    else{
      $data->metadata = json_encode($newData);
      $data->status = config('constants.STAT_FOR_APPROVAL');
    }
    $data->save();


    $notifData =[
      'id'=>$data->id,
      'name'=>$data->level,
    ];
    $notif_action = new NotificationCreateAction();
    $notif_action->execute($notifData,'delete_allottee');

    return $data;
  }



}
