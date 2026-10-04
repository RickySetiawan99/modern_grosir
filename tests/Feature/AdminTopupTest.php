<?php

namespace Tests\Feature;

use App\Models\Reseller;
use App\Models\ResellerTier;
use App\Models\User;
use App\Models\WalletTransaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AdminTopupTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;
    protected Reseller $reseller;

    protected function setUp(): void
    {
        parent::setUp();

        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'reseller', 'guard_name' => 'web']);

        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');

        $tier = ResellerTier::create([
            'name' => 'Bronze',
            'discount_percentage' => 5,
            'min_monthly_spend' => 0,
        ]);

        $resellerUser = User::factory()->create(['name' => 'Mitra Jaya']);
        $resellerUser->assignRole('reseller');

        $this->reseller = Reseller::create([
            'user_id' => $resellerUser->id,
            'reseller_tier_id' => $tier->id,
            'credit_limit' => 5000000,
            'balance' => 100000,
            'store_name' => 'Toko Mitra',
        ]);
    }

    public function test_admin_can_view_topups_page(): void
    {
        $response = $this->actingAs($this->admin)->get(route('master.topups.index'));
        $response->assertStatus(200);
        $response->assertSee('Top-up Verification');
    }

    public function test_admin_can_fetch_topups_datatable_json(): void
    {
        WalletTransaction::create([
            'reseller_id' => $this->reseller->id,
            'amount' => 500000,
            'type' => 'deposit',
            'status' => 'pending',
            'proof_image' => 'proofs/sample.jpg',
            'notes' => 'Top up modal toko',
        ]);

        $response = $this->actingAs($this->admin)->getJson(route('master.topups.data'));
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => ['created_at', 'reseller', 'amount', 'proof', 'status', 'action']
            ]
        ]);
        $response->assertSee('Mitra Jaya');
        $response->assertSee('btn-review');
    }

    public function test_admin_can_approve_topup(): void
    {
        $topup = WalletTransaction::create([
            'reseller_id' => $this->reseller->id,
            'amount' => 500000,
            'type' => 'deposit',
            'status' => 'pending',
            'notes' => 'Top up',
        ]);

        $response = $this->actingAs($this->admin)->post(route('master.topups.approve', $topup->id));
        $response->assertRedirect();

        $this->assertDatabaseHas('wallet_transactions', [
            'id' => $topup->id,
            'status' => 'completed',
        ]);

        $this->assertEquals(600000, $this->reseller->fresh()->balance);
    }

    public function test_admin_can_reject_topup(): void
    {
        $topup = WalletTransaction::create([
            'reseller_id' => $this->reseller->id,
            'amount' => 500000,
            'type' => 'deposit',
            'status' => 'pending',
            'notes' => 'Top up invalid',
        ]);

        $response = $this->actingAs($this->admin)->post(route('master.topups.reject', $topup->id));
        $response->assertRedirect();

        $this->assertDatabaseHas('wallet_transactions', [
            'id' => $topup->id,
            'status' => 'failed',
        ]);

        $this->assertEquals(100000, $this->reseller->fresh()->balance);
    }
}
