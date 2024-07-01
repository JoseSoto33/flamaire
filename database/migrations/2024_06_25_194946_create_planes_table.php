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
        Schema::create('planes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->integer('dias');
            $table->integer('cantidad_subidas');
            $table->double('precio_subida');
            $table->double('precio_total');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('planes_personalizados', function (Blueprint $table) {
            $table->id();
            $table->integer('dias');
            $table->integer('cantidad_subidas');
            $table->double('precio_subida');
            $table->double('precio_total');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('plan_personalizado_dias', function (Blueprint $table) {
            $table->id();
            $table->integer('id_plan_personalizado');
            $table->date('fecha');
            $table->foreign('id_plan_personalizado')->references('id')->on('planes_personalizados')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('planes');
        Schema::dropIfExists('planes_personalizados');
        Schema::dropIfExists('plan_personalizado_dias');
    }
};
