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


    return $record;
  }


}