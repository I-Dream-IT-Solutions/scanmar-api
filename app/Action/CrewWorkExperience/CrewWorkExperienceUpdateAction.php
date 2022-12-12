<?php

namespace App\Action\CrewWorkExperience;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewWorkExperience;
use App\Models\MasterVesselType;
use App\Models\MasterPosition;
use App\Models\MasterVesselEngine;
use App\Models\MasterVessel;
use App\Models\MasterVesselVessel;
use App\Models\MasterAgency;
use App\Models\MasterDisembarkCause;
use App\Models\MasterPrincipal;
use App\Action\Notification\NotificationCreateAction;
use Auth;

class CrewWorkExperienceUpdateAction
{

  public function execute($request, $id)
  {
    $record = CrewWorkExperience::find($id);
    $data = $request->all();
    $sendNotif = true;

    $type = MasterVesselType::where('type_code',$data['typecode'])->first();
    $agency = MasterAgency::where('id',$data['acode'])->first();
    $position = MasterPosition::where('id',$data['pos_code'])->first();
    $principal = MasterPrincipal::where('id',$data['pcode'])->first();
    $vessel = MasterVessel::where('vessel_id',$data['vescode'])->first();
    $cause = MasterDisembarkCause::where('code',$data['causecode'])->first();
    $engine = MasterVesselEngine::where('id',$data['enginecode'])->first();

    $educ = [
      'crew_no'  => Auth::user()->crew_no,
      'pos_code'  => $data['pos_code'],
      'pos_name'  => $position?$position->name:'',

      'datefrom'  => date('Ymd',strtotime($data['datefrom'])),
      'dateto'  => date('Ymd',strtotime($data['dateto'])),
      // 'nomonth'  => 0,
      // 'noyear'  => 0,
      // 'nodays'  => 0,

      'vescode'  => $data['vescode'],
      'vesname'  => $vessel?$vessel->vessel_name:'',

      'acode'  => $data['acode'],
      'aname'  => $agency?$agency->agency_name:'',

      'pcode'  => $data['pcode'],
      'pname'  => $principal?$principal->principal_name:'',

      'typecode'  => $data['typecode']?$data['typecode']:'',
      'type'  => $type?$type->type_name:'',

      'causecode'  => $data['causecode']?$data['causecode']:'',
      'cause'  => $cause?$cause->name:'',


      'grt'  => $data['grt']?$data['grt']:'0',
      'bhp'  =>$data['bhp']?$data['bhp']:'0',
      'nrt'  => $data['nrt']?$data['nrt']:'0',
      'gear'  => $data['kw']?$data['kw']:'0',
      'route'  => $data['route']?$data['route']:'',
      'enginecode'  => $data['enginecode']?$data['enginecode']:'',
      'make'  => $engine?$engine->engine_make:'',

      'flag'  => $data['flag']?$data['flag']:'',
    ];

    $record->fill($educ);
    if($record->status == config('constants.STAT_NEW')){
      $record->last_update = date('Y-m-d H:i:s');
      // $record->modified_by = Auth::user()->id;
      $record->save();
      $sendNotif = false;
    }
    else{

      if($record->status == config('constants.STAT_FOR_APPROVAL'))
      $sendNotif = false;

      $changes = $record->getDirty();
      $record = CrewWorkExperience::find($id);
      $record->metadata = json_encode($educ);
      $record->last_update = date('Y-m-d H:i:s');
      // $record->modified_by = Auth::user()->id;
      $record->status = config('constants.STAT_FOR_APPROVAL');
      $record->save();
    }

    $notifData =[
      'id'=>$record->id,
      'name'=>$record->pos_name,
    ];

    if($sendNotif){
    $notif_action = new NotificationCreateAction();
    $notif_action->execute($notifData,'update_work_experience');
    }

    return $record;
  }



}
