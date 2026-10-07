<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('envois_actualites', function (Blueprint $table) {
            $table->id();

            $table->foreignId('abonnement_actualites_id')
                ->constrained('abonnements_actualites')
                ->onDelete('cascade');

            $table->string('objet', 191);
            $table->text('message');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('envois_actualites');
    }
};