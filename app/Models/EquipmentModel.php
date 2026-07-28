<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EquipmentModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'uuid',

        'model_code',

        'model_name',

        'equipment_category_id',

        'equipment_brand_id',

        'manufacturer_part_number',

        'description',

        'is_active',

        'created_by',

        'updated_by',

    ];

    protected static function booted()
    {
        static::creating(function ($model) {

            $model->uuid = Str::uuid();

            if (Auth::check()) {

                $model->created_by = Auth::id();

                $model->updated_by = Auth::id();

            }

        });

        static::updating(function ($model){

            if (Auth::check()) {

                $model->updated_by = Auth::id();

            }

        });

    }

    public function category()
    {
        return $this->belongsTo(
            EquipmentCategory::class,
            'equipment_category_id'
        );
    }

    public function brand()
    {
        return $this->belongsTo(
            EquipmentBrand::class,
            'equipment_brand_id'
        );
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class,'updated_by');
    }
}