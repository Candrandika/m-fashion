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
        if(!Schema::hasColumn('product_details','size_id')){
            Schema::table('product_details', function (Blueprint $table) {
                $table->foreignUuid('size_id')->constrained('sizes');
            });
        }
        if(!Schema::hasColumn('product_details','warna_id')){
            Schema::table('product_details', function (Blueprint $table) {
                $table->foreignUuid('warna_id')->constrained('warnas');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_details', function (Blueprint $table) {
            //
        });
    }
};
