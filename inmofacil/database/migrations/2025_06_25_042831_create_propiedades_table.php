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
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id('id_propiedad');
             $table->unsignedBigInteger('fk_tipo_propiedad');
            $table->unsignedBigInteger('fk_cliente'); 
            $table->string('titulo', 255); 
            $table->text('descripcion')->nullable(); 
            $table->string('direccion', 255); 
            $table->string('ciudad', 100); 
            $table->string('provincia', 100); 
            $table->string('codigo_postal', 10)->nullable(); 
            $table->decimal('precio_venta', 15, 2)->nullable(); 
            $table->decimal('precio_alquiler', 15, 2)->nullable();
            $table->decimal('superficie_m2', 10, 2)->nullable(); 
            $table->integer('cantidad_habitaciones')->nullable();
            $table->integer('cantidad_banios')->nullable(); 
            $table->boolean('disponible')->default(true); 
            $table->timestamp('fecha_publicacion')->useCurrent(); 
            $table->foreign('fk_tipo_propiedad')->references('id_tipo_propiedad')->on('tipos_propiedad');
            $table->foreign('fk_cliente')->references('id_cliente')->on('clientes');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedades');
    }
};
