<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\Dependent\DependentCreateAction;
use App\Action\Dependent\DependentDeleteAction;
use App\Action\Dependent\DependentListAction;
use App\Action\Dependent\DependentShowAction;
use App\Action\Dependent\DependentUpdateAction;
use Auth;
use Validator;
use Log;
use DB;
use App\Http\Requests\Dependent\DependentCreateRequest;
use App\Http\Requests\Dependent\DependentUpdateRequest;


class DependentController extends Controller
{

  public function index(Request $request){
    $action = new DependentListAction();
    $data = $action->execute($request);
    return $data;
  }

  public function store(DependentCreateRequest $request){
    $action = new DependentCreateAction();
    $data = $action->execute($request);
    return $data;
  }

  public function show($id){
    $action = new DependentShowAction();
    $data = $action->execute($id);
    return $data;
  }

  public function update(DependentUpdateRequest $request,$id){
    $action = new DependentUpdateAction();
    $data = $action->execute($request,$id);
    return $data;
  }

  public function destroy(Request $request,$id){
    $action = new DependentDeleteAction();
    $data = $action->execute($request,$id);
    return $data;
  }

}
