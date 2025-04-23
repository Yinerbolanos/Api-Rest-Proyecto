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
        Schema::create('canciones', function (Blueprint $table) {
            $table->id('id_cancion');
            $table->string('titulo')->nullable(false);
            $table->time('duracion')->nullable(false);
            $table->unsignedBigInteger('id_album');
            $table->unsignedBigInteger('id_genero');
            $table->foreign('id_album')->references('id_album')->on('albumes')->onDelete('cascade');
            $table->foreign('id_genero')->references('id_genero')->on('generos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canciones');
    }
};
