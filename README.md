# ModernGrosir 🚀
**Modern Wholesale & POS Management System**

ModernGrosir adalah platform manajemen grosir modern yang dibangun dengan Laravel 11, dirancang untuk memudahkan distributor dalam mengelola inventaris, reseller, dan transaksi Point of Sales (POS) dengan sistem harga bertingkat (Tiered Pricing).

---

## ✨ Fitur Utama (Implemented)

### 📊 Dashboard Canggih
- **Role-Based Analysis**: Tampilan dashboard yang menyesuaikan dengan role aktif (Admin/Cashier/Reseller).
- **Statistik Real-time**: Memantau omzet, jumlah produk, dan aktivitas reseller secara instan.
- **Grafik Interaktif**: Visualisasi tren penjualan bulanan menggunakan ApexCharts yang mendukung mode gelap/terang.

### 🛒 Point of Sales (POS)
- **Multi-Warehouse Support**: Memilih gudang sumber stok saat transaksi.
- **Dynamic Pricing**: Otomatis menyesuaikan harga berdasarkan **Tier Reseller** yang dipilih.
- **Responsive Layout**: POS yang nyaman digunakan di tablet maupun desktop.

### 📦 Manajemen Inventaris & Master Data
- **Manajemen Produk**: Sistem stok yang terintegrasi dengan berbagai gudang.
- **Tiered Pricing**: Pengaturan harga khusus untuk tiap level reseller (misal: Silver, Gold, Platinum).
- **Kategori & Satuan**: Pengorganisasian produk yang fleksibel.

### 🔐 Keamanan & Akses
- **Role Permissions**: Pembatasan akses fitur yang ketat (Admin vs Kasir vs Reseller).
- **Personalized Profile**: Pengaturan akun dengan pilihan avatar default yang modern.

### 🎨 UI/UX Premium
- **Persistent Settings**: Semua pilihan tema (Dark/Light), warna, dan layout sidebar tersimpan secara permanen di browser.
- **Zero-Flash Theme**: Sistem pemuatan tema yang cerdas untuk mencegah efek "blink" saat refresh halaman.
- **Timezone Jakarta**: Pencatatan waktu yang akurat (WIB).

---

## 🛠️ Stack Teknologi
- **Framework**: [Laravel 12](https://laravel.com)
- **Frontend Template**: [Modernize Bootstrap Admin](https://wrappixel.com)
- **Database**: MySQL / MariaDB
- **Icons**: Tabler Icons & Lucid Icons
- **Charts**: ApexCharts
- **State Management**: LocalStorage (for UI preferences)

---

## 🚀 Instalasi Cepat

1. **Clone repositori**
   ```bash
   git clone https://github.com/user/moderngrosir-app.git
   cd moderngrosir-app
   ```

2. **Install dependensi**
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Migrasi & Seeding**
   ```bash
   php artisan migrate --seed
   ```

5. **Jalankan Aplikasi**
   ```bash
   php artisan serve
   npm run dev
   ```

---

## 📝 Progress Fitur (Roadmap)
- [x] Autentikasi & Multi-role Support
- [x] Dashboard Statis -> Dinamis
- [x] Integrasi POS Foundation
- [x] Persistence Theme Settings
- [x] Timezone & Indonesian Localization
- [ ] Katalog Produk khusus Reseller
- [ ] Laporan Laba/Rugi Mingguan
- [ ] Sistem Notifikasi Stok Menipis

---
*Dikembangkan dengan ❤️ untuk ModernGrosir Management.*
