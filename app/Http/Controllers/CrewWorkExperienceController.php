<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Action\CrewWorkExperience\CrewWorkExperienceCreateAction;
use App\Action\CrewWorkExperience\CrewWorkExperienceDeleteAction;
use App\Action\CrewWorkExperience\CrewWorkExperienceListAction;
use App\Action\CrewWorkExperience\CrewWorkExperienceShowAction;
use App\Action\CrewWorkExperience\CrewWorkExperienceUpdateAction;
use Auth;
use Validator;
use Log;
use DB;
use App\Http\Requests\CrewWorkExperience\CrewWorkExperienceCreateRequest;
use App\Http\Requests\CrewWorkExperience\CrewWorkExperienceUpdateRequest;


class CrewWorkExperienceController extends Controller
{

  public function index(Request $request){
    $action = new CrewWorkExperienceListAction();
    $data = $action->execute($request);
    return $data;
  }

  public function store(CrewWorkExperienceCreateRequest $request){
    $action = new CrewWorkExperienceCreateAction();
    $data = $action->execute($request);
    return $data;
  }

  public function show($id){
    $action = new CrewWorkExperienceShowAction();
    $data = $action->execute($id);
    return $data;
  }

  public function update(CrewWorkExperienceUpdateRequest $request,$id){
    $action = new CrewWorkExperienceUpdateAction();
    $data = $action->execute($request,$id);
    return $data;
  }

  public function destroy($id){
    $action = new CrewWorkExperienceDeleteAction();
    $data = $action->execute($id);
    return $data;
  }

}
