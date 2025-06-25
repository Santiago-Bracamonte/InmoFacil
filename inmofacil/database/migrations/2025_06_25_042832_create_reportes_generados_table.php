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
        Schema::create('reportes_generados', function (Blueprint $table) {
            $table->id('id_reporte');
            $table->string('nombre_reporte', 100); 
            $table->timestamp('fecha_generacion')->useCurrent(); 
            $table->unsignedBigInteger('fk_usuario'); 
            $table->text('parametros')->nullable(); 
            $table->string('ruta_archivo_generado', 255)->nullable(); 

            $table->foreign('fk_usuario')->references('id_usuario')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes_generados');
    }
};
