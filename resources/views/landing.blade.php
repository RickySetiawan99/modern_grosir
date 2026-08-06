<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'ModernGrosir') }} — B2B Commerce Infrastructure</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logos/favicon.svg') }}" />
    
    <!-- Google Fonts: Geist & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@400;500;600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Tabler Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body>

    <!-- Header Navigation -->
    <header id="header">
        <div class="container">
            <div class="nav-wrapper">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logos/logo-dark.svg') }}" alt="{{ config('app.name', 'ModernGrosir') }}" height="32">
                    </a>
                </div>
                <nav class="nav-links">
                    <a href="#tiering">Tiering</a>
                    <a href="#features">Fitur</a>
                    <a href="#workflow">Alur Kerja</a>
                </nav>
                <div class="nav-actions">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-ghost">Masuk</a>
                        <a href="{{ route('login') }}" class="btn btn-primary">Gabung Reseller</a>
                    @endguest
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Ke Dashboard</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="hero-grid">
                    <!-- Left Content -->
                    <div class="hero-content">
                        <div class="hero-badge-wrap">
                            <span class="badge badge-soft">B2B Ecosystem v2.0</span>
                        </div>
                        <h1 class="text-engineered">Infrastruktur Grosir & Distritusi Modern</h1>
                        <p>Platform B2B all-in-one untuk manajemen gudang FEFO, tiering harga reseller otomatis, dan sistem POS terpadu.</p>
                        
                        <div class="hero-ctas">
                            @guest
                                <a href="{{ route('login') }}" class="btn btn-primary">Mulai Sekarang</a>
                                <a href="#workflow" class="btn btn-outline">Lihat Dokumentasi Sistem</a>
                            @endguest
                            @auth
                                <a href="{{ route('dashboard') }}" class="btn btn-primary">Buka Dashboard Admin</a>
                            @endauth
                        </div>

                        <div class="hero-trust-strip">
                            <span>Dipercaya <strong>500+ Mitra Grosir</strong> di seluruh Indonesia</span>
                        </div>
                    </div>

                    <!-- Right Visual Card (Component Blueprint Mockup) -->
                    <div class="card hero-preview-card">
                        <div class="card-header-strip">
                            <div class="card-header-dots">
                                <span></span><span></span><span></span>
                            </div>
                            <span class="card-header-title">Live System Status — {{ config('app.name', 'ModernGrosir') }}</span>
                        </div>
                        <div class="card-inner-body">
                            <div class="preview-stat-grid">
                                <div class="stat-box-subtle">
                                    <span class="label">Omzet Hari Ini</span>
                                    <span class="val">Rp 28.4M</span>
                                </div>
                                <div class="stat-box-subtle">
                                    <span class="label">FEFO Control</span>
                                    <span class="val">99.8%</span>
                                </div>
                                <div class="stat-box-subtle">
                                    <span class="label">Draft Order</span>
                                    <span class="val">42 Active</span>
                                </div>
                            </div>

                            <div class="preview-table-subtle">
                                <div class="table-subtle-row">
                                    <span>Toko Sembako Jaya (DRF-8921)</span>
                                    <span class="badge badge-solid">Gold Tier (-15%)</span>
                                </div>
                                <div class="table-subtle-row">
                                    <span>Grosir Berkah Mandiri (DRF-8920)</span>
                                    <span class="badge badge-soft">Wallet Paid</span>
                                </div>
                                <div class="table-subtle-row">
                                    <span>Distributor Utama (DRF-8919)</span>
                                    <span class="badge badge-soft">Batch FEFO OK</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Trust Stats Bar -->
        <section class="trust-stats-section">
            <div class="container">
                <div class="stats-grid">
                    <div class="stat-block">
                        <h3>500+</h3>
                        <p>Mitra Grosir & Distributor</p>
                    </div>
                    <div class="stat-block">
                        <h3>Rp 45M+</h3>
                        <p>Omzet Terproses</p>
                    </div>
                    <div class="stat-block">
                        <h3>99.8%</h3>
                        <p>Akurasi Kontrol FEFO</p>
                    </div>
                    <div class="stat-block">
                        <h3>&lt; 2m</h3>
                        <p>Waktu Checkout POS</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tiering Pricing Section -->
        <section id="tiering" class="tiering-section">
            <div class="container">
                <div class="section-header">
                    <h2>Intelligent Tiering Pricing</h2>
                    <p>Sistem penetapan harga berjenjang secara otomatis sesuai akumulasi transaksi bulanan reseller Anda.</p>
                </div>

                <div class="pricing-grid">
                    <!-- Bronze Tier Card -->
                    <div class="pricing-card">
                        <div>
                            <div class="pricing-header">
                                <h3>Bronze</h3>
                                <span class="badge badge-soft">Tier 1</span>
                            </div>
                            <div class="pricing-discount-wrapper">
                                <div class="pricing-discount">5%</div>
                                <div class="pricing-min-order">Min. Order: Rp 1.000.000 / bln</div>
                            </div>
                            <div class="pricing-margin-badge">Est. Margin: 12% - 15%</div>
                            <ul class="pricing-features">
                                <li><i class="ti ti-circle-check-filled"></i> Diskon 5% otomatis dari eceran</li>
                                <li><i class="ti ti-circle-check-filled"></i> Akses Self-Order App & Katalog</li>
                                <li><i class="ti ti-circle-check-filled"></i> Min. transaksi Rp 1 Juta/bulan</li>
                                <li><i class="ti ti-circle-check-filled"></i> Support standar via CS</li>
                            </ul>
                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline w-100">Daftar Bronze</a>
                    </div>

                    <!-- Silver Tier Card -->
                    <div class="pricing-card">
                        <div>
                            <div class="pricing-header">
                                <h3>Silver</h3>
                                <span class="badge badge-soft">Tier 2</span>
                            </div>
                            <div class="pricing-discount-wrapper">
                                <div class="pricing-discount">10%</div>
                                <div class="pricing-min-order">Min. Order: Rp 5.000.000 / bln</div>
                            </div>
                            <div class="pricing-margin-badge">Est. Margin: 18% - 22%</div>
                            <ul class="pricing-features">
                                <li><i class="ti ti-circle-check-filled"></i> Diskon 10% dari harga eceran</li>
                                <li><i class="ti ti-circle-check-filled"></i> Prioritas alokasi stok FEFO</li>
                                <li><i class="ti ti-circle-check-filled"></i> Saldo Deposit & Wallet Top-up</li>
                                <li><i class="ti ti-circle-check-filled"></i> Tempo Pembayaran 7 Hari</li>
                                <li><i class="ti ti-circle-check-filled"></i> Support CS Prioritas</li>
                            </ul>
                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline w-100">Daftar Silver</a>
                    </div>

                    <!-- Gold Tier Card (Highlighted Most Popular) -->
                    <div class="pricing-card popular">
                        <span class="badge-popular"><i class="ti ti-star-filled"></i> Paling Populer</span>
                        <div>
                            <div class="pricing-header" style="margin-top: 8px;">
                                <h3>Gold</h3>
                                <span class="badge badge-solid">Tier 3</span>
                            </div>
                            <div class="pricing-discount-wrapper">
                                <div class="pricing-discount">15%</div>
                                <div class="pricing-min-order">Min. Order: Rp 15.000.000 / bln</div>
                            </div>
                            <div class="pricing-margin-badge" style="background: var(--color-ink); color: #ffffff;">Est. Margin: 25% - 30%</div>
                            <ul class="pricing-features">
                                <li><i class="ti ti-circle-check-filled"></i> Diskon langsung 15% grosir</li>
                                <li><i class="ti ti-circle-check-filled"></i> Prioritas kirim & free ambil mandiri</li>
                                <li><i class="ti ti-circle-check-filled"></i> Tempo Pembayaran 14 Hari</li>
                                <li><i class="ti ti-circle-check-filled"></i> Pre-Order & stok eksklusif</li>
                                <li><i class="ti ti-circle-check-filled"></i> Dedicated Account Manager</li>
                            </ul>
                        </div>
                        <a href="{{ route('login') }}" class="btn btn-primary w-100">Gabung Gold Reseller</a>
                    </div>

                    <!-- Platinum Tier Card -->
                    <div class="pricing-card">
                        <div>
                            <div class="pricing-header">
                                <h3>Platinum</h3>
                                <span class="badge badge-soft">Tier Utama</span>
                            </div>
                            <div class="pricing-discount-wrapper">
                                <div class="pricing-discount">22%</div>
                                <div class="pricing-min-order">Min. Order: Rp 50.000.000 / bln</div>
                            </div>
                            <div class="pricing-margin-badge">Est. Margin: 35% + Rebate</div>
                            <ul class="pricing-features">
                                <li><i class="ti ti-circle-check-filled"></i> Diskon tertinggi hingga 22%</li>
                                <li><i class="ti ti-circle-check-filled"></i> Custom pricing & kuota gudang</li>
                                <li><i class="ti ti-circle-check-filled"></i> API Integration Direct Warehouse</li>
                                <li><i class="ti ti-circle-check-filled"></i> Tempo 30 Hari + Cash Rebate</li>
                                <li><i class="ti ti-circle-check-filled"></i> Prioritas Rute Gudang Internal</li>
                            </ul>
                        </div>
                        <a href="{{ route('login') }}" class="btn btn-outline w-100">Hubungi Platinum</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bento Grid Features Section -->
        <section id="features">
            <div class="container">
                <div class="section-header">
                    <h2>Fitur Infrastruktur Utama</h2>
                    <p>Komponen lengkap yang menyederhanakan operasional grosir yang kompleks.</p>
                </div>

                <div class="bento-grid">
                    <!-- Feature 1 (Span 8) -->
                    <div class="card bento-card bento-col-8">
                        <div>
                            <span class="badge badge-soft" style="margin-bottom: 12px;">Warehouse Core</span>
                            <h3>Multi-Warehouse & FEFO Expiration Control</h3>
                            <p>Pantau lokasi stok di banyak gudang secara realtime dengan jaminan urutan pengeluaran barang berbasis tanggal kadaluarsa terdekat (First Expired, First Out).</p>
                        </div>
                        <div class="bento-inner-box">
                            <div style="display: flex; justify-content: space-between; font-size: 12px; font-weight: 500;">
                                <span>Batch Safety Stock</span>
                                <span>100% FEFO Verified</span>
                            </div>
                        </div>
                    </div>

                    <!-- Feature 2 (Span 4) -->
                    <div class="card bento-card bento-col-4">
                        <div>
                            <span class="badge badge-soft" style="margin-bottom: 12px;">App Self-Order</span>
                            <h3>Draft Order Mandiri Reseller</h3>
                            <p>Reseller dapat membuat draft pesanan mandiri dari mana saja, menghilangkan antrean fisik di toko atau gudang.</p>
                        </div>
                        <div class="bento-inner-box" style="font-size: 12px; font-weight: 500;">
                            ⚡ Instant Draft Queue Enabled
                        </div>
                    </div>

                    <!-- Feature 3 (Span 6) -->
                    <div class="card bento-card bento-col-6">
                        <div>
                            <span class="badge badge-soft" style="margin-bottom: 12px;">Checkout POS</span>
                            <h3>POS Kasir 1-Klik & Deposit Wallet</h3>
                            <p>Kasir memanggil draft order reseller dan memproses pembayaran menggunakan saldo deposit wallet atau tunai secara instan.</p>
                        </div>
                        <div class="bento-inner-box" style="font-size: 12px; font-weight: 500;">
                            Avg Checkout Time: 12 Seconds
                        </div>
                    </div>

                    <!-- Feature 4 (Span 6) -->
                    <div class="card bento-card bento-col-6">
                        <div>
                            <span class="badge badge-soft" style="margin-bottom: 12px;">Analytics</span>
                            <h3>Laporan Laba/Rugi & Ekspor Data</h3>
                            <p>Pantau margin bersih harian, tren produk grosir terlaris, serta cetak dokumen PDF & Excel secara otomatis.</p>
                        </div>
                        <div class="bento-inner-box" style="font-size: 12px; font-weight: 500;">
                            Auto Export: PDF & XLSX Supported
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Order Workflow Section -->
        <section id="workflow" class="workflow-section">
            <div class="container">
                <div class="section-header">
                    <h2>Alur Kerja Sistem</h2>
                    <p>Integrasi langsung dari pembuatan pesanan reseller hingga penyelesaian nota di kasir.</p>
                </div>

                <div class="workflow-grid">
                    <div>
                        <div class="workflow-step-card active" data-step="step1">
                            <h4>1. Self-Order App (Reseller)</h4>
                            <p>Reseller membuat draft pesanan mandiri via aplikasi mobile/web.</p>
                        </div>
                        <div class="workflow-step-card" data-step="step2">
                            <h4>2. Verifikasi Gudang FEFO</h4>
                            <p>Petugas gudang menyiapkan batch barang berdasarkan urutan FEFO.</p>
                        </div>
                        <div class="workflow-step-card" data-step="step3">
                            <h4>3. Instant POS Checkout</h4>
                            <p>Kasir memanggil draft order & menyelesaikan pembayaran 1-klik.</p>
                        </div>
                    </div>

                    <div class="card" id="workflow-visual-content" style="min-height: 280px; transition: opacity 0.15s ease;">
                        <span class="badge badge-soft" style="margin-bottom: 12px;">Order Input</span>
                        <h3 style="font-size: 18px; margin-bottom: 8px;">1. Self-Order App (Reseller)</h3>
                        <p style="font-size: 14px; margin-bottom: 20px;">Reseller membuat draft pesanan mandiri melalui aplikasi web/mobile. Diskon otomatis diterapkan sesuai tingkat Tiering.</p>
                        
                        <div class="card" style="padding: 16px; box-shadow: none;">
                            <div style="display: flex; justify-content: space-between; font-weight: 500; margin-bottom: 8px;">
                                <span>Draft #DRF-8921</span>
                                <span class="badge badge-solid">Tier Gold (-15%)</span>
                            </div>
                            <div style="font-size: 13px; color: var(--color-mid-gray);">Minyak Goreng Kita 2L (12 Ctn)</div>
                            <div style="margin-top: 12px; font-weight: 600;">Subtotal: Rp 1.450.000</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final CTA Section -->
        <section class="cta-section">
            <div class="container">
                <div class="cta-box">
                    <h2>Siap Mentransformasi Operasional Grosir Anda?</h2>
                    <p>Bergabunglah dengan ratusan pemilik grosir dan distributor yang telah meningkatkan efisiensi hari ini.</p>
                    <div class="cta-actions">
                        @guest
                            <a href="{{ route('login') }}" class="btn btn-cta-primary">Daftar Reseller</a>
                            <a href="{{ route('login') }}" class="btn btn-cta-outline">Masuk Akun</a>
                        @endguest
                        @auth
                            <a href="{{ route('dashboard') }}" class="btn btn-cta-primary">Buka Dashboard Admin</a>
                        @endauth
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div>
                    <h5 class="footer-brand-title">{{ config('app.name', 'ModernGrosir') }}</h5>
                    <p style="font-size: 13px;">Infrastruktur B2B Commerce all-in-one untuk manajemen grosir, tiering reseller, dan gudang multi-lokasi.</p>
                </div>
                <div class="footer-col">
                    <h5>Produk</h5>
                    <ul>
                        <li><a href="#tiering">Tiering Reseller</a></li>
                        <li><a href="#features">FEFO Inventory</a></li>
                        <li><a href="#features">Self-Order App</a></li>
                        <li><a href="#features">POS Kasir</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h5>Solusi</h5>
                    <ul>
                        <li><a href="#">Untuk Distributor</a></li>
                        <li><a href="#">Untuk Pemilik Grosir</a></li>
                        <li><a href="#">Untuk Reseller</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="{{ route('privacy') }}">Kebijakan Privasi</a></li>
                        <li><a href="{{ route('terms') }}">Syarat & Ketentuan</a></li>
                        <li><a href="{{ route('contact') }}">Hubungi Kami</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'ModernGrosir') }}. All rights reserved.</p>
                <div class="footer-links-group">
                    <a href="{{ route('privacy') }}">Privacy</a>
                    <a href="{{ route('terms') }}">Terms</a>
                    <a href="{{ route('contact') }}">Contact</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS -->
    <script src="{{ asset('js/landing.js') }}"></script>
</body>
</html>
