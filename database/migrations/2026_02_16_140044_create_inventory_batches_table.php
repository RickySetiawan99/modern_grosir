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
        Schema::create('inventory_batches', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('warehouse_id')->constrained()->onDelete('cascade');
            $table->string('batch_number', 50);
            $table->integer('quantity')->default(0);
            $table->date('received_date');
            $table->date('expiration_date')->nullable();
            $table->foreignId('supplier_id')->nullable()->constrained()->onDelete('set null');
            $table->decimal('purchase_price', 15, 2)->nullable();
            $table->text('notes')->nullable();
            $table->enum('status', ['active', 'expired', 'disposed'])->default('active');
            $table->timestamps();
            
            // Indexes for FEFO performance
            $table->index(['expiration_date', 'status'], 'idx_expiration');
            $table->index(['product_id', 'warehouse_id'], 'idx_product_warehouse');
            
            // Unique constraint to prevent duplicate batch numbers per warehouse
            $table->unique(['warehouse_id', 'batch_number'], 'unique_batch');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_batches');
    }
};
