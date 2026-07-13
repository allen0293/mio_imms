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

                $table->string('employee_number')->unique();

                $table->string('first_name');
                $table->string('middle_name')->nullable();
                $table->string('last_name');
                $table->string('extension_name')->nullable();

                $table->enum('gender',['Male','Female'])->nullable();

                $table->date('birthdate')->nullable();

                $table->string('position');

                $table->foreignId('department_id')
                    ->constrained()
                    ->cascadeOnUpdate()
                    ->restrictOnDelete();

                $table->string('email')->nullable();

                $table->string('contact_number')->nullable();

                $table->string('photo')->nullable();

                $table->boolean('is_active')->default(true);

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
