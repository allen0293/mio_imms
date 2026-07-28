<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('purchase_requests', function (Blueprint $table) {

            $table->id();

            $table->uuid('uuid')->unique();

            $table->string('pr_number')->unique();

            $table->date('request_date');

            $table->date('needed_date')->nullable();

            $table->foreignId('department_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('requested_by')
                ->constrained('employees')
                ->restrictOnDelete();

            $table->text('purpose');

            $table->text('justification')->nullable();

            $table->enum('status',[
                'Draft',
                'Submitted',
                'Partially Approved',
                'Approved',
                'Rejected',
                'Cancelled',
                'Completed'
            ])->default('Draft');

            $table->text('remarks')->nullable();

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
        Schema::dropIfExists('purchase_requests');
    }
};