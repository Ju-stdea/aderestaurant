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
        Schema::create('coupons', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('coupon_option')->nullable();
            $table->string('coupon_code');
            $table->string('coupon_type')->nullable();
            $table->string('coupon_apply')->nullable();
            $table->longText('description')->nullable();

            $table->float('coupon_amount', 8, 2)->default('00.00')->nullable();
            $table->string('product_id')->nullable();
            $table->string('category_id')->nullable();
            $table->date('valid_from')->nullable();
            $table->date('valid_to')->nullable();

            $table->text('categories')->nullable();
            $table->text('users')->nullable();
            $table->text('products')->nullable();
            $table->string('amount_type')->nullable();
            $table->date('expiry_date')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
