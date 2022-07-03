<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class CrewProfile extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'crew_profile';
    public $timestamps = false;

}
