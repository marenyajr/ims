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
        Schema::create('purchase_order_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_id')->constrained();
            $table->foreignId('purchaseOrder_id')->constrained(table: 'purchase_orders', indexName: 'id')->onDelete('cascade');
            $table->float('unit_price', 8, 2);
            $table->integer('quantity_ordered');
            $table->string('capacity');
            $table->timestamps();
        });

    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_products');
    }
};
