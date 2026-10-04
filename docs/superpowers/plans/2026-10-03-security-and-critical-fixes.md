# ModernGrosir Security & Critical Bug Fixes Implementation Plan

> **For agentic workers:** REQUIRED SUB-SKILL: Use superpowers:subagent-driven-development (recommended) or superpowers:executing-plans to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Goal:** Menutup seluruh celah keamanan (vulnerabilities) dan critical race conditions pada 4 pilar ModernGrosir (Warehouse & POS, Reseller, Monitoring, API & Database).

**Architecture:** Menerapkan pertahanan berlapis (Defense-in-Depth): RBAC middleware protection, server-side price calculation, pessimistic locking (`lockForUpdate()`) pada transaksi uang/stok, config-based webhook signature verification, rate limiting pada autentikasi, dan sanitasi XSS pada DataTables.

**Tech Stack:** Laravel 12, PHP 8.2+, Spatie Laravel Permission, Laravel Sanctum, Midtrans SDK, Yajra DataTables, MySQL InnoDB.

## Global Constraints
- BR-01: ZERO DESTRUCTION POLICY — Jangan pernah jalankan `migrate:fresh`, `migrate:reset`, atau `db:wipe`.
- BR-02: Dua sumber kebenaran stok (`stock_levels` dan `inventory_batches`) harus selalu konsisten.
- BR-03: DB Transaction Nesting — Service method tidak boleh membuka transaksi baru yang merusak outer transaction caller.
- BR-05: Akses POS hanya untuk `role:admin|cashier`, master & report keuangan untuk `role:admin`, dan reseller untuk `role:reseller`.
- BR-06: Saldo wallet reseller TIDAK BOLEH negatif. Validasi ketat sebelum deduction.
- Selalu gunakan `config()` bukan `env()` di controller/service.

---

### Task 1: RBAC Middleware Hardening (POS & Expiration Reports)

**Files:**
- Modify: `moderngrosir_laravel/routes/web.php`
- Modify: `moderngrosir_laravel/app/Http/Controllers/PageController.php`

- [x] **Step 1: Lindungi rute POS dengan middleware role:admin|cashier di `routes/web.php`**
- [x] **Step 2: Lindungi rute reports/expiration dengan middleware role:admin di `routes/web.php`**
- [x] **Step 3: Batasi atau amankan dynamic view loading di `PageController::show`**
- [x] **Step 4: Uji akses rute menggunakan artisan route:list**

---

### Task 2: Server-Side Price Recalculation & Wallet Lock di POS & Draft Orders

**Files:**
- Modify: `moderngrosir_laravel/app/Http/Controllers/Reseller/OrderController.php`
- Modify: `moderngrosir_laravel/app/Http/Controllers/POSController.php`

- [x] **Step 1: Di `Reseller\OrderController::store`, abaikan harga input klien dan hitung ulang harga resmi berdasarkan Tier produk**
- [x] **Step 2: Di `POSController::checkout`, hitung total di backend sebelum validasi saldo wallet dan gunakan `lockForUpdate()` pada reseller**
- [x] **Step 3: Pastikan saldo tidak bisa ditarik melebihi ketersediaan**

---

### Task 3: FEFO Concurrency & Race Condition Patch di ExpirationService

**Files:**
- Modify: `moderngrosir_laravel/app/Services/ExpirationService.php`

- [x] **Step 1: Ambil batch dengan `lockForUpdate()` dalam database transaction**
- [x] **Step 2: Pastikan alokasi kuantitas batch tidak memotong kuantitas melebihi sisa stok aktual**
- [x] **Step 3: Pastikan tidak ada unhandled negative quantity pada batch**

---

### Task 4: Fix Infinite Money Glitch pada Loyalty Points Redemption

**Files:**
- Modify: `moderngrosir_laravel/app/Http/Controllers/Api/Reseller/WalletController.php`

- [x] **Step 1: Masukkan pengecekan loyalty_points ke dalam transaksi dengan `lockForUpdate()`**
- [x] **Step 2: Pastikan deduksi poin dan penambahan saldo dilakukan secara atomik**

---

### Task 5: Webhook Midtrans Signature Hardening & Concurrency Fix

**Files:**
- Modify: `moderngrosir_laravel/config/services.php`
- Modify: `moderngrosir_laravel/app/Http/Controllers/Api/MidtransWebhookController.php`

- [x] **Step 1: Pastikan config `services.midtrans.server_key` terdaftar di `config/services.php`**
- [x] **Step 2: Ubah pemanggilan `env('MIDTRANS_SERVER_KEY')` menjadi `config('services.midtrans.server_key')`**
- [x] **Step 3: Gunakan `lockForUpdate()` pada `WalletTransaction` saat webhook diproses untuk mencegah double-crediting**

---

### Task 6: Pasang Rate Limiting pada Endpoint Login Web & API

**Files:**
- Modify: `moderngrosir_laravel/routes/web.php`
- Modify: `moderngrosir_laravel/routes/api.php`

- [x] **Step 1: Tambahkan middleware `throttle:5,1` pada `POST /login` di `web.php`**
- [x] **Step 2: Tambahkan middleware `throttle:5,1` pada `POST /login` di `api.php`**

---

### Task 7: Sanitasi Stored XSS pada Yajra DataTables (`rawColumns`)

**Files:**
- Modify: `moderngrosir_laravel/app/Http/Controllers/InventoryController.php`
- Modify: `moderngrosir_laravel/app/Http/Controllers/Admin/ProductController.php`
- Modify: `moderngrosir_laravel/app/Http/Controllers/Admin/PriceController.php`
- Modify: `moderngrosir_laravel/app/Http/Controllers/Admin/ResellerController.php`

- [x] **Step 1: Escape `e($product->name)` dan `e($product->sku)` di `InventoryController.php`**
- [x] **Step 2: Escape `e($product->name)` dan atribut di `ProductController.php`**
- [x] **Step 3: Escape `e($product->name)` di `PriceController.php`**
- [x] **Step 4: Escape `e($reseller->user->name)` dan email di `Admin/ResellerController.php`**

---

### Task 8: Validasi Input Angka Negatif & Concurrency pada Cancel Transaksi & PO

**Files:**
- Modify: `moderngrosir_laravel/app/Http/Controllers/Admin/ResellerController.php`
- Modify: `moderngrosir_laravel/app/Http/Controllers/Admin/TransactionController.php`
- Modify: `moderngrosir_laravel/app/Http/Controllers/Admin/PurchaseOrderController.php`

- [x] **Step 1: Tambahkan aturan `gt:0` pada `updateBalance` di `Admin\ResellerController`**
- [x] **Step 2: Kunci row transaksi dengan `lockForUpdate()` pada `TransactionController::cancel`**
- [x] **Step 3: Kunci row PO dengan `lockForUpdate()` pada `PurchaseOrderController::receive`**
