<?php

namespace App\Action\Schedule;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\Schedule;
use Auth;

class ScheduleUpdateAction
{

  public function execute($request, $schedule_id)
  {

    $record = Schedule::find($schedule_id);
    $data = $request->all();

    $schedule = [
      'schedule_key'  => $data['schedule_key'],
      'schedule_type'  => $data['schedule_type'],
      'crew_id'  => 1,
      'client_id'  => $data['client_id'],
      'document_type'  => $data['document_type'],
      'schedule_date'  => $data['schedule_date'],
      'schedule_time'  => $data['schedule_time'],
      'remarks'  =>  $data['remarks'],
      'document'  => $data['document'],
      'date_created'  =>  date('Y-m-d H:i:s'),
      'status'  => config('constants.STAT_FOR_APPROVAL'),
    ];

    $record->update($schedule);

    return $record;
  }



}
