<?php

namespace App\Action\Notification;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\Notification;
use Auth;

class NotificationListAction
{

  public function execute($request)
  {

    $records = new Notification();
    $records = $records->where('target_id','like','%"'.Auth::user()->id.'"%');

    if($request->has('limit'))
    $records = $records->paginate($request->get('limit'));
    else
    $records = $records->get();


    return $records;
  }



}
