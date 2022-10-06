<?php

namespace App\Action\CertificateRequest;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\CertificateRequest;

class CertificateRequestShowAction
{

  public function execute($id)
  {
    $record = CertificateRequest::find($id);


    return $record;
  }



}