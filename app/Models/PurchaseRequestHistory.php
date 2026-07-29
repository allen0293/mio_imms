<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class PurchaseRequestHistory extends Model
{
    use HasFactory;
    protected $table = 'purchase_request_history';
    protected $fillable = [
        
        'purchase_request_id',

        'action',

        'description',

        'performed_by'
        
    ];

    public function purchaseRequest()
    {
        return $this->belongsTo(PurchaseRequest::class);
    }

    public function performer()
    {
        return $this->belongsTo(User::class, 'performed_by');
    }
}