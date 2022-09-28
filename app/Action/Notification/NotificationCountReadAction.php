<?php

namespace App\Action\Notification;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\Notification;
use Auth;

class NotificationCountReadAction
{

  public function execute($request)
  {

    $records = new Notification();
    $records = $records->where('target_id','like','%"'.Auth::user()->id.'"%');
    $records = $records->where('see_by','not like','%'.Auth::user()->id.'%');

    $records = $records->count();


    return $records;
  }



}
