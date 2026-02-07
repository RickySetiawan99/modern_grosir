# ModernGrosir 🚀
**Modern Wholesale & POS Management System**

ModernGrosir adalah platform manajemen grosir modern yang dibangun dengan Laravel 12, dirancang untuk memudahkan distributor dalam mengelola inventaris, reseller, dan transaksi Point of Sales (POS) dengan sistem harga bertingkat (Tiered Pricing).

---

## ✨ Fitur Utama (Implemented)

### 📈 Laporan Laba/Rugi & Analitik (Admin Only)
- **Gross Profit Tracking**: Perhitungan laba kotor otomatis berdasarkan selisih harga jual dan harga modal (`purchase_price`).
- **Performance Overview Chart**: Grafik multi-series yang membandingkan Omzet (Revenue) vs Laba Kotor (Profit) secara bulanan.
- **Advanced Export**: Fitur ekspor laporan transaksi ke format **Excel (.xlsx)** dan **PDF** untuk dokumentasi offline.
- **Date Range Filter**: Laporan yang dapat difilter berdasarkan rentang tanggal tertentu (mingguan/bulanan).

### 🔔 Smart Inventory System
- **Notifikasi Stok Menipis**: Peringatan visual otomatis di dashboard jika stok produk mencapai batas aman (`safety_stock`).
- **Direct Stock Edition**: Management stok yang cepat melalui modal "Edit Stock" tanpa harus berpindah halaman.
- **Global Stock Search**: Pencarian produk dalam inventaris berdasarkan Nama atau **SKU/Barcode**.
- **Multi-Warehouse Support**: Sinkronisasi stok antar berbagai gudang (Store & Warehouse).
- **Kategori & Satuan**: Pengorganisasian produk yang fleksibel.

### 🛒 Point of Sales (POS) & Self-Service
- **Retail POS**: Sistem kasir responsif untuk transaksi retail harian.
- **Dynamic Pricing**: Otomatis menyesuaikan harga berdasarkan **Tier Reseller** yang dipilih.
- **Reseller Catalog**: Halaman katalog khusus reseller dengan harga yang otomatis menyesuaikan **Reseller Tier** (Silver/Gold/Platinum).
- **Self-Service Order**: Reseller dapat membuat pesanan mandiri yang otomatis masuk sebagai "Draft Order" untuk divalidasi Admin/Kasir.

### 📊 Dashboard Canggih
- **Role-Based Analysis**: Tampilan dashboard yang menyesuaikan dengan role aktif (Admin/Cashier/Reseller).
- **Statistik Real-time**: Memantau omzet, profit, jumlah produk, dan aktivitas reseller secara instan.
- **Grafik Interaktif**: Visualisasi tren penjualan menggunakan ApexCharts yang mendukung mode gelap/terang.

### 🔐 Keamanan & Akses
- **Role Permissions**: Pembatasan akses fitur yang ketat menggunakan Spatie Permissions (Admin vs Kasir vs Reseller).
- **Personalized Profile**: Pengaturan akun dengan fitur ganti password dan pilihan avatar default yang modern.

### 🎨 UI/UX Premium
- **Persistent Settings**: Pilihan tema (Dark/Light), warna primary, dan layout sidebar tersimpan secara permanen di browser.
- **Zero-Flash Theme**: Sistem pemuatan tema cerdas untuk mencegah efek "blink" saat refresh halaman.
- **Timezone Jakarta**: Pencatatan waktu transaksi dan laporan yang akurat sesuai WIB (Asia/Jakarta).

---

## 🛠️ Stack Teknologi
- **Framework**: [Laravel 12](https://laravel.com)
- **Frontend Template**: [Modernize Bootstrap Admin](https://wrappixel.com)
- **Database**: MySQL / MariaDB
- **Charts**: ApexCharts
- **Exports**: Maatwebsite/Excel & Barryvdh/Laravel-DomPDF
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
- [x] Katalog Produk khusus Reseller
- [x] Sistem Order Mandiri Reseller
- [x] Laporan Laba/Rugi & Analitik
- [x] Sistem Notifikasi Stok Menipis

---

## 🔒 License & Ownership

**Proprietary Software** - Copyright © 2026 Ricky. All Rights Reserved.

This project is protected by copyright laws. Unauthorized use, reproduction, or distribution without explicit permission from the owner is strictly prohibited.

### ⚠️ Activation Required
This application requires a valid **License Key** to run.
Please contact the owner (Ricky) at **rickiricki201533@gmail.com** or visit **[blueseyes.id](https://blueseyes.id)** to obtain your `APP_LICENSE_KEY`.

Add the key to your `.env` file:
```env
APP_LICENSE_KEY=your-secret-key-here
```

---
*Dikembangkan dengan ❤️ untuk ModernGrosir Management.*
