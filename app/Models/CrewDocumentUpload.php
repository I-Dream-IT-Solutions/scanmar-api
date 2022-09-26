<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrewDocumentUpload extends Model
{
    use HasFactory;

    use HasFactory;
    protected $guarded = [];
    protected $table = 'crew_document_uploads';
    public $timestamps = false;
}
