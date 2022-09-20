<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\MasterVessel\MasterVesselListAction;
use Auth;
use Validator;
use Log;
use DB;

class MasterVesselController extends Controller
{
  public function index(Request $request){
    $action = new MasterVesselListAction();
    $data = $action->execute($request);
    return $data;
  }

}
