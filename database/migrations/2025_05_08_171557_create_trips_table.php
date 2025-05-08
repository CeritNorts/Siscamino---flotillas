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
    Schema::create('trips', function (Blueprint $table) {
        $table->id();
        $table->foreignId('vehicle_id')->constrained()->onDelete('restrict');
        $table->foreignId('driver_id')->constrained()->onDelete('restrict');
        $table->foreignId('client_id')->constrained()->onDelete('restrict');
        $table->string('trip_number')->unique();
        $table->string('description')->nullable();
        $table->string('origin');
        $table->string('destination');
        $table->text('route_details')->nullable();
        $table->datetime('scheduled_departure');
        $table->datetime('actual_departure')->nullable();
        $table->datetime('estimated_arrival');
        $table->datetime('actual_arrival')->nullable();
        $table->decimal('distance', 10, 2)->nullable()->comment('Distancia en kilómetros');
        $table->decimal('load_weight', 10, 2)->nullable()->comment('Peso de la carga en toneladas');
        $table->string('load_type')->nullable()->comment('Tipo de carga');
        $table->integer('initial_odometer');
        $table->integer('final_odometer')->nullable();
        $table->string('status')->default('scheduled')->comment('scheduled, in_progress, completed, delayed, cancelled');
        $table->decimal('estimated_cost', 15, 2)->nullable();
        $table->decimal('actual_cost', 15, 2)->nullable();
        $table->decimal('revenue', 15, 2)->nullable();
        $table->text('notes')->nullable();
        $table->timestamps();
        $table->softDeletes();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
