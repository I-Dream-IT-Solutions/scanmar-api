<?php

namespace App\Action\Address;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\Barangay;
use Auth;

class BarangayListAction
{

  public function execute($request)
  {
    $records = new Barangay();

    if($request->has('citymunCode'))
      $records = $records->where('citymunCode',$request->get('citymunCode'));

    $records = $records->orderBy('id','DESC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
