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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // کاربر ثبت‌کننده
            $table->foreignId('account_id')->constrained()->onDelete('cascade'); // حساب مرتبط

            $table->bigInteger('amount'); // مبلغ
            $table->string('title')->nullable(); // عنوان یا نام تراکنش
            $table->text('description')->nullable(); // توضیحات
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');

            $table->timestamp('transaction_date')->nullable(); // تاریخ تراکنش

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
