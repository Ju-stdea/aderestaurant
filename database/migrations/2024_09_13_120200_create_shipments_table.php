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
        Schema::create('shipments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('order_id');
            $table->string('shipment_identification');
            $table->string('tracking_number');
            $table->string('transaction_reference')->nullable();
            $table->float('total_charges', 8);
            $table->float('transportation_charges', 8);
            $table->float('base_service_charge', 8);
            $table->float('itemized_charges', 8)->nullable();
            $table->string('currency_code', 10);
            $table->float('billing_weight', 8);
            $table->string('weight_unit', 10);
            $table->text('shipping_label_base64')->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
