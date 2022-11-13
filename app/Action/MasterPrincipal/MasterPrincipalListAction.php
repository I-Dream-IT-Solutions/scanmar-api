<?php

namespace App\Action\MasterPrincipal;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\MasterPrincipal;
use Auth;

class MasterPrincipalListAction
{

  public function execute($request)
  {
    $records = new MasterPrincipal();

    $records = $records->orderBy('principal_name','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
