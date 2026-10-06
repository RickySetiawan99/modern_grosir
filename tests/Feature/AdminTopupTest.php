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

    public function test_admin_can_update_midtrans_settings(): void
    {
        $payload = [
            'server_key' => 'SB-Mid-server-NEW123',
            'client_key' => 'SB-Mid-client-NEW456',
            'merchant_id' => 'M78910',
            'is_production' => '1',
        ];

        $response = $this->actingAs($this->admin)->postJson(route('master.topups.settings.update'), $payload);
        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'message' => 'Konfigurasi Midtrans berhasil disimpan.',
        ]);

        $this->assertDatabaseHas('settings', [
            'key' => 'midtrans_server_key',
            'value' => 'SB-Mid-server-NEW123',
        ]);
        $this->assertDatabaseHas('settings', [
            'key' => 'midtrans_client_key',
            'value' => 'SB-Mid-client-NEW456',
        ]);
        $this->assertDatabaseHas('settings', [
            'key' => 'midtrans_merchant_id',
            'value' => 'M78910',
        ]);
        $this->assertDatabaseHas('settings', [
            'key' => 'midtrans_is_production',
            'value' => '1',
        ]);

        $this->assertEquals('SB-Mid-server-NEW123', \App\Services\MidtransService::getServerKey());
        $this->assertEquals('SB-Mid-client-NEW456', \App\Services\MidtransService::getClientKey());
        $this->assertEquals('M78910', \App\Services\MidtransService::getMerchantId());
        $this->assertTrue(\App\Services\MidtransService::isProduction());
    }
}
