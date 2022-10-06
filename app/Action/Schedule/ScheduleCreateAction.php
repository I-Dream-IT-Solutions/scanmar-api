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
      'schedule_key'  => $data['schedule_key'],
      'schedule_type'  => $data['schedule_type'],
      'crew_id'  => Auth::user()->crew_no,
      'client_id'  => $data['client_id'],
      'document_type'  => $data['document_type'],
      'schedule_date'  => $data['schedule_date'],
      'schedule_time'  => $data['schedule_time'],
      'remarks'  =>  $data['remarks'],
      'document'  => $data['document'],
      'date_created'  =>  date('Y-m-d H:i:s'),
      'status'  => config('constants.STAT_FOR_APPROVAL'),
    ]);

    return $records;
  }



}
