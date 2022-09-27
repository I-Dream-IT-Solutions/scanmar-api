<?php

namespace App\Action\DocumentUpload;

use Illuminate\Pagination\Paginator;
use Session;
use Storage;
use Log;
use App\Models\CrewDocumentUpload;

class DocumentUploadDeleteAction
{

  public function execute($id)
  {
    $data = CrewDocumentUpload::find($id);

    $data->delete();
    
    return $data;
  }



}
