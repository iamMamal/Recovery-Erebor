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
        Schema::create('debts', function (Blueprint $table) {
            $table->id();


            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('title'); // عنوان بدهی (مثلاً قسط خونه)
            $table->unsignedBigInteger('total_amount'); // مبلغ کل بدهی
            $table->text('description')->nullable(); // توضیحات اضافی
            $table->date('start_date'); // تاریخ شروع بدهی
            $table->boolean('is_settled')->default(false); // وضعیت تسویه
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('debts');
    }
};
