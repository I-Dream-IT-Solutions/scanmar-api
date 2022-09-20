<?php

namespace App\Action\CrewWorkExperience;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewWorkExperience;
use Auth;

class CrewWorkExperienceUpdateAction
{

  public function execute($request, $id)
  {
    $record = CrewWorkExperience::find($id);
    $data = $request->all();

    $educ = [
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
    ];

    $record->update($educ);

    return $record;
  }



}
