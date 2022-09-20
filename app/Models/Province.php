<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class Province extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = '__province';
    public $timestamps = false;

}
