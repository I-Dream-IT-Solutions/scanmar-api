<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\MasterDisembarkCause\MasterDisembarkCauseListAction;
use Auth;
use Validator;
use Log;
use DB;

class MasterDisembarkCauseController extends Controller
{
    public function index(Request $request){
        $action = new MasterDisembarkCauseListAction();
        $data = $action->execute($request);
        return $data;
      }
}
