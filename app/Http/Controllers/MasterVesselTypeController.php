<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\MasterVesselType\MasterVesselTypeListAction;
use Auth;
use Validator;
use Log;
use DB;

class MasterVesselTypeController extends Controller
{
    public function index(Request $request){
        $action = new MasterVesselTypeListAction();
        $data = $action->execute($request);
        return $data;
      }
}
