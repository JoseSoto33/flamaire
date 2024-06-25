<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asuntos_denuncias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
        });

        Schema::create('denuncias', function (Blueprint $table) {
            $table->id();
            $table->integer('id_asunto');
            $table->integer('id_usuario');
            $table->string('nombre', 50);
            $table->string('email', 50);
            $table->text('comentario');
            $table->dateTime('fecha_denuncia')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('fecha_respuesta')->nullable();
            $table->string('estado', 10)->default('pendiente');
            $table->boolean('status')->default(1);
            $table->foreign('id_asunto')->references('id')->on('asuntos_denuncias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asuntos_denuncias');
        Schema::dropIfExists('denuncias');
    }
};
