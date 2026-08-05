<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ItemCategory extends Model
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
        static::creating(function ($model) {

            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }

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

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function creator()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class,'updated_by');
    }

    public function purchaseRequestItems()
    {
        return $this->hasMany(PurchaseRequestItem::class);
    }
}