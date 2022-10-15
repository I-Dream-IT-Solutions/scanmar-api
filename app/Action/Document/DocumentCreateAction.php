<?php

namespace App\Action\Document;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewDocument;
use App\Models\Notification;
use App\Models\SystemUser;
use Storage;
use Pusher\Pusher;

class DocumentCreateAction
{

  public function execute($request)
  {
    $data = $request->all();
    $records = CrewDocument::create([
      'crew_profile_id'  => Auth::user()->profile->id,
      'document_id'  => $data['document_id'],
      'issued_date'  => $data['issued_date'],
      'expiration_date'  => $data['expiration_date'],
      'created_date'  => date('Y-m-d H:i:s'),
      'created_by'  => Auth::user()->id,
      'modified_date'  => date('Y-m-d H:i:s'),
      'modified_by'  => Auth::user()->id,
    ]);
    $this->notify($records);

    return $records;
  }
  public function notify($record){

    $users = SystemUser::where('groupx','LIKE','%'.Auth::user()->profile->groupx.'%')->get();
    $target_id = [];
    $notification_type = 'add_document';

    foreach($users as $user){
      $target_id[] = $user->id;
    }

    $notification_content = [
      'item_id'=>$record->id,
      'item_name'=>$record->document_id,
      'id_save_by'=>Auth::user()->id,
      'name_save_by'=>Auth::user()->first_name.' '.Auth::user()->last_name,
      'href'=>null
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
      'source'=>$record->id,
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

    $pusher->trigger('pusher_notification', 'notification', $notif->id);

  }


}
