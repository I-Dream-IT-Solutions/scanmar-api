<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\Payroll\PayrollListAction;
use App\Action\Payroll\PayrollDownloadAction;
use Auth;
use Validator;
use Log;
use DB;

class PayrollController extends Controller
{
  public function index(Request $request){
    $action = new PayrollListAction();
    $data = $action->execute($request);
    return $data;
  }

  public function download($id){
    $action = new PayrollDownloadAction();
    $data = $action->execute($id);
    return $data;
  }

}
