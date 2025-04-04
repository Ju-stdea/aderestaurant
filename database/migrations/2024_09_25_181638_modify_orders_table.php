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
        Schema::table('orders', function (Blueprint $table) {
            // Add a 'tips' column as a decimal with precision 10 and scale 2 for monetary values
            $table->decimal('tips', 10, 2)->nullable()->after('grand_total');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop the 'tips' column when rolling back the migration
            $table->dropColumn('tips');
        });
    }
};
