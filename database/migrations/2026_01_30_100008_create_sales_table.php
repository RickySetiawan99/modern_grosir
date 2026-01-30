<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained(); // cashier/user who made the sale
            $table->foreignId('reseller_id')->nullable()->constrained();
            $table->enum('customer_type', ['retail', 'reseller'])->default('retail');
            $table->decimal('total_amount', 15, 2);
            $table->string('payment_status')->default('paid');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
