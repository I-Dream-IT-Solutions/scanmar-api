<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class MasterVesselRoute extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'master_vessel_route';
    public $timestamps = false;

}
