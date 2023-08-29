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
        Schema::create('donations', function (Blueprint $table) {
            // there could be many donations from the same donator to the same user, so the key to this table is an auto-generated donation_id which is unique for each donation
            $table->id("donation_id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("donator_id");
            $table->string("name");
            $table->string("currency", 3);
            $table->decimal("amount");
            $table->string("message", 200);
            $table->timestamp("timestamp");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
