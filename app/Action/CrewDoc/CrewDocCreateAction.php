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
use Http;
use Pusher\Pusher;
use App\Action\Notification\NotificationCreateAction;

class CrewDocCreateAction
{

  public function execute($request)
  {
    $data = $request->all();
    $fileExist = CrewDoc::where('crew_no',Auth::user()->crew_no)->where('code',$data['code'])->where('is_deleted','N')->first();

    if(!$fileExist ){
      $filename = '';
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

        $records = CrewDoc::create([
          'internal_Code'  => '',
          'crew_no'  => Auth::user()->crew_no,
          'type'  => $data['type'],
          // 'code'  => $data['code'],
          // 'typex'  => $data['typex'],
          // 'codex'  => $data['codex'],
          'code'  => $data['code'],
          'docno'  => $data['docno'],
          // 'grade'  => $data['grade'],
          'date_issue'  => $data['date_issue']?date('Ymd',strtotime($data['date_issue'])):'',
          'date_exp'  => $data['date_exp']?date('Ymd',strtotime($data['date_exp'])):'',
          // 'period'  => $data['period'],
          'location'  => $data['location'],
          'school'  => $data['school'],
          'date_acept'  => '19900101',
          'date_rec'  => '19900101',
          'date_4ward'  => '19900101',
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
          'status'  => 'new',
        ]);

        // $this->notify($records);

        $records = $records->load('document');
        $notifData =[
          'id'=>$records->id,
          'name'=>$records->document?$records->document->document_name:'',
        ];
        $notif_action = new NotificationCreateAction();
        $notif_action->execute($notifData,'add_document');

        return $records;
      }
      else{
        return response()->json(['message'=>'documentAlreadyExist'], 422);
      }

    }

  }
