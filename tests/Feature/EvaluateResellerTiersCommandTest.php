<?php

namespace Tests\Feature;

use App\Models\Reseller;
use App\Models\ResellerTier;
use App\Models\ResellerTierHistory;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EvaluateResellerTiersCommandTest extends TestCase
{
    use RefreshDatabase;

    protected ResellerTier $bronze;
    protected ResellerTier $silver;
    protected Warehouse $warehouse;

    protected function setUp(): void
    {
        parent::setUp();

        $this->bronze = ResellerTier::create(['name' => 'Bronze', 'discount_percentage' => 5, 'min_monthly_spend' => 0]);
        $this->silver = ResellerTier::create(['name' => 'Silver', 'discount_percentage' => 10, 'min_monthly_spend' => 5000000]);
        $this->warehouse = Warehouse::create(['name' => 'Main Warehouse', 'type' => 'gudang', 'location' => 'Central']);
    }

    public function test_command_fails_on_invalid_period_format(): void
    {
        $this->artisan('reseller:evaluate-tiers --period=2026/09')
            ->expectsOutputToContain("Invalid period format '2026/09'")
            ->assertExitCode(1);
    }

    public function test_command_runs_successfully_in_live_mode(): void
    {
        $user = User::factory()->create(['name' => 'Budi Reseller']);
        $reseller = Reseller::create([
            'user_id' => $user->id,
            'reseller_tier_id' => $this->bronze->id,
            'is_tier_locked' => false,
        ]);

        Transaction::forceCreate([
            'transaction_code' => 'TRX-CMD-1',
            'warehouse_id' => $this->warehouse->id,
            'user_id' => $user->id,
            'customer_id' => $user->id,
            'total_amount' => 8000000,
            'payment_method' => 'cash',
            'status' => 'completed',
            'created_at' => Carbon::create(2026, 9, 10),
        ]);

        $this->artisan('reseller:evaluate-tiers --period=2026-09')
            ->expectsOutputToContain('Starting reseller tier evaluation...')
            ->expectsOutputToContain('Evaluation Period')
            ->expectsOutputToContain('Reseller tier evaluation completed successfully.')
            ->assertExitCode(0);

        $reseller->refresh();
        $this->assertEquals($this->silver->id, $reseller->reseller_tier_id);
        $this->assertEquals(1, ResellerTierHistory::count());
    }

    public function test_command_runs_in_dry_run_mode_without_persisting_changes(): void
    {
        $user = User::factory()->create(['name' => 'Siti Reseller']);
        $reseller = Reseller::create([
            'user_id' => $user->id,
            'reseller_tier_id' => $this->bronze->id,
            'is_tier_locked' => false,
        ]);

        Transaction::forceCreate([
            'transaction_code' => 'TRX-CMD-2',
            'warehouse_id' => $this->warehouse->id,
            'user_id' => $user->id,
            'customer_id' => $user->id,
            'total_amount' => 12000000,
            'payment_method' => 'cash',
            'status' => 'completed',
            'created_at' => Carbon::create(2026, 9, 10),
        ]);

        $this->artisan('reseller:evaluate-tiers --period=2026-09 --dry-run')
            ->expectsOutputToContain('Starting reseller tier evaluation [DRY RUN / SIMULATION]...')
            ->expectsOutputToContain('Dry Run (No DB Writes)')
            ->assertExitCode(0);

        $reseller->refresh();
        $this->assertEquals($this->bronze->id, $reseller->reseller_tier_id);
        $this->assertEquals(0, ResellerTierHistory::count());
    }
}
