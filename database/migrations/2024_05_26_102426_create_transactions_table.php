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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 18,2);
            $table->unsignedBigInteger("account");
            $table->unsignedBigInteger("from");
            $table->unsignedBigInteger("to");
            $table->decimal('charges', 18,2);
            $table->enum('nature', ['Cash-in', 'Cash-out'])->default('Cash-in');
            $table->string('reason');
            $table->decimal('balance', 18,2);
            $table->foreign('account')->references('id')->on('accounts')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
