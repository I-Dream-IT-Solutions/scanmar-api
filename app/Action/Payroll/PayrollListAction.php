<?php

namespace App\Action\Payroll;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\Payroll;
use Auth;

class PayrollListAction
{

  public function execute($request)
  {
    $records = new Payroll();

    $records = $records->where('crew_no',Auth::user()->crew_no);
    $records = $records->with(['type']);
    $records = $records->orderBy('id','DESC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
