<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\MasterBank\MasterBankListAction;
use App\Action\MasterBank\MasterBankBranchListAction;
use Auth;
use Validator;
use Log;
use DB;

class MasterBankController extends Controller
{
    public function index(Request $request){
        $action = new MasterBankListAction();
        $data = $action->execute($request);
        return $data;
      }

    public function branch(Request $request){
        $action = new MasterBankBranchListAction();
        $data = $action->execute($request);
        return $data;
      }
}
