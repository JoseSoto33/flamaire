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
        Schema::create('datos_fiscales', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->string('nombre', 50);
            $table->string('direccion', 100);
            $table->string('cod_postal', 10);
            $table->string('nif_cif', 20);
            $table->integer('id_zona');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_zona')->references('id')->on('ciudades_zonas')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_fiscales');
    }
};
