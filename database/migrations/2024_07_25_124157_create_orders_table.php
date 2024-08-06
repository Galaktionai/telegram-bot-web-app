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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('full_name')->nullable();
            $table->string('address')->nullable();
            $table->string('entrance')->nullable();
            $table->string('apartment')->nullable();
            $table->string('phone_number')->nullable();

            $table->string('info')->nullable();

            $table->string('type')->nullable();
            $table->string('delivery_price')->nullable();
            $table->string('quantity_products')->nullable();
            $table->string('discount')->nullable();
            $table->string('all_price')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
