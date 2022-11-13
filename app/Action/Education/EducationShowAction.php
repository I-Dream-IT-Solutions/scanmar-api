<?php

namespace App\Action\Education;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewEducation;

class EducationShowAction
{

  public function execute($id)
  {
    $record = CrewEducation::find($id);

    $metadata = str_replace('\\','',$record->metadata);
    $metadata = json_decode($record,true);

    if(is_array($metadata))
    $record->fill($metadata);


    return $record;
  }



}
