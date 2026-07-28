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

        'request_date',

        'needed_date',

        'department_id',

        'requested_by',

        'purpose',

        'justification',

        'status',

        'remarks',

        'created_by',

        'updated_by',

    ];

    protected static function booted()
    {
        static::creating(function ($pr) {

            $pr->uuid = (string) Str::uuid();

            if (Auth::check()) {

                $pr->created_by = Auth::id();

                $pr->updated_by = Auth::id();

            }

        });

        static::updating(function ($pr) {

            if (Auth::check()) {

                $pr->updated_by = Auth::id();

            }

        });
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function requester()
    {
        return $this->belongsTo(Employee::class,'requested_by');
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
}