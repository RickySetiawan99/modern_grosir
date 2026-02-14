<?php

namespace Tests\Feature\Api;

use App\Models\Category;
use App\Models\Product;
use App\Models\Reseller;
use App\Models\ResellerTier;
use App\Models\StockLevel;
use App\Models\Unit;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ResellerApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Create Role
        Role::create(['name' => 'reseller']);
    }

    public function test_api_login_success()
    {
        $user = User::factory()->create([
            'email' => 'reseller@test.com',
            'password' => bcrypt('password'),
        ]);
        $user->assignRole('reseller');
        Reseller::create([
            'user_id' => $user->id,
            'status' => 'active',
            // Assume default tier exists or nullable
            'reseller_tier_id' => ResellerTier::create(['name' => 'Bronze', 'discount_percentage' => 10])->id,
            'join_date' => now()
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'reseller@test.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['token', 'user']);
    }

    public function test_reseller_can_fetch_catalog_with_tier_pricing()
    {
        // Setup User & Tier
        $tier = ResellerTier::create(['name' => 'Gold', 'discount_percentage' => 20]);
        $user = User::factory()->create();
        $user->assignRole('reseller');
        Reseller::create([
            'user_id' => $user->id,
            'status' => 'active',
            'reseller_tier_id' => $tier->id,
            'join_date' => now()
        ]);

        // Setup Product
        $unit = Unit::create(['name' => 'Pcs', 'short_name' => 'pcs']);
        $category = Category::create(['name' => 'Electronics', 'slug' => 'electronics']);
        $product = Product::create([
            'name' => 'Test Product',
            'sku' => 'TEST-001',
            'purchase_price' => 5000,
            'retail_price' => 10000,
            'category_id' => $category->id,
            'unit_id' => $unit->id,
        ]);

        // Setup Stock
        $warehouse = Warehouse::create(['name' => 'Main Warehouse']);
        StockLevel::create([
            'product_id' => $product->id,
            'warehouse_id' => $warehouse->id,
            'quantity' => 50
        ]);

        // Act
        $token = $user->createToken('test')->plainTextToken;
        $response = $this->getJson('/api/reseller/products', [
            'Authorization' => "Bearer $token"
        ]);

        // Assert
        $response->assertStatus(200);
        
        $expectedPrice = 10000 - (10000 * 0.20); // 8000
        
        $response->assertJsonFragment([
            'name' => 'Test Product',
            'base_price' => 10000,
            'your_price' => $expectedPrice,
            'discount_percentage' => 20,
            'stock_total' => 50
        ]);
    }
}
