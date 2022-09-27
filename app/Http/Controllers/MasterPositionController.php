<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\MasterPosition\MasterPositionListAction;
use Auth;
use Validator;
use Log;
use DB;

class MasterPositionController extends Controller
{
  public function index(Request $request){
    $action = new MasterPositionListAction();
    $data = $action->execute($request);
    return $data;
  }

}
