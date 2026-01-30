<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductIndoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate logic removed to preserve MasterDataSeeder content during fresh --seed
        // migrate:fresh ensures clean state anyway.
        
        $faker = \Faker\Factory::create('id_ID');

        // Realistic Indonesian Product Data for Wholesale/Grosir
        $categories = [
            'Sembako' => ['Beras', 'Minyak Goreng', 'Gula Pasir', 'Tepung Terigu', 'Telur Ayam'],
            'Minuman' => ['Kopi Kapal Api', 'Teh Botol Sosro', 'Aqua Galon', 'Susu Kental Manis', 'Teh Celup Sariwangi'],
            'Bumbu Dapur' => ['Kecap Bango', 'Saus Sambal ABC', 'Masako Ayam', 'Royco Sapi', 'Garam Refina'],
            'Perlengkapan Mandi' => ['Sabun Lifebuoy', 'Shampoo Pantene', 'Pasta Gigi Pepsodent', 'Deterjen Rinso'],
            'Snack' => ['Indomie Goreng', 'Chiki Balls', 'Beng Beng', 'Roma Kelapa', 'Kacang Garuda']
        ];

        $units = ['kg', 'liter', 'pcs', 'karton', 'pack', 'renceng'];
        
        // Ensure Units Exist
        $unitIds = [];
        foreach ($units as $u) {
            $unitIds[] = \App\Models\Unit::firstOrCreate(['name' => $u, 'short_name' => $u])->id;
        }

        // Ensure Categories Exist
        foreach ($categories as $catName => $products) {
            $category = \App\Models\Category::firstOrCreate(
                ['name' => $catName],
                ['slug' => Str::slug($catName)]
            );

            foreach ($products as $prodName) {
                // Generate variants/brands to make it look like many products
                for ($i = 0; $i < 3; $i++) { 
                    $variant = $i == 0 ? 'Original' : $faker->colorName;
                    $fullName = "$prodName $variant";
                    
                    \App\Models\Product::create([
                        'name' => $fullName,
                        'sku' => strtoupper($faker->bothify('???-#####')),
                        'description' => "Stok grosir $fullName kualitas terbaik.",
                        'retail_price' => $faker->numberBetween(50, 500) * 100, // 5000 - 50000
                        'category_id' => $category->id,
                        'unit_id' => $faker->randomElement($unitIds),
                    ]);
                }
            }
        }
    }
}
