<?php

namespace App\Action\Schedule;

use Illuminate\Pagination\Paginator;
use Session;
use Storage;
use Log;
use App\Models\Schedule;

class ScheduleDeleteAction
{

  public function execute($schedule_id)
  {
    $data = Schedule::find($schedule_id);

    $data->is_deleted = 'Y';
    $data->save();
    return $data;
  }



}
