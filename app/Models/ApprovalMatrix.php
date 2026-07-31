<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApprovalMatrix extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

        'uuid',

        'module',

        'approval_level',

        'department_id',

        'approver_id',

        'is_active',

        'created_by',

        'updated_by',

    ];

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function approver()
    {
        return $this->belongsTo(User::class,'approver_id');
    }
}
