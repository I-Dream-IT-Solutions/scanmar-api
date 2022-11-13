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

    $records = Payroll::join('master_payroll_type','master_payroll_type.type','=','crew_payroll.type');

    $records = $records->where('crew_no',Auth::user()->crew_no);
    if($request->has('search')){
      $records = $records->where(function($q)use($request){
        $q->where('crew_payroll.year','like','%'.$request->get('search').'%')
        ->orWhere('master_payroll_type.description','like','%'.$request->get('search').'%')
        ->orWhere('crew_payroll.month','like','%'.$request->get('search').'%');
      });
    }

    $records = $records->orderBy('crew_payroll.id','ASC');
    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
