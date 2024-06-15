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
            $table->string("expense_name");
            $table->decimal("expense_amount", 18, 2);
            $table->string("expense_description")->nullable();
            $table->unsignedBigInteger("account");
            $table->unsignedBigInteger("paid_by");
            $table->string("expense_receipt", 2048);
            $table->foreign('account')->references('id')->on('accounts')->onUpdate('cascade');
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
