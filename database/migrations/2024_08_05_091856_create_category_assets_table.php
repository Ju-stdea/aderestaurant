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
        Schema::create('category_assets', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('color_id')->nullable();
            $table->string('color_url')->nullable();
            $table->string('dark_id')->nullable();
            $table->string('dark_url')->nullable();
            $table->string('image_id')->nullable();
            $table->string('image_url')->nullable();
            $table->enum('is_featured', ['No', 'Yes'])->nullable();
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_assets');
    }
};
