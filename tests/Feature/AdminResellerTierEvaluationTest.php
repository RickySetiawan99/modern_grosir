<?php

namespace Tests\Feature;

use App\Models\Reseller;
use App\Models\ResellerTier;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AdminResellerTierEvaluationTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;
    protected ResellerTier $bronze;

    protected function setUp(): void
    {
        parent::setUp();

        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'reseller', 'guard_name' => 'web']);

        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');

        $this->bronze = ResellerTier::create([
            'name' => 'Bronze',
            'discount_percentage' => 5,
            'min_monthly_spend' => 0,
        ]);
    }

    public function test_admin_can_create_tier_with_min_monthly_spend(): void
    {
        $response = $this->actingAs($this->admin)->post(route('master.reseller-tiers.store'), [
            'name' => 'Diamond',
            'discount_percentage' => 25,
            'min_monthly_spend' => 100000000,
        ]);

        $response->assertRedirect(route('master.reseller-tiers.index'));
        $this->assertDatabaseHas('reseller_tiers', [
            'name' => 'Diamond',
            'discount_percentage' => 25,
            'min_monthly_spend' => 100000000,
        ]);
    }

    public function test_admin_can_update_tier_with_min_monthly_spend(): void
    {
        $response = $this->actingAs($this->admin)->put(route('master.reseller-tiers.update', $this->bronze->id), [
            'name' => 'Bronze Plus',
            'discount_percentage' => 7,
            'min_monthly_spend' => 1000000,
        ]);

        $response->assertRedirect(route('master.reseller-tiers.index'));
        $this->assertDatabaseHas('reseller_tiers', [
            'id' => $this->bronze->id,
            'name' => 'Bronze Plus',
            'discount_percentage' => 7,
            'min_monthly_spend' => 1000000,
        ]);
    }

    public function test_admin_can_trigger_evaluation_via_web_post(): void
    {
        $response = $this->actingAs($this->admin)->post(route('master.reseller-tiers.evaluate'), [
            'period' => '2026-09',
            'dry_run' => 1,
        ]);

        $response->assertRedirect(route('master.reseller-tiers.index'));
        $response->assertSessionHas('success');
    }

    public function test_admin_can_update_reseller_tier_lock(): void
    {
        $user = User::factory()->create();
        $user->assignRole('reseller');

        $reseller = Reseller::create([
            'user_id' => $user->id,
            'reseller_tier_id' => $this->bronze->id,
            'credit_limit' => 5000000,
            'is_tier_locked' => false,
        ]);

        $response = $this->actingAs($this->admin)->put(route('master.resellers.update', $reseller->id), [
            'name' => $user->name,
            'email' => $user->email,
            'reseller_tier_id' => $this->bronze->id,
            'credit_limit' => 5000000,
            'is_tier_locked' => 1,
        ]);

        $response->assertRedirect(route('master.resellers.index'));

        $reseller->refresh();
        $this->assertTrue((bool) $reseller->is_tier_locked);
    }
}
