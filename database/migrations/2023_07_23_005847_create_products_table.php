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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('product_key');
            $table->string('product_desc');
            $table->string('product_quantity')->default(0);
            $table->enum('product_status', ['available', 'unavailable'])->default('available');
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('brand_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onUpdate('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
