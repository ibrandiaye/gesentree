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
            $table->string("prenompere")->nullable();
            $table->string("nommere")->nullable();
            $table->string("prenommere")->nullable();
            $table->string("commentaire")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('visiteurs', function (Blueprint $table) {
            $table->dropColumn("prenompere");
            $table->dropColumn("nommere");
            $table->dropColumn("prenommere");
            $table->dropColumn("commentaire");
        });
    }
};
