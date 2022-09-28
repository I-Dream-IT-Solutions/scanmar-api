<?php

namespace App\Action\CertificateRequest;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CertificateRequest;
use Auth;

class CertificateRequestUpdateAction
{

  public function execute($request, $id)
  {
    $record = CertificateRequest::find($id);
    $data = $request->all();

    $cert = [
        'crew_no'  => 1,
        'certificate_type_id'  => $data['certificate_type_id'],
        'certificate_type_option'  => $data['certificate_type_option'],
        'remarks'  => $data['remarks'],
        'created_by'  => $data['created_by'],
        'created_date'  => $data['created_date'],
        'modified_by'  => 1,
        'modified_date'  => date('Y-m-d H:i:s'),
        'status'  => config('constants.STAT_FOR_APPROVAL'),
    ];

    $record->update($cert);

    return $record;
  }



}
