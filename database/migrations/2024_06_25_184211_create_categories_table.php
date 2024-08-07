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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->text('nombre');
            $table->string('url_img', length: 200);
            $table->integer('id_categoria_padre')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->foreign('id_categoria_padre')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
