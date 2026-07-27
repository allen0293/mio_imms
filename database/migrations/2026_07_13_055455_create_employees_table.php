<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void
{
    Schema::create('employees', function (Blueprint $table) {
        $table->id();
        $table->uuid('uuid')->unique();

        $table->string('employee_number', 30)->unique();
        $table->string('first_name');
        $table->string('middle_name')->nullable();
        $table->string('last_name');
        $table->string('extension_name', 10)->nullable();

        $table->enum('gender', ['Male', 'Female'])->nullable();
        $table->date('birthdate')->nullable();

        $table->string('position');
        $table->foreignId('department_id')->constrained('departments')->restrictOnDelete();

        $table->string('office_name')->nullable();
        $table->string('email')->nullable();
        $table->string('contact_number')->nullable();
        $table->string('photo')->nullable();

        $table->boolean('is_active')->default(true);

        $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
        $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();

        $table->timestamps();
        $table->softDeletes();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
