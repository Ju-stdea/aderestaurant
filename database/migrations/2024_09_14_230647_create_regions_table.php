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
        // Check if the 'regions' table already exists
        if (!Schema::hasTable('regions')) {
            Schema::create('regions', function (Blueprint $table) {
                $table->mediumIncrements('id');
                $table->string('name', 100)->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->text('translations')->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
                $table->boolean('flag')->default(true);
                $table->string('wikiDataId', 255)->nullable()->charset('utf8mb4')->collation('utf8mb4_unicode_ci')->comment('Rapid API GeoDB Cities');
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
        Schema::dropIfExists('regions');
    }
};
