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
        Schema::create('eli_bot_messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ارتباط با کاربر
            $table->text('message'); // پیام کاربر
            $table->longText('response'); // جواب EliBot
            $table->json('context')->nullable(); // برای متادیتا، در آینده مفیده
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eli_bot_messages');
    }
};
