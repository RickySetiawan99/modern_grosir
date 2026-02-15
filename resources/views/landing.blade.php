<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModernGrosir - B2B Commerce Ecosystem</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/logos/favicon.svg') }}" />
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@500;700&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
</head>
<body>

    <header id="header">
        <div class="container">
            <div class="nav-wrapper">
                <div class="logo">
                    <img src="{{ asset('images/logos/logo-light.svg') }}" alt="ModernGrosir">
                </div>
                <nav class="nav-links">
                    <a href="#features">Fitur</a>
                    <a href="#tiering">Tier Reseller</a>
                    @guest
                        <a href="{{ route('login') }}" class="btn-login">Masuk</a>
                        <a href="{{ route('login') }}" class="btn-primary-site">Gabung Reseller</a>
                    @endguest
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn-primary-site">Ke Dashboard</a>
                    @endauth
                </nav>
            </div>
        </div>
    </header>

    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <div class="hero-grid">
                    <div class="hero-content">
                        <h1>Ekosistem <span class="gradient-text">Grosir Modern</span> Untuk Bisnis Anda.</h1>
                        <p>Platform B2B all-in-one untuk manajemen stok, tiering harga reseller otomatis, dan sistem order terpadu. Tingkatkan efisiensi distribusi grosir Anda hari ini.</p>
                        <div class="hero-btns">
                            @guest
                                <a href="{{ route('login') }}" class="btn-primary-site">Mulai Sekarang</a>
                            @endguest
                            @auth
                                <a href="{{ route('dashboard') }}" class="btn-primary-site">Buka Dashboard</a>
                            @endauth
                        </div>
                    </div>
                    <div class="hero-visual">
                        <img src="{{ asset('images/landing_hero.png') }}" alt="B2B Ecosystem">
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section id="features" class="features">
            <div class="container">
                <div style="text-align: center; margin-bottom: 60px;">
                    <h2 style="font-size: 2.5rem; margin-bottom: 16px;">Dirancang Untuk <span class="gradient-text">Kecepatan & Skala</span></h2>
                    <p>Fitur cerdas yang menyederhanakan operasional grosir yang kompleks.</p>
                </div>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon"><i class="ti ti-layers-difference"></i></div>
                        <h3>Intelligent Tiering</h3>
                        <p>Sistem harga otomatis berdasarkan level reseller. Memberikan reward bagi reseller setia Anda tanpa ribet manual.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon"><i class="ti ti-building-warehouse"></i></div>
                        <h3>Multi-Warehouse</h3>
                        <p>Kelola banyak gudang dalam satu dashboard. Pantau pergerakan stok real-time antar cabang dengan presisi tinggi.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon"><i class="ti ti-device-mobile-bolt"></i></div>
                        <h3>Self-Order App</h3>
                        <p>Reseller dapat membuat pesanan mandiri melalui aplikasi. Mengurangi antrean di lokasi dan mempercepat proses packing.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta" style="background: linear-gradient(135deg, #111c45 0%, #0b1131 100%); border-top: 1px solid var(--glass-border);">
            <div class="container" style="text-align: center;">
                <h2 style="font-size: 3rem; margin-bottom: 24px;">Siap Jadi Bagian Dari <span class="gradient-text">ModernGrosir?</span></h2>
                <p style="margin-bottom: 40px; font-size: 1.1rem;">Ribuan reseller telah bergabung. Saatnya bisnismu naik kelas.</p>
                <a href="{{ route('login') }}" class="btn-primary-site">Daftar Sekarang</a>
            </div>
        </section>
    </main>

    <footer style="padding: 40px 0; border-top: 1px solid var(--glass-border);">
        <div class="container">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <p>&copy; 2026 ModernGrosir. All rights reserved.</p>
                <div style="display: flex; gap: 24px;">
                    <a href="#" style="color: var(--text-main); text-decoration: none;">Privacy Policy</a>
                    <a href="#" style="color: var(--text-main); text-decoration: none;">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>
