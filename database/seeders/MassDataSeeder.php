<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Database\Seeder;

class MassDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed 20 Suppliers
        Supplier::factory()->count(20)->create();

        // Seed 50 Products using Indo Seeder
        $this->call(ProductIndoSeeder::class);
    }
}
