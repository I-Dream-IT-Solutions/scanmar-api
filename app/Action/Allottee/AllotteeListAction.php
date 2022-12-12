<?php

namespace App\Action\Allottee;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\CrewAllottee;
use Auth;

class AllotteeListAction
{

  public function execute($request)
  {
    $records = new CrewAllottee();

    $records = $records->where('crew_no',Auth::user()->crew_no);
    $records = $records->where('is_deleted','N');
    if($request->has('search'))
    $records = $records->where('level','like','%'.$request->get('search').'%')
      ->orWhere('school','like','%'.$request->get('search').'%')
      ->orWhere('school_address','like','%'.$request->get('search').'%')
      ->orWhere('course','like','%'.$request->get('search').'%')
      ->orWhere('yearfrom','like','%'.$request->get('search').'%')
      ->orWhere('yearto','like','%'.$request->get('search').'%');

    $records = $records->orderBy('id','DESC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();

    foreach($records as $record){
      if($record->status == config('constants.STAT_FOR_APPROVAL')){
        $metaData = json_decode($record->metadata,true);
        if($metaData)
          $record->fill($metaData);

      }
    }

    return $records;
  }



}
