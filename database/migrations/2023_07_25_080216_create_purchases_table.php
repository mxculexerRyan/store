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
            $table->decimal('buying_price', 18, 2);
            $table->decimal('purchased_quantity', 18, 2);
            $table->decimal('vat_fees', 18, 2);
            $table->decimal('sold', 18, 2)->default(0);
            $table->decimal('paid', 18, 2)->default(0);
            $table->decimal('item_discount', 18, 2)->default(0);
            $table->enum('status', ['Available', 'Un-available'])->default('Available');
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
