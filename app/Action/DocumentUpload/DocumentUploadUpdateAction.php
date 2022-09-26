<?php

namespace App\Action\DocumentUpload;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewDocumentUpload;
use Auth;

class DocumentUploadUpdateAction
{

  public function execute($request, $id)
  {

    $record = CrewDocumentUpload::find($id);
    $data = $request->all();

    $DocumentUpload = [
        'crew_document_id'  => $data['crew_document_id'],
        'file_name'  => $data['file_name'],
    ];

    $record->update($DocumentUpload);

    return $record;
  }



}
