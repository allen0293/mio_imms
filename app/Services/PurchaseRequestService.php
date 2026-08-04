<?php

namespace App\Services;

use App\Models\PurchaseRequest;
use App\Models\PurchaseRequestApproval;
use App\Models\PurchaseRequestAttachment;
use App\Models\PurchaseRequestHistory;
use App\Models\PurchaseRequestItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class PurchaseRequestService
{
    /*
    |--------------------------------------------------------------------------
    | Create Purchase Request
    |--------------------------------------------------------------------------
    */

    public function create(array $data): PurchaseRequest
    {
        return DB::transaction(function () use ($data) {

            $action = request()->input('action', 'draft');

            /*
            |--------------------------------------------------------------------------
            | Create Header
            |--------------------------------------------------------------------------
            */

            $purchaseRequest = $this->createHeader($data, $action);

            /*
            |--------------------------------------------------------------------------
            | Save Items
            |--------------------------------------------------------------------------
            */

            $estimatedAmount = $this->saveItems(
                $purchaseRequest,
                $data['items']
            );

            /*
            |--------------------------------------------------------------------------
            | Update Estimated Amount
            |--------------------------------------------------------------------------
            */

            $purchaseRequest->update([
                'estimated_amount' => $estimatedAmount,
            ]);

            /*
            |--------------------------------------------------------------------------
            | Save Attachments
            |--------------------------------------------------------------------------
            */

            if (!empty($data['attachments'])) {

                $this->saveAttachments(
                    $purchaseRequest,
                    $data['attachments']
                );

            }

            /*
            |--------------------------------------------------------------------------
            | Submit Workflow
            |--------------------------------------------------------------------------
            */

            if ($action === 'submit') {

                $purchaseRequest->update([
                    'current_approval_level' => 1,
                ]);

                $this->createApproval($purchaseRequest);

                $this->createHistory(
                    $purchaseRequest,
                    'Submitted',
                    'Purchase Request submitted for approval.'
                );

            } else {

                $this->createHistory(
                    $purchaseRequest,
                    'Created',
                    'Purchase Request saved as draft.'
                );

            }

            return $purchaseRequest;

        });
    }

    /*
    |--------------------------------------------------------------------------
    | Update Purchase Request
    |--------------------------------------------------------------------------
    */

    public function update(
        PurchaseRequest $purchaseRequest,
        array $data
    ): PurchaseRequest {

        // Will be implemented after Edit Screen

        return $purchaseRequest;
    }

    /*
    |--------------------------------------------------------------------------
    | Submit Existing Draft
    |--------------------------------------------------------------------------
    */

    public function submit(PurchaseRequest $purchaseRequest): void
    {
        if ($purchaseRequest->status !== 'Draft') {

            throw ValidationException::withMessages([
                'status' => 'Only Draft Purchase Requests can be submitted.',
            ]);

        }

        if ($purchaseRequest->items()->count() === 0) {

            throw ValidationException::withMessages([
                'items' => 'Please add at least one item.',
            ]);

        }

        DB::transaction(function () use ($purchaseRequest) {

            $purchaseRequest->update([
                'status' => 'Submitted',
                'current_approval_level' => 1,
            ]);

            $this->createApproval($purchaseRequest);

            $this->createHistory(
                $purchaseRequest,
                'Submitted',
                'Purchase Request submitted for approval.'
            );

        });
    }

    /*
    |--------------------------------------------------------------------------
    | Create Header
    |--------------------------------------------------------------------------
    */

    private function createHeader(
        array $data,
        string $action
    ): PurchaseRequest {

        return PurchaseRequest::create([

            'pr_number' => DocumentNumberService::generate('PR'),

            'request_type' => $data['request_type'],

            'request_date' => now(),

            'needed_date' => $data['needed_date'],

            'department_id' => $data['department_id'],

            'requested_by' => $data['requested_by'],

            'purpose' => $data['purpose'],

            'justification' => $data['justification'] ?? null,

            'remarks' => $data['remarks'] ?? null,

            'status' => $action === 'submit'
                ? 'Submitted'
                : 'Draft',

            'estimated_amount' => 0,

            'current_approval_level' => $action === 'submit'
                ? 1
                : 0,

        ]);

    }

    /*
    |--------------------------------------------------------------------------
    | Save Items
    |--------------------------------------------------------------------------
    */

    private function saveItems(
        PurchaseRequest $purchaseRequest,
        array $items
    ): float {

        $grandTotal = 0;

        foreach ($items as $index => $item) {

            $lineTotal =
                $item['quantity']
                * $item['estimated_unit_cost'];

            PurchaseRequestItem::create([

                'purchase_request_id' => $purchaseRequest->id,

                'equipment_model_id' => $item['equipment_model_id'],

                'description' => $item['description'] ?? null,

                'quantity' => $item['quantity'],

                'unit_of_measure' => $item['unit_of_measure'],

                'estimated_unit_cost' => $item['estimated_unit_cost'],

                'estimated_total_cost' => $lineTotal,

                'sort_order' => $index + 1,

                'remarks' => $item['remarks'] ?? null,

            ]);

            $grandTotal += $lineTotal;

        }

        return $grandTotal;
    }

    /*
    |--------------------------------------------------------------------------
    | Save Attachments
    |--------------------------------------------------------------------------
    */

    private function saveAttachments(
        PurchaseRequest $purchaseRequest,
        array $attachments
    ): void {

        foreach ($attachments as $attachment) {

            PurchaseRequestAttachment::create([

                'purchase_request_id' => $purchaseRequest->id,

                'file_name' => $attachment['file_name'],

                'file_path' => $attachment['file_path'],

                'file_type' => $attachment['file_type'],

                'uploaded_by' => Auth::id(),

            ]);

        }

    }

    /*
    |--------------------------------------------------------------------------
    | Create Approval
    |--------------------------------------------------------------------------
    */

    private function createApproval(
        PurchaseRequest $purchaseRequest
    ): void {

        PurchaseRequestApproval::create([

            'purchase_request_id' => $purchaseRequest->id,

            'approval_level' => 1,

            'approver_id' => $this->getDepartmentHead($purchaseRequest),

            'status' => 'Pending',

        ]);

    }

    /*
    |--------------------------------------------------------------------------
    | Create History
    |--------------------------------------------------------------------------
    */

    private function createHistory(
        PurchaseRequest $purchaseRequest,
        string $action,
        string $description
    ): void {

        PurchaseRequestHistory::create([

            'purchase_request_id' => $purchaseRequest->id,

            'action' => $action,

            'description' => $description,

            'performed_by' => Auth::id(),

        ]);

    }

    /*
    |--------------------------------------------------------------------------
    | Temporary Approver
    |--------------------------------------------------------------------------
    */

    private function getDepartmentHead(
        PurchaseRequest $purchaseRequest
    ): ?int {

        /*
        |--------------------------------------------------------------------------
        | Temporary Implementation
        |--------------------------------------------------------------------------
        |
        | This will be replaced by the Approval Matrix module.
        |
        */

        return 1;

    }
}