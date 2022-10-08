<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class ScheduleStatus extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'schedule_status';
    public $timestamps = false;
}
