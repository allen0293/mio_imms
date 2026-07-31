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
        Schema::table('purchase_request_approvals', function (Blueprint $table) {
            // Update the existing enum options
            $table->enum('status', ['Pending', 'Approved', 'Returned', 'Rejected'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('purchase_request_approvals', function (Blueprint $table) {
            // Optional: Revert to previous enum values if needed
            // $table->enum('status', ['Original', 'Values', 'Here'])->change();
        });
    }
};
