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
        if(!Schema::hasColumn('products','shipping_return')){
            Schema::table('products', function (Blueprint $table) {
                $table->text('shipping_return')->nullable();
            });
        }
        if(!Schema::hasColumn('products','supplier')){
            Schema::table('products', function (Blueprint $table) {
                $table->text('supplier')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
