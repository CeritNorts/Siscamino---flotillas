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
    Schema::create('fuels', function (Blueprint $table) {
        $table->id();
        $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
        $table->foreignId('driver_id')->nullable()->constrained()->nullOnDelete();
        $table->foreignId('trip_id')->nullable()->constrained()->nullOnDelete();
        $table->date('date');
        $table->decimal('liters', 10, 2);
        $table->decimal('cost_per_liter', 10, 2);
        $table->decimal('total_cost', 15, 2);
        $table->integer('odometer');
        $table->string('fuel_type')->comment('diesel, gasolina, etc.');
        $table->string('station')->nullable();
        $table->string('invoice_number')->nullable();
        $table->string('payment_method')->nullable()->comment('efectivo, tarjeta, vales, etc.');
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuels');
    }
};
