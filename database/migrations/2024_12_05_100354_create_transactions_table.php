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
        Schema::dropIfExists('transactions');
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained('users');
            $table->json('item_details')->nullable();
            $table->json('customer_details')->nullable();
            $table->string('payment_method')->nullable();
            $table->double('price')->nullable();
            $table->string('order_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('resi')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('snap_token')->nullable();
            $table->string('redirect_url')->nullable();
            $table->string('status')->default('PENDING');
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
