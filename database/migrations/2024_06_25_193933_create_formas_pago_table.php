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
        Schema::create('formas_pago', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('usuario_formas_pago', function (Blueprint $table) {
            $table->integer('id_usuario');
            $table->integer('id_forma_pago');
            $table->primary(['id_usuario', 'id_forma_pago']);
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_forma_pago')->references('id')->on('formas_pago')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formas_pago');
        Schema::dropIfExists('usuario_formas_pago');
    }
};
