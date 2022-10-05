<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\CrewContact\CrewContactCreateAction;
use App\Action\CrewContact\CrewContactDeleteAction;
use App\Action\CrewContact\CrewContactListAction;
use App\Action\CrewContact\CrewContactShowAction;
use App\Action\CrewContact\CrewContactUpdateAction;
use App\Action\CrewContact\CrewContactExportAction;
use Auth;
use Validator;
use Log;
use DB;
use App\Http\Requests\CrewContact\CrewContactCreateRequest;
use App\Http\Requests\CrewContact\CrewContactUpdateRequest;

class CrewContactController extends Controller
{
    public function index(Request $request){
        $action = new CrewContactListAction();
        $data = $action->execute($request);
        return $data;
      }

      public function store(CrewContactCreateRequest $request){
        $action = new CrewContactCreateAction();
        $data = $action->execute($request);
        return $data;
      }

      public function show($id){
        $action = new CrewContactShowAction();
        $data = $action->execute($id);
        return $data;
      }

      public function update(CrewContactUpdateRequest $request,$id){
        $action = new CrewContactUpdateAction();
        $data = $action->execute($request,$id);
        return $data;
      }

      public function export(Request $request,$id){
        $action = new CrewContactExportAction();
        $data = $action->execute($request,$id);
        return $data;
      }

      public function destroy($id){
        $action = new CrewContactDeleteAction();
        $data = $action->execute($id);
        return $data;
      }
}
