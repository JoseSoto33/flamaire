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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->boolean('especial')->default(0);
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('usuarios_servicios', function (Blueprint $table) {
            $table->integer('id_usuario');
            $table->integer('id_servicio');
            $table->primary(['id_usuario', 'id_servicio']);
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_servicio')->references('id')->on('servicios')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
        Schema::dropIfExists('usuarios_servicios');
    }
};
