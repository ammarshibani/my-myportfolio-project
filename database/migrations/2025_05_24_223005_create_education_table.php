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
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->string('degree_en');
            $table->string('degree_ar');
            $table->string('institution_en');
            $table->string('institution_ar');
            $table->string('field_en');
            $table->string('field_ar');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('description_en');
            $table->text('description_ar');
            $table->string('grade')->nullable();
            $table->integer('position')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
