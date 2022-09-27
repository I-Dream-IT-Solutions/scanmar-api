<?php

namespace App\Action\Document;

use Illuminate\Pagination\Paginator;
use Session;
use Storage;
use Log;
use App\Models\CrewDocument;

class DocumentDeleteAction
{

  public function execute($id)
  {
    $data = CrewDocument::find($id);

    $data->delete();
    
    return $data;
  }



}
