<?php

namespace App\Action\CrewWorkExperience;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
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

class CrewWorkExperienceCreateAction
{

  public function execute($request)
  {
    $data = $request->all();

    $type = MasterVesselType::where('type_code',$data['typecode'])->first();
    $agency = MasterAgency::where('id',$data['acode'])->first();
    $position = MasterPosition::where('id',$data['pos_code'])->first();
    $principal = MasterPrincipal::where('id',$data['pcode'])->first();
    $vessel = MasterVessel::where('vessel_id',$data['vescode'])->first();
    $cause = MasterDisembarkCause::where('code',$data['causecode'])->first();

    $records = CrewWorkExperience::create([
      'crew_no'  => Auth::user()->crew_no,
      'internal_Code'  => '',
      'type_of_cuisine'  => '0',
      'datepromo'  => '19900101',
      'datepromo1'  => '19900101',
      'datepromo2'  => '19900101',
      'datedemo'  => '19900101',
      'datetrans'  => '19900101',
      'datetrans1'  => '19900101',
      'datetrans2'  => '19900101',
      'datetrans3'  => '19900101',
      'datetrans4'  => '19900101',

      'oldvcode1'  => '',
      'oldvcode2'  => '',
      'oldvcode3'  => '',
      'oldvcode4'  => '',

      'oldvname1'  => '',
      'oldvname2'  => '',
      'oldvname3'  => '',
      'oldvname4'  => '',
      'metadata'  => '',
      'delete_reason'  => '',
      'basicpay'  => '0',
      'seqno'  => '0',
      'shortcont'  => '0',


      'pos_code'  => $data['pos_code'],
      'pos_name'  => $position?$position->name:'',

      'datefrom'  => date('Ymd',strtotime($data['datefrom'])),
      'dateto'  => date('Ymd',strtotime($data['dateto'])),
      'nomonth'  => 0,
      'noyear'  => 0,
      'nodays'  => 0,

      'vescode'  => $data['vescode'],
      'vesname'  => $vessel?$vessel->vessel_name:'',

      'acode'  => $data['acode'],
      'aname'  => $agency?$agency->agency_name:'',

      'pcode'  => $data['pcode'],
      'pname'  => $principal?$principal->principal_name:'',

      'typecode'  => $data['typecode'],
      'type'  => $type?$type->type_name:'',

      'causecode'  => $data['causecode'],
      'cause'  => $cause?$cause->name:'',


      'groupx'  => '',
      'route'  => $data['route'],
      'enginecode'  => $data['enginecode'],
      'flag'  => $data['flag'],

      'grt'  => $data['grt'],
      'bhp'  =>$data['bhp'],
      'nrt'  => $data['nrt'],
      'eng_kw'  => $data['kw'],
      'status'  => config('constants.STAT_NEW'),
      'last_update'  => date('Y-m-d H:i:s'),
    ]);


    $notifData =[
      'id'=>$records->id,
      'name'=>$records->pos_name,
    ];
    $notif_action = new NotificationCreateAction();
    $notif_action->execute($notifData,'add_work_experience');

    return $records;
  }



}
