<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reseller_tier_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reseller_id')->constrained('resellers')->cascadeOnDelete();
            $table->foreignId('old_tier_id')->nullable()->constrained('reseller_tiers')->nullOnDelete();
            $table->foreignId('new_tier_id')->constrained('reseller_tiers')->cascadeOnDelete();
            $table->decimal('monthly_spent', 15, 2)->default(0);
            $table->string('evaluation_period', 7); // Format: YYYY-MM
            $table->string('reason');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reseller_tier_histories');
    }
};
