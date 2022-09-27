<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;

class CrewDocMedicalCondition extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'crew_doc_medical_condition';
    public $timestamps = false;
}
