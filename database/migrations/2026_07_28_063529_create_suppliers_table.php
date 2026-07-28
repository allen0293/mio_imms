<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {

            $table->id();

            $table->uuid('uuid')->unique();

            $table->string('supplier_code',50)->unique();

            $table->string('supplier_name');

            $table->string('contact_person')->nullable();

            $table->string('contact_number')->nullable();

            $table->string('email')->nullable();

            $table->text('address')->nullable();

            $table->string('tin_number',30)->nullable();

            $table->text('remarks')->nullable();

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
        Schema::dropIfExists('suppliers');
    }
};