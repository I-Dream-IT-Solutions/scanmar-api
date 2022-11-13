<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\MasterFlag\MasterFlagListAction;
use Auth;
use Validator;
use Log;
use DB;

class MasterFlagController extends Controller
{
    public function index(Request $request){
        $action = new MasterFlagListAction();
        $data = $action->execute($request);
        return $data;
      }
}
