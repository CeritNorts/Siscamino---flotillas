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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('plate_number')->unique();
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->decimal('load_capacity', 10, 2)->comment('En toneladas');
            $table->string('type')->comment('Tipo de unidad: trailer, camión, pickup, etc.');
            $table->string('vin')->nullable()->unique()->comment('Número de identificación vehicular');
            $table->string('engine_number')->nullable();
            $table->string('color');
            $table->string('fuel_type')->comment('Tipo de combustible: diesel, gasolina, etc.');
            $table->decimal('tank_capacity', 10, 2)->comment('Capacidad del tanque en litros');
            $table->string('status')->default('active')->comment('active, maintenance, inactive');
            $table->date('purchase_date')->nullable();
            $table->decimal('purchase_price', 15, 2)->nullable();
            $table->date('insurance_expiry')->nullable();
            $table->string('insurance_policy')->nullable()->comment('Número de póliza');
            $table->string('insurance_company')->nullable();
            $table->date('circulation_permit_expiry')->nullable();
            $table->date('technical_review_expiry')->nullable();
            $table->text('notes')->nullable();
            $table->string('gps_device_id')->nullable()->comment('ID del dispositivo GPS para rastreo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
