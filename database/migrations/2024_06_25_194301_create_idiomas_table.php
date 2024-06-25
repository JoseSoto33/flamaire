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
        Schema::create('idiomas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 20);
            $table->string('codigo', 5);
            $table->timestamps();
        });

        Schema::create('usuario_idiomas', function (Blueprint $table) {
            $table->integer('id_usuario');
            $table->integer('id_idioma');
            $table->primary(['id_usuario', 'id_idioma']);
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_idioma')->references('id')->on('idiomas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('idiomas');
        Schema::dropIfExists('usuario_idiomas');
    }
};
