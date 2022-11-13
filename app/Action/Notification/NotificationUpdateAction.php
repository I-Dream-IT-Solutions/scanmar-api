<?php

namespace App\Action\Notification;

use Illuminate\Pagination\Paginator;
use Session;
use Log;
use DB;
use App\Models\SystemUser;
use App\Models\Notification;
use Pusher\Pusher;
use Auth;

class NotificationUpdateAction
{

  public function execute($request)
  {
    $id = 12;
    $target_id = ["38"];
    $notif = Notification::where('notification_id',$id)->first();

    $duplicate = $notif->replicate();
    $duplicate->notification_type = 'approve_dependent';
    $duplicate->save();

    $duplicate = $notif->replicate();
    $duplicate->notification_type = 'disapprove_dependent';
    $duplicate->save();

    $duplicate = $notif->replicate();
    $duplicate->notification_type = 'approve_allottee';
    $duplicate->save();

    $duplicate = $notif->replicate();
    $duplicate->notification_type = 'disapprove_allottee';
    $duplicate->save();

    $duplicate = $notif->replicate();
    $duplicate->notification_type = 'approve_education';
    $duplicate->save();

    $duplicate = $notif->replicate();
    $duplicate->notification_type = 'disapprove_education';
    $duplicate->save();

    return '';
  }



}
