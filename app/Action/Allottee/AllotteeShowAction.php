<?php

namespace App\Action\Allottee;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewAllottee;

class AllotteeShowAction
{

  public function execute($id)
  {
    $record = CrewAllottee::find($id);

    $metadata = str_replace('\\','',$record->metadata);
    $metadata = json_decode($record,true);

    if(is_array($metadata))
    $record->fill($metadata);


    return $record;
  }



}
