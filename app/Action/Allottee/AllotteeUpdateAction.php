<?php

namespace App\Action\Allottee;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewAllottee;
use App\Action\Notification\NotificationCreateAction;
use Auth;

class AllotteeUpdateAction
{

  public function execute($request, $id)
  {
    $record = CrewAllottee::find($id);
    $data = $request->all();

    $educ = [
      'last_name'  => $data['lastName'],
      'first_name'  => $data['firstName'],
      'middle_name'  => $data['middleName'],
      'email'  => $data['email'],
      'telno'  => $data['telno'],
      'address'  => $data['address'],
      'zipcode'  => $data['zipcode'],
      'relation'  => $data['relation'],
      'code'  => $data['code'],
      'bbranch'  => $data['bbranch'],
      'acct_type'  => $data['acctType'],
      'acct_no'  => isset($data['acctNo'])?$data['acctNo']:'',
      // 'callice'  => $data['callice'],
    ];

    $record->fill($educ);

    if($record->status == config('constants.STAT_NEW')){
      $record->modified_date = date('Y-m-d H:i:s');
      $record->modified_by = Auth::user()->id;
      $record->save();
    }
    else{
      $changes = $record->getDirty();
      $record = CrewAllottee::find($id);
      $record->metadata = json_encode($changes);
      $record->modified_date = date('Y-m-d H:i:s');
      $record->modified_by = Auth::user()->id;
      $record->status = config('constants.STAT_FOR_APPROVAL');
      $record->save();
    }


    $notifData =[
      'id'=>$record->id,
      'name'=>$record->first_name.' '.$record->last_name,
    ];
    $notif_action = new NotificationCreateAction();
    $notif_action->execute($notifData,'update_allottee');

    return $record;
  }



}
