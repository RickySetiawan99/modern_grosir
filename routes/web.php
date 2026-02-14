<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResellerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DraftOrderController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ResellerController as AdminResellerController;
use App\Http\Controllers\Admin\ResellerTierController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Reseller\CatalogController;
use App\Http\Controllers\Reseller\OrderController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ModernGrosir Core Routes
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Account Settings
    Route::get('/account-settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::post('/account-settings', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/account-settings/reset-avatar', [ProfileController::class, 'resetAvatar'])->name('profile.reset-avatar');
    Route::post('/account-settings/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index')->middleware('role:admin|cashier');
    Route::get('/inventory/data', [InventoryController::class, 'data'])->name('inventory.data')->middleware('role:admin|cashier');
    Route::post('/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update')->middleware('role:admin|cashier');
    
    Route::get('/pricing', [PriceController::class, 'index'])->name('pricing.index')->middleware('role:admin');
    Route::get('/pricing/data', [PriceController::class, 'data'])->name('pricing.data')->middleware('role:admin');
    Route::get('/pricing/{product}', [PriceController::class, 'getProductPrices'])->name('pricing.product')->middleware('role:admin');
    Route::post('/pricing/{product}', [PriceController::class, 'update'])->name('pricing.update')->middleware('role:admin');

    // Transactions
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index')->middleware('role:admin|cashier');
    Route::get('/transactions/data', [TransactionController::class, 'data'])->name('transactions.data')->middleware('role:admin|cashier');
    Route::get('/transactions/{id}', [TransactionController::class, 'show'])->name('transactions.show')->middleware('role:admin|cashier');
    Route::get('/transactions/{id}/receipt', [TransactionController::class, 'receipt'])->name('transactions.receipt')->middleware('role:admin|cashier');

    // Reports & Analytics (Admin Only)
    Route::get('/reports', [\App\Http\Controllers\ReportController::class, 'index'])->name('reports.index')->middleware('role:admin');
    Route::get('/reports/export-excel', [\App\Http\Controllers\ReportController::class, 'exportExcel'])->name('reports.excel')->middleware('role:admin');
    Route::get('/reports/export-pdf', [\App\Http\Controllers\ReportController::class, 'exportPdf'])->name('reports.pdf')->middleware('role:admin');

    Route::get('/pos', [POSController::class, 'index'])->name('pos.index');
    Route::get('/pos/products', [POSController::class, 'products'])->name('pos.products');
    Route::post('/pos/checkout', [POSController::class, 'checkout'])->name('pos.checkout');
    Route::get('/resellers', [ResellerController::class, 'index'])->name('resellers.index')->middleware('role:admin');

    // Master Data Group (Admin Restricted)
    Route::prefix('master')->name('master.')->middleware('role:admin')->group(function () {
        Route::get('products/data', [ProductController::class, 'data'])->name('products.data');
        Route::post('products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulk-delete');
        Route::resource('products', ProductController::class);
        
        Route::get('categories/data', [CategoryController::class, 'data'])->name('categories.data');
        Route::post('categories/bulk-delete', [CategoryController::class, 'bulkDelete'])->name('categories.bulk-delete');
        Route::resource('categories', CategoryController::class);
        
        Route::get('units/data', [UnitController::class, 'data'])->name('units.data');
        Route::post('units/bulk-delete', [UnitController::class, 'bulkDelete'])->name('units.bulk-delete');
        Route::resource('units', UnitController::class);
        
        Route::get('suppliers/data', [SupplierController::class, 'data'])->name('suppliers.data');
        Route::post('suppliers/bulk-delete', [SupplierController::class, 'bulkDelete'])->name('suppliers.bulk-delete');
        Route::resource('suppliers', SupplierController::class);

        Route::get('warehouses/data', [WarehouseController::class, 'data'])->name('warehouses.data');
        Route::post('warehouses/bulk-delete', [WarehouseController::class, 'bulkDelete'])->name('warehouses.bulk-delete');
        Route::resource('warehouses', WarehouseController::class);

        Route::get('reseller-tiers/data', [ResellerTierController::class, 'data'])->name('reseller-tiers.data');
        Route::post('reseller-tiers/bulk-delete', [ResellerTierController::class, 'bulkDelete'])->name('reseller-tiers.bulk-delete');
        Route::resource('reseller-tiers', ResellerTierController::class);

        Route::get('resellers/data', [AdminResellerController::class, 'data'])->name('resellers.data');
        Route::post('resellers/bulk-delete', [AdminResellerController::class, 'bulkDelete'])->name('resellers.bulk-delete');
        Route::post('resellers/{reseller}/balance', [AdminResellerController::class, 'updateBalance'])->name('resellers.balance');
        Route::resource('resellers', AdminResellerController::class);

        Route::get('roles/data', [RoleController::class, 'data'])->name('roles.data');
        Route::resource('roles', RoleController::class);

        Route::get('users/data', [UserController::class, 'data'])->name('users.data');
        Route::resource('users', UserController::class);
    });

    // Reseller Routes
    Route::middleware(['role:reseller'])->prefix('reseller')->group(function () {
        Route::get('/catalog', [CatalogController::class, 'index'])->name('reseller.catalog.index');
        Route::get('/catalog/products', [CatalogController::class, 'products'])->name('reseller.catalog.products');
        
        // Order Management
        Route::get('/orders', [OrderController::class, 'index'])->name('reseller.orders.index');
        Route::post('/orders', [OrderController::class, 'store'])->name('reseller.orders.store');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('reseller.orders.show');
        Route::post('/orders/{id}/cancel', [OrderController::class, 'cancel'])->name('reseller.orders.cancel');
    });

    // Draft Orders (Admin/Cashier)
    Route::middleware(['role:admin|cashier'])->prefix('admin')->group(function () {
        Route::get('/draft-orders', [DraftOrderController::class, 'index'])->name('admin.draft-orders.index');
        Route::get('/draft-orders/{id}', [DraftOrderController::class, 'show'])->name('admin.draft-orders.show');
        Route::post('/draft-orders/{id}/load', [DraftOrderController::class, 'loadToPOS'])->name('admin.draft-orders.load');
        Route::post('/draft-orders/{id}/complete', [DraftOrderController::class, 'complete'])->name('admin.draft-orders.complete');
    });
});

// Standard Template Route (Catch-all) - Moved to bottom and protected
Route::get('/{main}/{view}', [PageController::class, 'show'])->middleware('auth');
