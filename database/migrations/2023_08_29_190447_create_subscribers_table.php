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
        Schema::create('subscribers', function (Blueprint $table) {
            // user_id and subscriber_id combined to form composite key to this table
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('subscriber_id');
            $table->string('name');
            $table->integer('tier');
            $table->timestamp('subscribed_at');
            $table->unique(['user_id', 'subscriber_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscribers');
    }
};
