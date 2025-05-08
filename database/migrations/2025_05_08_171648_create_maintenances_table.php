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
    Schema::create('maintenances', function (Blueprint $table) {
        $table->id();
        $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
        $table->string('maintenance_type')->comment('preventive, corrective');
        $table->string('service_type')->comment('oil_change, tire_change, brake_service, etc.');
        $table->string('description');
        $table->date('date');
        $table->integer('odometer');
        $table->decimal('cost', 15, 2);
        $table->string('service_provider')->nullable();
        $table->string('invoice_number')->nullable();
        $table->string('status')->default('completed')->comment('scheduled, in_progress, completed');
        $table->date('next_service_date')->nullable();
        $table->integer('next_service_odometer')->nullable();
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
