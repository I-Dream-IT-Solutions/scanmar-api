<?php

namespace App\Action\Document;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewDocument;

class DocumentShowAction
{

  public function execute($id)
  {
    $record = CrewDocument::find($id);


    return $record;
  }



}
