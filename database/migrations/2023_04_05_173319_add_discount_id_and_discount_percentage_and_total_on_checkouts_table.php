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
        Schema::table("checkouts", function (Blueprint $table) {
            $table
                ->unsignedBigInteger("discount_id")
                ->nullable()
                ->after("camp_id");
            $table
                ->unsignedInteger("discount_percentage")
                ->nullable()
                ->after("status");
            $table
                ->unsignedInteger("total")
                ->default(0)
                ->after("discount_percentage");
            $table
                ->foreign("discount_id")
                ->references("id")
                ->on("discounts");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("checkouts", function (Blueprint $table) {
            $table->dropForeign(["discount_id"]);
            // bisa juga menggunakan ini untuk drop foreign key
            // $table->dropForeign("checkouts_discount_id_foreign");
            $table->dropColumn(["discount_id", "discount_percentage", "total"]);
        });
    }
};
