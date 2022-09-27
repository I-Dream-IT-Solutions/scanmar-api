<?php

namespace App\Action\Document;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CrewDocument;
use Auth;

class DocumentUpdateAction
{

  public function execute($request, $id)
  {

    $record = CrewDocument::find($id);
    $data = $request->all();

    $document = [
        'crew_profile_id'  => $data['crew_profile_id'],
        'document_id'  => $data['document_id'],
        'issued_date'  => $data['issued_date'],
        'expiration_date'  => $data['expiration_date'],
        'created_date'  => $data['created_date'],
        'created_by'  => $data['created_by'],
        'modified_date'  => $data['modified_date'],
        'modified_by'  => $data['modified_by'],
    ];

    $record->update($document);

    return $record;
  }



}
