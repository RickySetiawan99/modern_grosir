<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami — {{ config('app.name', 'ModernGrosir') }}</title>
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
                    <span>Dukungan</span>
                </div>
                <h1 class="doc-title">Hubungi Tim {{ config('app.name', 'ModernGrosir') }}</h1>
                <p class="doc-subtitle">Konsultasi pendaftaran reseller, kemitraan gudang grosir, atau kendala operasional transaksi.</p>
            </div>
        </section>

        <!-- Main Content Layout -->
        <section class="doc-body-section">
            <div class="container">
                <div class="contact-grid">
                    
                    <!-- Left: Interactive Contact Form -->
                    <div class="contact-card">
                        <h3 class="contact-card-title">Kirim Pesan Direct Support</h3>
                        <p class="contact-card-subtitle">Pilih topik pertanyaan Anda untuk bantuan yang lebih cepat dan terarah:</p>

                        <!-- Category Selector Pills -->
                        <div class="category-pills" id="category-pills">
                            <span class="category-pill active" data-subject="Pendaftaran & Tiering Reseller">Kemitraan Reseller</span>
                            <span class="category-pill" data-subject="Kendala Top-up Deposit Wallet">Top-up & Wallet</span>
                            <span class="category-pill" data-subject="Integrasi API Gudang FEFO">Stok & Gudang FEFO</span>
                            <span class="category-pill" data-subject="Pertanyaan Umum / Lainnya">Lainnya</span>
                        </div>

                        @if(session('success'))
                            <div class="alert-success">
                                <i class="ti ti-circle-check-filled fs-5"></i>
                                <span>{{ session('success') }}</span>
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="contact-form-grid-2">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap *</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Contoh: Budi Santoso" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Utama *</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="budi@usaha.com" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="subject">Subjek / Perihal *</label>
                                <input type="text" id="subject" name="subject" class="form-control" value="Pendaftaran & Tiering Reseller" required>
                            </div>

                            <div class="form-group">
                                <label for="message">Pesan / Detail Pertanyaan *</label>
                                <textarea id="message" name="message" class="form-control" placeholder="Jelaskan detail lokasi toko/gudang Anda atau kebutuhan volume pesanan grosir..." required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary contact-submit-btn">
                                <i class="ti ti-send me-1"></i> Kirim Pesan Sekarang
                            </button>
                        </form>
                    </div>

                    <!-- Right: Info Bento Cards -->
                    <div>
                        <div class="info-card">
                            <h4 class="info-card-title">Layanan CS & Logistik Pusat</h4>
                            
                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="ti ti-map-pin"></i>
                                </div>
                                <div>
                                    <h5 class="info-text-h5">Gudang Utama & HQ</h5>
                                    <p class="info-text-p">Kawasan Logistik Grosir Nusantara, Blok B4 No. 12-15, Jakarta Barat, DKI Jakarta 11840</p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="ti ti-mail"></i>
                                </div>
                                <div>
                                    <h5 class="info-text-h5">Email Support Official</h5>
                                    <p class="info-text-p">support@moderngrosir.com / sales@moderngrosir.com</p>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon">
                                    <i class="ti ti-brand-whatsapp"></i>
                                </div>
                                <div>
                                    <h5 class="info-text-h5">WhatsApp CS & Order Hotline</h5>
                                    <p class="info-text-p">+62 812-8899-0011 (Respon cepat 08:00 - 17:00 WIB)</p>
                                </div>
                            </div>
                        </div>

                        <div class="info-card info-card-alt">
                            <div class="info-card-header">
                                <h4 class="info-card-title">Jam Operasional Gudang</h4>
                                <span class="badge badge-soft">FEFO Verified</span>
                            </div>
                            <p class="info-card-subtitle">Pengambilan Mandiri (Self Pickup) dan Pengiriman Rute Armada Gudang:</p>
                            <ul class="info-list">
                                <li>Senin — Jumat: 08:00 — 17:00 WIB</li>
                                <li>Sabtu: 08:00 — 14:00 WIB</li>
                                <li>Minggu & Libur Nasional: Off Pengiriman</li>
                            </ul>
                        </div>
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
        // Category Pills interactive subject sync
        const pills = document.querySelectorAll('.category-pill');
        const subjectInput = document.getElementById('subject');

        pills.forEach(pill => {
            pill.addEventListener('click', () => {
                pills.forEach(p => p.classList.remove('active'));
                pill.classList.add('active');
                if (subjectInput && pill.dataset.subject) {
                    subjectInput.value = pill.dataset.subject;
                }
            });
        });
    </script>
</body>
</html>
