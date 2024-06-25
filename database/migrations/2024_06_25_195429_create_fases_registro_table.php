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
        Schema::create('fases_registro', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('code', 10);
            $table->timestamp('fecha_creado')->useCurrent();
            $table->boolean('status')->default(1);
        });

        Schema::create('fases_registro_usuario', function (Blueprint $table) {
            $table->id();
            $table->integer('id_fase');
            $table->integer('id_usuario');
            $table->timestamp('fecha_creado')->useCurrent();
            $table->foreign('id_fase')->references('id')->on('fases_registro')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fases_registro');
        Schema::dropIfExists('fases_registro_usuario');
    }
};
