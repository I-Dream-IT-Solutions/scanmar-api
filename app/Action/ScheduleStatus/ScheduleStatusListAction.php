<?php

namespace App\Action\ScheduleStatus;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\ScheduleStatus;
use Auth;

class ScheduleStatusListAction
{

  public function execute($request)
  {
    $records = new ScheduleStatus();

    $records = $records->orderBy('id','DESC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
