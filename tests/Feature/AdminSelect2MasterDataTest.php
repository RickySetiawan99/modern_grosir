<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AdminSelect2MasterDataTest extends TestCase
{
    use RefreshDatabase;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();

        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        $this->admin = User::factory()->create();
        $this->admin->assignRole('admin');
    }

    public function test_admin_can_fetch_product_master_data_for_select2(): void
    {
        $category = Category::create(['name' => 'Minuman', 'slug' => 'minuman']);
        $unit = Unit::create(['name' => 'Botol', 'short_name' => 'btl']);
        Product::create([
            'name' => 'Teh Botol Sosro',
            'sku' => 'TBS-001',
            'category_id' => $category->id,
            'unit_id' => $unit->id,
            'purchase_price' => 3000,
            'retail_price' => 4000,
        ]);

        $response = $this->actingAs($this->admin)->getJson(route('master.products.data'));

        $response->assertOk()
            ->assertJsonStructure(['data']);
    }

    public function test_admin_can_fetch_supplier_master_data_for_select2(): void
    {
        Supplier::create([
            'name' => 'PT Sumber Rejeki',
            'email' => 'sumber@rejeki.com',
            'phone' => '08123456789',
        ]);

        $response = $this->actingAs($this->admin)->getJson(route('master.suppliers.data'));

        $response->assertOk()
            ->assertJsonStructure(['data']);
    }

    public function test_admin_can_fetch_warehouse_master_data_for_select2(): void
    {
        Warehouse::create([
            'name' => 'Gudang Utama',
            'type' => 'gudang',
            'location' => 'Surabaya',
        ]);

        $response = $this->actingAs($this->admin)->getJson(route('master.warehouses.data'));

        $response->assertOk()
            ->assertJsonStructure(['data']);
    }
}
