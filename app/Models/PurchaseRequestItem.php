<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchaseRequestItem extends Model
{
    use HasFactory;
    protected $fillable = [

        'purchase_request_id',

        'equipment_model_id',

        'quantity',

        'estimated_unit_cost',

        'estimated_total_cost',

        'remarks'

    ];

    public function purchaseRequest()
    {
        return $this->belongsTo(PurchaseRequest::class);
    }

    public function equipmentModel()
    {
        return $this->belongsTo(EquipmentModel::class);
    }
}