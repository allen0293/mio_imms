<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('purchase_requests', function (Blueprint $table) {

            $table->unsignedInteger('current_approval_level')
                ->default(0)
                ->after('status');

        });
    }

    public function down(): void
    {
        Schema::table('purchase_requests', function (Blueprint $table) {

            $table->dropColumn('current_approval_level');

        });
    }
};