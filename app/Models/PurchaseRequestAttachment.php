<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;

class PurchaseRequestAttachment extends Model
{
    use HasFactory;
    protected $fillable = [

        'purchase_request_id',
        'file_name',
        'file_path',
        'uploaded_by'

    ];

    public function purchaseRequest()
    {
        return $this->belongsTo(PurchaseRequest::class);
    }

    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }
}