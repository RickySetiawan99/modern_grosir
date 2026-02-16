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
        Schema::table('products', function (Blueprint $table) {
            $table->boolean('has_expiration')->default(false)->after('retail_price');
            $table->integer('default_shelf_life_days')->nullable()->after('has_expiration');
            $table->integer('expiration_alert_days')->default(30)->after('default_shelf_life_days');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['has_expiration', 'default_shelf_life_days', 'expiration_alert_days']);
        });
    }
};
