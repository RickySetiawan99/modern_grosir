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
        Schema::create('batch_disposals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('batch_id')->constrained('inventory_batches')->onDelete('cascade');
            $table->integer('quantity_disposed');
            $table->enum('disposal_reason', ['expired', 'damaged', 'quality_issue', 'other']);
            $table->date('disposal_date');
            $table->foreignId('disposed_by')->constrained('users')->onDelete('restrict');
            $table->text('notes')->nullable();
            $table->timestamps();
            
            // Index for disposal reports
            $table->index('disposal_date', 'idx_disposal_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batch_disposals');
    }
};
