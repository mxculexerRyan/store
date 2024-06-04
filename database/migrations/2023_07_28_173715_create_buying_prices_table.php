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
        Schema::create('buying_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->unsignedBigInteger("supplier_id");
            $table->decimal("buying_price", 18, 2);
            $table->enum("status", ["Available", "Unavailable"])->default("Available");
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
            $table->foreign('supplier_id')->references('id')->on('shareholders')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buying_prices');
    }
};
