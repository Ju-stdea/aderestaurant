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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('customer_id');
            $table->string('order_code');
            $table->string('transaction_id')->unique(); // PayPal transaction ID
            $table->enum('order_status', [
                'Pending',        // Initial state after the order is placed
                'Processing',     // Order is being prepared or packed
                'Shipped',        // Order has been shipped but not yet delivered
                'Delivered',      // Order has been delivered to the customer
                'Completed',      // Order is completed
                'On Hold',        // Order is temporarily on hold (e.g., awaiting stock)
                'Cancelled',      // Order was cancelled
                'Failed',         // Order failed to be processed or paid
                'Awaiting Payment' // Order placed but payment is still pending
            ])->default('Pending'); // Order status
            $table->string('delivery_status')->nullable();

            $table->decimal('ups_shipping_charges', 8, 2)->nullable();
            $table->string('ups_service_code')->nullable();
            $table->string('ups_service_name')->nullable();
            $table->string('ups_service_description')->nullable();
            $table->decimal('total_weight', 8, 2);
            $table->enum('payment_status', [
                'Pending',
                'Processing',
                'Paid',
                'On Hold',
                'Cancelled',
                'Failed',
                'Refunded',
                'Awaiting Payment',
                'Partially Refunded',
                'Authorized'
            ])->default('Pending');
            $table->decimal('order_amount', 8, 2);
            $table->decimal('sub_total_amount', 8, 2);
            $table->decimal('grand_total', 8, 2);

            $table->boolean('is_discount')->default(false);
            $table->decimal('discount_value', 8, 2)->default('00.00');

            $table->string('coupon_code')->nullable();
            $table->decimal('coupon_amount', 8, 2)->nullable();

            $table->string('payment_method')->nullable();
            $table->string('payment_gateway')->nullable();

            $table->string('courier_name')->nullable();

            $table->enum('is_review', ['TRUE', 'FALSE'])->default('FALSE');

            $table->dateTime('order_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
