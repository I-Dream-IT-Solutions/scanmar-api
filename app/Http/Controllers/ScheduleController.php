<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\Schedule\ScheduleCreateAction;
use App\Action\Schedule\ScheduleDeleteAction;
use App\Action\Schedule\ScheduleListAction;
use App\Action\Schedule\ScheduleShowAction;
use App\Action\Schedule\ScheduleUpdateAction;
use Auth;
use Validator;
use Log;
use DB;
use App\Http\Requests\Schedule\ScheduleCreateRequest;
use App\Http\Requests\Schedule\ScheduleUpdateRequest;

class ScheduleController extends Controller
{
    public function index(Request $request){
        $action = new ScheduleListAction();
        $data = $action->execute($request);
        return $data;
      }
    
      public function store(ScheduleCreateRequest $request){
        $action = new ScheduleCreateAction();
        $data = $action->execute($request);
        return $data;
      }
    
      public function show($schedule_id){
        $action = new ScheduleShowAction();
        $data = $action->execute($schedule_id);
        return $data;
      }
    
      public function update(ScheduleUpdateRequest $request,$schedule_id){
        $action = new ScheduleUpdateAction();
        $data = $action->execute($request,$schedule_id);
        return $data;
      }
    
      public function destroy($schedule_id){
        $action = new ScheduleDeleteAction();
        $data = $action->execute($schedule_id);
        return $data;
      }
}
