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
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('camion_id')->constrained('camiones');
            $table->foreignId('chofer_id')->constrained('choferes');
            $table->foreignId('cliente_id')->constrained('clientes');
            $table->text('ruta');
            $table->dateTime('fecha_salida');
            $table->dateTime('fecha_llegada');
            $table->string('estado');
            $table->timestamps(); // Esto crea created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viajes');
    }
};
