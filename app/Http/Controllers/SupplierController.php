<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\Supplier\SupplierListAction;
use Auth;
use Validator;
use Log;
use DB;

class SupplierController extends Controller
{
  public function index(Request $request){
    $action = new SupplierListAction();
    $data = $action->execute($request);
    return $data;
  }

}
