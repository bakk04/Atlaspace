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
        Schema::create('activites', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_ville')->nullable()->constrained('villes')->cascadeOnDelete();
            $table->string('name')->unique();
            $table->unsignedBigInteger('nbrHeure');
            $table->datetime('dateActivite');
            $table->string('lien_google_maps')->nullable();
            $table->decimal('prix', 8, 2);
            $table->string('background');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activites');
    }
};
