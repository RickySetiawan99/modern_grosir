<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('warehouses', function (Blueprint $name) {
            $name->id();
            $name->string('name');
            $name->enum('type', ['gudang', 'toko'])->default('gudang');
            $name->string('location')->nullable();
            $name->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
