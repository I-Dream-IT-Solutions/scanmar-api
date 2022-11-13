<?php

namespace App\Action\MasterVessel;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\MasterVessel;
use Auth;

class MasterVesselListAction
{

  public function execute($request)
  {
    $records = new MasterVessel();

    $records = $records->orderBy('vessel_name','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
