<?php

namespace App\Action\MasterBank;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\MasterBank;
use Auth;

class MasterBankListAction
{

  public function execute($request)
  {
    $records = new MasterBank();

    $records = $records->where('is_deleted','N');
    $records = $records->orderBy('bankcode','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
