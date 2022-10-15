<?php

namespace App\Action\Document;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewDocument;
use App\Models\Notification;
use App\Models\SystemUser;
use Pusher\Pusher;
use Auth;

class DocumentUpdateAction
{

  public function execute($request, $id)
  {

    $record = CrewDocument::find($id);
    $data = $request->all();

    $document = [
        'crew_profile_id'  => $data['crew_profile_id'],
        'document_id'  => $data['document_id'],
        'issued_date'  => $data['issued_date'],
        'expiration_date'  => $data['expiration_date'],
        'created_date'  => $data['created_date'],
        'created_by'  => $data['created_by'],
        'modified_date'  => $data['modified_date'],
        'modified_by'  => $data['modified_by'],
    ];

    $record->update($document);
    $this->notify($record);
    return $record;
    
  }

  public function notify($record){

    $users = SystemUser::where('groupx','LIKE','%'.Auth::user()->profile->groupx.'%')->get();
    $target_id = [];
    $notification_type = 'update_document';

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
