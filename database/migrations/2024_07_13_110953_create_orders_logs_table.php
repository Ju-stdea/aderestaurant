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
        Schema::create('orders_logs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('order_id');
            $table->string('customer_id');
            $table->float('total_amount', 8, 2);
            $table->float('cart_amount', 8, 2);
            $table->float('shipping_cost', 8, 2);
            $table->boolean('is_discount')->default(false);
            $table->float('discount_value', 8, 2);
            $table->string('reference')->nullable();
            $table->longText('shipping_address')->nullable();
            $table->longText('billing_address')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('order_note')->nullable();
            $table->string('shipping_type')->nullable();
            $table->string('payment_status')->default('Pending');
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_logs');
    }
};
