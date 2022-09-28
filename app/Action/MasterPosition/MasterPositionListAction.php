<?php

namespace App\Action\MasterPosition;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\MasterPosition;
use Auth;

class MasterPositionListAction
{

  public function execute($request)
  {
    $records = new MasterPosition();

    $records = $records->orderBy('id','DESC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
