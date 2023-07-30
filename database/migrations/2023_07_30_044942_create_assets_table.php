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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string("asset_name");
            $table->decimal("asset_amount", 18, 2);
            $table->decimal("asset_value", 18, 2);
            $table->enum("asset_type", ["current", "fixed", "investments", "intangible"]);
            $table->enum("asset_status", ["available", "unavailable"])->default("available");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
