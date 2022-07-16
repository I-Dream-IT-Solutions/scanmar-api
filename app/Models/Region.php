<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Region extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = '_region';
    public $timestamps = false;

}
