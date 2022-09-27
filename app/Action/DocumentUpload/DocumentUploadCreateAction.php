<?php

namespace App\Action\DocumentUpload;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewDocumentUpload;

class DocumentUploadCreateAction
{

  public function execute($request)
  {
    $data = $request->all();
    $records[] = CrewDocumentUpload::create([
      'crew_document_id'  => $data['crew_document_id'],
      'file_name'  => $data['file_name'],
    ]);

    return $records;
  }



}
