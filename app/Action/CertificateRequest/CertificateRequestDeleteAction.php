<?php

namespace App\Action\CertificateRequest;

use Illuminate\Pagination\Paginator;
use Session;
use Storage;
use Log;
use App\Models\CertificateRequest;

class CertificateRequestDeleteAction
{

  public function execute($id)
  {
    $data = CertificateRequest::find($id);

    $data->status = config('constants.STAT_FOR_DELETION');
    $data->save();
    return $data;
  }



}
