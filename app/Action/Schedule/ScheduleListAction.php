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

    $records = $records->where('crew_id',Auth::user()->crew_no);
    if($request->has('search')){
      $records = $records->where(function($q)use($request){
        $q->where('schedule_type','like','%'.$request->get('search').'%')
        ->orWhere('document_type','like','%'.$request->get('search').'%')
        ->orWhere('schedule_date','like','%'.$request->get('search').'%')
        ->orWhere('schedule_time','like','%'.$request->get('search').'%');
      });
    }

    $records = $records->orderBy('schedule_id','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();

    return $records;

  }


}
