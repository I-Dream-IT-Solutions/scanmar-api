<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\MasterGroup\MasterGroupListAction;
use Auth;
use Validator;
use Log;
use DB;

class MasterGroupController extends Controller
{
  public function index(Request $request){
    $action = new MasterGroupListAction();
    $data = $action->execute($request);
    return $data;
  }

}
