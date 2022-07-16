<?php

namespace App\Action\Address;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\Region;
use Auth;

class RegionListAction
{

  public function execute($request)
  {
    $records = new Region();

    $records = $records->orderBy('id','DESC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
