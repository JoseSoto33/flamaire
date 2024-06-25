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
        Schema::create('tipo_anuncio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->text('descripcion');
            $table->double('precio');
            $table->boolean('status');
        });

        Schema::create('subidas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->integer('id_plan')->nullable();
            $table->integer('id_plan_personalizado')->nullable();
            $table->integer('id_tipo_anuncio')->nullable();
            $table->double('precio_total');
            $table->date('primer_dia');
            $table->date('ultimo_dia');
            $table->boolean('dia_entero')->default(0);
            $table->time('hora_primera_subida')->nullable();
            $table->time('hora_ultima_subida')->nullable();
            $table->timestamps();
            $table->boolean('status')->default(1);
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_plan')->references('id')->on('planes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_plan_personalizado')->references('id')->on('planes_personalizados')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_tipo_anuncio')->references('id')->on('tipos_anuncio')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('subidas_automaticas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_subida');
            $table->date('fecha');
            $table->integer('contador')->default(1);
            $table->boolean('status')->default(1);
            $table->foreign('id_subida')->references('id')->on('subidas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subidas');
        Schema::dropIfExists('subidas_automaticas');
        Schema::dropIfExists('tipo_anuncio');
    }
};
