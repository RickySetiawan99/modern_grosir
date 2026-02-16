<?php

namespace Tests\Feature;

use App\Models\InventoryBatch;
use App\Models\Product;
use App\Models\User;
use App\Models\Warehouse;
use App\Services\ExpirationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BatchManagementTest extends TestCase
{
    // use RefreshDatabase; // Commented out to avoid wiping local DB if not configured for testing

    protected function setUp(): void
    {
        parent::setUp();
        // Setup usually requires a test DB. 
        // For this environment, we'll simulate the service logic test without DB refresh if possible,
        // or just write the test for the user to run exclusively.
    }

    /** @test */
    public function it_allocates_stock_based_on_fefo()
    {
        // Mocking the scenario
        // 1. Product with 2 batches
        // Batch A: Expires in 10 days, Qty 50
        // Batch B: Expires in 20 days, Qty 50
        
        // This test requires a running DB. I will write the code assuming the user can run `php artisan test`.
        
        $this->markTestSkipped('Requires separate test database configuration');

        $warehouse = Warehouse::factory()->create();
        $product = Product::factory()->create(['has_expiration' => true]);

        $batchA = InventoryBatch::create([
            'product_id' => $product->id,
            'warehouse_id' => $warehouse->id,
            'batch_number' => 'BATCH-A',
            'quantity' => 50,
            'expiration_date' => now()->addDays(10),
            'status' => 'active'
        ]);

        $batchB = InventoryBatch::create([
            'product_id' => $product->id,
            'warehouse_id' => $warehouse->id,
            'batch_number' => 'BATCH-B',
            'quantity' => 50,
            'expiration_date' => now()->addDays(20),
            'status' => 'active'
        ]);

        $service = new ExpirationService();
        
        // Request 60 items
        $allocations = $service->deductStock($product->id, $warehouse->id, 60);

        // Expectation:
        // 50 from Batch A (Earliest expiry)
        // 10 from Batch B
        
        $this->assertCount(2, $allocations);
        $this->assertEquals($batchA->id, $allocations[0]['batch_id']);
        $this->assertEquals(50, $allocations[0]['quantity']);
        
        $this->assertEquals($batchB->id, $allocations[1]['batch_id']);
        $this->assertEquals(10, $allocations[1]['quantity']);
    }
}
