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
            $table->unsignedBigInteger('num_ident')->unique()->comment('Número de cédula del usuario');
            $table->string('nombre', 50);
            $table->string('apellido', 50);
            $table->string('correo', 50);
            $table->unsignedInteger('telefono');
            $table->string('contrasena', 50);
            $table->unsignedInteger('ubicacion');
            $table->unsignedInteger('tipo');
            $table->timestamps();
            //$table->timestamp('email_verified_at')->nullable();
            //$table->rememberToken();

            $table->foreign('ubicacion')->references('id_ubicacion')->on('ubicaciones')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('tipo')->references('id_tipo')->on('tipos')->onDelete('set null')->onUpdate('cascade');
        });

        /*
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
        */
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        //Schema::dropIfExists('password_reset_tokens');
        //Schema::dropIfExists('sessions');
    }
};
