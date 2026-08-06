/**
 * ModernGrosir Landing Page Interactive Components
 * Achromatic Clinical Blueprint Theme (shadcn/ui style)
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Sticky Header
    const header = document.getElementById('header');
    if (header) {
        const handleScroll = () => {
            if (window.scrollY > 20) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        };
        window.addEventListener('scroll', handleScroll, { passive: true });
        handleScroll();
    }

    // 2. Reseller Tiering Data & Switcher
    const tierData = {
        bronze: {
            name: 'Bronze Reseller',
            badge: 'Tier 1',
            discount: '5%',
            minOrder: 'Rp 1.000.000',
            estMargin: '12% - 15%',
            benefits: [
                'Potongan harga otomatis 5% dari harga eceran',
                'Akses Katalog Produk Grosir & Self-Order App',
                'Minimal transaksi terjangkau Rp 1.000.000/bulan',
                'Dukungan Layanan Pelanggan standar'
            ]
        },
        silver: {
            name: 'Silver Reseller',
            badge: 'Tier 2',
            discount: '10%',
            minOrder: 'Rp 5.000.000',
            estMargin: '18% - 22%',
            benefits: [
                'Potongan harga otomatis 10% dari harga eceran',
                'Prioritas Alokasi Stok Gudang Utama & FEFO Guarantee',
                'Fasilitas Top-up Wallet & Saldo Deposit',
                'Tempo Pembayaran 7 Hari (untuk akun terverifikasi)',
                'Dukungan Layanan Pelanggan prioritas'
            ]
        },
        gold: {
            name: 'Gold Reseller',
            badge: 'Tier 3',
            discount: '15%',
            minOrder: 'Rp 15.000.000',
            estMargin: '25% - 30%',
            benefits: [
                'Diskon langsung 15% untuk seluruh pesanan grosir',
                'Prioritas Pengiriman Gudang & Bebas Biaya Ambil Mandiri',
                'Tempo Pembayaran hingga 14 Hari',
                'Akses Notifikasi Stok & Pre-Order Eksklusif',
                'Dedicated Account Manager'
            ]
        },
        platinum: {
            name: 'Platinum Distributor',
            badge: 'Tier Utama',
            discount: '22%',
            minOrder: 'Rp 50.000.000',
            estMargin: '35% + Rebate',
            benefits: [
                'Potongan harga tertinggi hingga 22%',
                'Custom Pricing & Alokasi Kuota Gudang Khusus',
                'Integrasi API Pesanan Direct Warehouse',
                'Tempo Pembayaran 30 Hari + Cash Rebate Bulanan',
                'Layanan Pengiriman Prioritas Rute Gudang Internal'
            ]
        }
    };

    const tierTabs = document.querySelectorAll('.tier-btn');
    const tierNameEl = document.getElementById('tier-name');
    const tierBadgeEl = document.getElementById('tier-badge');
    const tierDiscountEl = document.getElementById('tier-discount');
    const tierMinOrderEl = document.getElementById('tier-min-order');
    const tierMarginEl = document.getElementById('tier-margin');
    const tierListEl = document.getElementById('tier-benefits-list');

    if (tierTabs.length > 0 && tierNameEl) {
        const updateTierView = (tierKey) => {
            const data = tierData[tierKey];
            if (!data) return;

            tierTabs.forEach(btn => {
                btn.classList.toggle('active', btn.dataset.tier === tierKey);
            });

            const card = document.querySelector('.tier-grid-card');
            if (card) {
                card.style.opacity = '0.75';
            }

            setTimeout(() => {
                tierNameEl.textContent = data.name;
                tierBadgeEl.textContent = data.badge;
                tierDiscountEl.textContent = data.discount;
                tierMinOrderEl.textContent = data.minOrder;
                tierMarginEl.textContent = data.estMargin;

                if (tierListEl) {
                    tierListEl.innerHTML = data.benefits.map(b => `
                        <li>
                            <span class="dot-mark"></span>
                            <span>${b}</span>
                        </li>
                    `).join('');
                }

                if (card) {
                    card.style.opacity = '1';
                }
            }, 100);
        };

        tierTabs.forEach(btn => {
            btn.addEventListener('click', () => {
                updateTierView(btn.dataset.tier);
            });
        });
    }

    // 3. Workflow Steps
    const workflowSteps = document.querySelectorAll('.workflow-step-card');
    const workflowVisual = document.getElementById('workflow-visual-content');

    const workflowContent = {
        step1: {
            title: '1. Self-Order App (Reseller)',
            desc: 'Reseller membuat draft pesanan mandiri melalui aplikasi web/mobile. Diskon otomatis diterapkan sesuai tingkat Tiering.',
            tag: 'Order Input',
            previewHtml: `
                <div class="card" style="padding: 16px; box-shadow: none;">
                    <div style="display: flex; justify-content: space-between; font-weight: 500; margin-bottom: 8px;">
                        <span>Draft #DRF-8921</span>
                        <span class="badge badge-solid">Tier Gold (-15%)</span>
                    </div>
                    <div style="font-size: 13px; color: var(--color-mid-gray);">Minyak Goreng Kita 2L (12 Ctn)</div>
                    <div style="margin-top: 12px; font-weight: 600;">Subtotal: Rp 1.450.000</div>
                </div>
            `
        },
        step2: {
            title: '2. Verifikasi Gudang & FEFO Control',
            desc: 'Sistem gudang memverifikasi stok dan mengalokasikan batch barang sesuai aturan masa exp terdekat (First Expired, First Out).',
            tag: 'Warehouse FEFO',
            previewHtml: `
                <div class="card" style="padding: 16px; box-shadow: none;">
                    <div style="display: flex; justify-content: space-between; font-weight: 500; margin-bottom: 8px;">
                        <span>Batch #BCH-202607</span>
                        <span class="badge badge-soft">EXP Oct 2027</span>
                    </div>
                    <div style="font-size: 13px; color: var(--color-mid-gray);">Gudang Utama A-04 — Verified Ready</div>
                    <div style="margin-top: 12px; font-weight: 600; color: var(--color-ink);">FEFO Compliance: 100%</div>
                </div>
            `
        },
        step3: {
            title: '3. Instant POS Checkout',
            desc: 'Kasir memanggil draft pesanan dengan 1 klik. Saldo deposit reseller terpotong otomatis dan nota transaksi tercetak.',
            tag: 'POS Checkout',
            previewHtml: `
                <div class="card" style="padding: 16px; box-shadow: none;">
                    <div style="display: flex; justify-content: space-between; font-weight: 500; margin-bottom: 8px;">
                        <span>Checkout POS #POS-9910</span>
                        <span class="badge badge-solid">Deposit Paid</span>
                    </div>
                    <div style="font-size: 13px; color: var(--color-mid-gray);">Status: LUNAS — Struk & Surat Jalan Printed</div>
                    <div style="margin-top: 12px; font-weight: 600;">Process Time: 12s</div>
                </div>
            `
        }
    };

    if (workflowSteps.length > 0 && workflowVisual) {
        workflowSteps.forEach(step => {
            step.addEventListener('click', () => {
                const key = step.dataset.step;
                const data = workflowContent[key];
                if (!data) return;

                workflowSteps.forEach(s => s.classList.remove('active'));
                step.classList.add('active');

                workflowVisual.style.opacity = '0';
                setTimeout(() => {
                    workflowVisual.innerHTML = `
                        <div class="badge badge-soft" style="margin-bottom: 12px;">${data.tag}</div>
                        <h3 style="font-size: 18px; margin-bottom: 8px;">${data.title}</h3>
                        <p style="font-size: 14px; margin-bottom: 20px;">${data.desc}</p>
                        ${data.previewHtml}
                    `;
                    workflowVisual.style.opacity = '1';
                }, 100);
            });
        });
    }

    // 4. Smooth Anchor Scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
