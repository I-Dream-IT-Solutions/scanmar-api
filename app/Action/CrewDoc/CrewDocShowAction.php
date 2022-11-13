<?php

namespace App\Action\CrewDoc;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewDoc;

class CrewDocShowAction
{

  public function execute($id)
  {
    $record = CrewDoc::find($id);

    $metadata = str_replace('\\','',$record->metadata);
    $metadata = json_decode($record,true);

    if(is_array($metadata))
    $record->fill($metadata);

    return $record;
  }


}
