<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class CrewDoc extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'crew_doc';
    public $timestamps = false;
}
