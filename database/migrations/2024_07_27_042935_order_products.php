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
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();

            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('info')->nullable();
            $table->string('weight')->nullable();
            $table->string('calories')->nullable();
            $table->string('squirrels')->nullable();
            $table->string('fats')->nullable();
            $table->string('carbohydrates')->nullable();
            $table->string('preview_image')->nullable();
            $table->string('size')->nullable();
            $table->string('price')->nullable();
            $table->string('category')->nullable();
            $table->string('count')->nullable();

            $table->string('product_id')->nullable();
            $table->string('order_id')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
