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
        Schema::create('recordatorios_verificaciones', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->dateTime('fecha_enviado')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('fecha_proximo_recordatorio')->nullable();
            $table->integer('contador')->default(1);
            $table->timestamps();
            $table->boolean('status')->default(1);
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('mensajes_recordatorio_verificacion', function (Blueprint $table) {
            $table->id();
            $table->integer('dias');
            $table->string('asunto', 255);
            $table->text('mensaje');
            $table->boolean('status')->default(1);
        });

        Schema::create('motivos_aviso', function (Blueprint $table) {
            $table->id();
            $table->text('texto');
            $table->boolean('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recordatorios_verificaciones');
        Schema::dropIfExists('mensajes_recordatorio_verificacion');
        Schema::dropIfExists('motivos_aviso');
    }
};
