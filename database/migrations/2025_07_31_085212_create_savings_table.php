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
        Schema::create('savings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');           // مثلاً "پس‌انداز سفر"
            $table->unsignedBigInteger('amount')->default(0);  // مقدار فعلی
            $table->unsignedBigInteger('target_amount');       // مقدار هدف
            $table->date('target_date')->nullable();           // تاریخ هدف
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('savings');
    }
};
