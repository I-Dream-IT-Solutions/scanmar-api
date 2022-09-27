<?php

namespace App\Action\Document;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use Auth;
use App\Models\CrewDocument;

class DocumentCreateAction
{

  public function execute($request)
  {
    $id = '1';
    $data = $request->all();
    $records[] = CrewDocument::create([
      'crew_profile_id'  => $data['crew_profile_id'],
      'document_id'  => $data['document_id'],
      'issued_date'  => $data['issued_date'],
      'expiration_date'  => $data['expiration_date'],
      'created_date'  => date('Y-m-d H:i:s'),
      'created_by'  => $id,
      'modified_date'  => date('Y-m-d H:i:s'),
      'modified_by'  => $id,
    ]);

    return $records;
  }



}
