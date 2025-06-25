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
        Schema::create('intereses_propiedad', function (Blueprint $table) {
            $table->id('id_interes');
            $table->unsignedBigInteger('fk_cliente'); 
            $table->unsignedBigInteger('fk_propiedad');
            $table->timestamp('fecha_interes')->useCurrent(); 
            $table->text('nota_cliente')->nullable();
            $table->foreign('fk_cliente')->references('id_cliente')->on('clientes');
            $table->foreign('fk_propiedad')->references('id_propiedad')->on('propiedades');
            $table->unique(['fk_cliente', 'fk_propiedad']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intereses_propiedad');
    }
};
