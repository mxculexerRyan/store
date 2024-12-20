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
        Schema::create('creditors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("creditors_name");
            $table->decimal("credited_amount", 18, 2);
            $table->decimal("paid_amount", 18, 2)->default(0);
            $table->decimal("credit_discount", 18, 2)->default(0);
            $table->unsignedBigInteger('payment_method');
            $table->string("reason");
            $table->string("due_date");
            $table->enum('user_type', ['shareholders', 'users'])->default('shareholders');
            $table->enum('status', ['Available', 'Pending', 'Paid'])->default('Available');
            $table->foreign('payment_method')->references('id')->on('accounts')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('creditors');
    }
};
