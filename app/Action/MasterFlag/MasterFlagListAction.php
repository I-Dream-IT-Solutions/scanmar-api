<?php

namespace App\Action\MasterFlag;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\MasterFlag;
use Auth;

class MasterFlagListAction
{

  public function execute($request)
  {
    $records = new MasterFlag();

    $records = $records->orderBy('flag_name','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
