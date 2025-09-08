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
        Schema::create('installments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('debt_id')      // این قسط به کدوم بدهی مربوطه
            ->constrained()
                ->onDelete('cascade');

            $table->unsignedBigInteger('amount');  // مبلغ قسط
            $table->date('due_date');              // تاریخ سررسید
            $table->boolean('is_paid')->default(false); // وضعیت پرداخت شده یا نشده

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installments');
    }
};
