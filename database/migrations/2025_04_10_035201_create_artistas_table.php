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
        Schema::create('artistas', function (Blueprint $table) {
            $table->id('id_artista');
            $table->string('nombre')->unique()->nullable(false);
            $table->string('pais')->nullable(false);
            $table->text('descripcion')->nullable(false);
            $table->date('fecha_nacimiento');
            $table->string('imagen_perfil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artistas');
    }
};
