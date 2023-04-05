<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("discounts", function (Blueprint $table) {
            $table->id();
            $table->string("name", 100);
            $table->string("code", 5)->unique();
            $table->unsignedInteger("percentage");
            $table->text("description")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("discounts");
    }
};
