<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class City extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = '_citymun';
    public $timestamps = false;

}
