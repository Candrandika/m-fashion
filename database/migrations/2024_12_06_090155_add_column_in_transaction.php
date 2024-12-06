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
        if(!Schema::hasColumn('transactions','paid_timestamps')){
            Schema::table('transactions', function (Blueprint $table) {
                $table->datetime("paid_timestamps")->nullable();
            });
        }
        if(!Schema::hasColumn('transactions','va_payment')){
            Schema::table('transactions', function (Blueprint $table) {
                $table->json("va_payment")->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaction', function (Blueprint $table) {
            //
        });
    }
};
