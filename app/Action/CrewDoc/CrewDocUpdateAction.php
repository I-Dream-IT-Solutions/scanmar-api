<?php

namespace App\Action\CrewDoc;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewDoc;
use Auth;
use Storage;
use App\Models\Notification;
use App\Models\SystemUser;
use Pusher\Pusher;
use Http;

class CrewDocUpdateAction
{

  public function execute($request, $id)
  {

    $record = CrewDoc::find($id);
    $data = $request->all();
    $filename = $record->filex;
    // if ($request->hasFile('filex')) {
    //   $file = $request->file("filex");
    //   $newFilename = time() . '.' . $file->getClientOriginalName();
    //   $path = Storage::put($newFilename,file_get_contents($file));
    //   $filename = $newFilename;
    // }

    if ($request->hasFile('filex')) {
      $file = $request->file("filex");
      // $filename = time() . '.' . $file->getClientOriginalName();
      // $newFilename = Auth::user()->crew_no.'/'. $filename;
      // $path = Storage::put($newFilename,file_get_contents($file));

      $response = Http::attach(
        'file', file_get_contents($file),$file->getClientOriginalName()
          )->post('https://scanmar.ph/crew-application/api/doc/upload',['crew_no'=>Auth::user()->crew_no]);
      $filename = $response['file_name'];
    }

    $document = [
        'type'  => $data['type'],
        'code'  => $data['code'],
        'docno'  => $data['docno'],
        'date_issue'  => $data['date_issue']?date('Ymd',strtotime($data['date_issue'])):'',
        'date_exp'  => $data['date_exp']?date('Ymd',strtotime($data['date_exp'])):'',
        'location'  => $data['location'],
        'school'  => $data['school'],
        'remarks'  => $data['remarks'],
        'last_update'  => date('Y-m-d H:i:s'),
    ];

    if($record->status == config('constants.STAT_NEW')){

      $record->fill($document);
      $record->filex = $filename;
    }
    else{
      $record->metadata = json_encode($document);
      $record->status = 'for_approval';
      $record->tmp_filex = $filename;
    }
    $record->save();
    // $this->notify($record);

    $notifData =[
      'id'=>$record->id,
      'name'=>$record->name,
    ];
    $notif_action = new NotificationCreateAction();
    $notif_action->execute($notifData,'update_document');


    $record->fill($document);

    return $record;
  }

  // public function notify($record){
  //
  //   $users = SystemUser::where('groupx','LIKE','%'.Auth::user()->profile->groupx.'%')->get();
  //   $target_id = [];
  //   $notification_type = 'update_document';
  //
  //   foreach($users as $user){
  //     $target_id[] = (string)$user->id;
  //   }
  //
  //   $notification_content = [
  //     'item_id'=>$record->id,
  //     'item_name'=>$record->name,
  //     'id_save_by'=>Auth::user()->id,
  //     'name_save_by'=>Auth::user()->first_name.' '.Auth::user()->last_name,
  //     'href'=>null
  //   ];
  //
  //   $group = json_decode(Auth::user()->groupx);
  //
  //   $readBy[] = [
  //     'id'=>Auth::user()->id,
  //     'name'=>Auth::user()->first_name.' '.Auth::user()->last_name,
  //     'read_date'=>date('Y-m-d H:i:s'),
  //   ];
  //
  //   $notif = Notification::create([
  //     'target_id'=>json_encode($target_id),
  //     'group_reciever'=>Auth::user()->profile->groupx,
  //     'see_by'=>json_encode($target_id),
  //     'is_read_by'=>json_encode($readBy),
  //     'source'=>$record->id,
  //     'notification_type'=>$notification_type,
  //     'is_process'=>'N',
  //     'notification_content'=>json_encode($notification_content),
  //     'created_by'=>Auth::user()->id,
  //     'created_date'=>date('Y-m-d H:i:s'),
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
