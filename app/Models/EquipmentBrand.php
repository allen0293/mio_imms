<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EquipmentBrand extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'equipment_brands';
    protected $fillable = [
        'uuid',
        'brand_code',
        'brand_name',
        'description',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected static function booted()
    {
        static::creating(function ($brand) {
            $brand->uuid = (string) Str::uuid();

            if (Auth::check()) {
                $brand->created_by = Auth::id();
                $brand->updated_by = Auth::id();
            }
        });

        static::updating(function ($brand) {
            if (Auth::check()) {
                $brand->updated_by = Auth::id();
            }
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}