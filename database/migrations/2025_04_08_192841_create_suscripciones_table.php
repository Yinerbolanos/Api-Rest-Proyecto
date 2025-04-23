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
        Schema::create('suscripciones', function (Blueprint $table) {
            $table->id('id_suscripcion');
            $table->unsignedBigInteger('id_usuario');
            $table->enum('tipo_suscripcion', ['gratuita', 'premium'])->default('gratuita');
            $table->date('fecha_inicio')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('fecha_fin')->nullable();
            $table->enum('estado', ['activa', 'inactiva'])->default('activa');
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suscripciones');
    }
};
