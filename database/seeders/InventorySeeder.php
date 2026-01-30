<?php

namespace Database\Seeders;

use App\Models\Warehouse;
use App\Models\Product;
use App\Models\StockLevel;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Create Warehouses
        $gudang = Warehouse::updateOrCreate(
            ['name' => 'Gudang Utama'],
            ['type' => 'gudang', 'location' => 'Kawasan Industri Block A']
        );

        $toko = Warehouse::updateOrCreate(
            ['name' => 'Toko ModernGrosir Pusat'],
            ['type' => 'toko', 'location' => 'Jl. Sudirman No. 1']
        );

        // 2. Populate Stock for all products in both locations
        $products = Product::all();
        
        foreach ($products as $product) {
            // Stock in Warehouse (Bulk)
            StockLevel::updateOrCreate(
                ['product_id' => $product->id, 'warehouse_id' => $gudang->id],
                ['quantity' => rand(50, 200)]
            );

            // Stock in Toko (Display)
            StockLevel::updateOrCreate(
                ['product_id' => $product->id, 'warehouse_id' => $toko->id],
                ['quantity' => rand(5, 30)]
            );
        }
    }
}
