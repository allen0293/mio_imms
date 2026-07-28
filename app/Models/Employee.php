<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'employee_number',
        'first_name',
        'middle_name',
        'last_name',
        'extension_name',
        'gender',
        'birthdate',
        'position',
        'department_id',
        'office_name',
        'email',
        'contact_number',
        'photo',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected static function booted()
    {
        static::creating(function ($employee) {
            $employee->uuid = (string) Str::uuid();

            if (Auth::check()) {
                $employee->created_by = Auth::id();
                $employee->updated_by = Auth::id();
            }
        });

        static::updating(function ($employee) {
            if (Auth::check()) {
                $employee->updated_by = Auth::id();
            }
        });
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function getFullNameAttribute()
    {
        return trim(implode(' ', array_filter([
            $this->first_name,
            $this->middle_name,
            $this->last_name,
            $this->extension_name,
        ])));
    }
}