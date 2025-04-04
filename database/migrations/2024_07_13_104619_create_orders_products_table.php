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
        Schema::create('orders_products', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('order_id');
            $table->string('customer_id')->nullable();
            $table->string('guest_email')->nullable();
            $table->string('product_id');
            $table->string('product_code')->nullable();
            $table->string('product_name')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_size')->nullable();
            $table->decimal('product_price', 8, 2)->nullable();
            $table->integer('product_qty')->nullable();
            $table->decimal('product_total', 8, 2);
            $table->enum('is_review', ['TRUE', 'FALSE'])->default('FALSE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders_products');
    }
};
