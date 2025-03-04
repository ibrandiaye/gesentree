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
        Schema::create('visiteurs', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("prenom");
            $table->string("datenaiss");
            $table->string("lieunaiss");
            $table->string("numelec");
            $table->string("numcni");
            $table->string("commune");
            $table->string("sexe");
            $table->string("nationalite");
            $table->string("date_emission");
            $table->string("date_expiration");
            $table->string("mrz")->nullable();
            $table->string("photo")->nullable();
            $table->string("numcarte");
            $table->unsignedBigInteger("service_id");
            $table->foreign("service_id")
            ->references("id")
            ->on("services");
            $table->unsignedBigInteger("site_id");
            $table->foreign("site_id")
            ->references("id")
            ->on("sites");
            $table->unsignedBigInteger("employe_id");
            $table->foreign("employe_id")
            ->references("id")
            ->on("employes");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visiteurs');
    }
};
