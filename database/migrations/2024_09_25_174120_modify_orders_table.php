<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Check if each column exists before adding/modifying it
            
            // Make customer_id nullable if it exists
            if (Schema::hasColumn('orders', 'customer_id')) {
                $table->uuid('customer_id')->nullable()->change();
            }

            // Add guest_email if it doesn't exist
            if (!Schema::hasColumn('orders', 'guest_email')) {
                $table->string('guest_email')->nullable();
            }

            // Add guest_name if it doesn't exist
            if (!Schema::hasColumn('orders', 'guest_name')) {
                $table->string('guest_name')->nullable();
            }

            // Add guest_phone if it doesn't exist
            if (!Schema::hasColumn('orders', 'guest_phone')) {
                $table->string('guest_phone')->nullable();
            }

            // Drop 'ups_service_description' if it exists
            if (Schema::hasColumn('orders', 'ups_service_description')) {
                $table->dropColumn('ups_service_description');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Revert customer_id to not nullable if it exists
            if (Schema::hasColumn('orders', 'customer_id')) {
                $table->uuid('customer_id')->nullable(false)->change();
            }

            // Drop guest-related columns if they exist
            if (Schema::hasColumn('orders', 'guest_email')) {
                $table->dropColumn('guest_email');
            }
            if (Schema::hasColumn('orders', 'guest_name')) {
                $table->dropColumn('guest_name');
            }
            if (Schema::hasColumn('orders', 'guest_phone')) {
                $table->dropColumn('guest_phone');
            }

            // Revert 'order_status' enum values if it exists
            if (Schema::hasColumn('orders', 'order_status')) {
                $table->enum('order_status', ['Pending', 'Completed', 'Processing', 'On Hold', 'Cancelled', 'Failed', 'Awaiting Payment'])->default('Pending')->change();
            }

            // Re-add 'ups_service_description' if needed
            if (!Schema::hasColumn('orders', 'ups_service_description')) {
                $table->string('ups_service_description')->nullable();
            }
        });
    }
};
