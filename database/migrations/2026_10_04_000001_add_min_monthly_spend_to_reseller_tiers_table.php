<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reseller_tiers', function (Blueprint $table) {
            $table->decimal('min_monthly_spend', 15, 2)->default(0)->after('discount_percentage');
        });
    }

    public function down(): void
    {
        Schema::table('reseller_tiers', function (Blueprint $table) {
            $table->dropColumn('min_monthly_spend');
        });
    }
};
