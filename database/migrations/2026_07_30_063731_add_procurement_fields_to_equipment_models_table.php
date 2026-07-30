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
        Schema::table('equipment_models', function (Blueprint $table) {

            $table->string('unit_of_measure')
                ->default('Unit')
                ->after('model_name');

            $table->decimal('standard_cost', 15, 2)
                ->default(0)
                ->after('unit_of_measure');

            $table->text('specification')
                ->nullable()
                ->after('standard_cost');

        });
    }

    public function down(): void
    {
        Schema::table('equipment_models', function (Blueprint $table) {

            $table->dropColumn([
                'unit_of_measure',
                'standard_cost',
                'specification',
            ]);

        });
    }
};
