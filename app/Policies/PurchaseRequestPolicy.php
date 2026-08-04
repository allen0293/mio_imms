<?php

namespace App\Policies;

use App\Models\PurchaseRequest;
use App\Models\User;

class PurchaseRequestPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('purchase-request.view');
    }

    public function view(User $user, PurchaseRequest $purchaseRequest): bool
    {
        return $user->can('purchase-request.view');
    }

    public function create(User $user): bool
    {
        return $user->can('purchase-request.create');
    }

    public function update(User $user, PurchaseRequest $purchaseRequest): bool
    {
        if (!$user->can('purchase-request.edit')) {
            return false;
        }

        return $purchaseRequest->canEdit();
    }

    public function delete(User $user, PurchaseRequest $purchaseRequest): bool
    {
        if (!$user->can('purchase-request.delete')) {
            return false;
        }

        return $purchaseRequest->status === 'Draft';
    }

    public function submit(User $user, PurchaseRequest $purchaseRequest): bool
    {
        if (!$user->can('purchase-request.submit')) {
            return false;
        }

        return $purchaseRequest->canSubmit();
    }

    public function approve(User $user, PurchaseRequest $purchaseRequest): bool
    {
        if (!$user->can('purchase-request.approve')) {
            return false;
        }

        return $purchaseRequest->canApprove();
    }

    public function reject(User $user, PurchaseRequest $purchaseRequest): bool
    {
        if (!$user->can('purchase-request.reject')) {
            return false;
        }

        return $purchaseRequest->canReject();
    }

    public function returnForRevision(User $user, PurchaseRequest $purchaseRequest): bool
    {
        if (!$user->can('purchase-request.return')) {
            return false;
        }

        return $purchaseRequest->canReturn();
    }

    public function print(User $user, PurchaseRequest $purchaseRequest): bool
    {
        return $user->can('purchase-request.print');
    }
}