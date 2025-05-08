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
    Schema::create('clients', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('rfc')->nullable()->unique()->comment('Registro Federal de Contribuyentes');
        $table->string('contact_name')->nullable();
        $table->string('contact_position')->nullable();
        $table->string('phone');
        $table->string('email')->nullable();
        $table->string('address')->nullable();
        $table->string('city')->nullable();
        $table->string('state')->nullable();
        $table->string('postal_code')->nullable();
        $table->string('payment_terms')->nullable()->comment('Términos de pago: contado, crédito 15 días, etc.');
        $table->string('status')->default('active')->comment('active, inactive');
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
        Schema::dropIfExists('clients');
    }
};
