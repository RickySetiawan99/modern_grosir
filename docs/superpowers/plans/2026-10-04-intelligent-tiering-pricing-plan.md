# Implementation Plan: Intelligent Tiering Pricing System

> **For agentic workers:** REQUIRED SUB-SKILL: Use `superpowers:subagent-driven-development` (recommended) or `superpowers:executing-plans` to implement this plan task-by-task. Steps use checkbox (`- [ ]`) syntax for tracking.

**Spec Reference:** [`docs/superpowers/specs/2026-10-04-intelligent-tiering-pricing-design.md`](file:///Users/ricky/Documents/project/latihan/laravel/moderngrosir_app/moderngrosir_laravel/docs/superpowers/specs/2026-10-04-intelligent-tiering-pricing-design.md)  
**Goal:** Mengimplementasikan otomatisasi evaluasi tingkat tier reseller bulanan berbasis akumulasi omzet lunas, audit trail histori tier, proteksi penguncian tier (*tier lock*), widget progress pada dashboard reseller, manajemen master admin, dan sinkronisasi landing page.  
**Tech Stack:** Laravel 12, PHP 8.2+, PostgreSQL / MySQL agnostic, Yajra DataTables, Blade & Bootstrap 5, PHPUnit (SQLite `:memory:` for isolated testing).

---

## Global Constraints & Safeguards
- **BR-01: ZERO DESTRUCTION POLICY (Absolute):** Dilarang keras menjalankan `migrate:fresh`, `migrate:reset`, atau `db:wipe`. Seluruh migrasi skema database wajib bersifat non-destruktif dan inkremental (`php artisan make:migration` lalu `migrate`).
- **BR-02: Isolated Testing Protocol:** Test suite wajib dijalankan dengan database terisolasi (`sqlite :memory:`) menggunakan override environment untuk mencegah *config cache trap* menyentuh database aktif.
- **BR-03: Transaction Safety:** Evaluasi mutasi tier wajib dibungkus dalam `DB::transaction` per akun atau per batch agar tidak terjadi partial failure jika server terinterupsi.
- **BR-04: DB Engine Agnostic:** Query tanggal dan agregasi wajib kompatibel dengan PostgreSQL dan MySQL (hindari fungsi spesifik seperti `DATEDIFF` atau `MONTH()`).

---

## Dependency Graph

```text
Database Migrations (min_monthly_spend, is_tier_locked, reseller_tier_histories)
    │
    ├── Eloquent Models (ResellerTier, Reseller, ResellerTierHistory) & Seeders
    │       │
    │       ├── Core Service: TierEvaluationService
    │       │       │
    │       │       ├── Unit Tests: TierEvaluationServiceTest
    │       │       │
    │       │       ├── Artisan Command: EvaluateResellerTiers (reseller:evaluate-tiers)
    │       │       │       │
    │       │       │       └── Scheduler: routes/console.php (monthlyOn 1st 00:05)
    │       │       │
    │       │       ├── Admin UI: ResellerTierController & ResellerController
    │       │       │       │
    │       │       │       └── Manual Evaluation Trigger (POST /master/reseller-tiers/evaluate)
    │       │       │
    │       │       └── Reseller Dashboard Widget (DashboardController & main/index.blade.php)
    │       │
    │       └── Homepage Alignment (resources/views/landing.blade.php)
```

---

## Phase 1: Database & Model Foundation

### Task 1: Non-Destructive Migrations
**Description:** Membuat 3 file migrasi inkremental untuk menambahkan kolom `min_monthly_spend` pada `reseller_tiers`, kolom `is_tier_locked` pada `resellers`, dan tabel `reseller_tier_histories`.

**Acceptance Criteria:**
- [x] Kolom `min_monthly_spend` (decimal 15,2 default 0) ditambahkan ke tabel `reseller_tiers`.
- [x] Kolom `is_tier_locked` (boolean default false) ditambahkan ke tabel `resellers`.
- [x] Tabel `reseller_tier_histories` dibuat dengan relasi foreign key ke `reseller_id`, `old_tier_id` (nullable), `new_tier_id`, kolom `monthly_spent`, `evaluation_period`, dan `reason`.
- [x] Migrasi berhasil dieksekusi dengan `php artisan migrate` tanpa error.

**Verification:**
- [x] `php artisan migrate:status` menampilkan migrasi baru dalam status "Ran".
- [x] Schema inspection via tinker mengonfirmasi keberadaan kolom baru.

**Files touched:**
- `database/migrations/2026_10_04_000001_add_min_monthly_spend_to_reseller_tiers_table.php`
- `database/migrations/2026_10_04_000002_add_is_tier_locked_to_resellers_table.php`
- `database/migrations/2026_10_04_000003_create_reseller_tier_histories_table.php`

**Scope:** Small (3 migration files)

---

### Task 2: Models & Seeders Update
**Description:** Memperbarui model Eloquent `ResellerTier` dan `Reseller`, membuat model `ResellerTierHistory`, serta menyiapkan seeder `ResellerTierSeeder` dengan 4 tier standar (Bronze, Silver, Gold, Platinum).

**Acceptance Criteria:**
- [x] `ResellerTier` fillable mencakup `min_monthly_spend`, casting `min_monthly_spend` ke `decimal:2`.
- [x] `Reseller` fillable mencakup `is_tier_locked`, casting `is_tier_locked` ke `boolean`, serta relasi `hasMany(ResellerTierHistory::class)`.
- [x] Model `ResellerTierHistory` dibuat dengan fillable lengkap dan relasi `belongsTo` ke `Reseller`, `oldTier`, dan `newTier`.
- [x] `ResellerTierSeeder` dibuat/diupdate untuk mengonfigurasi 4 tier resmi:
  - Bronze: Min Rp 0, Diskon 5%
  - Silver: Min Rp 5.000.000, Diskon 10%
  - Gold: Min Rp 15.000.000, Diskon 15%
  - Platinum: Min Rp 50.000.000, Diskon 22%
- [x] `DatabaseSeeder` mendaftarkan `ResellerTierSeeder`.

**Verification:**
- [x] `php artisan db:seed --class=ResellerTierSeeder` berjalan sukses.
- [x] Query `ResellerTier::all()` memuat 4 tier dengan `min_monthly_spend` yang benar.

**Files touched:**
- `app/Models/ResellerTier.php`
- `app/Models/Reseller.php`
- `app/Models/ResellerTierHistory.php`
- `database/seeders/ResellerTierSeeder.php`
- `database/seeders/DatabaseSeeder.php`

**Scope:** Small (5 files)

---

### Checkpoint: Foundation
- [x] Migrasi dan seeder berhasil dieksekusi di database lokal.
- [x] Seluruh relasi model berfungsi melalui `php artisan tinker`.

---

## Phase 2: Core Domain Logic & Unit Tests

### Task 3: Implement TierEvaluationService
**Description:** Membangun `App\Services\TierEvaluationService` sebagai *single source of truth* untuk seluruh kalkulasi omzet, penentuan eligibility tier, mutasi tier bulanan dengan proteksi lock, dan pembacaan progress bulanan reseller.

**Acceptance Criteria:**
- [x] `calculateMonthlySpend(int $userId, Carbon $startDate, Carbon $endDate): float`:
  - Menghitung `sum('total_amount')` hanya dari `Transaction` berstatus `completed` dengan `customer_id == $userId`.
- [x] `determineEligibleTier(float $monthlySpend, ?ResellerTier $currentTier = null, bool $isLocked = false): ResellerTier`:
  - Mengambil tier terurut descending `min_monthly_spend`.
  - Mengembalikan tier tertinggi yang memenuhi syarat belanja.
  - Menjaga proteksi *tier lock*: jika `$isLocked` aktif dan tier hasil evaluasi lebih rendah, kembalikan `$currentTier`.
  - Jika `$isLocked` aktif tetapi omzet mencukupi untuk naik tier, tier tetap dinaikkan.
- [x] `evaluateMonthlyTiers(?Carbon $period = null, bool $dryRun = false): array`:
  - Memproses seluruh reseller aktif dalam `DB::transaction`.
  - Mencatat mutasi ke `reseller_tier_histories` saat tier berubah.
  - Mengembalikan array ringkasan: `['total', 'upgraded', 'downgraded', 'unchanged', 'locked', 'details']`.
- [x] `getResellerMonthlyProgress(Reseller $reseller): array`:
  - Menghitung belanja bulan berjalan (tanggal 1 s/d hari ini).
  - Mengidentifikasi tier saat ini dan target tier berikutnya.
  - Menghitung sisa nominal dan persentase progress (0% - 100%).
  - Menghitung sisa hari kalender hingga evaluasi berikutnya (`now()->endOfMonth()->diffInDays(now())`).
  - Menangani kondisi jika sudah di Platinum (maksimal).

**Verification:**
- [x] Kode lulus pengecekan sintaks PHP (`php -l app/Services/TierEvaluationService.php`).

**Files touched:**
- `app/Services/TierEvaluationService.php`

**Scope:** Medium (1 core service file)

---

### Task 4: Unit Testing TierEvaluationService
**Description:** Menulis suite pengujian unit komprehensif `tests/Unit/TierEvaluationServiceTest.php` untuk memvalidasi seluruh skenario bisnis dan edge cases menggunakan SQLite in-memory database.

**Acceptance Criteria:**
- [x] Test 1: Menghitung omzet belanja hanya dari transaksi `completed` dalam rentang tanggal. Transaksi pending/cancelled tidak dihitung.
- [x] Test 2: Naik tier (*upgrade*) saat omzet melampaui batas minimal tier berikutnya.
- [x] Test 3: Turun tier (*downgrade*) saat omzet di bawah batas minimal tier saat ini dan `is_tier_locked == false`.
- [x] Test 4: Proteksi *tier lock*: Akun dengan `is_tier_locked == true` tidak pernah turun tier saat omzet drop, namun tetap bisa naik tier jika omzet melonjak.
- [x] Test 5: Pembuatan record riwayat `reseller_tier_histories` terverifikasi saat tier berubah.
- [x] Test 6: Mode `dry-run` tidak melakukan mutasi database.
- [x] Test 7: Perhitungan progress bulanan menghasilkan persentase dan selisih nominal yang akurat, termasuk kondisi Platinum (maksimal).

**Verification:**
- [x] Jalankan: `php artisan test tests/Unit/TierEvaluationServiceTest.php` -> Semua test **PASS**.

**Files touched:**
- `tests/Unit/TierEvaluationServiceTest.php`

**Scope:** Medium (1 test file)

---

### Checkpoint: Core Logic Verification
- [x] Seluruh unit test TierEvaluationService lulus 100% tanpa kompromi.
- [x] Nol dependensi terhadap fungsi database MySQL-only.

---

## Phase 3: Automation & CLI Scheduling

### Task 5: Implement Artisan Command EvaluateResellerTiers
**Description:** Membuat command `reseller:evaluate-tiers` yang membungkus `TierEvaluationService::evaluateMonthlyTiers()` dengan opsi `--period` (YYYY-MM) dan `--dry-run`, serta menampilkan output tabel ringkasan yang rapi di terminal.

**Acceptance Criteria:**
- [x] Signature command: `reseller:evaluate-tiers {--period= : Format YYYY-MM} {--dry-run : Simulasi tanpa menyimpan perubahan ke database}`.
- [x] Menampilkan informasi periode evaluasi, mode (Live/Simulasi), dan tabel hasil per reseller (Nama, Tier Lama, Tier Baru, Omzet, Status).
- [x] Menampilkan ringkasan agregat: Total Reseller, Upgraded, Downgraded, Unchanged, Locked.
- [x] Menangani error dengan pesan peringatan yang jelas dan exit code yang tepat.

**Verification:**
- [x] `php artisan reseller:evaluate-tiers --dry-run` berjalan sukses dan menampilkan output tabel di konsol.

**Files touched:**
- `app/Console/Commands/EvaluateResellerTiers.php`

**Scope:** Small (1 command file)

---

### Task 6: Register Scheduler & Feature Test
**Description:** Mendaftarkan scheduler eksekusi bulanan otomatis pada tanggal 1 pukul 00:05 di `routes/console.php` dan menulis feature test `tests/Feature/EvaluateResellerTiersCommandTest.php`.

**Acceptance Criteria:**
- [x] Scheduler `Schedule::command('reseller:evaluate-tiers')->monthlyOn(1, '00:05');` terdaftar di `routes/console.php`.
- [x] Feature test memverifikasi eksekusi via Artisan CLI (baik mode normal maupun `--dry-run`).

**Verification:**
- [x] `php artisan schedule:list` menampilkan `reseller:evaluate-tiers` terjadwal pada 00:05 hari pertama tiap bulan.
- [x] `php artisan test tests/Feature/EvaluateResellerTiersCommandTest.php` -> **PASS**.

**Files touched:**
- `routes/console.php`
- `tests/Feature/EvaluateResellerTiersCommandTest.php`

**Scope:** Small (2 files)

---

## Phase 4: Admin Master Management & Manual Trigger

### Task 7: Reseller Tier Master Views & Controller
**Description:** Memperbarui manajemen Master Tier Reseller di Admin panel untuk mendukung input `min_monthly_spend`, menampilkan kolom di DataTables, serta menyediakan tombol eksekusi evaluasi manual dengan modal konfirmasi SweetAlert.

**Acceptance Criteria:**
- [x] Request validation di `ResellerTierController` memvalidasi `min_monthly_spend` (required, numeric, min:0).
- [x] Method `store` dan `update` menyimpan `min_monthly_spend`.
- [x] Method `data()` menambahkan kolom `min_monthly_spend` terformat Rupiah (`GeneralHelper::formatCurrency`).
- [x] Menambahkan endpoint `POST /master/reseller-tiers/evaluate` di `ResellerTierController` dengan proteksi middleware `role:admin` yang memanggil `TierEvaluationService::evaluateMonthlyTiers()`.
- [x] View `index.blade.php`: Kolom tabel baru "Min. Belanja Bulanan" dan tombol header *"Jalankan Evaluasi Bulanan"*.
- [x] View `create.blade.php` dan `edit.blade.php`: Input field "Min. Belanja Bulanan (Rp)" dengan bantuan placeholder dan format currency.

**Verification:**
- [x] Browser / cURL test: Mengakses `GET /master/reseller-tiers` memuat kolom DataTables baru tanpa error JavaScript.
- [x] Menguji submit form create/edit tier dengan `min_monthly_spend`.

**Files touched:**
- `app/Http/Controllers/Admin/ResellerTierController.php`
- `routes/web.php`
- `resources/views/admin/master/reseller-tiers/index.blade.php`
- `resources/views/admin/master/reseller-tiers/create.blade.php`
- `resources/views/admin/master/reseller-tiers/edit.blade.php`

**Scope:** Medium (5 files)

---

### Task 8: Reseller Master Tier Lock Management
**Description:** Memperbarui manajemen Master Reseller di Admin panel untuk menambahkan toggle `is_tier_locked` (*Kunci Tier Reseller*), menampilkan status badge gembok pada DataTables, serta memperbarui logika update di controller.

**Acceptance Criteria:**
- [x] `ResellerController::update` dan `store` menerima dan menyimpan `is_tier_locked` (boolean).
- [x] `ResellerController::data()` menampilkan ikon gembok `<i class="ti ti-lock text-warning" title="Tier Dikunci"></i>` di sebelah badge Tier jika `is_tier_locked == true`.
- [x] View `admin/master/resellers/edit.blade.php` menyediakan switch toggle interaktif "Kunci Tingkat Tier (Proteksi Downgrade)".
- [x] View `admin/master/resellers/create.blade.php` menyediakan switch toggle opsional yang sama.

**Verification:**
- [x] Buka halaman edit reseller, aktifkan toggle kunci tier, simpan, dan periksa bahwa ikon gembok muncul di tabel index reseller.

**Files touched:**
- `app/Http/Controllers/Admin/ResellerController.php`
- `resources/views/admin/master/resellers/edit.blade.php`
- `resources/views/admin/master/resellers/create.blade.php`

**Scope:** Small (3 files)

---

### Checkpoint: Admin Master Verification
- [x] Admin dapat mengubah batas minimal belanja setiap tier.
- [x] Admin dapat mengunci atau membuka kunci tier untuk reseller manapun.
- [x] Tombol evaluasi manual di header master tier berfungsi dan memberikan feedback toast/alert ringkasan.

---

## Phase 5: Reseller Dashboard & Homepage Alignment

### Task 9: Reseller Dashboard Progress Widget
**Description:** Mengintegrasikan data progress evaluasi tiering ke dalam Dashboard Reseller (`main/index.blade.php`) dan controller `DashboardController.php`.

**Acceptance Criteria:**
- [x] `DashboardController::index` mengambil progress dari `TierEvaluationService::getResellerMonthlyProgress($reseller)` saat user ber-role `reseller`.
- [x] View `resources/views/main/index.blade.php` menampilkan kartu progres interaktif khusus reseller:
  - Badge Tier Aktif (contoh: "Gold Tier - Diskon 15%").
  - Akumulasi Belanja Bulan Ini (format Rupiah).
  - Target Tier Berikutnya & Sisa Nominal Belanja untuk Naik Tier.
  - Progress bar dinamis (persentase 0-100%).
  - Indikator sisa hari hingga tanggal 1 bulan berikutnya (periode evaluasi).
  - Penanganan khusus jika akun memiliki status `is_tier_locked = true` ("Akun Anda berstatus Protected/VIP").
  - Penanganan khusus jika sudah mencapai Tier Platinum ("Selamat! Anda berada di tingkat tier tertinggi").

**Verification:**
- [x] Login sebagai reseller (`cashier@moderngrosir.com` atau akun reseller demo) dan verifikasi widget tampil rapi dan responsif.

**Files touched:**
- `app/Http/Controllers/DashboardController.php`
- `resources/views/main/index.blade.php`

**Scope:** Small (2 files)

---

### Task 10: Homepage Alignment & Seeding Synchronization
**Description:** Menyelaraskan teks dan nominal pada section *Intelligent Tiering Pricing* di `resources/views/landing.blade.php` agar 100% konsisten dengan data master tier backend (Bronze: Rp 0, Silver: Rp 5jt, Gold: Rp 15jt, Platinum: Rp 50jt) dan merapikan tautan tombol CTA Platinum ke halaman kontak.

**Acceptance Criteria:**
- [x] Kartu Tier 1 (Bronze): Min Belanja Rp 0/bln, Diskon 5%.
- [x] Kartu Tier 2 (Silver): Min Belanja Rp 5.000.000/bln, Diskon 10%.
- [x] Kartu Tier 3 (Gold): Min Belanja Rp 15.000.000/bln, Diskon 15%.
- [x] Kartu Tier Utama (Platinum): Min Belanja Rp 50.000.000/bln, Diskon 22%.
- [x] Tombol CTA pada kartu Platinum mengarah ke `{{ route('contact') }}` dengan teks "Hubungi Tim Sales".
- [x] Tombol CTA kartu Bronze, Silver, Gold mengarah ke pendaftaran reseller / login.

**Verification:**
- [x] Render landing page `GET /` dan verifikasi seluruh teks kartu tier serta link CTA sudah selaras.

**Files touched:**
- `resources/views/landing.blade.php`

**Scope:** Small (1 file)

---

### Task 11: End-to-End Feature Test & Full Suite Run
**Description:** Menulis feature test `tests/Feature/ResellerDashboardProgressTest.php` untuk memastikan flow end-to-end dashboard reseller berjalan sempurna, serta menjalankan seluruh test suite aplikasi untuk memastikan zero regression.

**Acceptance Criteria:**
- [x] Feature test memverifikasi user reseller yang mengakses `/admin/dashboard` melihat data tier, progress bar, dan nominal target yang akurat.
- [x] Seluruh unit dan feature test di aplikasi lulus tanpa error.

**Verification:**
- [x] `php artisan test` -> **100% Tests Pass**.

**Files touched:**
- `tests/Feature/ResellerDashboardProgressTest.php`

**Scope:** Small (1 test file)

---

## Final Checkpoint & Sign-off
- [x] Seluruh migrasi, service, command, UI admin, dan dashboard reseller terintegrasi.
- [x] Seluruh automated test lulus (`php artisan test`).
- [x] Tidak ada query destruktif atau inkonsistensi database.
- [x] Siap untuk deployment bertahap ke VPS Tencent.
