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

class CrewDocUpdateAction
{

  public function execute($request, $id)
  {

    $record = CrewDoc::find($id);
    $data = $request->all();

    $filename = $record->crewfile;
    if ($request->hasFile('filex')) {
      $file = $request->file("filex");
      $newFilename = 'public/'. time() . '.' . $file->getClientOriginalName();
      $path = Storage::put($newFilename,file_get_contents($file));
      $filename = $newFilename;
    }

    $document = [
        // 'internal_Code'  => $data['internal_Code'],
        'type'  => $data['type'],
        // 'code'  => $data['code'],
        // 'typex'  => $data['typex'],
        // 'codex'  => $data['codex'],
        'name'  => $data['name'],
        'docno'  => $data['docno'],
        // 'grade'  => $data['grade'],
        'date_issue'  => date('Y-m-d',strtotime($data['date_issue'])),
        'date_exp'  => date('Y-m-d',strtotime($data['date_exp'])),
        // 'period'  => $data['period'],
        'location'  => $data['location'],
        'school'  => $data['school'],
        // 'date_acept'  => $data['date_acept'],
        // 'date_rec'  => $data['date_rec'],
        // 'date_4ward'  => $data['date_4ward'],
        'remarks'  => $data['remarks'],
        // 'vaxbrand'  => $data['vaxbrand'],
        // 'fullvax'  => $data['fullvax'],
        // 'verified'  => $data['verified'],
        // 'user_code'  => $data['user_code'],
        // 'pos_codex'  => $data['pos_codex'],
        // 'submitted'  => $data['submitted'],
        // 'subremarks'  => $data['subremarks'],
        // 'crewfile'  => $filename,
        // 'woexpiry'  => $data['woexpiry'],
        // 'filex'  => $data['filex'],
        // 'tmp_filex'  => $data['tmp_filex'],
        'last_update'  => date('Y-m-d H:i:s'),
        // 'status'  => config('constants.STAT_FOR_APPROVAL'),
    ];

    $record->metadata = json_encode($document);
    // $record->status = config('constants.STAT_FOR_APPROVAL');
    $record->status = 'for_approval';
    $record->tmp_filex = $filename;
    $record->save();

    $this->notify($record);
    return $record;
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
      'item_name'=>$record->name,
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
