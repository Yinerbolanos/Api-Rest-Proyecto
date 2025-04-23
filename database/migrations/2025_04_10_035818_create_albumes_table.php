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
        Schema::create('albumes', function (Blueprint $table) {
            $table->id('id_album');
            $table->string('titulo')->nullable(false)->unique();
            $table->unsignedBigInteger('id_artista');
            $table->date('fecha_lanzamiento');
            $table->string('portada_album');
            $table->foreign('id_artista')->references('id_artista')->on('artistas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albumes');
    }
};
