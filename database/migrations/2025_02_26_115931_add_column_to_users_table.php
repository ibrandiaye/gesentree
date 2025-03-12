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
            $table->string("role");
            $table->unsignedBigInteger("site_id")->nullable();
            $table->foreign("site_id")
            ->references("id")
            ->on("sites");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("role");
            $table->dropForeign("site_id");
            $table->dropColumn("site_id")->nullable();

        });
    }
};
