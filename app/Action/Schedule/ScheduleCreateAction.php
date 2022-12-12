<?php

namespace App\Action\Schedule;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\Schedule;

class ScheduleCreateAction
{

  public function execute($request)
  {
    $data = $request->all();
    $records[] = Schedule::create([
      'schedule_key'  => '',
      'schedule_type'  => $data['schedule_type'],
      'crew_id'  => Auth::user()->crew_no,
      'client_id'  => $data['client_id'],
      'schedule_date'  => $data['schedule_date'],
      'schedule_time'  => $data['schedule_time'],
      'remarks'  =>  $data['remarks'],
      'date_created'  =>  date('Y-m-d H:i:s'),
      'status'  => config('constants.STAT_NEW'),

      'is_crew'  => 'Y',
      'document_type'  => '',
      'document'  => '',
      'groupx'  => '',
      'created_by'  => Auth::user()->id,
      'date_created'  => date('Y-m-d H:i:s'),
      'modified_by'  => Auth::user()->id,
      'modified_date'  => date('Y-m-d H:i:s'),
    ]);

    return $records;
  }



}
