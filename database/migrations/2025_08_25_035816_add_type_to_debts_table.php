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
        Schema::table('debts', function (Blueprint $table) {
            $table->tinyInteger('type')->default(0)->after('is_settled');
            // 0 = بدهی, 1 = طلب
        });
    }

    public function down(): void
    {
        Schema::table('debts', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
};
