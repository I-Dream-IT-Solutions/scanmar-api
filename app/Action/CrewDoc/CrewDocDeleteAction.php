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

    $data->status = config('constants.STAT_FOR_DELETION');
    $data->save();

    $this->notify($data);
    return $data;
  }

  public function notify($record){

    $users = SystemUser::get();
    $target_id = [];
    $notification_type = 'delete_doc';


    foreach($users as $user){
      $target_id[] = $user->id;
    }

    $notif = Notification::create([
      'target_id'=>json_encode($target_id),
      'group_reciever'=>'',
      'see_by'=>'',
      'source'=>null,
      'notification_type'=>$notification_type,
      'notification_content'=>json_encode($record),
      'created_by'=>Auth::user()->id,
      'created_date'=>date('Y-m-d'),
    ]);



    $pusher = new Pusher(
      "57ebedb5abfa0bc3a284",
      "18c0ed6bf914e9fc9461",
      "1480691",
      array('cluster' => 'ap1','useTLS'=>true)
    );

    $pusher->trigger('pusher_notification', 'notification', $notif->id);

  }

}
