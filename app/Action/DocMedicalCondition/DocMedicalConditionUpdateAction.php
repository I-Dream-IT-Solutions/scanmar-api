<?php

namespace App\Action\DocMedicalCondition;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewDocMedicalCondition;
use Auth;

class DocMedicalConditionUpdateAction
{

  public function execute($request, $id)
  {

    $record = CrewDocMedicalCondition::find($id);
    $data = $request->all();

    $DocMedicalCondition = [
        'crew_no'  => $data['crew_no'],
        'doccode'  => $data['doccode'],
        'date_issue'  => $data['date_issue'],
        'medical_condition_id' => $data['medical_condition_id'],
        'other_description'  => $data['other_description'],
        'remarks'  => $data['remarks'],
        'mod_date'  => date('Y-m-d H:i:s'),
        'mod_by'  => $id,
    ];

    $record->update($DocMedicalCondition);

    return $record;
  }



}
