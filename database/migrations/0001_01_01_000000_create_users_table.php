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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', length: 100);
            $table->string('apellido', length: 50);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('id_categoria');
            $table->integer('id_sub_categoria')->nullable();
            $table->date('fecha_nacimiento');
            $table->integer('edad');
            $table->integer('id_nacionalidad');
            $table->string('titulo', length: 60);
            $table->text('sobre_mi');
            $table->integer('id_zona');
            $table->string('direccion', length: 100)->nullable();
            $table->string('latitud', length: 30)->nullable();
            $table->string('longitud', length: 30)->nullable();
            $table->boolean('mostrar_mapa');
            $table->string('genero', length: 6);
            $table->string('otros_servicios', length: 255);
            $table->string('otros_servicios_especiales', length: 255);
            $table->string('otra_descripcion', length: 255);
            $table->integer('id_plan_personalizado')->nullable();
            $table->string('url_foto', length: 200);
            $table->boolean('boletines');
            $table->string('rol', length: 15)->default('client');
            $table->string('estado_verificacion', length: 10)->default('unverified');
            $table->boolean('status')->default(true);
            $table->foreign('id_categoria')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_sub_categoria')->references('id')->on('categorias')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_nacionalidad')->references('id')->on('nacionalidades')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_zona')->references('id')->on('ciudades_zonas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_plan_personalizado')->references('id')->on('planes_personalizados')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')
                    ->constrained(
                        table: 'usuarios', indexName: 'sessions_usuarios_id'
                    )
                    ->onUpdate('cascade')
                    ->onDelete('cascade')
                    ->nullable()
                    ->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('usuarios_listados', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->string('dispositivo', 15)->default('Ordenador');
            $table->date('fecha');
            $table->integer('vistas');
            $table->foreign('id_usuario')->references('id')->on('usuarios');
        });

        Schema::create('fotos_usuario', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->string('url_foto', 255);
            $table->boolean('portada')->default(0);
            $table->boolean('status')->default(1);
            $table->foreign('id_usuario')->references('id')->on('usuarios');
        });

        Schema::create('videos_anuncio', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->string('url_video', 255);
            $table->boolean('status')->default(1);
            $table->foreign('id_usuario')->references('id')->on('usuarios');
        });

        Schema::create('tarifas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_usuario');
            $table->string('descripcion', 40);
            $table->double('precio');
            $table->string('moneda', 3);
            $table->foreign('id_usuario')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('usuarios_listados');
        Schema::dropIfExists('fotos_anuncio');
    }
};
