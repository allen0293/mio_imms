<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'department_code',
        'department_name',
        'office_name',
        'description',
        'is_active'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}