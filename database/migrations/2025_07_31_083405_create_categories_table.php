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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');         // مثل "قهوه"، "حقوق"
            $table->unsignedTinyInteger('type');  // 0 = expense, 1 = income
            $table->string('icon')->nullable();   // مثلاً "la la-coffee" یا مسیر تصویر
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
