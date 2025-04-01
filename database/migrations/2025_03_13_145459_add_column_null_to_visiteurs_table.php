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
        Schema::table('visiteurs', function (Blueprint $table) {
         
            $table->string("numelec")->nullable()->change();
            $table->string("commune")->nullable()->change();
            $table->string("nationalite")->nullable()->change();
            $table->string("date_emission")->nullable()->change();
            $table->string("date_expiration")->nullable()->change();
            $table->string("mrz")->nullable()->change();
            $table->string("photo")->nullable()->change();
            $table->string("numcarte")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visiteurs', function (Blueprint $table) {
            $table->string("numelec")->change();
            $table->string("commune")->change();
            $table->string("nationalite")->change();
            $table->string("date_emission")->change();
            $table->string("date_expiration")->change();
            $table->string("mrz")->change();
            $table->string("photo")->change();
            $table->string("numcarte")->change();
        });
    }
};
