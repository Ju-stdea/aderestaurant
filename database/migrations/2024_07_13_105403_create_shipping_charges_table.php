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
        Schema::create('shipping_charges', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->float('shipping_charges')->nullable();
            $table->float('0_500g')->nullable();
            $table->float('501_1000g')->nullable(); 
            $table->float('1001_2000g')->nullable(); 
            $table->float('2001_5000g')->nullable(); 
            $table->float('above_5000g')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_charges');
    }
};
