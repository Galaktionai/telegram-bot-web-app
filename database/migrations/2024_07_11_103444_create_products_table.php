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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('description')->nullable();
            $table->string('info')->nullable();
            $table->string('weight')->nullable();
            $table->string('calories')->nullable();
            $table->string('squirrels')->nullable();
            $table->string('fats')->nullable();
            $table->string('carbohydrates')->nullable();

            $table->string('preview_image')->nullable();
            $table->string('detail_images')->nullable();

            $table->string('size')->nullable();

            $table->integer('price')->nullable();
            $table->integer('count')->nullable();
            $table->boolean('is_published')->nullable();

            $table->foreignId('category_id')->nullable()->index()->constrained('categories');
            

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