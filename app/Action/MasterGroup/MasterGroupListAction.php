<?php

namespace App\Action\MasterGroup;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\MasterGroup;
use Auth;

class MasterGroupListAction
{

  public function execute($request)
  {
    $records = new MasterGroup();

    $records = $records->orderBy('groupx','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
