<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reponses_devis', function (Blueprint $table) {
            $table->string('fichier')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('reponses_devis', function (Blueprint $table) {
            $table->dropColumn('fichier');
        });
    }
};