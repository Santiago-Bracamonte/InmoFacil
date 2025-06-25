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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id('id_contrato');
            $table->unsignedBigInteger('fk_propiedad'); 
            $table->unsignedBigInteger('fk_cliente'); 
            $table->unsignedBigInteger('fk_empleado'); 
            $table->string('tipo_contrato', 50); 
            $table->date('fecha_inicio');
            $table->date('fecha_fin')->nullable(); 
            $table->decimal('monto_total', 15, 2); 
            $table->string('estado_contrato', 50)->default('Activo'); 
            $table->timestamp('fecha_firma')->useCurrent(); 
            $table->foreign('fk_propiedad')->references('id_propiedad')->on('propiedades');
            $table->foreign('fk_cliente')->references('id_cliente')->on('clientes');
            $table->foreign('fk_empleado')->references('id_empleado')->on('empleados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contratos');
    }
};
