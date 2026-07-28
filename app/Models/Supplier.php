<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Supplier extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'uuid',

        'supplier_code',

        'supplier_name',

        'contact_person',

        'contact_number',

        'email',

        'address',

        'tin_number',

        'remarks',

        'is_active',

        'created_by',

        'updated_by',

    ];

    protected static function booted()
    {
        static::creating(function ($supplier) {

            $supplier->uuid = (string) Str::uuid();

            if (Auth::check()) {

                $supplier->created_by = Auth::id();

                $supplier->updated_by = Auth::id();

            }

        });

        static::updating(function ($supplier) {

            if (Auth::check()) {

                $supplier->updated_by = Auth::id();

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