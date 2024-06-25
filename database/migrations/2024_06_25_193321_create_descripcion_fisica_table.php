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
        Schema::create('descripcion_fisica', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->timestamps();
            $table->boolean('status')->default(1);
        });

        Schema::create('usuario_descripcion_fisica', function (Blueprint $table) {
            $table->integer('id_usuario');
            $table->integer('id_descripcion_fisica');
            $table->primary(['id_usuario', 'id_descripcion_fisica']);
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_descripcion_fisica')->references('id')->on('descripcion_fisica')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('descripcion_fisica');        Schema::dropIfExists('usuario_descripcion_fisica');
        Schema::dropIfExists('usuario_descripcion_fisica');
    }
};
