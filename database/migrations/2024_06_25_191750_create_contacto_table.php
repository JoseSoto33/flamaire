<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('asuntos_contacto', function (Blueprint $table) {
            $table->id();
            $table->string('asunto', 100);
            $table->timestamps();
            $table->boolean('status')->default(1);
        });

        Schema::create('contacto', function (Blueprint $table) {
            $table->id();
            $table->integer('id_asunto');
            $table->string('nombre', 50);
            $table->string('email', 50);
            $table->text('comentario');
            $table->dateTime('fecha_contacto')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean('status')->default(1);
            $table->foreign('id_asunto')->references('id')->on('asuntos_contacto')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacto');
    }
};
