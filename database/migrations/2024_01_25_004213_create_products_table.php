<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('capacity');
            $table->longText('description');
            $table->float('selling_price', 8, 2);
            $table->float('unit_price', 8, 2);
            $table->float('discount', 8, 2)->default(0.00)->nullable();
            $table->integer('quantity_in_stock');
            $table->foreignId('supplier_id')->default(1)->constrained(table: 'users', indexName: 'id');
            $table->date('manufacture_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
