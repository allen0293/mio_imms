<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class PurchaseRequestApproval extends Model
{
    use HasFactory;
    protected $fillable = [

        'purchase_request_id',

        'approval_level',

        'approver_id',

        'status',

        'remarks',

        'approved_at' => 'datetime'

    ];

    public function purchaseRequest()
    {
        return $this->belongsTo(PurchaseRequest::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }
}