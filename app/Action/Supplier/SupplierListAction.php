<?php

namespace App\Action\Supplier;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\Supplier;
use Auth;

class SupplierListAction
{

  public function execute($request)
  {
    $records = new Supplier();

    if($request->has('type'))
      $records = $records->where('s_type',$request->get('type'));

    $records = $records->orderBy('supplier_name','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
