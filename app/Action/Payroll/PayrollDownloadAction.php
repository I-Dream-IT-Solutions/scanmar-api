<?php

namespace App\Action\Payroll;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use App\Models\Payroll;
use Storage;

class PayrollDownloadAction
{

  public function execute( $id)
  {
    $record = Payroll::find($id);
    $path = "https://scanmar.ph/crew-application/uploads/crew/".$record->crew_no."/". $record->new_file_name;
    Storage::put($record->new_file_name, file_get_contents($path));

    $path = Storage::path($record->new_file_name);

    return response()->download($path);

  }



}
