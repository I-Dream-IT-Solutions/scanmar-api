<?php

namespace App\Action\MasterDisembarkCause;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\MasterDisembarkCause;
use Auth;

class MasterDisembarkCauseListAction
{

  public function execute($request)
  {
    $records = new MasterDisembarkCause();

    $records = $records->orderBy('name','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
