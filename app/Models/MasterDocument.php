<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class MasterDocument extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'master_document';
    public $timestamps = false;
}
