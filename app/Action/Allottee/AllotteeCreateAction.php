<?php

namespace App\Action\Allottee;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewAllottee;
use App\Action\Notification\NotificationCreateAction;

class AllotteeCreateAction
{

  public function execute($request)
  {
    $data = $request->all();
    $records = CrewAllottee::create([
      'crew_no'  => Auth::user()->crew_no,
      'last_name'  => $data['last_name'],
      'first_name'  => $data['first_name'],
      'middle_name'  => $data['middle_name'],
      'email'  => $data['email'],
      'telno'  => $data['telno'],
      'address'  => $data['address'],
      'zipcode'  => $data['zipcode'],
      'relation'  => $data['relation'],
      'code'  => $data['code'],
      'bbranch'  => $data['bbranch'],
      'acct_type'  => $data['acct_type'],
      'acct_no'  => isset($data['acct_no'])?$data['acct_no']:'',
      // 'callice'  => $data['callice'],

      'modes'  => '',
      'allottyp'  => '',
      'bankcode'  => '',
      'descr'  => '',
      'pcharger'  => '0',
      'bcharges'  => '0',
      'mode'  => '0',
      'percent'  => '0',
      'amount'  => '0',
      'adj'  => '0',
      'remsal'  => '0',
      'fixpeso'  => '0',
      'percent1'  => '0',
      'amount1'  => '0',
      'adj1'  => '0',
      'remsal1'  => '0',
      'fixpeso1'  => '0',
      'percent2'  => '0',
      'amount2'  => '0',
      'adj2'  => '0',
      'remsal2'  => '0',
      'fixpeso2'  => '0',
      'percent3'  => '0',
      'amount3'  => '0',
      'adj3'  => '0',
      'remsal3'  => '0',
      'fixpeso3'  => '0',
      'user_code'  => '',
      'dateedit'  => date('Y-m-d H:i:s'),
      'priorno'  => '0',
      'distcode'  => '0',
      'actcode1'  => '',
      'cexp1a'  => '0',
      'pact1a'  => '0',
      'cact1a'  => '0',
      'cexp2a'  => '0',
      'pact2a'  => '0',
      'cact2a'  => '0',
      'cexp11a'  => '0',
      'pact21a'  => '0',
      'cact21a'  => '0',
      'cexp22a'  => '0',
      'pact22a'  => '0',
      'cact22a'  => '0',
      'cexp31a'  => '0',
      'pact32a'  => '0',
      'cact32a'  => '0',
      'pact11a'  => '0',
      'cact11a'  => '0',
      'cexp12a'  => '0',
      'pact12a'  => '0',
      'cact12a'  => '0',
      'cexp21a'  => '0',
      'pact31a'  => '0',
      'cact31a'  => '0',
      'cexp31a'  => '0',
      'cexp32a'  => '0',
      'pact32a'  => '0',
      'cact32a'  => '0',

      'modified_date'  => date('Y-m-d H:i:s'),
      'modified_by'  => Auth::user()->id,
      'deleted_by'  => '0',
      'delete_reason'  => '',
      'metadata'  => '',
      'status'  => config('constants.STAT_NEW'),
    ]);

    $notifData =[
      'id'=>$records->id,
      'name'=>$records->level,
    ];

    $notif_action = new NotificationCreateAction();
    $notif_action->execute($notifData,'add_allottee');

    return $records;
  }



}
