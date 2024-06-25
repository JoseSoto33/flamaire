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
        Schema::create('divisas', function (Blueprint $table) {
            $table->id();
            $table->string('divisaISO', 3)->nullable();
            $table->string('divisa_nombre', 35)->nullable();
            $table->string('moneda', 30)->nullable();
            $table->string('simbolo', 3)->nullable();
            $table->timestamps();
            $table->boolean('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('divisas');
    }
};
