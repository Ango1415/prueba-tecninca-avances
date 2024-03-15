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
        Schema::create('historias', function (Blueprint $table) {
            $table->id('id_historia');
            $table->unsignedBigInteger('profesional')->comment('Profesional quien ha creado la historia');
            $table->unsignedBigInteger('paciente')->comment('Paciente a quien pertenece la historia');
            //Consecutivo de la historia según el paciente ...
            $table->text('info_paciente')->comment('Información relevante de paciente');
            $table->text('estado_paciente')->comment('Estado actual del paciente')->nullable();
            $table->text('antecedentes')->comment('Información de antecedentes del paciente')->nullable();
            $table->text('evolucion_final')->nullable();
            $table->text('concepto')->comment('Concepto dado por el profesional')->nullable();
            $table->text('recomendaciones')->nullable();
            $table->timestamps();

            $table->foreign('profesional')->references('id')->on('usuarios')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('paciente')->references('id')->on('usuarios')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historias');
    }
};
