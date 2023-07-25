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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('item_name');
            $table->decimal('buying_price');
            $table->decimal('purchased_quantity');
            $table->decimal('vat_fees');
            $table->decimal('item_discount')->default(0);
            $table->foreign('order_id')->references('id')->on('orders')->onUpdate('cascade');
            $table->foreign('item_name')->references('id')->on('products')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
