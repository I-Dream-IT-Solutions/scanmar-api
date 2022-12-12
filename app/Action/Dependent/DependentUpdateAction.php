<?php

namespace App\Action\Dependent;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewDependent;
use Auth;
use App\Action\Notification\NotificationCreateAction;

class DependentUpdateAction
{

  public function execute($request, $id)
  {
    $record = CrewDependent::find($id);
    $data = $request->all();
    
    $sendNotif = true;
    $educ = [
      'name'  => $data['name'],
      'relation'  => $data['relation'],
      'birthdate'  => date('Y-m-d',strtotime($data['birthdate'])),
      'address'  => $data['address'],
      'emailadd'  => $data['emailadd']?$data['emailadd']:'',
      'contact_no'  => $data['contact_no'],
      'has_benefit'  => isset($data['has_benefit'])? ($data['has_benefit']? 'T':'F'): 'F',
      'callice'  => isset($data['callice'])? ($data['callice']? 'T':'F'): 'F',
      // 'modified_date'  => date('Y-m-d H:i:s'),
      // 'modified_by'  => Auth::user()->id,
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
      $record = CrewDependent::find($id);
      $record->metadata = json_encode($educ);
      $record->modified_date = date('Y-m-d H:i:s');
      $record->modified_by = Auth::user()->id;
      $record->status = config('constants.STAT_FOR_APPROVAL');
      $record->save();
    }

    if($sendNotif){
      $notifData =[
        'id'=>$record->id,
        'name'=>$record->name,
      ];
      $notif_action = new NotificationCreateAction();
      $notif_action->execute($notifData,'update_dependent');
    }
    return $record;
  }



}
