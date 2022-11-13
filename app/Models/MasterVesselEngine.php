<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class MasterVesselEngine extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'master_vessel_engine';
    public $timestamps = false;

}
