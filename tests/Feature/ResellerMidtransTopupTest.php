<?php

namespace Tests\Feature;

use App\Models\Reseller;
use App\Models\ResellerTier;
use App\Models\User;
use App\Models\WalletTransaction;
use App\Services\MidtransService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Config;
use Mockery;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ResellerMidtransTopupTest extends TestCase
{
    use RefreshDatabase;

    protected User $resellerUser;
    protected Reseller $reseller;
    protected User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'reseller', 'guard_name' => 'web']);

        $tier = ResellerTier::create([
            'name' => 'Silver',
            'discount_percentage' => 5,
            'min_monthly_spend' => 0,
        ]);

        $this->resellerUser = User::factory()->create(['name' => 'Ricky Reseller', 'email' => 'ricky@test.com']);
        $this->resellerUser->assignRole('reseller');

        $this->reseller = Reseller::create([
            'user_id' => $this->resellerUser->id,
            'reseller_tier_id' => $tier->id,
            'credit_limit' => 5000000,
            'balance' => 50000,
            'store_name' => 'Ricky Store',
        ]);

        $this->adminUser = User::factory()->create(['name' => 'Admin Boss']);
        $this->adminUser->assignRole('admin');

        Config::set('services.midtrans.server_key', 'test-server-key-123');
    }

    public function test_reseller_can_access_wallet_page(): void
    {
        $response = $this->actingAs($this->resellerUser)->get(route('reseller.wallet.index'));

        $response->assertStatus(200);
        $response->assertSee('Dompet & Saldo');
        $response->assertSee('Midtrans');
        $response->assertSee('Transfer Bank');
        $response->assertSee('btn-midtrans-pay');
    }

    public function test_midtrans_snap_requires_minimum_amount(): void
    {
        $response = $this->actingAs($this->resellerUser)->postJson(route('reseller.wallet.midtrans.snap'), [
            'amount' => 5000,
        ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['amount']);
    }

    public function test_reseller_can_generate_snap_token(): void
    {
        $mockService = Mockery::mock(MidtransService::class);
        $mockService->shouldReceive('createTopupSnapToken')
            ->once()
            ->with(Mockery::on(fn ($r) => $r->id === $this->reseller->id), 100000.0)
            ->andReturn([
                'snap_token' => 'dummy-snap-token-xyz',
                'order_id' => 'TOPUP-1-999999',
                'transaction_id' => 1,
            ]);

        $this->app->instance(MidtransService::class, $mockService);

        $response = $this->actingAs($this->resellerUser)->postJson(route('reseller.wallet.midtrans.snap'), [
            'amount' => 100000,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
            'snap_token' => 'dummy-snap-token-xyz',
            'order_id' => 'TOPUP-1-999999',
            'transaction_id' => 1,
        ]);
    }

    public function test_reseller_can_check_transaction_status(): void
    {
        $trx = WalletTransaction::create([
            'reseller_id' => $this->reseller->id,
            'amount' => 100000,
            'type' => 'topup',
            'status' => 'completed',
            'notes' => 'TOPUP-99-123456',
        ]);

        $response = $this->actingAs($this->resellerUser)->getJson(route('reseller.wallet.status', 'TOPUP-99-123456'));

        $response->assertStatus(200);
        $response->assertJson([
            'status' => 'completed',
            'amount' => 100000,
            'current_balance' => 50000,
        ]);
    }

    public function test_webhook_rejects_invalid_signature(): void
    {
        $response = $this->postJson('/api/midtrans/webhook', [
            'order_id' => 'TOPUP-1-123456',
            'status_code' => '200',
            'gross_amount' => '100000',
            'signature_key' => 'invalid-signature-key',
        ]);

        $response->assertStatus(403);
    }

    public function test_webhook_successfully_credits_reseller_balance_on_settlement(): void
    {
        $trx = WalletTransaction::create([
            'reseller_id' => $this->reseller->id,
            'amount' => 200000,
            'type' => 'topup',
            'status' => 'pending',
            'notes' => 'TOPUP-temp',
        ]);

        $orderId = 'TOPUP-' . $trx->id . '-123456';
        $trx->update(['notes' => $orderId]);

        $serverKey = 'test-server-key-123';
        $statusCode = '200';
        $grossAmount = '200000.00';
        $validSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        $payload = [
            'order_id' => $orderId,
            'status_code' => $statusCode,
            'gross_amount' => $grossAmount,
            'signature_key' => $validSignature,
            'transaction_status' => 'settlement',
        ];

        $response = $this->postJson('/api/midtrans/webhook', $payload);

        $response->assertStatus(200);

        $this->assertEquals('completed', $trx->fresh()->status);
        // Initial balance 50.000 + 200.000 = 250.000
        $this->assertEquals(250000, $this->reseller->fresh()->balance);

        // Test idempotency: sending the webhook again does not credit again
        $repeatResponse = $this->postJson('/api/midtrans/webhook', $payload);
        $repeatResponse->assertStatus(200);
        $this->assertEquals(250000, $this->reseller->fresh()->balance);
    }

    public function test_webhook_marks_transaction_as_failed_on_expire(): void
    {
        $trx = WalletTransaction::create([
            'reseller_id' => $this->reseller->id,
            'amount' => 150000,
            'type' => 'topup',
            'status' => 'pending',
            'notes' => 'TOPUP-temp',
        ]);

        $orderId = 'TOPUP-' . $trx->id . '-123456';
        $trx->update(['notes' => $orderId]);

        $serverKey = 'test-server-key-123';
        $statusCode = '200';
        $grossAmount = '150000.00';
        $validSignature = hash('sha512', $orderId . $statusCode . $grossAmount . $serverKey);

        $payload = [
            'order_id' => $orderId,
            'status_code' => $statusCode,
            'gross_amount' => $grossAmount,
            'signature_key' => $validSignature,
            'transaction_status' => 'expire',
        ];

        $response = $this->postJson('/api/midtrans/webhook', $payload);

        $response->assertStatus(200);
        $this->assertEquals('failed', $trx->fresh()->status);
        $this->assertEquals(50000, $this->reseller->fresh()->balance);
    }

    public function test_admin_topups_datatable_includes_midtrans_transactions(): void
    {
        WalletTransaction::create([
            'reseller_id' => $this->reseller->id,
            'amount' => 300000,
            'type' => 'topup',
            'status' => 'completed',
            'notes' => 'TOPUP-1-123456',
        ]);

        $response = $this->actingAs($this->adminUser)->getJson(route('master.topups.data'));

        $response->assertStatus(200);
        $response->assertSee('Midtrans Snap');
        $response->assertSee('Ricky Reseller');
    }
}
