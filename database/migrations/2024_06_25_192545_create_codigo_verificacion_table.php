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
        Schema::create('codigos_verificacion_usuario', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->string('codigo', 6);
            $table->integer('id_ejemplo')->nullable();
            $table->string('url_foto', 255)->nullable();
            $table->timestamp('fecha_creado')->useCurrent();
            $table->boolean('status')->default(1);
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_ejemplo')->references('id')->on('imagenes_ejemplo_verificacion')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('codigos_verificacion_usuario');
    }
};
