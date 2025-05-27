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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('full_name_en');
            $table->string('full_name_ar');
            $table->string('short_name_en');
            $table->string('short_name_ar');
            $table->string('email');
            $table->string('phone');
            $table->string('whatsapp');
            $table->text('address_en');
            $table->text('address_ar');
            $table->text('about_en');
            $table->text('about_ar');
            $table->string('photo')->nullable();
            $table->string('logo')->nullable();
            $table->date('birth_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
