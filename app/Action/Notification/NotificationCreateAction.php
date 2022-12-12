<?php

namespace App\Action\Notification;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\SystemUser;
use App\Models\Notification;
use Pusher\Pusher;
use Auth;

class NotificationCreateAction
{

  public function execute($record,$notification_type)
  {

    $users = SystemUser::where('groupx','LIKE','%'.Auth::user()->profile->groupx.'%')->get();
    $target_id = [];

    $href = '';

    if(str_contains($notification_type,'document'))
      $href = 'crew/document/'. Auth::user()->crew_profile_id;
    if(str_contains($notification_type,'profile'))
      $href = 'crew/update/'. Auth::user()->crew_profile_id;
    if(str_contains($notification_type,'dependent'))
      $href = 'crew/dependent/'. Auth::user()->crew_profile_id;
    if(str_contains($notification_type,'work_experience'))
      $href = 'crew/work-experience/'. Auth::user()->crew_profile_id;
    if(str_contains($notification_type,'education'))
      $href = 'crew/education/'. Auth::user()->crew_profile_id;
    if(str_contains($notification_type,'allottee'))
      $href = 'crew/allottee/'. Auth::user()->crew_profile_id;

    foreach($users as $user){
        if($user->id != Auth::user()->id)
        $target_id[] = (string)$user->id;
    }

    $notification_content = [
      'item_id'=>$record['id'],
      'item_name'=>$record['name'],
      'id_save_by'=>Auth::user()->id,
      'name_save_by'=>Auth::user()->first_name.' '.Auth::user()->last_name,
      'href'=>$href
    ];

    $group = json_decode(Auth::user()->groupx);

    $readBy[] = [
      'id'=>Auth::user()->id,
      'name'=>Auth::user()->first_name.' '.Auth::user()->last_name,
      'read_date'=>date('Y-m-d H:i:s'),
    ];

    $notif = Notification::create([
      'target_id'=>json_encode($target_id),
      'group_reciever'=>Auth::user()->profile->groupx,
      'see_by'=>json_encode($target_id),
      'is_read_by'=>json_encode($readBy),
      'source'=>$record['id'],
      'notification_type'=>$notification_type,
      'is_process'=>'N',
      'notification_content'=>json_encode($notification_content),
      'created_by'=>Auth::user()->id,
      'created_date'=>date('Y-m-d H:i:s'),
    ]);

    $pusher = new Pusher(
      "57ebedb5abfa0bc3a284",
      "18c0ed6bf914e9fc9461",
      "1480691",
      array('cluster' => 'ap1','useTLS'=>true)
    );
    $pusher->trigger('pusher_notification', 'notification', $notif->notification_id);
  }

}
