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

class FetchControllerTest extends TestCase
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

    public function test_globalfetch_returns_empty_when_no_parameters(): void
    {
        $response = $this->actingAs($this->admin)->postJson(route('globalfetch'), []);

        $response->assertOk()
            ->assertExactJson(['item' => []]);
    }

    public function test_globalfetch_fetches_records_using_encrypted_attributes(): void
    {
        Warehouse::create([
            'name' => 'Gudang Pusat',
            'type' => 'gudang',
            'location' => 'Surabaya',
        ]);
        Warehouse::create([
            'name' => 'Toko Cabang Barat',
            'type' => 'toko',
            'location' => 'Malang',
        ]);

        $payload = [
            'parameter' => [
                't' => encrypt('warehouses'),
                's' => encrypt('id,name'),
                'w' => [
                    ['field' => 'select-index-1', 'operator' => 'LIKE', 'value' => '-NMSearch-']
                ]
            ],
            'q' => 'Pusat'
        ];

        $response = $this->actingAs($this->admin)->postJson(route('globalfetch'), $payload);

        $response->assertOk()
            ->assertJsonCount(1, 'item')
            ->assertJsonPath('item.0.text', 'Gudang Pusat');
    }

    public function test_globalfetch_without_query_returns_all_limit_records(): void
    {
        Supplier::create(['name' => 'Supplier Alpha', 'email' => 'alpha@test.com', 'phone' => '081111']);
        Supplier::create(['name' => 'Supplier Beta', 'email' => 'beta@test.com', 'phone' => '082222']);

        $payload = [
            'parameter' => [
                't' => encrypt('suppliers'),
                's' => encrypt('id,name'),
            ],
            'q' => ''
        ];

        $response = $this->actingAs($this->admin)->postJson(route('globalfetch'), $payload);

        $response->assertOk()
            ->assertJsonCount(2, 'item');
    }
}
