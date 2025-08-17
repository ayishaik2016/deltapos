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
        Schema::create('customer_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('item_id')->nullable();
            $table->unsignedBigInteger('party_id')->nullable();
            $table->string('item_code');
            $table->string('name');
            $table->decimal('sale_price', 20, 4)->default(0);
            $table->decimal('purchase_price', 20, 4)->default(0);
            $table->decimal('customer_item_price', 20, 4)->default(0);
            $table->boolean('status')->default(1);
            $table->foreign('item_id')->references('id')->on('items'); 
            $table->foreign('party_id')->references('id')->on('parties'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_items');
    }
};
