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
        Schema::create('entrees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("employe_id");
            $table->foreign("employe_id")
            ->references("id")
            ->on("employes");
            $table->unsignedBigInteger("visiteur_id");
            $table->foreign("visiteur_id")
            ->references("id")
            ->on("visiteurs");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrees');
    }
};
