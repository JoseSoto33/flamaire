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
        Schema::create('intereses', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 30);
            $table->timestamps();
            $table->boolean('status')->default(1);
        });

        Schema::create('intereses_usuario', function (Blueprint $table) {
            $table->integer('id_interes');
            $table->integer('id_usuario');
            $table->foreign('id_interes')->references('id')->on('intereses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intereses');
        Schema::dropIfExists('intereses_usuario');
    }
};
