<?php

namespace App\Action\CrewDoc;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewDoc;
use App\Models\Notification;
use App\Models\SystemUser;
use Storage;
use Pusher\Pusher;

class CrewDocCreateAction
{

  public function execute($request)
  {


    $data = $request->all();
    $filename = '';
    if ($request->hasFile('filex')) {
      $file = $request->file("filex");
      $filename = time() . '.' . $file->getClientOriginalName();
      $newFilename = Auth::user()->crew_no.'/'. $filename;
      $path = Storage::put($newFilename,file_get_contents($file));
    }

    $records = CrewDoc::create([
      'internal_Code'  => '',
      'crew_no'  => Auth::user()->crew_no,
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
      'date_acept'  => '1900-01-01',
      'date_rec'  => '1900-01-01',
      'date_4ward'  => '1900-01-01',
      'remarks'  => $data['remarks'],
      'vaxbrand'  => '',
      'fullvax'  => '',
      'verified'  => '',
      'user_code'  => '',
      'pos_codex'  => '',
      'submitted'  => '',
      'subremarks'  => '',
      'crewfile'  => '',
      'woexpiry'  => '',
      'filex'  => $filename,
      'tmp_filex'  => '',
      'created_from'  => '',
      'deleted_by'  => '0',
      'delete_reason'  => '',
      'metadata'  => '',
      'created_by' => Auth::user()->id,
      'last_update'  => date('Y-m-d H:i:s'),
      // 'status'  => config('constants.STAT_FOR_APPROVAL'),
      'status'  => 'for_approval',
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
