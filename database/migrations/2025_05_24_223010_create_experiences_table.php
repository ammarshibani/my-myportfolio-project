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
Schema::create('experiences', function (Blueprint $table) {
    $table->id();
    $table->string('position_en');
    $table->string('position_ar');
    $table->string('company_en');
    $table->string('company_ar');
    $table->date('start_date');
    $table->date('end_date')->nullable();
    $table->text('description_en');
    $table->text('description_ar');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
