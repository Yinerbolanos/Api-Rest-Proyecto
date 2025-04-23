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
        Schema::create('eventos_lanzamientos', function (Blueprint $table) {
            $table->id('id_evento');
            $table->unsignedBigInteger('id_artista');
            $table->string('titulo')->nullable(false);
            $table->text('descripcion');
            $table->datetime('fecha_evento');
            $table->foreign('id_artista')->references('id_artista')->on('artistas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos_lanzamientos');
    }
};
