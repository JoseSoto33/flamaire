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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_subida');
            $table->string('id_sesion');
            $table->string('descripcion', 100);
            $table->string('tiket', 12);
            $table->double('precio_total');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_pago')->nullable();
            $table->string('status', 15);
            $table->foreign('id_subida')->references('id')->on('subidas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_sesion')->references('id')->on('sessions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
