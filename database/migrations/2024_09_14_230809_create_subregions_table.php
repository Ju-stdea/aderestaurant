<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create 'subregions' table
        Schema::create('subregions', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('name', 100)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->text('translations')->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->unsignedMediumInteger('region_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
            $table->boolean('flag')->default(true);
            $table->string('wikiDataId', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('Rapid API GeoDB Cities');

            // Foreign key
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subregions');
    }
};
