<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipment_models', function (Blueprint $table) {

            $table->id();

            $table->uuid('uuid')->unique();

            $table->string('model_code',50)->unique();

            $table->string('model_name');

            $table->foreignId('equipment_category_id')
                ->constrained('equipment_categories')
                ->restrictOnDelete();

            $table->foreignId('equipment_brand_id')
                ->constrained('equipment_brands')
                ->restrictOnDelete();

            $table->string('manufacturer_part_number')->nullable();

            $table->text('description')->nullable();

            $table->boolean('is_active')->default(true);

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            $table->softDeletes();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipment_models');
    }
};