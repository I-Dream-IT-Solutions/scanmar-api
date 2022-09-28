<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Carbon\Carbon;

class Notification extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'notification';
    protected $primaryKey = 'notification_id';
    public $timestamps = false;

    protected $appends = [
  		'ago'
  	];


    public function getAgoAttribute(){
      $dt = Carbon::parse($this->created_date);
      return $dt->diffForHumans();
  	}

}
