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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('items_quantity');
            $table->decimal('order_value', 18, 2);
            $table->decimal('paid_amount', 18, 2);
            $table->decimal('order_discount', 18, 2)->default(0);
            $table->decimal('shipping_fees', 18, 2)->default(0);
            $table->decimal('vat_fees', 18, 2)->default(0);
            $table->decimal('other_costs', 18, 2)->default(0);
            $table->enum('order_type', ['oder_in', 'order_out']);
            $table->unsignedBigInteger('from');
            $table->unsignedBigInteger('to');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
