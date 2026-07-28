<?php

namespace App\Services;

class ActivityLogService
{
    public static function log(
        $purchaseRequest,
        string $action,
        string $description,
        int $performedBy
    ): void {

        $purchaseRequest->histories()->create([

            'action' => $action,

            'description' => $description,

            'performed_by' => $performedBy

        ]);
    }
}