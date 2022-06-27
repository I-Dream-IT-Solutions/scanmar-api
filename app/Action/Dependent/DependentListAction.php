<?php

namespace App\Action\Dependent;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\CrewDependent;
use Auth;

class DependentListAction
{

  public function execute($request)
  {
    $records = new CrewDependent();

    $records = $records->where('crew_no',Auth::user()->crew_no);
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


    return $records;
  }



}
