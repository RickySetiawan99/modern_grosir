<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category;
use App\Models\Unit;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Categories
        $categories = ['Electronics', 'Groceries', 'Beverages', 'Clothing', 'Home Appliances'];
        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat,
                'slug' => strtolower($cat)
            ]);
        }

        // Units
        $units = [
            ['name' => 'Pieces', 'short_name' => 'Pcs'],
            ['name' => 'Kilogram', 'short_name' => 'Kg'],
            ['name' => 'Box', 'short_name' => 'Box'],
            ['name' => 'Litre', 'short_name' => 'Ltr'],
            ['name' => 'Pack', 'short_name' => 'Pack'],
        ];
        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
