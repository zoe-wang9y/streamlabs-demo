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
        Schema::create('followers', function (Blueprint $table) {
            // user_id and follower_id combined to form a composite key to this table
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('follower_id');
            $table->string('name');
            $table->timestamp('followed_at');
            $table->unique(['user_id', 'follower_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followers');
    }
};
