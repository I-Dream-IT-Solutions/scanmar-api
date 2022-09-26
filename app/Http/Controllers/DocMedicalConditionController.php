<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\DocMedicalCondition\DocMedicalConditionCreateAction;
use App\Action\DocMedicalCondition\DocMedicalConditionDeleteAction;
use App\Action\DocMedicalCondition\DocMedicalConditionListAction;
use App\Action\DocMedicalCondition\DocMedicalConditionShowAction;
use App\Action\DocMedicalCondition\DocMedicalConditionUpdateAction;
use Auth;
use Validator;
use Log;
use DB;
use App\Http\Requests\DocMedicalCondition\DocMedicalConditionCreateRequest;
use App\Http\Requests\DocMedicalCondition\DocMedicalConditionUpdateRequest;

class DocMedicalConditionController extends Controller
{
    public function index(Request $request){
        $action = new DocMedicalConditionListAction();
        $data = $action->execute($request);
        return $data;
      }
    
      public function store(DocMedicalConditionCreateRequest $request){
        $action = new DocMedicalConditionCreateAction();
        $data = $action->execute($request);
        return $data;
      }
    
      public function show($id){
        $action = new DocMedicalConditionShowAction();
        $data = $action->execute($id);
        return $data;
      }
    
      public function update(DocMedicalConditionUpdateRequest $request,$id){
        $action = new DocMedicalConditionUpdateAction();
        $data = $action->execute($request,$id);
        return $data;
      }
    
      public function destroy($id){
        $action = new DocMedicalConditionDeleteAction();
        $data = $action->execute($id);
        return $data;
      }
}