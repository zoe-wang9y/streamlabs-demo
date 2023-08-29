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
        Schema::create('merch_sales', function (Blueprint $table) {
            // there could be many sales between the same buyer & merch_sales, so we need a unique key to identify each sale record
            $table->id("sales_id");
            // merch_id is user_id in other tables, name it this way so it may be extended in future to separate from userId
            $table->unsignedBigInteger("merch_id"); 
            $table->unsignedBigInteger("buyer_id");
            $table->string("name");
            $table->string("item_name");
            $table->integer("quantity");
            $table->decimal("price");
            $table->timestamp("timestamp");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merch_sales');
    }
};
