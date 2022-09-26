<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\MasterDocumentType\MasterDocumentTypeListAction;
use Auth;
use Validator;
use Log;
use DB;

class MasterDocumentTypeController extends Controller
{
    public function index(Request $request){
        $action = new MasterDocumentTypeListAction();
        $data = $action->execute($request);
        return $data;
      }
}
