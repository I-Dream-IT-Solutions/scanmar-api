<?php

namespace App\Action\MasterVesselEngine;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\MasterVesselEngine;
use Auth;

class MasterVesselEngineListAction
{

  public function execute($request)
  {
    $records = new MasterVesselEngine();

    $records = $records->orderBy('engine_make','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
