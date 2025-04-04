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
        Schema::create('categories', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('category_name')->unique();
            $table->string('slug');
            $table->float('category_discount')->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('asset_image_id')->nullable();
            $table->string('asset_image_url')->nullable();
            $table->string('asset_icon_path')->nullable();
            $table->string('image_id')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('is_cover')->default(false);
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
