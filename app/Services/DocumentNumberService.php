<?php

namespace App\Services;

use App\Models\DocumentSequence;
use Illuminate\Support\Facades\DB;

class DocumentNumberService
{
    public static function generate(string $documentType): string
    {
        return DB::transaction(function () use ($documentType) {

            $year = now()->year;

            $sequence = DocumentSequence::lockForUpdate()
                ->firstOrCreate(
                    [
                        'document_type' => strtoupper($documentType),
                        'year' => $year
                    ],
                    [
                        'last_number' => 0
                    ]
                );

            $sequence->increment('last_number');

            return sprintf(
                '%s-%d-%06d',
                strtoupper($documentType),
                $year,
                $sequence->last_number
            );
        });
    }
}