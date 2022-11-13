<?php

namespace App\Action\CrewDoc;

use Illuminate\Pagination\Paginator;
use Session;
use Storage;
use Log;
use Auth;
use App\Models\CrewDoc;
use App\Models\Notification;
use App\Models\SystemUser;
use Pusher\Pusher;

class CrewDocDeleteAction
{

  public function execute($id)
  {
    $data = CrewDoc::find($id);

    $newData = [
      'is_deleted'=>'Y',
      'deleted_by'=>Auth::user()->id,
      'delete_reason'=>"For Deletion",
    ];

    if($data->status == config('constants.STAT_NEW')){
      $data->fill($newData);
      $data->status = config('constants.STAT_FOR_APPROVAL');
    }
    else{
      $data->metadata = json_encode($newData);
      $data->status = config('constants.STAT_FOR_APPROVAL');
    }

    $data->save();

    // $this->notify($data);

    $notifData =[
      'id'=>$data->id,
      'name'=>$data->name,
    ];
    $notif_action = new NotificationCreateAction();
    $notif_action->execute($notifData,'delete_document');

    return $data;
  }

  // public function notify($record){
  //
  //   $users = SystemUser::where('groupx','LIKE','%'.Auth::user()->profile->groupx.'%')->get();
  //   $target_id = [];
  //   $notification_type = 'delete_document';
  //
  //
  //   foreach($users as $user){
  //     $target_id[] = (string)$user->id;
  //   }
  //
  //   $notif = Notification::create([
  //     'target_id'=>json_encode($target_id),
  //     'group_reciever'=>'',
  //     'see_by'=>'',
  //     'source'=>$record->id,
  //     'notification_type'=>$notification_type,
  //     'notification_content'=>json_encode($record),
  //     'created_by'=>Auth::user()->id,
  //     'created_date'=>date('Y-m-d'),
  //   ]);
  //
  //
  //
  //   $pusher = new Pusher(
  //     "57ebedb5abfa0bc3a284",
  //     "18c0ed6bf914e9fc9461",
  //     "1480691",
  //     array('cluster' => 'ap1','useTLS'=>true)
  //   );
  //
  //   $pusher->trigger('pusher_notification', 'notification', $notif->id);
  //
  // }

}
