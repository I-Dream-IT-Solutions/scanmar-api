<?php

namespace App\Action\MasterBank;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\MasterBankBranch;
use Auth;

class MasterBankBranchListAction
{

  public function execute($request)
  {
    $records = new MasterBankBranch();

    $records = $records->where('descr','!=','');
    if($request->has('bcode'))
      $records = $records->where('code',$request->get('bcode'));

    $records = $records->orderBy('code','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
