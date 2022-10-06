<?php

namespace App\Action\Schedule;

use Illuminate\Pagination\Paginator;
use Session;
use Log;

use App\Models\Schedule;

class ScheduleShowAction
{

  public function execute($schedule_id)
  {
    $record = Schedule::find($schedule_id);


    return $record;
  }



}
