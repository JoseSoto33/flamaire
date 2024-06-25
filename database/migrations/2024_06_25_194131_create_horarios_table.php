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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->timestamps();
            $table->boolean('status')->default(1);
        });

        Schema::create('usuario_horarios', function (Blueprint $table) {
            $table->integer('id_usuario');
            $table->integer('id_horario');
            $table->primary(['id_usuario', 'id_horario']);
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_horario')->references('id')->on('horarios')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
        Schema::dropIfExists('usuario_horarios');
    }
};
