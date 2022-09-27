<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\DocumentUpload\DocumentUploadCreateAction;
use App\Action\DocumentUpload\DocumentUploadDeleteAction;
use App\Action\DocumentUpload\DocumentUploadListAction;
use App\Action\DocumentUpload\DocumentUploadShowAction;
use App\Action\DocumentUpload\DocumentUploadUpdateAction;
use Auth;
use Validator;
use Log;
use DB;
use App\Http\Requests\DocumentUpload\DocumentUploadCreateRequest;
use App\Http\Requests\DocumentUpload\DocumentUploadUpdateRequest;

class DocumentUploadController extends Controller
{
    public function index(Request $request){
        $action = new DocumentUploadListAction();
        $data = $action->execute($request);
        return $data;
      }
    
      public function store(DocumentUploadCreateRequest $request){
        $action = new DocumentUploadCreateAction();
        $data = $action->execute($request);
        return $data;
      }
    
      public function show($id){
        $action = new DocumentUploadShowAction();
        $data = $action->execute($id);
        return $data;
      }
    
      public function update(DocumentUploadUpdateRequest $request,$id){
        $action = new DocumentUploadUpdateAction();
        $data = $action->execute($request,$id);
        return $data;
      }
    
      public function destroy($id){
        $action = new DocumentUploadDeleteAction();
        $data = $action->execute($id);
        return $data;
      }
}
