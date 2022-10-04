<?php

namespace App\Action\Schedule;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\Schedule;
use Auth;

class ScheduleListAction
{

  public function execute($request)
  {
    $records = new Schedule();

    $records = $records->orderBy('schedule_id','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();

    return $records;

  }


}
