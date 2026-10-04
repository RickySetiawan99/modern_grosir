<?php

namespace Database\Seeders;

use App\Models\ResellerTier;
use Illuminate\Database\Seeder;

class ResellerTierSeeder extends Seeder
{
    public function run(): void
    {
        $tiers = [
            [
                'name' => 'Bronze',
                'discount_percentage' => 5.00,
                'min_monthly_spend' => 0.00,
            ],
            [
                'name' => 'Silver',
                'discount_percentage' => 10.00,
                'min_monthly_spend' => 5000000.00,
            ],
            [
                'name' => 'Gold',
                'discount_percentage' => 15.00,
                'min_monthly_spend' => 15000000.00,
            ],
            [
                'name' => 'Platinum',
                'discount_percentage' => 22.00,
                'min_monthly_spend' => 50000000.00,
            ],
        ];

        foreach ($tiers as $tier) {
            ResellerTier::updateOrCreate(
                ['name' => $tier['name']],
                $tier
            );
        }
    }
}
