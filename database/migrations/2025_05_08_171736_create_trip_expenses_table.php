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
    Schema::create('trip_expenses', function (Blueprint $table) {
        $table->id();
        $table->foreignId('trip_id')->constrained()->onDelete('cascade');
        $table->foreignId('driver_id')->nullable()->constrained()->nullOnDelete();
        $table->string('expense_type')->comment('toll, food, lodging, repair, fine, etc.');
        $table->string('description');
        $table->date('date');
        $table->decimal('amount', 15, 2);
        $table->string('invoice_number')->nullable();
        $table->string('payment_method')->nullable()->comment('efectivo, tarjeta, etc.');
        $table->boolean('reimbursable')->default(false);
        $table->boolean('reimbursed')->default(false);
        $table->text('notes')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_expenses');
    }
};
