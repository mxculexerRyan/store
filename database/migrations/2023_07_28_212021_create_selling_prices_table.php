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
            $table->decimal("minimum_qty")->default('0');
            $table->decimal("selling_price");
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
