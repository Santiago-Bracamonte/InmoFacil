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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id('id_empleado');
            $table->unsignedBigInteger('fk_usuario')->unique();
            $table->string('numero_telefono', 20)->nullable(); 
            $table->date('fecha_contratacion'); 
            $table->decimal('salario', 10, 2)->nullable(); 
            $table->string('cargo', 50)->nullable(); 
            $table->decimal('comision', 5, 2)->default(0.00); 
            $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
