<?php

namespace App\Action\MasterVesselType;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\MasterVesselType;
use Auth;

class MasterVesselTypeListAction
{

  public function execute($request)
  {
    $records = new MasterVesselType();

    $records = $records->orderBy('type_code','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
