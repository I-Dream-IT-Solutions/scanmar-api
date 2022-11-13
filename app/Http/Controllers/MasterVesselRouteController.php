<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\MasterVesselRoute\MasterVesselRouteListAction;
use Auth;
use Validator;
use Log;
use DB;

class MasterVesselRouteController extends Controller
{
    public function index(Request $request){
        $action = new MasterVesselRouteListAction();
        $data = $action->execute($request);
        return $data;
      }
}
