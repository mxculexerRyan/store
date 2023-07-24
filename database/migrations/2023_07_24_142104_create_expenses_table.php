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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('budjet_id');
            $table->string("new_budjet_name")->nullable();
            $table->string("expense_description")->nullable();
            $table->decimal("expense_amount");
            $table->unsignedBigInteger("paid_to");
            $table->string("new_service_provider")->nullable();
            $table->unsignedBigInteger("paid_by");
            $table->string("expense_receipt", 2048);
            $table->foreign('budjet_id')->references('id')->on('budjets')->onUpdate('cascade');
            $table->foreign('paid_to')->references('id')->on('service_providers')->onUpdate('cascade');
            $table->foreign('paid_by')->references('id')->on('users')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
