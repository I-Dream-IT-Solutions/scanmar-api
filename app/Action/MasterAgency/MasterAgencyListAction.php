<?php

namespace App\Action\MasterAgency;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\MasterAgency;
use Auth;

class MasterAgencyListAction
{

  public function execute($request)
  {
    $records = new MasterAgency();

    $records = $records->orderBy('agency_name','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
