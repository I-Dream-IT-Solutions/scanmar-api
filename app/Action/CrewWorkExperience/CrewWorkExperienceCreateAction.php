<?php

namespace App\Action\CrewWorkExperience;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewWorkExperience;

class CrewWorkExperienceCreateAction
{

  public function execute($request)
  {
    $data = $request->all();
    $records[] = CrewWorkExperience::create([
      'crew_no'  => Auth::user()->crew_no,
      'pos_code'  => $data['pos_code'],
      'datefrom'  => date('Y-m-d',strtotime($data['datefrom'])),
      'dateto'  => date('Y-m-d',strtotime($data['dateto'])),
      'nomonth'  => $data['nomonth'],
      'noyear'  => $data['noyear'],
      'nodays'  => $data['nodays'],
      'cause'  => $data['cause'],
      'vesname'  => $data['vesname'],
      'aname'  => $data['aname'],
      'pname'  => $data['pname'],
      'groupx'  => $data['groupx'],
      'status'  => config('constants.STAT_FOR_APPROVAL'),
      // 'modified_date'  => date('Y-m-d H:i:s'),
      // 'modified_by'  => Auth::user()->id,
    ]);

    return $records;
  }



}
