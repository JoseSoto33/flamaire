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
        Schema::create('tipo_otros', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 30);
            $table->timestamps();
            $table->boolean('status')->default(1);
        });

        Schema::create('otros', function (Blueprint $table) {
            $table->id();
            $table->integer('id_tipo');
            $table->string('nombre', 30);
            $table->string('estado', 10)->default('pendiente');
            $table->timestamps();
            $table->boolean('status')->default(1);
            $table->foreign('id_tipo')->references('id')->on('tipo_otros')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_otros');
        Schema::dropIfExists('otros');
    }
};
