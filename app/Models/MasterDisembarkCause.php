<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class MasterDisembarkCause extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'master_disembark_cause';
    public $timestamps = false;

}
