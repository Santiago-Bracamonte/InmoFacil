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
            $table->id('id_usuario');
            $table->unsignedBigInteger('fk_rol'); 
            $table->string('nombre_completo', 100); 
            $table->string('correo_electronico', 100)->unique(); 
            $table->string('contrasena', 255); 
            $table->timestamp('fecha_registro')->useCurrent(); 
            $table->timestamp('ultimo_acceso')->nullable(); 
            $table->string('estado', 20)->default('Activo'); 
            $table->foreign('fk_rol')->references('id_rol')->on('roles');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
