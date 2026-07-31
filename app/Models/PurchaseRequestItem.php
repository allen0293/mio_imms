<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class PurchaseRequestItem extends Model
{
       use HasFactory, SoftDeletes;
    protected $fillable = [
        'uuid',
        'purchase_request_id',
        'equipment_model_id',
        'description',
        'quantity',
        'unit_of_measure',
        'estimated_unit_cost',
        'estimated_total_cost',
        'sort_order',
        'remarks',
    ];

    protected $casts = [
        'estimated_unit_cost' => 'decimal:2',
        'estimated_total_cost' => 'decimal:2',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {

            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    public function purchaseRequest()
    {
        return $this->belongsTo(PurchaseRequest::class);
    }

    public function equipmentModel()
    {
        return $this->belongsTo(EquipmentModel::class);
    }
}