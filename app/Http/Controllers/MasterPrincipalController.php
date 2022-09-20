<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\MasterPrincipal\MasterPrincipalListAction;
use Auth;
use Validator;
use Log;
use DB;

class MasterPrincipalController extends Controller
{
  public function index(Request $request){
    $action = new MasterPrincipalListAction();
    $data = $action->execute($request);
    return $data;
  }

}
