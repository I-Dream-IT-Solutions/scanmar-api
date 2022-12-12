<?php

namespace App\Action\Allottee;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewAllottee;
use App\Models\MasterBank;
use App\Action\Notification\NotificationCreateAction;
use Auth;

class AllotteeUpdateAction
{

  public function execute($request, $id)
  {
    $record = CrewAllottee::find($id);
    $data = $request->all();
    $sendNotif = true;
    $bank = MasterBank::where('code',$data['code'])->first();

    $educ = [
      'last_name'  => $data['last_name']?$data['last_name']:'',
      'first_name'  => $data['first_name']?$data['first_name']:'',
      'middle_name'  => $data['middle_name']?$data['middle_name']:'',
      'email'  => $data['email']?$data['email']:'',
      'telno'  => $data['telno']?$data['telno']:'',
      'address'  => $data['address']?$data['address']:'',
      'zipcode'  => $data['zipcode']?$data['zipcode']:'',
      'relation'  => $data['relation']?$data['relation']:'',
      'code'  => $data['code'],
      'descr'  => $bank?$bank->descr:'',
      'bankcode'  => $bank?$bank->bankcode:'',
      'bbranch'  => $data['bbranch']?$data['bbranch']:'',
      'acct_type'  => $data['acct_type']?$data['acct_type']:'',
      'acct_no'  => isset($data['acct_no'])?$data['acct_no']:'',
      'callice'  => $data['callice']?'T':'F',
      'dolact'  => $data['dolact']?'T':'F',
    ];

    $record->fill($educ);

    if($record->status == config('constants.STAT_NEW')){
      $record->modified_date = date('Y-m-d H:i:s');
      $record->modified_by = Auth::user()->id;
      $record->save();
      $sendNotif = false;
    }
    else{

      if($record->status == config('constants.STAT_FOR_APPROVAL'))
        $sendNotif = false;

      $changes = $record->getDirty();
      $record = CrewAllottee::find($id);
      $record->metadata = json_encode($educ);
      $record->modified_date = date('Y-m-d H:i:s');
      $record->modified_by = Auth::user()->id;
      $record->status = config('constants.STAT_FOR_APPROVAL');
      $record->save();
    }


    if($sendNotif){
    $notifData =[
      'id'=>$record->id,
      'name'=>$record->first_name.' '.$record->last_name,
    ];
    $notif_action = new NotificationCreateAction();
    $notif_action->execute($notifData,'update_allottee');
    }
    return $record;
  }



}
