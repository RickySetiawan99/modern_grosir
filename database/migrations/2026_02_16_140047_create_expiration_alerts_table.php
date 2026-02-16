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
        Schema::create('expiration_alerts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('batch_id')->constrained('inventory_batches')->onDelete('cascade');
            $table->enum('alert_level', ['info', 'warning', 'critical']);
            $table->integer('days_until_expiry');
            $table->timestamp('notified_at')->nullable();
            $table->foreignId('acknowledged_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamp('acknowledged_at')->nullable();
            $table->timestamps();
            
            // Index for querying alerts by date and level
            $table->index(['notified_at', 'alert_level'], 'idx_alert_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expiration_alerts');
    }
};
