<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\Education\EducationCreateAction;
use App\Action\Education\EducationDeleteAction;
use App\Action\Education\EducationListAction;
use App\Action\Education\EducationShowAction;
use App\Action\Education\EducationUpdateAction;
use Auth;
use Validator;
use Log;
use DB;
use App\Http\Requests\Education\EducationCreateRequest;
use App\Http\Requests\Education\EducationUpdateRequest;


class EducationController extends Controller
{

  public function index(Request $request){
    $action = new EducationListAction();
    $data = $action->execute($request);
    return $data;
  }

  public function store(EducationCreateRequest $request){
    $action = new EducationCreateAction();
    $data = $action->execute($request);
    return $data;
  }

  public function show($id){
    $action = new EducationShowAction();
    $data = $action->execute($id);
    return $data;
  }

  public function update(EducationUpdateRequest $request,$id){
    $action = new EducationUpdateAction();
    $data = $action->execute($request,$id);
    return $data;
  }

  public function destroy($id){
    $action = new EducationDeleteAction();
    $data = $action->execute($id);
    return $data;
  }

}
