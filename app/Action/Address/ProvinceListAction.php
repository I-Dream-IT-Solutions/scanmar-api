<?php

namespace App\Action\Address;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\Province;
use Auth;

class ProvinceListAction
{

  public function execute($request)
  {
    $records = new Province();

    if($request->has('regCode'))
      $records = $records->where('regCode',$request->get('regCode'));

    $records = $records->orderBy('id','DESC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
