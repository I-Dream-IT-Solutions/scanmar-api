<?php

namespace App\Action\DocMedicalCondition;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewDocMedicalCondition;

class DocMedicalConditionCreateAction
{

  public function execute($request)
  {
    $id = '1';
    $data = $request->all();
    $records[] = CrewDocMedicalCondition::create([
      'crew_no'  => $data['crew_no'],
      'doccode'  => $data['doccode'],
      'date_issue'  => $data['date_issue'],
      'medical_condition_id' => $data['medical_condition_id'],
      'other_description'  => $data['other_description'],
      'remarks'  => $data['remarks'],
      'mod_date'  => date('Y-m-d H:i:s'),
      'mod_by'  => $id,
    ]);

    return $records;
  }



}
