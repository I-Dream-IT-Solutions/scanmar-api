<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class CrewDocument extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'crew_document';
    public $timestamps = false;
}
