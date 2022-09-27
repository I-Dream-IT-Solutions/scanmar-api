<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class MasterDocumentType extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'master_document_type';
    public $timestamps = false;
}
