<?php

namespace App\Action\Education;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewEducation;
use App\Action\Notification\NotificationCreateAction;
use Auth;

class EducationUpdateAction
{

  public function execute($request, $id)
  {
    $record = CrewEducation::find($id);
    $data = $request->all();

    $sendNotif = true;
    $level = '';
    if($data['level_no'] == 1)
      $level = 'Elementary';
    if($data['level_no'] == 2)
      $level = 'Secondary';
    if($data['level_no'] == 3)
      $level = 'College';
    if($data['level_no'] == 4)
      $level = 'Vocational Course';

    $educ = [
      'level'  => $level,
      'level_no'  => $data['level_no']?$data['level_no']:'',
      'school'  => $data['school']?$data['school']:'',
      'school_address'  => $data['school_address']?$data['school_address']:'',
      'course'  => $data['course']?$data['course']:'',
      'yearfrom'  => $data['yearfrom']?$data['yearfrom']:'',
      'yearto'  => $data['yearto']?$data['yearto']:'',
    ];

    
    if($record->status == config('constants.STAT_NEW')){
      $record->fill($educ);
      $record->modified_date = date('Y-m-d H:i:s');
      $record->modified_by = Auth::user()->id;
      $record->save();

      $sendNotif = false;
    }
    else{

      if($record->status == config('constants.STAT_FOR_APPROVAL'))
        $sendNotif = false;

      $changes = $record->getDirty();

      $record = CrewEducation::find($id);
      $record->metadata = json_encode($educ);
      $record->modified_date = date('Y-m-d H:i:s');
      $record->modified_by = Auth::user()->id;
      $record->status = config('constants.STAT_FOR_APPROVAL');
      $record->save();
    }

    if($sendNotif){
      $notifData =[
        'id'=>$record->id,
        'name'=>$record->level,
      ];
      $notif_action = new NotificationCreateAction();
      $notif_action->execute($notifData,'update_education');
    }

    return $record;
  }



}
