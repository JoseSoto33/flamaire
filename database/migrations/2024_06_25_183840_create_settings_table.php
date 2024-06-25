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
        Schema::create('ajustes', function (Blueprint $table) {
            $table->id();
            $table->string('campo', 180)->unique();
            $table->text('valor');
            $table->timestamp('fecha_creado')->useCurrent();
            $table->timestamp('fecha_editado')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->boolean('status')->default(1);
            $table->timestamps();
        });

        Schema::create('meta_data', function (Blueprint $table) {
            $table->id();
            $table->integer('row_id');
            $table->string('table_name');
            $table->text('slug')->nullable();
            $table->timestamps();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('titulo_pestania')->nullable();
            $table->text('titulo_header')->nullable();
            $table->text('titulo')->nullable();
            $table->text('titulo_area_categorias')->nullable();
            $table->text('descripcion_area_categorias')->nullable();
            $table->text('descripcion')->nullable();
            $table->text('descripcion_detallada')->nullable();
            $table->boolean('status_meta_title')->default(false);
            $table->boolean('status_meta_description')->default(false);
            $table->boolean('status_titulo_pestania')->default(false);
            $table->boolean('status_titulo_header')->default(false);
            $table->boolean('status_titulo')->default(false);
            $table->boolean('status_titulo_area_categorias')->default(false);
            $table->boolean('status_descripcion_area_categorias')->default(false);
            $table->boolean('status_descripcion')->default(false);
            $table->boolean('status_descripcion_detallada')->default(false);
            $table->boolean('status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ajustes');
        Schema::dropIfExists('meta_data');
    }
};
