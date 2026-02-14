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
        Schema::table('resellers', function (Blueprint $table) {
            $table->string('store_name')->nullable()->after('credit_limit');
            $table->text('address')->nullable()->after('store_name');
            $table->string('phone')->nullable()->after('address');
            $table->decimal('balance', 15, 2)->default(0)->after('phone');
            $table->integer('loyalty_points')->default(0)->after('balance');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('resellers', function (Blueprint $table) {
            $table->dropColumn(['store_name', 'address', 'phone', 'balance', 'loyalty_points']);
        });
    }
};
