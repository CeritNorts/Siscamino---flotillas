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
    Schema::create('documents', function (Blueprint $table) {
        $table->id();
        $table->morphs('documentable'); // Para relacionar con vehículos, conductores, etc.
        $table->string('type')->comment('insurance, permit, license, invoice, etc.');
        $table->string('name');
        $table->string('number')->nullable();
        $table->string('file_path')->nullable();
        $table->date('issue_date')->nullable();
        $table->date('expiry_date')->nullable();
        $table->text('description')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
