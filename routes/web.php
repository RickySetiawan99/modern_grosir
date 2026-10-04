<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FetchController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ResellerController;

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\SocialiteController;

use App\Http\Controllers\Admin\BatchController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DraftOrderController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PurchaseOrderController;
use App\Http\Controllers\Admin\Reports\BatchReportController;
use App\Http\Controllers\Admin\ResellerController as AdminResellerController;
use App\Http\Controllers\Admin\ResellerTierController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\TopupController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WarehouseController;

use App\Http\Controllers\Reseller\CatalogController;
use App\Http\Controllers\Reseller\OrderController;
use App\Http\Controllers\Reseller\WalletController;

Route::get('/', function () {
    return view('landing');
})->name('landing');

// Public Pages
Route::controller(PageController::class)->group(function () {
    Route::get('/privacy', 'privacy')->name('privacy');
    Route::get('/terms', 'terms')->name('terms');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/contact', 'submitContact')->name('contact.submit');
});

// Authentication Routes (Guest)
Route::middleware('guest')->group(function () {
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'showLogin')->name('login');
        Route::post('/login', 'login')->middleware('throttle:5,1');
    });

    Route::controller(ForgotPasswordController::class)->group(function () {
        Route::get('/forgot-password', 'showLinkRequestForm')->name('password.request');
        Route::post('/forgot-password', 'sendResetLinkEmail')->name('password.email');
    });

    Route::controller(ResetPasswordController::class)->group(function () {
        Route::get('/reset-password/{token}', 'showResetForm')->name('password.reset');
        Route::post('/reset-password', 'reset')->name('password.update');
    });

    Route::controller(SocialiteController::class)->group(function () {
        Route::get('/auth/{provider}', 'redirectToProvider')->name('auth.social');
        Route::get('/auth/{provider}/callback', 'handleProviderCallback');
    });
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth'])->group(function () {
    // Global Fetch (Select2 & Master Dropdowns)
    Route::post('/fetch/globalfetch', [FetchController::class, 'globalfetch'])->name('globalfetch');

    // Admin & Authenticated Operations
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Account Settings
        Route::prefix('account-settings')->name('profile.')->controller(ProfileController::class)->group(function () {
            Route::get('/', 'settings')->name('settings');
            Route::post('/', 'update')->name('update');
            Route::post('reset-avatar', 'resetAvatar')->name('reset-avatar');
            Route::post('password', 'updatePassword')->name('password');
        });

        // Operations (Admin & Cashier)
        Route::middleware(['role:admin|cashier'])->group(function () {
            // Inventory Management
            Route::prefix('inventory')->name('inventory.')->group(function () {
                Route::controller(InventoryController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('data', 'data')->name('data');
                    Route::post('{id}', 'update')->name('update')->where('id', '[0-9]+');
                });

                // Batches
                Route::prefix('batches')->name('batches.')->controller(BatchController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('create', 'create')->name('create');
                    Route::post('/', 'store')->name('store');
                    Route::get('{id}', 'show')->name('show');
                    Route::put('{id}', 'update')->name('update');
                    Route::post('{id}/dispose', 'dispose')->name('dispose');
                    Route::post('{id}/transfer', 'transfer')->name('transfer');
                    Route::get('{id}/history', 'history')->name('history');
                });
            });

            // Transactions
            Route::prefix('transactions')->name('transactions.')->controller(TransactionController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('data', 'data')->name('data');
                Route::get('{id}', 'show')->name('show');
                Route::get('{id}/receipt', 'receipt')->name('receipt');
                Route::post('{id}/cancel', 'cancel')->name('cancel')->middleware('role:admin');
            });

            // Point of Sale (POS)
            Route::prefix('pos')->name('pos.')->controller(POSController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('products', 'products')->name('products');
                Route::post('checkout', 'checkout')->name('checkout');
            });

            // Draft Orders (POS Support)
            Route::prefix('admin/draft-orders')->name('admin.draft-orders.')->controller(DraftOrderController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('{id}', 'show')->name('show');
                Route::post('{id}/load', 'loadToPOS')->name('load');
                Route::post('{id}/complete', 'complete')->name('complete');
            });
        });

        // Administration & Management (Admin Only)
        Route::middleware(['role:admin'])->group(function () {
            // Pricing Management
            Route::prefix('pricing')->name('pricing.')->controller(PriceController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('data', 'data')->name('data');
                Route::get('{product}', 'getProductPrices')->name('product');
                Route::post('{product}', 'update')->name('update');
            });

            // Purchase Orders (PO) & GRN
            Route::prefix('purchase-orders')->name('purchase-orders.')->group(function () {
                Route::controller(PurchaseOrderController::class)->group(function () {
                    Route::get('data', 'data')->name('data');
                    Route::post('{purchaseOrder}/receive', 'receive')->name('receive');
                });
                Route::resource('/', PurchaseOrderController::class)->parameters(['' => 'purchase_order']);
            });

            // Reports & Analytics
            Route::prefix('reports')->name('reports.')->group(function () {
                Route::controller(ReportController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('export-excel', 'exportExcel')->name('excel');
                    Route::get('export-pdf', 'exportPdf')->name('pdf');
                });

                // Expiration Reports
                Route::prefix('expiration')->name('expiration.')->controller(BatchReportController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('forecast', 'expirationForecast')->name('forecast');
                    Route::get('disposal', 'disposalReport')->name('disposal');
                    Route::get('fefo', 'fefoCompliance')->name('fefo');
                });
            });

            // Resellers List
            Route::get('/resellers', [ResellerController::class, 'index'])->name('resellers.index');

            // Master Data Management
            Route::prefix('master')->name('master.')->group(function () {
                // Products
                Route::prefix('products')->name('products.')->group(function () {
                    Route::controller(ProductController::class)->group(function () {
                        Route::get('data', 'data')->name('data');
                        Route::post('bulk-delete', 'bulkDelete')->name('bulk-delete');
                    });
                    Route::resource('/', ProductController::class)->parameters(['' => 'product']);
                });

                // Categories
                Route::prefix('categories')->name('categories.')->group(function () {
                    Route::controller(CategoryController::class)->group(function () {
                        Route::get('data', 'data')->name('data');
                        Route::post('bulk-delete', 'bulkDelete')->name('bulk-delete');
                    });
                    Route::resource('/', CategoryController::class)->parameters(['' => 'category']);
                });

                // Units
                Route::prefix('units')->name('units.')->group(function () {
                    Route::controller(UnitController::class)->group(function () {
                        Route::get('data', 'data')->name('data');
                        Route::post('bulk-delete', 'bulkDelete')->name('bulk-delete');
                    });
                    Route::resource('/', UnitController::class)->parameters(['' => 'unit']);
                });

                // Suppliers
                Route::prefix('suppliers')->name('suppliers.')->group(function () {
                    Route::controller(SupplierController::class)->group(function () {
                        Route::get('data', 'data')->name('data');
                        Route::post('bulk-delete', 'bulkDelete')->name('bulk-delete');
                    });
                    Route::resource('/', SupplierController::class)->parameters(['' => 'supplier']);
                });

                // Warehouses
                Route::prefix('warehouses')->name('warehouses.')->group(function () {
                    Route::controller(WarehouseController::class)->group(function () {
                        Route::get('data', 'data')->name('data');
                        Route::post('bulk-delete', 'bulkDelete')->name('bulk-delete');
                    });
                    Route::resource('/', WarehouseController::class)->parameters(['' => 'warehouse']);
                });

                // Top-up Management
                Route::prefix('topups')->name('topups.')->controller(TopupController::class)->group(function () {
                    Route::get('/', 'index')->name('index');
                    Route::get('data', 'data')->name('data');
                    Route::post('{transaction}/approve', 'approve')->name('approve');
                    Route::post('{transaction}/reject', 'reject')->name('reject');
                });

                // Reseller Tiers
                Route::prefix('reseller-tiers')->name('reseller-tiers.')->group(function () {
                    Route::controller(ResellerTierController::class)->group(function () {
                        Route::get('data', 'data')->name('data');
                        Route::post('bulk-delete', 'bulkDelete')->name('bulk-delete');
                        Route::post('evaluate', 'evaluate')->name('evaluate');
                    });
                    Route::resource('/', ResellerTierController::class)->parameters(['' => 'reseller_tier']);
                });

                // Resellers
                Route::prefix('resellers')->name('resellers.')->group(function () {
                    Route::controller(AdminResellerController::class)->group(function () {
                        Route::get('data', 'data')->name('data');
                        Route::post('bulk-delete', 'bulkDelete')->name('bulk-delete');
                        Route::post('{reseller}/balance', 'updateBalance')->name('balance');
                    });
                    Route::resource('/', AdminResellerController::class)->parameters(['' => 'reseller']);
                });

                // Roles
                Route::prefix('roles')->name('roles.')->group(function () {
                    Route::controller(RoleController::class)->group(function () {
                        Route::get('data', 'data')->name('data');
                    });
                    Route::resource('/', RoleController::class)->parameters(['' => 'role']);
                });

                // Users
                Route::prefix('users')->name('users.')->group(function () {
                    Route::controller(UserController::class)->group(function () {
                        Route::get('data', 'data')->name('data');
                    });
                    Route::resource('/', UserController::class)->parameters(['' => 'user']);
                });
            });
        });

        // Reseller Portal (Role: Reseller Only)
        Route::prefix('reseller')->name('reseller.')->middleware(['role:reseller'])->group(function () {
            // Catalog
            Route::prefix('catalog')->name('catalog.')->controller(CatalogController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('products', 'products')->name('products');
            });

            // Wallet & Top-up
            Route::prefix('wallet')->name('wallet.')->controller(WalletController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('topup', 'store')->name('topup');
            });

            // Order Management
            Route::prefix('orders')->name('orders.')->controller(OrderController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/', 'store')->name('store');
                Route::get('{id}', 'show')->name('show');
                Route::post('{id}/cancel', 'cancel')->name('cancel');
            });
        });
    });
});

// Standard Template Route (Catch-all)
Route::get('/{main}/{view}', [PageController::class, 'show'])->middleware(['auth', 'role:admin']);
