<?php

namespace App\Action\Dependent;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewDependent;
use App\Action\Notification\NotificationCreateAction;

class DependentCreateAction
{

  public function execute($request)
  {
    $data = $request->all();
    $records = CrewDependent::create([
      'crew_no'  => Auth::user()->crew_no,
      'name'  => $data['name'],
      'relation'  => $data['relation'],
      'birthdate'  => date('Y-m-d',strtotime($data['birthdate'])),
      'address'  => $data['address'],
      'contact_no'  => $data['contact_no'],
      'modified_date'  => date('Y-m-d H:i:s'),
      'has_benefit'  => isset($data['has_benefit']) ($data['has_benefit']? 'T':'F'): 'F',
      'emailadd'  => '',
      'schooling'  => '',
      'place_of_birth'  => '',
      'user_code'  => '',
      'callice'  => '',
      'deleted_by'  => '0',
      'delete_reason'  => '',
      'modified_by'  => Auth::user()->id,
      'status'  => config('constants.STAT_NEW'),
    ]);

    $notifData =[
      'id'=>$records->id,
      'name'=>$records->name,
    ];
    $notif_action = new NotificationCreateAction();
    $notif_action->execute($notifData,'add_dependent');

    return $records;
  }



}
