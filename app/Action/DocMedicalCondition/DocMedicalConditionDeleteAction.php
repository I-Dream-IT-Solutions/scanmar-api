<?php

namespace App\Action\DocMedicalCondition;

use Illuminate\Pagination\Paginator;
use Session;
use Storage;
use Log;
use App\Models\CrewDocMedicalCondition;

class DocMedicalConditionDeleteAction
{

  public function execute($id)
  {
    $data = CrewDocMedicalCondition::find($id);

    $data->delete();
    
    return $data;
  }



}
