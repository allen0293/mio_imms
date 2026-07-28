<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Department extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'uuid',

        'department_code',

        'department_name',

        'office_name',

        'description',

        'is_active',

        'created_by',

        'updated_by'

    ];

    protected static function booted()
           {
            static::creating(function ($department) {

                $department->uuid = (string) Str::uuid();

                if (Auth::check()) {
                    $department->created_by = Auth::id();
                    $department->updated_by = Auth::id();
                }

            });

            static::updating(function ($department) {

                if (Auth::check()) {
                    $department->updated_by = Auth::id();
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

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

}