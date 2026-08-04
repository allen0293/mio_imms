<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PurchaseRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'pr_number',
        'request_type',
        'request_date',
        'needed_date',
        'department_id',
        'requested_by',
        'purpose',
        'justification',
        'remarks',
        'estimated_amount',
        'status',
        'created_by',
        'updated_by',
        'current_approval_level',
    ];

    protected $casts = [
        'request_date' => 'date',
        'needed_date' => 'date',
        'estimated_amount' => 'decimal:2',
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

        static::updating(function ($model) {

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

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function requester()
    {
        return $this->belongsTo(Employee::class, 'requested_by');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function items()
    {
        return $this->hasMany(PurchaseRequestItem::class);
    }

    public function approvals()
    {
        return $this->hasMany(PurchaseRequestApproval::class);
    }

    public function histories()
    {
        return $this->hasMany(PurchaseRequestHistory::class);
    }

    public function attachments()
    {
        return $this->hasMany(PurchaseRequestAttachment::class);
    }

    public function isEditable(): bool
        {
            return $this->status === 'Draft';
        }

    public function canEdit(): bool
    {
        return $this->isEditable();
    }


        public function canSubmit(): bool
{
    return $this->status === 'Draft';
}

public function canApprove(): bool
{
    return $this->status === 'Submitted';
}

public function canReject(): bool
{
    return $this->status === 'Submitted';
}

public function canReturn(): bool
{
    return $this->status === 'Submitted';
}

public function canCancel(): bool
{
    return in_array($this->status, [
        'Draft',
        'Submitted',
    ]);
}

public function isApproved(): bool
{
    return $this->status === 'Approved';
}
}