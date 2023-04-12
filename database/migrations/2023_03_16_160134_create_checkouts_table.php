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
        Schema::create("checkouts", function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId("user_id")
                ->constrained("users")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table
                ->foreignId("camp_id")
                ->constrained("camps")
                ->onUpdate("cascade")
                ->onDelete("cascade");
            $table->string("card_number");
            $table->date("expired");
            $table->string("cvc");
            $table->boolean("is_paid")->default(false);
            $table->string("status")->default("on going");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("checkouts");
    }
};
