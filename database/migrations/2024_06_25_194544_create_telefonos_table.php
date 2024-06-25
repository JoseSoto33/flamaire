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
        Schema::create('telefonos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->string('country_code', 4);
            $table->string('telefono', 30);
            $table->boolean('verificado')->default(1);
            $table->timestamps();
            $table->boolean('status')->default(1);
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('telefonos_vistos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_telefono');
            $table->date('fecha');
            $table->integer('vistas');
            $table->foreign('id_telefono')->references('id')->on('telefonos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('telefonos');
        Schema::dropIfExists('telefonos_vistos');
    }
};
