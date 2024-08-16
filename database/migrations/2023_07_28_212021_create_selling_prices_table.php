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
        Schema::create('selling_prices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("product_id");
            $table->integer("min_qty")->default(0);
            $table->decimal("selling_price", 18, 2);
            $table->decimal("shop_price", 18, 2)->nullable();
            $table->integer("shop_qty")->nullable();
            $table->decimal("caton_price", 18, 2)->nullable();
            $table->integer("caton_qty")->nullable();
            $table->enum("status", ["Available", "Unavailable"])->default("Available");
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selling_prices');
    }
};
