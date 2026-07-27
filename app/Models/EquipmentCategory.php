<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class EquipmentCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'category_code',
        'category_name',
        'description',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected static function booted()
    {
        static::creating(function ($category) {
            $category->uuid = (string) Str::uuid();

            if (Auth::check()) {
                $category->created_by = Auth::id();
                $category->updated_by = Auth::id();
            }
        });

        static::updating(function ($category) {
            if (Auth::check()) {
                $category->updated_by = Auth::id();
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