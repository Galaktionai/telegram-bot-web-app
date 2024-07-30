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
        Schema::table('users', function (Blueprint $table) {
            $table->string('telegram_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('address')->nullable();
            $table->string('entrance')->nullable();
            $table->string('apartment')->nullable();
            $table->string('phone_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('telegram_id');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('photo_url');
            $table->dropColumn('address');
            $table->dropColumn('entrance');
            $table->dropColumn('apartment');
            $table->dropColumn('phone_number');
        });
    }
};
