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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->comment('Cashier ID');
            $table->foreignId('customer_id')->nullable()->constrained('users')->nullOnDelete()->comment('Customer (Reseller link)');
            $table->foreignId('warehouse_id')->constrained();
            $table->string('transaction_code')->unique();
            $table->decimal('total_amount', 15, 2);
            $table->enum('status', ['pending', 'completed', 'canceled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
