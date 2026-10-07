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
        Schema::create('devis', function (Blueprint $table) {
        $table->id();

        $table->string('nom');
        $table->string('email');
        $table->string('telephone');
        $table->string('entreprise')->nullable();
        $table->string('objet');
        $table->text('description');
        $table->string('delai')->nullable();
        $table->string('ville')->nullable();
        $table->string('fichier')->nullable();

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devis');
    }
};
