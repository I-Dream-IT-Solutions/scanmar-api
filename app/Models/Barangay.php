<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Barangay extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = '__barangay';
    public $timestamps = false;

}
