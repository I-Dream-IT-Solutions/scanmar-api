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
use App\Action\Notification\NotificationCreateAction;

class CrewDocUpdateAction
{

  public function execute($request, $id)
  {
    $data = $request->all();
    $fileExist = CrewDoc::where('crew_no',Auth::user()->crew_no)->where('code',$data['code'])->where('is_deleted','N')->first();

    $sendNotif = true;

    if(!$fileExist || $fileExist->id == $id ){
      $record = CrewDoc::find($id);
      $filename = $record->filex;

      if ($request->hasFile('filex')) {
        $file = $request->file("filex");

        $response = Http::attach(
          'file', file_get_contents($file),$file->getClientOriginalName()
            )->post('https://scanmar.ph/crew-application/api/doc/upload',['crew_no'=>Auth::user()->crew_no]);
        $filename = $response['file_name'];
      }

      $document = [
          'type'  => $data['type']?$data['type']:'',
          'code'  => $data['code']?$data['code']:'',
          'docno'  => $data['docno']?$data['docno']:'',
          'date_issue'  => $data['date_issue']?date('Ymd',strtotime($data['date_issue'])):'',
          'date_exp'  => $data['date_exp']?date('Ymd',strtotime($data['date_exp'])):'',
          'location'  => $data['location']?$data['location']:'',
          'school'  => $data['school']?$data['school']:'',
          'remarks'  => $data['remarks']?$data['remarks']:''
      ];

      if($record->status == config('constants.STAT_NEW')){
        $record->fill($document);
        $record->filex = $filename;

        $sendNotif = false;
        
      }
      else{
        
        if($record->status == config('constants.STAT_FOR_APPROVAL'))
          $sendNotif = false;

        $record->metadata = json_encode($document);
        $record->status = config('constants.STAT_FOR_APPROVAL');
        $record->tmp_filex = $filename;
      }
      $record->last_update = date('Y-m-d H:i:s');
      $record->save();

      $record = $record->load('document');

      if($sendNotif){
        $notifData =[
          'id'=>$record->id,
          'name'=>$record->document?$record->document->document_name:'',
        ];
        $notif_action = new NotificationCreateAction();
        $notif_action->execute($notifData,'update_document');
      }


      $record->fill($document);

      return $record;
    }
    else{
      return response()->json(['message'=>'documentAlreadyExist'], 422);
    }
  }


}
