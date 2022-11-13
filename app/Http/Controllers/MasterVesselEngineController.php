<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\MasterVesselEngine\MasterVesselEngineListAction;
use Auth;
use Validator;
use Log;
use DB;

class MasterVesselEngineController extends Controller
{
    public function index(Request $request){
        $action = new MasterVesselEngineListAction();
        $data = $action->execute($request);
        return $data;
      }
}
