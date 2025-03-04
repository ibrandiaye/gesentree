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
            $table->unsignedBigInteger("service_id")->nullable();
            $table->foreign("service_id")
            ->references("id")
            ->on("services");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn("role");
            $table->dropForeign("service_id");
            $table->dropColumn("service_id")->nullable();

        });
    }
};
