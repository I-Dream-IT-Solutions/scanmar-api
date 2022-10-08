<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Schedule extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'schedule_id';
    protected $table = 'schedule';
    public $timestamps = false;
}
