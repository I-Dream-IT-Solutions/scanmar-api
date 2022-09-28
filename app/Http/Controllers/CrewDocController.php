<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Action\CrewDoc\CrewDocCreateAction;
use App\Action\CrewDoc\CrewDocDeleteAction;
use App\Action\CrewDoc\CrewDocListAction;
use App\Action\CrewDoc\CrewDocShowAction;
use App\Action\CrewDoc\CrewDocUpdateAction;
use Auth;
use Validator;
use Log;
use DB;
use App\Http\Requests\CrewDoc\CrewDocCreateRequest;
use App\Http\Requests\CrewDoc\CrewDocUpdateRequest;


class CrewDocController extends Controller
{
    public function index(Request $request){
        $action = new CrewDocListAction();
        $data = $action->execute($request);
        return $data;
      }
    
      public function store(CrewDocCreateRequest $request){
        $action = new CrewDocCreateAction();
        $data = $action->execute($request);
        return $data;
      }
    
      public function show($id){
        $action = new CrewDocShowAction();
        $data = $action->execute($id);
        return $data;
      }
    
      public function update(CrewDocUpdateRequest $request,$id){
        $action = new CrewDocUpdateAction();
        $data = $action->execute($request,$id);
        return $data;
      }
    
      public function destroy($id){
        $action = new CrewDocDeleteAction();
        $data = $action->execute($id);
        return $data;
      }
}