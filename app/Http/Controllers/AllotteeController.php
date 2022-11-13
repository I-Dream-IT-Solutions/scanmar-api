<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\Allottee\AllotteeCreateAction;
use App\Action\Allottee\AllotteeDeleteAction;
use App\Action\Allottee\AllotteeListAction;
use App\Action\Allottee\AllotteeShowAction;
use App\Action\Allottee\AllotteeUpdateAction;
use Auth;
use Validator;
use Log;
use DB;
use App\Http\Requests\Allottee\AllotteeCreateRequest;
use App\Http\Requests\Allottee\AllotteeUpdateRequest;


class AllotteeController extends Controller
{

  public function index(Request $request){
    $action = new AllotteeListAction();
    $data = $action->execute($request);
    return $data;
  }

  public function store(AllotteeCreateRequest $request){
    $action = new AllotteeCreateAction();
    $data = $action->execute($request);
    return $data;
  }

  public function show($id){
    $action = new AllotteeShowAction();
    $data = $action->execute($id);
    return $data;
  }

  public function update(AllotteeUpdateRequest $request,$id){
    $action = new AllotteeUpdateAction();
    $data = $action->execute($request,$id);
    return $data;
  }

  public function destroy($id){
    $action = new AllotteeDeleteAction();
    $data = $action->execute($id);
    return $data;
  }

}
