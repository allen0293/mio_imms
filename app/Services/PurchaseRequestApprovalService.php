<?php

namespace App\Services;

use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestApproval;
use App\Models\PurchaseRequestHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PurchaseRequestApprovalService
{
    public function approve(
        PurchaseRequest $purchaseRequest,
        ?string $remarks = null
    ): void {

        if ($purchaseRequest->status !== 'Submitted') {

            throw ValidationException::withMessages([
                'status' => 'Only submitted purchase requests can be approved.',
            ]);

        }

        DB::transaction(function () use ($purchaseRequest, $remarks) {

            $approval = PurchaseRequestApproval::where(
                'purchase_request_id',
                $purchaseRequest->id
            )
            ->where(
                'approval_level',
                $purchaseRequest->current_approval_level
            )
            ->where(
                'status',
                'Pending'
            )
            ->firstOrFail();

            $approval->update([

                'status' => 'Approved',

                'remarks' => $remarks,

                'approved_at' => now(),

            ]);

            $nextLevel = $purchaseRequest->current_approval_level + 1;

            /*
            |--------------------------------------------------------------------------
            | Temporary Logic
            |--------------------------------------------------------------------------
            |
            | Later this will use the Approval Matrix.
            |
            */

            if ($nextLevel > 1) {

                $purchaseRequest->update([

                    'status' => 'Approved',

                ]);

            } else {

                $purchaseRequest->update([

                    'status' => 'Partially Approved',

                    'current_approval_level' => $nextLevel,

                ]);

            }

            PurchaseRequestHistory::create([

                'purchase_request_id' => $purchaseRequest->id,

                'action' => 'Approved',

                'description' => 'Purchase Request approved.',

                'performed_by' => auth()->id(),

            ]);

        });

    }

        public function return(
        PurchaseRequest $purchaseRequest,
        string $remarks
    ): void {

        if ($purchaseRequest->status !== 'Submitted') {

            throw ValidationException::withMessages([
                'status' => 'Only submitted purchase requests can be returned.',
            ]);

        }

        DB::transaction(function () use ($purchaseRequest, $remarks) {

            $approval = PurchaseRequestApproval::where(
                'purchase_request_id',
                $purchaseRequest->id
            )
            ->where(
                'approval_level',
                $purchaseRequest->current_approval_level
            )
            ->where(
                'status',
                'Pending'
            )
            ->firstOrFail();

            $approval->update([

                'status' => 'Returned',

                'remarks' => $remarks,

                'approved_at' => now(),

            ]);

            $purchaseRequest->update([

                'status' => 'Returned',

                'current_approval_level' => 0,

            ]);

            PurchaseRequestHistory::create([

                'purchase_request_id' => $purchaseRequest->id,

                'action' => 'Returned',

                'description' => $remarks,

                'performed_by' => auth()->id(),

            ]);

        });

    }
}