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
        Schema::create('disposicion', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('usuario_disposicion', function (Blueprint $table) {
            $table->integer('id_usuario');
            $table->integer('id_disposicion');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_disposicion')->references('id')->on('disposiciones')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposicion');
        Schema::dropIfExists('anuncio_disposicion');
    }
};
