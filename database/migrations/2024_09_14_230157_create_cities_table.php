<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Check if the 'cities' table already exists
        if (!Schema::hasTable('cities')) {
            Schema::create('cities', function (Blueprint $table) {
                $table->mediumIncrements('id');
                $table->string('name', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->unsignedMediumInteger('state_id');
                $table->string('state_code', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->unsignedMediumInteger('country_id');
                $table->char('country_code', 2)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->decimal('latitude', 10, 8);
                $table->decimal('longitude', 11, 8);
                $table->timestamp('created_at')->default('2014-01-01 12:01:01');
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
                $table->boolean('flag')->default(1);
                $table->string('wikiDataId', 255)->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->nullable()->comment('Rapid API GeoDB Cities');

                // Indexes
                $table->index('state_id');
                $table->index('country_id');

                // Foreign key constraints
                $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
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
        Schema::dropIfExists('cities');
    }
};
