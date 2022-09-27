<?php

namespace App\Action\DocMedicalCondition;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewDocMedicalCondition;

class DocMedicalConditionShowAction
{

  public function execute($id)
  {
    $record = CrewDocMedicalCondition::find($id);


    return $record;
  }



}
