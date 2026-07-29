<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchase_request_items', function (Blueprint $table) {

            $table->id();

            // NEW
            $table->uuid('uuid')->unique();

            $table->foreignId('purchase_request_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('equipment_model_id')
                ->constrained()
                ->restrictOnDelete();

            // NEW
            $table->string('description')->nullable();

            $table->integer('quantity');

            $table->string('unit_of_measure', 50)
                ->default('Unit');

            $table->decimal('estimated_unit_cost', 15, 2)
                ->default(0);

            $table->decimal('estimated_total_cost', 15, 2)
                ->default(0);

            $table->integer('sort_order')
                ->default(1);

            $table->text('remarks')->nullable();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('purchase_request_items');
    }
};