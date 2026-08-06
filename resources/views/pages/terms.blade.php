<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syarat & Ketentuan — {{ config('app.name', 'ModernGrosir') }}</title>
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
    <header id="header" class="scrolled">
        <div class="container">
            <div class="nav-wrapper">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/logos/logo-dark.svg') }}" alt="{{ config('app.name', 'ModernGrosir') }}" height="32">
                    </a>
                </div>

                <div class="nav-links">
                    <a href="{{ url('/') }}">Beranda</a>
                    <a href="{{ url('/#tiering') }}">Tiering</a>
                    <a href="{{ url('/#features') }}">Fitur Utama</a>
                    <a href="{{ route('contact') }}">Kontak</a>
                </div>

                <div class="nav-actions">
                    @guest
                        <a href="{{ route('login') }}" class="btn btn-primary">Masuk Akun</a>
                    @endguest
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Dashboard</a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    <main>
        <!-- Page Title Header -->
        <section class="doc-page-header">
            <div class="container">
                <div class="doc-breadcrumb">
                    <a href="{{ url('/') }}">Beranda</a>
                    <span>/</span>
                    <span>Legal</span>
                </div>
                <h1 class="doc-title">Syarat & Ketentuan Layanan</h1>
                <p class="doc-subtitle">Ketentuan resmi penggunaan platform B2B {{ config('app.name', 'ModernGrosir') }}, mekanisme Tiering Reseller, dan aturan alokasi stok gudang FEFO.</p>
            </div>
        </section>

        <!-- Main Documentation Layout -->
        <section class="doc-body-section">
            <div class="container">
                <div class="doc-layout">
                    
                    <!-- Left: Sticky Table of Contents -->
                    <aside class="doc-sidebar">
                        <h4>Daftar Isi Ketentuan</h4>
                        <ul class="doc-nav">
                            <li><a href="#ketentuan-umum" class="active"><i class="ti ti-file-text"></i> 1. Ketentuan Umum</a></li>
                            <li><a href="#akun-tiering"><i class="ti ti-chart-arrows"></i> 2. Akun & Tiering</a></li>
                            <li><a href="#pemesanan-deposit"><i class="ti ti-shopping-cart-check"></i> 3. Order & Deposit</a></li>
                            <li><a href="#gudang-fefo"><i class="ti ti-box-seam"></i> 4. Gudang FEFO</a></li>
                            <li><a href="#pembatasan-tanggung-jawab"><i class="ti ti-alert-triangle"></i> 5. Tanggung Jawab</a></li>
                            <li><a href="#pembaruan-syarat"><i class="ti ti-refresh"></i> 6. Pembaruan Syarat</a></li>
                        </ul>
                    </aside>

                    <!-- Right: Detailed Documentation Article -->
                    <article class="doc-article">
                        
                        <div id="ketentuan-umum" class="doc-section">
                            <h2><i class="ti ti-file-text text-muted"></i> 1. Ketentuan Umum</h2>
                            <p>Selamat datang di platform {{ config('app.name', 'ModernGrosir') }}. Dengan mendaftar, mengakses, atau menggunakan platform ini (baik sebagai Admin, Kasir, maupun Reseller), Anda dianggap telah membaca, memahami, dan menyetujui seluruh Syarat & Ketentuan yang berlaku dalam dokumen ini.</p>
                        </div>

                        <div id="akun-tiering" class="doc-section">
                            <h2><i class="ti ti-chart-arrows text-muted"></i> 2. Akun & Kategori Tiering Reseller</h2>
                            <p>Sistem penetapan harga grosir berjenjang diatur oleh ketentuan berikut:</p>
                            <ul>
                                <li>Setiap akun reseller berkewajiban memberikan informasi pendaftaran yang akurat dan sah.</li>
                                <li>Kenaikan atau penurunan tingkat <strong>Tiering (Bronze, Silver, Gold, Platinum)</strong> dihitung secara otomatis oleh sistem berdasarkan akumulasi total pembelian bersih dalam kurun waktu 30 hari berjalan.</li>
                                <li>Diskon potongan harga (<span class="code-badge">5% hingga 22%</span>) berlaku secara langsung pada saat checkout transaksi sesuai persentase aktif dari Tier akun Anda.</li>
                            </ul>

                            <div class="callout-box">
                                <div class="callout-title"><i class="ti ti-star"></i> Kebijakan Penilaian Tiering Otomatis</div>
                                <p>Evaluasi Tier dilakukan secara akumulatif setiap bulan. Akun baru mendaftar via Google Sign-In langsung mendapatkan status <strong>Bronze Reseller (Tier 1)</strong> secara instant.</p>
                            </div>
                        </div>

                        <div id="pemesanan-deposit" class="doc-section">
                            <h2><i class="ti ti-shopping-cart-check text-muted"></i> 3. Pemesanan (Self-Order) & Pembayaran Deposit</h2>
                            <ul>
                                <li>Pesanan mandiri (<span class="code-badge">Draft Order</span>) buatan Reseller berlaku selama 24 jam sebelum diproses atau dikonfirmasi oleh petugas kasir/gudang.</li>
                                <li>Top-up saldo wallet deposit wajib menggunakan saluran pembayaran resmi yang disetujui oleh sistem dan membutuhkan verifikasi persetujuan Admin.</li>
                                <li>Bagi akun terverifikasi yang mendapatkan opsi Pembayaran Tempo (<span class="code-badge">Credit Limit</span>), pembayaran wajib dilunasi sesuai batas waktu tempo (7, 14, atau 30 hari).</li>
                            </ul>
                        </div>

                        <div id="gudang-fefo" class="doc-section">
                            <h2><i class="ti ti-box-seam text-muted"></i> 4. Manajemen Stok FEFO & Pengambilan Barang</h2>
                            <ul>
                                <li>Seluruh alokasi barang diproses menggunakan prinsip <strong>FEFO (First Expired, First Out)</strong> untuk menjamin ketersediaan barang dengan tanggal kadaluarsa terdekat diprioritaskan terlebih dahulu.</li>
                                <li>Pengambilan mandiri di gudang harus menunjukkan nomor nota resmi atau kode QR pesanan valid dari aplikasi.</li>
                            </ul>

                            <div class="callout-box">
                                <div class="callout-title"><i class="ti ti-shield-check"></i> Jaminan Kualitas Kadaluarsa FEFO</div>
                                <p>Sistem mengunci urutan batch secara otomatis. Barang yang disiapkan oleh petugas gudang dipastikan memenuhi standar tanggal kadaluarsa aman untuk didistribusikan.</p>
                            </div>
                        </div>

                        <div id="pembatasan-tanggung-jawab" class="doc-section">
                            <h2><i class="ti ti-alert-triangle text-muted"></i> 5. Pembatasan Tanggung Jawab</h2>
                            <p>{{ config('app.name', 'ModernGrosir') }} tidak bertanggung jawab atas kerugian tidak langsung yang disebabkan oleh kelalaian kerahasiaan kata sandi pengguna atau keterlambatan pembayaran tempo dari mitra reseller.</p>
                        </div>

                        <div id="pembaruan-syarat" class="doc-section">
                            <h2><i class="ti ti-refresh text-muted"></i> 6. Pembaruan Syarat & Ketentuan</h2>
                            <p>{{ config('app.name', 'ModernGrosir') }} berhak mengubah Syarat & Ketentuan ini sewaktu-waktu. Perubahan akan berlaku secara efektif sejak diunggah ke platform.</p>
                            <p>Jika ada pertanyaan lebih lanjut, silakan <a href="{{ route('contact') }}" class="doc-link-underlined">Hubungi Layanan CS Kami</a>.</p>
                        </div>

                    </article>

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
                    <p class="footer-brand-desc">Infrastruktur B2B Commerce all-in-one untuk manajemen grosir, tiering reseller, dan gudang multi-lokasi.</p>
                </div>
                <div class="footer-col">
                    <h5>Produk</h5>
                    <ul>
                        <li><a href="{{ url('/#tiering') }}">Tiering Reseller</a></li>
                        <li><a href="{{ url('/#features') }}">FEFO Inventory</a></li>
                        <li><a href="{{ url('/#features') }}">Self-Order App</a></li>
                        <li><a href="{{ url('/#features') }}">POS Kasir</a></li>
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

    <script>
        // Smooth Active Link Highlighting for Table of Contents
        const navLinks = document.querySelectorAll('.doc-nav a');
        const sections = document.querySelectorAll('.doc-section');

        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 120;
                if (window.scrollY >= sectionTop) {
                    current = section.getAttribute('id');
                }
            });

            navLinks.forEach(link => {
                link.classList.remove('active');
                if (link.getAttribute('href') === '#' + current) {
                    link.classList.add('active');
                }
            });
        }, { passive: true });
    </script>
</body>
</html>
