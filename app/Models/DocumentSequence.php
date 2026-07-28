<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocumentSequence extends Model
{
    use HasFactory;

    protected $fillable = [

        'document_type',

        'year',

        'last_number'

    ];
}