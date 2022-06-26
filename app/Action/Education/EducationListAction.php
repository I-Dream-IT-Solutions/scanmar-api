<?php

namespace App\Action\Education;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\CrewEducation;
use Auth;

class EducationListAction
{

  public function execute($request)
  {
    $records = new CrewEducation();

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
