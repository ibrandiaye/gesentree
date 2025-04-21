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
        Schema::create('cartes', function (Blueprint $table) {
            $table->id();
            $table->string("nom")->nullable();
            $table->string("prenom")->nullable();
            $table->string("datenaiss")->nullable();
            $table->string("lieunaiss")->nullable();
            $table->string("numelec")->nullable();
            $table->string("numcni")->nullable();
            $table->string("commune")->nullable();
            $table->string("sexe")->nullable();
            $table->string("nationalite")->nullable();
            $table->string("date_emission")->nullable();
            $table->string("date_expiration")->nullable();
            $table->string("mrz")->nullable();
            $table->string("photo")->nullable();
            $table->string("numcarte")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartes');
    }
};
