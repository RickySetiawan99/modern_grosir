<?php

namespace Tests\Unit;

use App\Models\Reseller;
use App\Models\ResellerTier;
use App\Models\ResellerTierHistory;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Warehouse;
use App\Services\TierEvaluationService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TierEvaluationServiceTest extends TestCase
{
    use RefreshDatabase;

    protected TierEvaluationService $service;
    protected ResellerTier $bronze;
    protected ResellerTier $silver;
    protected ResellerTier $gold;
    protected ResellerTier $platinum;
    protected Warehouse $warehouse;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new TierEvaluationService();

        $this->bronze = ResellerTier::create(['name' => 'Bronze', 'discount_percentage' => 5, 'min_monthly_spend' => 0]);
        $this->silver = ResellerTier::create(['name' => 'Silver', 'discount_percentage' => 10, 'min_monthly_spend' => 5000000]);
        $this->gold = ResellerTier::create(['name' => 'Gold', 'discount_percentage' => 15, 'min_monthly_spend' => 15000000]);
        $this->platinum = ResellerTier::create(['name' => 'Platinum', 'discount_percentage' => 22, 'min_monthly_spend' => 50000000]);

        $this->warehouse = Warehouse::create(['name' => 'Central Warehouse', 'type' => 'gudang', 'location' => 'Jakarta']);
    }

    public function test_calculate_monthly_spend_only_counts_completed_transactions_in_range(): void
    {
        $user = User::factory()->create();
        $start = Carbon::create(2026, 9, 1, 0, 0, 0);
        $end = Carbon::create(2026, 9, 30, 23, 59, 59);

        Transaction::forceCreate([
            'transaction_code' => 'TRX-001',
            'warehouse_id' => $this->warehouse->id,
            'user_id' => $user->id,
            'customer_id' => $user->id,
            'total_amount' => 1500000,
            'payment_method' => 'cash',
            'status' => 'completed',
            'created_at' => Carbon::create(2026, 9, 15, 10, 0, 0),
        ]);

        Transaction::forceCreate([
            'transaction_code' => 'TRX-002',
            'warehouse_id' => $this->warehouse->id,
            'user_id' => $user->id,
            'customer_id' => $user->id,
            'total_amount' => 2000000,
            'payment_method' => 'cash',
            'status' => 'completed',
            'created_at' => Carbon::create(2026, 9, 20, 10, 0, 0),
        ]);

        Transaction::forceCreate([
            'transaction_code' => 'TRX-003',
            'warehouse_id' => $this->warehouse->id,
            'user_id' => $user->id,
            'customer_id' => $user->id,
            'total_amount' => 5000000,
            'payment_method' => 'cash',
            'status' => 'canceled',
            'created_at' => Carbon::create(2026, 9, 18, 10, 0, 0),
        ]);

        Transaction::forceCreate([
            'transaction_code' => 'TRX-004',
            'warehouse_id' => $this->warehouse->id,
            'user_id' => $user->id,
            'customer_id' => $user->id,
            'total_amount' => 10000000,
            'payment_method' => 'cash',
            'status' => 'completed',
            'created_at' => Carbon::create(2026, 8, 30, 10, 0, 0),
        ]);

        $spend = $this->service->calculateMonthlySpend($user->id, $start, $end);
        $this->assertEquals(3500000.0, $spend);
    }

    public function test_determine_eligible_tier_matches_spend_thresholds(): void
    {
        $this->assertEquals($this->bronze->id, $this->service->determineEligibleTier(0)->id);
        $this->assertEquals($this->bronze->id, $this->service->determineEligibleTier(4999999)->id);
        $this->assertEquals($this->silver->id, $this->service->determineEligibleTier(5000000)->id);
        $this->assertEquals($this->silver->id, $this->service->determineEligibleTier(14999999)->id);
        $this->assertEquals($this->gold->id, $this->service->determineEligibleTier(15000000)->id);
        $this->assertEquals($this->platinum->id, $this->service->determineEligibleTier(50000000)->id);
        $this->assertEquals($this->platinum->id, $this->service->determineEligibleTier(100000000)->id);
    }

    public function test_determine_eligible_tier_respects_tier_lock_on_downgrade(): void
    {
        // Tier lock prevents downgrade when spend is below threshold.
        $tier = $this->service->determineEligibleTier(0, $this->gold, isLocked: true);
        $this->assertEquals($this->gold->id, $tier->id);

        // Tier lock does not block natural upgrades.
        $tierUpgrade = $this->service->determineEligibleTier(60000000, $this->gold, isLocked: true);
        $this->assertEquals($this->platinum->id, $tierUpgrade->id);
    }

    public function test_evaluate_monthly_tiers_upgrades_and_downgrades_accurately(): void
    {
        $user1 = User::factory()->create();
        $reseller1 = Reseller::create([
            'user_id' => $user1->id,
            'reseller_tier_id' => $this->bronze->id,
            'is_tier_locked' => false,
        ]);

        $user2 = User::factory()->create();
        $reseller2 = Reseller::create([
            'user_id' => $user2->id,
            'reseller_tier_id' => $this->gold->id,
            'is_tier_locked' => false,
        ]);

        $user3 = User::factory()->create();
        $reseller3 = Reseller::create([
            'user_id' => $user3->id,
            'reseller_tier_id' => $this->gold->id,
            'is_tier_locked' => true,
        ]);

        $period = Carbon::create(2026, 9, 15);

        Transaction::forceCreate([
            'transaction_code' => 'TRX-E1',
            'warehouse_id' => $this->warehouse->id,
            'user_id' => $user1->id,
            'customer_id' => $user1->id,
            'total_amount' => 6000000,
            'payment_method' => 'cash',
            'status' => 'completed',
            'created_at' => Carbon::create(2026, 9, 10),
        ]);

        $summary = $this->service->evaluateMonthlyTiers($period, dryRun: false);

        $this->assertEquals(1, $summary['upgraded']);
        $this->assertEquals(1, $summary['downgraded']);
        $this->assertEquals(1, $summary['locked']);

        $reseller1->refresh();
        $this->assertEquals($this->silver->id, $reseller1->reseller_tier_id);

        $reseller2->refresh();
        $this->assertEquals($this->bronze->id, $reseller2->reseller_tier_id);

        $reseller3->refresh();
        $this->assertEquals($this->gold->id, $reseller3->reseller_tier_id);

        $this->assertDatabaseHas('reseller_tier_histories', [
            'reseller_id' => $reseller1->id,
            'old_tier_id' => $this->bronze->id,
            'new_tier_id' => $this->silver->id,
            'evaluation_period' => '2026-09',
        ]);

        $this->assertDatabaseHas('reseller_tier_histories', [
            'reseller_id' => $reseller2->id,
            'old_tier_id' => $this->gold->id,
            'new_tier_id' => $this->bronze->id,
            'evaluation_period' => '2026-09',
        ]);
    }

    public function test_evaluate_monthly_tiers_dry_run_does_not_persist(): void
    {
        $user = User::factory()->create();
        $reseller = Reseller::create([
            'user_id' => $user->id,
            'reseller_tier_id' => $this->bronze->id,
            'is_tier_locked' => false,
        ]);

        Transaction::forceCreate([
            'transaction_code' => 'TRX-DRY',
            'warehouse_id' => $this->warehouse->id,
            'user_id' => $user->id,
            'customer_id' => $user->id,
            'total_amount' => 20000000,
            'payment_method' => 'cash',
            'status' => 'completed',
            'created_at' => Carbon::create(2026, 9, 10),
        ]);

        $summary = $this->service->evaluateMonthlyTiers(Carbon::create(2026, 9, 1), dryRun: true);

        $this->assertEquals(1, $summary['upgraded']);
        $this->assertTrue($summary['dry_run']);

        $reseller->refresh();
        $this->assertEquals($this->bronze->id, $reseller->reseller_tier_id);
        $this->assertEquals(0, ResellerTierHistory::count());
    }

    public function test_get_reseller_monthly_progress_calculates_correct_metrics(): void
    {
        $user = User::factory()->create();
        $reseller = Reseller::create([
            'user_id' => $user->id,
            'reseller_tier_id' => $this->bronze->id,
            'is_tier_locked' => false,
        ]);

        Transaction::forceCreate([
            'transaction_code' => 'TRX-PRG',
            'warehouse_id' => $this->warehouse->id,
            'user_id' => $user->id,
            'customer_id' => $user->id,
            'total_amount' => 2500000,
            'payment_method' => 'cash',
            'status' => 'completed',
            'created_at' => now(),
        ]);

        $progress = $this->service->getResellerMonthlyProgress($reseller);

        $this->assertEquals(2500000.0, $progress['current_spent']);
        $this->assertEquals(5000000.0, $progress['target_spend']);
        $this->assertEquals(2500000.0, $progress['remaining_spend']);
        $this->assertEquals(50.0, $progress['progress_percentage']);
        $this->assertFalse($progress['is_max_tier']);
        $this->assertEquals('Silver', $progress['next_tier']->name);
    }
}
