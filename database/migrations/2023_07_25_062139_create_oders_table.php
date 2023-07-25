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
        Schema::create('oders', function (Blueprint $table) {
            $table->id();
            $table->integer('items_quantity');
            $table->decimal('order_value');
            $table->decimal('paid_amount');
            $table->decimal('order_discount')->default(0);
            $table->decimal('shipping_fees')->default(0);
            $table->decimal('vat_fees')->default(0);
            $table->decimal('other_costs')->default(0);
            $table->enum('oder_type', ['oder_in', 'order_out']);
            $table->unsignedBigInteger('seller');
            $table->unsignedBigInteger('buyer');
            $table->foreign('seller')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('buyer')->references('id')->on('customers')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oders');
    }
};
