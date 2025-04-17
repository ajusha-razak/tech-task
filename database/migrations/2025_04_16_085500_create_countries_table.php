<?php

use Database\Seeders\CountriesSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        if (!Schema::hasTable('countries')) {
            DB::statement("CREATE TABLE `countries` (
                `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
                `name` varchar(100) DEFAULT NULL,
                PRIMARY KEY (`id`)
              ) ENGINE=InnoDB DEFAULT CHARSET=utf8");

            Artisan::call('db:seed', [
                '--class' => CountriesSeeder::class,
                '--force' => true
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
