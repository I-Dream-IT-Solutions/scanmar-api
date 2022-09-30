<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\ScheduleStatus\ScheduleStatusListAction;
use Auth;
use Validator;
use Log;
use DB;

class ScheduleStatusController extends Controller
{
    public function index(Request $request){
        $action = new ScheduleStatusListAction();
        $data = $action->execute($request);
        return $data;
      }
}
