<?php

namespace App\Action\DocumentUpload;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewDocumentUpload;

class DocumentUploadShowAction
{

  public function execute($id)
  {
    $record = CrewDocumentUpload::find($id);


    return $record;
  }



}
