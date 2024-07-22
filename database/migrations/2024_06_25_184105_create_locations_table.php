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
        Schema::create('paises', function (Blueprint $table) {
            $table->id();
            $table->string('iso', 2);
            $table->string('nombre', 80);
            $table->boolean('status')->default(true);
        });

        Schema::create('regiones_estados_departamentos', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->string('region_code', length: 6);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        Schema::create('ciudades_zonas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_region')->nullable();
            $table->text('nombre');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->foreign('id_region')->references('id')->on('regiones_estados_departamentos')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paises');
        Schema::dropIfExists('regiones_estados_departamentos');
        Schema::dropIfExists('ciudades_zonas');
    }
};
