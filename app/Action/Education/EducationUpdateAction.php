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

    $educ = [
      'crew_no'  => Auth::user()->crew_no,
      'level'  => $data['level'],
      'school'  => $data['school'],
      'school_address'  => $data['school_address'],
      'course'  => $data['course'],
      'yearfrom'  => $data['yearfrom'],
      'yearto'  => $data['yearto'],
    ];

    $record->fill($educ);

    if($record->status == config('constants.STAT_NEW')){
      $record->modified_date = date('Y-m-d H:i:s');
      $record->modified_by = Auth::user()->id;
      $record->save();
    }
    else{
      $changes = $record->getDirty();
      $record = CrewEducation::find($id);
      $record->metadata = json_encode($changes);
      $record->modified_date = date('Y-m-d H:i:s');
      $record->modified_by = Auth::user()->id;
      $record->status = config('constants.STAT_FOR_APPROVAL');
      $record->save();
    }


    $notifData =[
      'id'=>$record->id,
      'name'=>$record->level,
    ];
    $notif_action = new NotificationCreateAction();
    $notif_action->execute($notifData,'update_education');

    return $record;
  }



}
