<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\MasterDocument\MasterDocumentListAction;
use Auth;
use Validator;
use Log;
use DB;

class MasterDocumentController extends Controller
{
    public function index(Request $request){
        $action = new MasterDocumentListAction();
        $data = $action->execute($request);
        return $data;
      }
}
