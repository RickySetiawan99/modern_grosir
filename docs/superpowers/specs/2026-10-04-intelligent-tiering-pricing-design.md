# Design Spec: Intelligent Tiering Pricing System

- **Tanggal:** 2026-10-04
- **Status:** Approved (Ready for Implementation Planning)
- **Author:** Ricky / ModernGrosir Team & AI Pair Programmer
- **Scope:** Backend Services, Database Schema, Scheduled Automation, Admin Master Management, Reseller Dashboard Progress, Homepage CTA Alignment

---

## 1. Latar Belakang & Motivasi

Pada landing page ModernGrosir (`resources/views/landing.blade.php`), fitur **"Intelligent Tiering Pricing"** dipromosikan sebagai:
> *"Sistem penetapan harga berjenjang secara otomatis sesuai akumulasi transaksi bulanan reseller Anda."*

Secara backend, sistem harga berjenjang (`ResellerTier`, diskon persen eceran, dan custom override per produk di `product_tier_prices`) telah bekerja dengan baik saat katalog ditampilkan, draft order dibuat, maupun saat kasir bertransaksi di POS.

Namun, mekanisme otomatisasi evaluasi tingkat tier bulanan, pencatatan histori perubahan tier, fitur penguncian tier (*tier lock*), dan visibilitas target omzet pada Dashboard Reseller belum diimplementasikan. Spesifikasi ini mendesain arsitektur end-to-end agar janji fitur di landing page terhubung 100% dengan mesin logika di backend.

---

## 2. Tujuan (Goals) & Batasan (Non-Goals)

### Goals
1. **Otomasi Evaluasi Bulanan:** Menghitung total belanja lunas (`transactions` dengan status `completed`) setiap reseller pada bulan kalender sebelumnya (tanggal 1 awal bulan pukul 00:05), lalu menyesuaikan tingkat tier secara otomatis.
2. **Fleksibilitas Dua Arah dengan Proteksi:** Mendukung kenaikan (*upgrade*) dan penurunan (*downgrade*) tier berdasarkan omzet, dengan opsi *Tier Lock* bagi Admin untuk mengunci akun mitra VIP/strategis.
3. **Audit Trail Lengkap:** Mencatat setiap peristiwa perubahan tier ke dalam tabel riwayat `reseller_tier_histories`.
4. **Transparansi Reseller (Progress Tracking):** Menyediakan widget di Dashboard Reseller yang menampilkan omzet bulan berjalan, target nominal tier berikutnya, dan persentase progress.
5. **Manajemen Admin Dinamis:** Menyediakan input batas minimal belanja bulanan di Master Tier Reseller serta tombol eksekusi manual ("Jalankan Evaluasi Sekarang").
6. **Homepage Alignment:** Menyelaraskan 4 tier master (Bronze, Silver, Gold, Platinum) dan merapikan alur tombol CTA landing page.

### Non-Goals
- Real-time mid-month downgrade (penurunan tidak pernah dilakukan di tengah bulan berjalan).
- Penanganan multi-currency (tetap menggunakan Rupiah standar sistem ModernGrosir).

---

## 3. Arsitektur Database & Migrasi

Migrasi bersifat *incremental* dan *non-destructive*:

### 3.1. Penambahan Kolom pada `reseller_tiers`
File migrasi: `database/migrations/xxxx_xx_xx_xxxxxx_add_min_monthly_spend_to_reseller_tiers_table.php`
- `min_monthly_spend`: `decimal(15, 2)->default(0)->after('discount_percentage')`
  - Ambang batas minimal belanja bulanan bersih untuk mendapatkan tier tersebut.
  - Nilai standar tier:
    - **Bronze (Tier 1):** Diskon 5%, Min. Belanja Rp 0 (Tier dasar untuk semua reseller baru).
    - **Silver (Tier 2):** Diskon 10%, Min. Belanja Rp 5.000.000.
    - **Gold (Tier 3):** Diskon 15%, Min. Belanja Rp 15.000.000.
    - **Platinum (Tier Utama):** Diskon 22%, Min. Belanja Rp 50.000.000.

### 3.2. Penambahan Kolom pada `resellers`
File migrasi: `database/migrations/xxxx_xx_xx_xxxxxx_add_is_tier_locked_to_resellers_table.php`
- `is_tier_locked`: `boolean->default(false)->after('reseller_tier_id')`
  - Jika `true`, scheduler tidak akan pernah menurunkan tier akun ini saat omzet di bawah threshold.

### 3.3. Tabel Baru: `reseller_tier_histories`
File migrasi: `database/migrations/xxxx_xx_xx_xxxxxx_create_reseller_tier_histories_table.php`
```php
Schema::create('reseller_tier_histories', function (Blueprint $table) {
    $table->id();
    $table->foreignId('reseller_id')->constrained('resellers')->cascadeOnDelete();
    $table->foreignId('old_tier_id')->nullable()->constrained('reseller_tiers')->nullOnDelete();
    $table->foreignId('new_tier_id')->constrained('reseller_tiers')->cascadeOnDelete();
    $table->decimal('monthly_spent', 15, 2)->default(0);
    $table->string('evaluation_period', 7); // Format: 'YYYY-MM'
    $table->string('reason');
    $table->timestamps();
});
```

---

## 4. Logika Bisnis & Service Layer

### 4.1. `App\Services\TierEvaluationService`
Service ini menjadi *single source of truth* untuk evaluasi tiering:

1. **`calculateMonthlySpend(int $userId, Carbon $startDate, Carbon $endDate): float`**
   - Menghitung `sum('total_amount')` dari model `Transaction`:
     - `customer_id == $userId`
     - `status == 'completed'`
     - `created_at` di antara `$startDate` dan `$endDate`.
2. **`determineEligibleTier(float $monthlySpend, ?ResellerTier $currentTier = null, bool $isLocked = false): ResellerTier`**
   - Mengambil semua tier terurut descending `min_monthly_spend`.
   - Menemukan tier tertinggi pertama di mana `$monthlySpend >= $tier->min_monthly_spend`.
   - Jika `$isLocked == true` dan tier baru lebih rendah dari `$currentTier`, kembalikan `$currentTier` (proteksi lock).
3. **`evaluateMonthlyTiers(?Carbon $period = null): array`**
   - Default `$period` adalah bulan sebelumnya (`now()->subMonth()`).
   - Berjalan di dalam `DB::transaction`.
   - Iterasi semua akun reseller aktif:
     - Hitung omzet bulan evaluasi.
     - Tentukan tier berhak.
     - Jika tier berubah: update `reseller_tier_id`, buat record di `reseller_tier_histories`.
   - Mengembalikan ringkasan: `['total_resellers', 'upgraded', 'downgraded', 'unchanged', 'locked']`.
4. **`getResellerMonthlyProgress(Reseller $reseller): array`**
   - Menghitung omzet bulan berjalan (tanggal 1 bulan ini s/d sekarang).
   - Menentukan tier target berikutnya (tier satu tingkat di atas tier saat ini berdasarkan urutan `min_monthly_spend`).
   - Menghitung sisa nominal dan persentase progress (0% - 100%).

### 4.2. Artisan Command & Scheduler
- **Command:** `App\Console\Commands\EvaluateResellerTiers`
  - Signature: `reseller:evaluate-tiers {--period= : Format YYYY-MM} {--dry-run : Simulasi tanpa menyimpan ke DB}`
- **Scheduler di `routes/console.php`:**
  ```php
  Schedule::command('reseller:evaluate-tiers')->monthlyOn(1, '00:05');
  ```

---

## 5. Antarmuka Pengguna (UI) & Integrasi

### 5.1. Admin — Master Reseller Tier
- **Create & Edit View (`admin/master/reseller-tiers`):** Input field baru `min_monthly_spend` (Min. Belanja Bulanan).
- **Index View:** Kolom "Min. Belanja Bulanan" di tabel DataTables, dan tombol di header: *"Jalankan Evaluasi Bulanan"* dengan modal/SweetAlert konfirmasi.
- **Controller Route:** `POST admin/reseller-tiers/evaluate` memanggil `TierEvaluationService::evaluateMonthlyTiers()`.

### 5.2. Admin — Manajemen Reseller
- **Edit View (`admin/master/resellers/edit.blade.php`):** Toggle switch `is_tier_locked` (*Kunci Tier Reseller*).
- **Index View:** Ikon gembok (*locked badge*) pada kolom Tier untuk akun dengan `is_tier_locked = true`.

### 5.3. Reseller — Dashboard Akumulasi Omzet
- Di [`DashboardController.php`](file:///Users/ricky/Documents/project/latihan/laravel/moderngrosir_app/moderngrosir_laravel/app/Http/Controllers/DashboardController.php) untuk user role `reseller`:
  - Mengambil data progress dari `TierEvaluationService::getResellerMonthlyProgress($reseller)`.
- Di [`resources/views/dashboard.blade.php`](file:///Users/ricky/Documents/project/latihan/laravel/moderngrosir_app/moderngrosir_laravel/resources/views/dashboard.blade.php):
  - Kartu Widget:
    - Tier saat ini & persentase diskon.
    - Total belanja bulan berjalan.
    - Target nominal tier berikutnya.
    - Progress Bar interaktif.
    - Countdown sisa hari evaluasi bulanan.

### 5.4. Homepage Alignment (`landing.blade.php`)
- Sinkronisasi teks kartu tier agar persis dengan database (Bronze: Rp 0, Silver: Rp 5jt, Gold: Rp 15jt, Platinum: Rp 50jt).
- Tombol "Hubungi Platinum" diarahkan ke halaman kontak/sales ([`route('contact')`](file:///Users/ricky/Documents/project/latihan/laravel/moderngrosir_app/moderngrosir_laravel/routes/web.php#L38)).
- Seeder Master Tier disiapkan untuk menyuntikkan 4 tier lengkap: Bronze, Silver, Gold, Platinum.

---

## 6. Error Handling & Edge Cases

| Kondisi / Edge Case | Penanganan Sistem |
| :--- | :--- |
| **Reseller Omzet Rp 0** | Otomatis memenuhi syarat tier Bronze (ambang Rp 0). Jika tidak dikunci, tier turun ke Bronze secara wajar. |
| **Reseller dengan Status `is_tier_locked = true`** | Jika hasil evaluasi omzet lebih rendah dari tier saat ini, sistem **tidak melakukan downgrade**. Jika omzet mencukupi untuk naik ke tier yang lebih tinggi, tier **tetap dinaikkan**. |
| **Transaksi Dibatalkan / Pending** | Hanya transaksi berstatus `completed` yang dihitung. Transaksi `cancelled`, `pending`, atau `refunded` diabaikan dari `sum('total_amount')`. |
| **Reseller Berada di Tier Tertinggi (Platinum)** | Target tier berikutnya bernilai `null`, progress bar berstatus `100% (Maksimal)`, menampilkan pesan apresiasi mempertahankan level Platinum. |
| **Interupsi / Gangguan Server saat Batch Berjalan** | Dibungkus dalam `DB::transaction` per reseller atau global batch sehingga tidak ada data menggantung setengah jalan. |

---

## 7. Rencana Pengujian (Testing Strategy)

Pengujian wajib dijalankan menggunakan konfigurasi database terisolasi (`sqlite :memory:`):
1. **Unit Test: `TierEvaluationServiceTest`**
   - Menghitung omzet transaksi lunas di rentang waktu yang tepat.
   - Menguji kenaikan tier ketika omzet melampaui syarat.
   - Menguji penurunan tier ketika omzet di bawah syarat.
   - Memastikan akun dengan `is_tier_locked = true` terlindungi dari penurunan tier.
   - Memverifikasi pembuatan entri `reseller_tier_histories`.
2. **Feature Test: `EvaluateResellerTiersCommandTest`**
   - Memanggil `php artisan reseller:evaluate-tiers --dry-run` dan memastikan tidak ada perubahan di DB.
   - Memanggil `php artisan reseller:evaluate-tiers` dan memverifikasi perubahan tier di DB.
3. **Feature Test: `ResellerDashboardProgressTest`**
   - Memastikan widget dashboard reseller menampilkan nilai omzet, persentase progress, dan sisa nominal target yang akurat.
