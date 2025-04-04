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
        // Check if the 'states' table already exists
        if (!Schema::hasTable('states')) {
            Schema::create('states', function (Blueprint $table) {
                $table->mediumIncrements('id');
                $table->string('name', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->unsignedMediumInteger('country_id');
                $table->char('country_code', 2)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->string('fips_code')->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->string('iso2')->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->string('type', 191)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->decimal('latitude', 10, 8)->nullable();
                $table->decimal('longitude', 11, 8)->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
                $table->boolean('flag')->default(true);
                $table->string('wikiDataId', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('Rapid API GeoDB Cities');

                // Foreign key
                $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
};
