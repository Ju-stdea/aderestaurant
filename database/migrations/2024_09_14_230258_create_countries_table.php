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
        // Check if the 'countries' table already exists
        if (!Schema::hasTable('countries')) {
            Schema::create('countries', function (Blueprint $table) {
                $table->mediumIncrements('id');
                $table->string('name', 100)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->char('iso3', 3)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->char('numeric_code', 3)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->char('iso2', 2)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->string('phonecode', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->string('capital', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->string('currency', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->string('currency_name', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->string('currency_symbol', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->string('tld', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->string('native', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->string('region', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->unsignedMediumInteger('region_id')->nullable();
                $table->string('subregion', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->unsignedMediumInteger('subregion_id')->nullable();
                $table->string('nationality', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->text('timezones')->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->text('translations')->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->decimal('latitude', 10, 8)->nullable();
                $table->decimal('longitude', 11, 8)->nullable();
                $table->string('emoji', 191)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->string('emojiU', 191)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
                $table->boolean('flag')->default(true);
                $table->string('wikiDataId', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('Rapid API GeoDB Cities');
                
                // Indexes
                $table->index('region_id');
                $table->index('subregion_id');
    
                // Foreign keys
                $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
                $table->foreign('subregion_id')->references('id')->on('subregions')->onDelete('cascade');
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
        Schema::dropIfExists('countries');
    }
};
