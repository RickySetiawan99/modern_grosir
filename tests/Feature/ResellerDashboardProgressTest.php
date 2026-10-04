<?php

namespace Tests\Feature;

use App\Models\Reseller;
use App\Models\ResellerTier;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ResellerDashboardProgressTest extends TestCase
{
    use RefreshDatabase;

    protected ResellerTier $bronze;
    protected ResellerTier $silver;

    protected function setUp(): void
    {
        parent::setUp();

        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'reseller', 'guard_name' => 'web']);

        $this->bronze = ResellerTier::create([
            'name' => 'Bronze',
            'discount_percentage' => 5,
            'min_monthly_spend' => 0,
        ]);

        $this->silver = ResellerTier::create([
            'name' => 'Silver',
            'discount_percentage' => 10,
            'min_monthly_spend' => 5000000,
        ]);
    }

    public function test_reseller_sees_tier_progress_widget_on_dashboard(): void
    {
        $user = User::factory()->create();
        $user->assignRole('reseller');

        Reseller::create([
            'user_id' => $user->id,
            'reseller_tier_id' => $this->bronze->id,
            'credit_limit' => 5000000,
            'is_tier_locked' => false,
        ]);

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Level: Bronze');
        $response->assertSee('Diskon 5%');
        $response->assertSee('Menuju Tingkat Silver');
        $response->assertSee('Progress:');
    }

    public function test_reseller_sees_tier_protected_badge_when_locked(): void
    {
        $user = User::factory()->create();
        $user->assignRole('reseller');

        Reseller::create([
            'user_id' => $user->id,
            'reseller_tier_id' => $this->silver->id,
            'credit_limit' => 10000000,
            'is_tier_locked' => true,
        ]);

        $response = $this->actingAs($user)->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Tier Protected');
    }

    public function test_admin_dashboard_loads_without_reseller_tier_widget(): void
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $response = $this->actingAs($admin)->get(route('dashboard'));

        $response->assertStatus(200);
        $response->assertDontSee('Tier Protected');
    }
}
