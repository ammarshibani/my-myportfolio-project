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
Schema::create('certificates', function (Blueprint $table) {
    $table->id();
    $table->string('name_en');
    $table->string('name_ar');
    $table->string('issuer_en');
    $table->string('issuer_ar');
    $table->date('date');
    $table->string('image');
    $table->text('description_en')->nullable();
    $table->text('description_ar')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
