<?php

namespace App\Action\CrewContact;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\CrewContact;
use Auth;

class CrewContactListAction
{

  public function execute($request)
  {

    $records = new CrewContact();

    $records = $records->where('crew_no',Auth::user()->crew_no);
    $records = $records->where('is_deleted','N');
    if($request->has('search'))
    $records = $records->where(function($q)use($request){
      $q->where('label','like','%'.$request->get('search').'%')
      ->orWhere('description','like','%'.$request->get('search').'%');
    });

    $records = $records->orderBy('id','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();

    return $records;

  }

}
