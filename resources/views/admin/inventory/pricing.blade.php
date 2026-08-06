@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Tiered Pricing')

@section('pageContent')
    <!-- Header Banner Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <div class="d-flex align-items-center gap-2 mb-1">
                        <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Multi-Tier Pricing System</span>
                        <span class="text-muted fs-2">&bull; Tiering Harga Reseller Automatic</span>
                    </div>
                    <h3 class="fw-bold mb-1 text-dark">Manajemen Harga Tiering</h3>
                    <p class="text-muted mb-0 fs-3">Atur potongan harga bertingkat untuk Silver, Gold, Platinum, dan Kategori Reseller Khusus.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-4">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-3 mb-4">
                <h5 class="fw-bold mb-0 text-dark d-flex align-items-center gap-2">
                    <i class="ti ti-tags fs-5 text-primary"></i> Daftar Harga Produk & Tiering
                </h5>
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle fs-2 px-3 py-2 rounded-pill d-inline-flex align-items-center gap-1.5">
                    <i class="ti ti-star-filled text-warning fs-3"></i> Tanda bintang mengindikasikan override harga manual
                </span>
            </div>

            <div class="table-responsive">
                <table id="main-table" class="table table-hover align-middle text-nowrap mb-0">
                    <thead>
                        <tr class="text-uppercase fs-2 text-muted tracking-wider border-bottom">
                            <th scope="col" class="px-4 py-3" style="width: 60px;">No</th>
                            <th scope="col" class="px-3 py-3">Nama Produk & SKU</th>
                            <th scope="col" class="px-3 py-3">Harga Eceran (Retail)</th>
                            <th scope="col" class="px-3 py-3">Harga Tiering (Kalkulasi / Custom Override)</th>
                            <th scope="col" class="px-4 py-3 text-end">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pricing Modal -->
    <div class="modal fade" id="pricingModal" tabindex="-1" aria-labelledby="pricingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="modal-header border-bottom bg-white p-4 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 bg-primary text-white shadow-sm d-flex align-items-center justify-content-center flex-shrink-0" style="width: 44px; height: 44px;">
                            <i class="ti ti-adjustments-horizontal fs-6 text-white"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold text-dark mb-0 fs-4">Atur Tiering Harga Manual</h5>
                            <p class="text-muted fs-2 mb-0">Override harga khusus per tiering reseller</p>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="pricingForm">
                    <div class="modal-body p-4">
                        <div class="mb-4 text-center p-4 bg-primary-subtle rounded-4 border border-primary-subtle">
                            <small class="text-muted d-block fs-2 text-uppercase tracking-wider fw-medium mb-1">Produk Disesuaikan</small>
                            <h4 id="modal-product-name" class="fw-bold mb-1 text-dark">-</h4>
                            <p class="text-muted mb-0 fs-3">Harga Eceran Default: <span id="modal-retail-price" class="fw-bold text-primary">-</span></p>
                        </div>
                        
                        <div id="tiers-container" class="d-flex flex-column gap-3">
                            <!-- Tiers injected via JS -->
                        </div>
                    </div>
                    <div class="modal-footer border-top p-4 bg-light">
                        <button type="button" class="btn btn-outline-secondary px-3 rounded-2 fw-medium" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary px-3 rounded-2 fw-medium shadow-sm">Simpan Harga Tiering</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        window.csrfToken = '{{ csrf_token() }}';
        window.pricingRoutes = {
            data: '{{ route("pricing.data") }}'
        };
    </script>
    <script src="{{ asset('js/admin/inventory-pricing.js') }}"></script>
@endsection
