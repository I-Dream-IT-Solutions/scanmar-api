<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\Document\DocumentCreateAction;
use App\Action\Document\DocumentDeleteAction;
use App\Action\Document\DocumentListAction;
use App\Action\Document\DocumentShowAction;
use App\Action\Document\DocumentUpdateAction;
use Auth;
use Validator;
use Log;
use DB;
use App\Http\Requests\Document\DocumentCreateRequest;
use App\Http\Requests\Document\DocumentUpdateRequest;


class DocumentController extends Controller
{
    
  public function index(Request $request){
    $action = new DocumentListAction();
    $data = $action->execute($request);
    return $data;
  }

  public function store(DocumentCreateRequest $request){
    $action = new DocumentCreateAction();
    $data = $action->execute($request);
    return $data;
  }

  public function show($id){
    $action = new DocumentShowAction();
    $data = $action->execute($id);
    return $data;
  }

  public function update(DocumentUpdateRequest $request,$id){
    $action = new DocumentUpdateAction();
    $data = $action->execute($request,$id);
    return $data;
  }

  public function destroy($id){
    $action = new DocumentDeleteAction();
    $data = $action->execute($id);
    return $data;
  }

}
