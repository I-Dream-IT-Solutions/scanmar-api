<?php

namespace App\Action\Education;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewEducation;
use App\Action\Notification\NotificationCreateAction;

class EducationCreateAction
{

  public function execute($request)
  {
    $data = $request->all();

    $level = '';
    if($data['level_no'] == 1)
      $level = 'Elementary';
    if($data['level_no'] == 2)
      $level = 'Secondary';
    if($data['level_no'] == 3)
      $level = 'College';
    if($data['level_no'] == 4)
      $level = 'Vocational Course';

    $records = CrewEducation::create([
      'crew_no'  => Auth::user()->crew_no,
      'level'  => $level,
      'level_no'  => $data['level_no'],
      'attnment'  => '',
      'ccode'  => '',
      'scode'  => '',
      'user_code'  => '',
      'showthis'  => '',
      'metadata'  => '',
      'school'  => $data['school'],
      'school_address'  => isset($data['school_address'])?$data['school_address']:'',
      'course'  => $data['course'],
      'yearfrom'  => $data['yearfrom'],
      'yearto'  => $data['yearto'],
      'modified_date'  => date('Y-m-d H:i:s'),
      'modified_by'  => Auth::user()->id,
      'deleted_by'  => '0',
      'delete_reason'  => '',
      'status'  => config('constants.STAT_NEW'),
    ]);

    $notifData =[
      'id'=>$records->id,
      'name'=>$records->level,
    ];

    $notif_action = new NotificationCreateAction();
    $notif_action->execute($notifData,'add_education');

    return $records;
  }



}
