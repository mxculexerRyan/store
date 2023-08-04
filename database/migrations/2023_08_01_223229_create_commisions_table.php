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
        Schema::create('commisions', function (Blueprint $table) {
            $table->id();
            $table->string('commision_base');
            $table->string('measure_specificity')->nullable();
            $table->decimal('minimum_amount', 18, 2);
            $table->decimal('rates', 18, 2);
            $table->string("assigned_group");
            $table->unsignedBigInteger("assigned_to");
            $table->enum("status", ["Paid", "Un-paid", "On-Progress"])->default("On-Progress");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commisions');
    }
};
