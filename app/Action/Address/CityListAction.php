<?php

namespace App\Action\Address;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\City;
use Auth;

class CityListAction
{

  public function execute($request)
  {
    $records = new City();

    if($request->has('provCode'))
      $records = $records->where('provCode',$request->get('provCode'));

    $records = $records->orderBy('id','DESC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
