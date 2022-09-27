<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\MasterAgency\MasterAgencyListAction;
use Auth;
use Validator;
use Log;
use DB;

class MasterAgencyController extends Controller
{
  public function index(Request $request){
    $action = new MasterAgencyListAction();
    $data = $action->execute($request);
    return $data;
  }

}
