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
        Schema::table('users', function (Blueprint $table) {
            $table->string('surname')->nullable()->after('password');
            $table->integer('country_id')->nullable()->after('surname');
            $table->string('phone')->nullable()->after('country_id');
            $table->string('gender')->nullable()->after('phone');
            $table->string('profile_picture')->nullable()->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('surname');
            $table->dropColumn('country_id');
            $table->dropColumn('phone');
            $table->dropColumn('gender');
            $table->dropColumn('profile_picture');
        });
    }
};
