<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebijakan Privasi — {{ config('app.name', 'ModernGrosir') }}</title>
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
                <h1 class="doc-title">Kebijakan Privasi</h1>
                <p class="doc-subtitle">Komitmen keamanan data transaksi grosir, privasi akun reseller, dan perlindungan informasi gudang multi-lokasi.</p>
            </div>
        </section>

        <!-- Main Documentation Layout -->
        <section class="doc-body-section">
            <div class="container">
                <div class="doc-layout">
                    
                    <!-- Left: Sticky Table of Contents -->
                    <aside class="doc-sidebar">
                        <h4>Daftar Isi Dokumentasi</h4>
                        <ul class="doc-nav">
                            <li><a href="#pendahuluan" class="active"><i class="ti ti-info-circle"></i> 1. Pendahuluan</a></li>
                            <li><a href="#data-dikumpulkan"><i class="ti ti-database"></i> 2. Data Dikumpulkan</a></li>
                            <li><a href="#penggunaan-data"><i class="ti ti-settings-automation"></i> 3. Penggunaan Data</a></li>
                            <li><a href="#keamanan-enkripsi"><i class="ti ti-shield-lock"></i> 4. Keamanan & Enkripsi</a></li>
                            <li><a href="#hak-pengguna"><i class="ti ti-user-check"></i> 5. Hak & Kontrol User</a></li>
                            <li><a href="#perubahan-kebijakan"><i class="ti ti-refresh"></i> 6. Pembaruan Dokumen</a></li>
                        </ul>
                    </aside>

                    <!-- Right: Detailed Documentation Article -->
                    <article class="doc-article">
                        
                        <div id="pendahuluan" class="doc-section">
                            <h2><i class="ti ti-info-circle text-muted"></i> 1. Pendahuluan</h2>
                            <p>{{ config('app.name', 'ModernGrosir') }} ("Kami", "Platform") berkomitmen penuh untuk melindungi privasi dan keamanan data pribadi serta data transaksi bisnis dari seluruh pengguna, distributor, kasir, dan reseller mitra kami. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, menyimpan, dan melindungi informasi Anda saat menggunakan ekosistem aplikasi {{ config('app.name', 'ModernGrosir') }}.</p>
                            
                            <div class="callout-box">
                                <div class="callout-title"><i class="ti ti-shield-check"></i> Standar Perlindungan Data B2B Commerce</div>
                                <p>Seluruh data transaksi dan catatan saldo deposit diisolasi menggunakan arsitektur keamanan tingkat lanjut dengan kontrol hak akses ketat berbasis peran pengguna (Role-Based Access Control / RBAC).</p>
                            </div>
                        </div>

                        <div id="data-dikumpulkan" class="doc-section">
                            <h2><i class="ti ti-database text-muted"></i> 2. Informasi yang Kami Kumpulkan</h2>
                            <p>Kami mengumpulkan beberapa jenis informasi untuk mendukung kelancaran operasional transaksi grosir dan manajemen stok:</p>
                            <ul>
                                <li><strong>Informasi Pendaftaran & Akun:</strong> Nama lengkap, alamat email, nomor telepon, nama toko/usaha, serta identitas login sosial (<span class="code-badge">Google OAuth 2.0</span>).</li>
                                <li><strong>Informasi Transaksi & Akuntansi:</strong> Riwayat pembelian grosir, pembuatan draft pesanan (<span class="code-badge">Self-Order</span>), batas tempo kredit (<span class="code-badge">Credit Limit</span>), tingkat potongan harga (<span class="code-badge">Tiering System</span>), serta catatan deposit wallet.</li>
                                <li><strong>Data Gudang & Logistik:</strong> Alamat pengiriman barang, data batch barang kadaluarsa (<span class="code-badge">FEFO Batch Control</span>), serta rute pengambilan barang di lokasi gudang.</li>
                            </ul>
                        </div>

                        <div id="penggunaan-data" class="doc-section">
                            <h2><i class="ti ti-settings-automation text-muted"></i> 3. Penggunaan Informasi</h2>
                            <p>Data yang kami kumpulkan digunakan secara ketat untuk tujuan operasional berikut:</p>
                            <ul>
                                <li>Memproses pesanan grosir dan kalkulasi potongan diskon otomatis sesuai akumulasi Tiering Reseller (Bronze, Silver, Gold, Platinum).</li>
                                <li>Mengatur urutan pengeluaran barang berbasis FEFO (First Expired, First Out) di lokasi gudang multi-lokasi.</li>
                                <li>Memfasilitasi transaksi POS Kasir instant checkout dan pembuatan invoice digital.</li>
                                <li>Memberikan notifikasi pengingat jatuh tempo pembayaran kredit dan informasi stok barang eksklusif.</li>
                            </ul>
                        </div>

                        <div id="keamanan-enkripsi" class="doc-section">
                            <h2><i class="ti ti-shield-lock text-muted"></i> 4. Keamanan Data & Enkripsi</h2>
                            <p>Kami menerapkan standar keamanan terbaik berbasis enkripsi SSL/TLS, otentikasi peran terkontrol (Role-Based Access Control via Spatie Permission), dan pembatasan akses database. Kami tidak akan pernah menjual atau menyewakan informasi pribadi Anda kepada pihak ketiga mana pun.</p>
                            
                            <div class="callout-box">
                                <div class="callout-title"><i class="ti ti-lock-check"></i> Enkripsi Password & Sesi Login</div>
                                <p>Kata sandi akun dienkripsi menggunakan algoritma Hashing Bcrypt tingkat tinggi. Sesi login sosial Google dikelola secara stateless untuk mencegah kebocoran kredensial.</p>
                            </div>
                        </div>

                        <div id="hak-pengguna" class="doc-section">
                            <h2><i class="ti ti-user-check text-muted"></i> 5. Hak & Kontrol Pengguna</h2>
                            <p>Pengguna memiliki hak penuh untuk memperbarui profil akun, mengunduh riwayat nota transaksi, serta memohon penutupan akun reseller kapan saja melalui panel pengaturan akun atau menghubungi tim dukungan resmi kami.</p>
                        </div>

                        <div id="perubahan-kebijakan" class="doc-section">
                            <h2><i class="ti ti-refresh text-muted"></i> 6. Pembaruan Kebijakan Privasi</h2>
                            <p>Kami dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu untuk menyesuaikan perkembangan regulasi atau fitur platform. Perubahan akan diumumkan melalui pembaruan versi dan tanggal di bagian atas dokumen ini.</p>
                            <p>Ada pertanyaan terkait Kebijakan Privasi? Silakan <a href="{{ route('contact') }}" class="doc-link-underlined">Hubungi Tim Support Kami</a>.</p>
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
