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
        Schema::create('playlist_canciones', function (Blueprint $table) {
            $table->unsignedBigInteger('id_playlist');
            $table->unsignedBigInteger('id_cancion');
            $table->foreign('id_playlist')->references('id_playlist')->on('playlists')->onDelete('cascade');
            $table->foreign('id_cancion')->references('id_cancion')->on('canciones')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('playlist_canciones');
    }
};
