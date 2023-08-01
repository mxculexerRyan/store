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
        Schema::create('targets', function (Blueprint $table) {
            $table->id();
            $table->string("entity_name");
            $table->string("target_measure");
            $table->string("measure_specificity")->nullable();
            $table->decimal("targeted_amount", 18, 2);
            $table->string("assigned_group");
            $table->unsignedBigInteger("assigned_to");
            $table->dateTime("deadline");
            $table->enum("status", ["Completed", "Failed", "On-Progress"])->default("On-Progress");
            $table->text("description")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('targets');
    }
};
