<?php

namespace App\Action\MasterVesselRoute;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\MasterVesselRoute;
use Auth;

class MasterVesselRouteListAction
{

  public function execute($request)
  {
    $records = new MasterVesselRoute();

    $records = $records->orderBy('route_name','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
