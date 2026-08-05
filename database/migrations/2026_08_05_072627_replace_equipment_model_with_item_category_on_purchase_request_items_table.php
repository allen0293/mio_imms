<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
    {
        Schema::table('purchase_request_items', function (Blueprint $table) {

            if (Schema::hasColumn('purchase_request_items', 'equipment_model_id')) {
                $table->dropColumn('equipment_model_id');
            }

            if (!Schema::hasColumn('purchase_request_items', 'item_category_id')) {
                $table->foreignId('item_category_id')
                    ->nullable()
                    ->after('purchase_request_id')
                    ->constrained('item_categories')
                    ->nullOnDelete();
            }
        });

        // Fix nullability + add FK if column exists but wasn't set up correctly
        if (Schema::hasColumn('purchase_request_items', 'item_category_id')) {
            $foreignKeyExists = collect(DB::select("
                SELECT CONSTRAINT_NAME FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE
                WHERE TABLE_SCHEMA = DATABASE()
                AND TABLE_NAME = 'purchase_request_items'
                AND COLUMN_NAME = 'item_category_id'
                AND REFERENCED_TABLE_NAME IS NOT NULL
            "))->isNotEmpty();

            if (!$foreignKeyExists) {
                Schema::table('purchase_request_items', function (Blueprint $table) {
                    $table->unsignedBigInteger('item_category_id')->nullable()->change();
                    $table->foreign('item_category_id')
                        ->references('id')->on('item_categories')
                        ->nullOnDelete();
                });
            }
        }
    }

    public function down(): void
    {
        Schema::table('purchase_request_items', function (Blueprint $table) {

            if (Schema::hasColumn('purchase_request_items', 'item_category_id')) {
                $table->dropForeign(['item_category_id']);
                $table->dropColumn('item_category_id');
            }

            if (!Schema::hasColumn('purchase_request_items', 'equipment_model_id')) {
                $table->foreignId('equipment_model_id')
                    ->nullable()
                    ->after('purchase_request_id')
                    ->constrained('equipment_models')
                    ->cascadeOnDelete();
            }

        });
    }
};