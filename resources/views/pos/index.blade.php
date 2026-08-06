@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - POS Kasir Retail')

@section('pageContent')
<div id="pos-wrapper" class="w-100 h-100 bg-body" style="overflow-y: auto;">
    <div class="row g-3">
        <!-- LEFT PANEL: Filter Toolbar & Product Grid (65% / Col-lg-8) -->
        <div class="col-lg-8">
            <!-- Filter & Header Card -->
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-3 bg-white">
                <div class="card-body p-3 p-md-4">
                    <!-- Top Bar: Title & Warehouse / Fullscreen Actions -->
                    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2 pb-3 border-bottom">
                        <div>
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 rounded-pill fs-2 fw-semibold">
                                    <i class="ti ti-cashier me-1"></i> POS Kasir Retail
                                </span>
                                <span class="text-muted fs-2">&bull; Transaksi Langsung</span>
                            </div>
                            <h4 class="fw-bold mb-0 text-dark">Point of Sales</h4>
                        </div>
                        
                        <!-- Actions: Gudang Select & Fullscreen -->
                        <div class="d-flex align-items-center gap-2">
                            <div class="d-flex align-items-center gap-2 bg-light px-3 py-1.5 rounded-3 border">
                                <i class="ti ti-building-warehouse text-primary fs-4"></i>
                                <span class="fs-2 fw-semibold text-muted d-none d-sm-inline">Gudang:</span>
                                <select id="warehouse-select" class="form-select form-select-sm bg-transparent border-0 fw-bold text-dark select2" style="min-width: 140px;">
                                    @foreach($warehouses as $warehouse)
                                        <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-white bg-white border shadow-sm text-dark rounded-3 px-3 py-2 d-flex align-items-center gap-1.5" id="btn-fullscreen" title="Layar Penuh (Fullscreen)">
                                <i class="ti ti-maximize fs-4 text-primary"></i>
                                <span class="fs-2 fw-semibold d-none d-md-inline">Fullpage</span>
                            </button>
                        </div>
                    </div>
    
                    <!-- Search & Category Filters -->
                    <div class="row g-2">
                        <div class="col-md-7">
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0 text-muted ps-3"><i class="ti ti-search fs-4"></i></span>
                                <input type="text" id="search-input" class="form-control bg-light border-start-0 py-2 fs-3" placeholder="Scan barcode atau cari produk / SKU...">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <select id="category-filter" class="form-select bg-light border py-2 select2">
                                <option value="all">Semua Kategori</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Product Grid Container -->
            <div id="product-grid-container" style="max-height: 72vh; overflow-y: auto;" class="pe-1">
                <div class="row g-3" id="product-grid">
                    <!-- Products injected by JS -->
                </div>
            </div>
        </div>
    
        <!-- RIGHT PANEL: Cart & Transaction (35% / Col-lg-4) -->
        <div class="col-lg-4 pos-cart-column">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden h-100 d-flex flex-column bg-white">
                <!-- Cart Header -->
                <div class="card-header bg-primary text-white p-3.5 border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-white mb-0 fw-bold d-flex align-items-center gap-2 fs-4">
                            <i class="ti ti-shopping-cart fs-5"></i> Keranjang Transaksi
                        </h5>
                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-sm btn-light text-primary rounded-circle d-lg-none" id="pos-cart-close">
                                <i class="ti ti-x"></i>
                            </button>
                            <button class="btn btn-sm btn-light text-primary rounded-3 px-2.5 fw-semibold" id="btn-load-drafts" style="display: none;">
                                <i class="ti ti-download me-1"></i> Drafts
                            </button>
                            <span class="badge bg-white text-primary rounded-pill px-2.5 py-1 fs-2 fw-bold" id="cart-count">0 items</span>
                        </div>
                    </div>
                </div>
                
                <!-- Customer Selection -->
                <div class="p-3 border-bottom bg-light">
                    <label class="form-label fs-2 fw-semibold text-muted mb-1 d-flex align-items-center gap-1">
                        <i class="ti ti-user text-primary"></i> Pelanggan / Reseller (Opsional)
                    </label>
                    <select id="customer-select" class="form-select fs-2 text-dark select2">
                        <option value="">Guest / Eceran (Harga Normal)</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" 
                                data-tier="{{ $customer->reseller->tier->name }}" 
                                data-discount="{{ $customer->reseller->tier->discount_percentage }}">
                                {{ $customer->name }} ({{ $customer->reseller->tier->name }} - {{ $customer->reseller->tier->discount_percentage }}%)
                            </option>
                        @endforeach
                    </select>
                </div>
    
                <!-- Cart Items List Container -->
                <div class="card-body p-0 overflow-auto" id="cart-items-wrapper" style="max-height: 440px; min-height: 240px;">
                    <div id="cart-items" class="p-3">
                        <!-- Cart items injected here -->
                        <div class="text-center text-muted py-5">
                            <i class="ti ti-shopping-cart-off fs-9 mb-2 d-block text-secondary opacity-50"></i>
                            <span class="fs-3 fw-medium">Keranjang masih kosong</span>
                        </div>
                    </div>
                </div>
    
                <!-- Cart Footer & Checkout -->
                <div class="card-footer bg-white border-top p-4 mt-auto">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted fs-2">Subtotal</span>
                        <span class="fs-3 fw-semibold text-dark" id="subtotal-display">Rp 0</span>
                    </div>
                    <!-- Reseller Discount Display -->
                    <div class="d-flex justify-content-between align-items-center mb-2 d-none" id="discount-row">
                        <span class="text-success fs-2 fw-medium">Diskon Tier Reseller</span>
                        <span class="fs-3 fw-semibold text-success" id="discount-display">- Rp 0</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-3 pt-2 border-top">
                        <span class="fs-4 fw-bold text-dark">TOTAL NETT</span>
                        <span class="fs-6 fw-bolder text-primary" id="total-display">Rp 0</span>
                    </div>

                    <div class="mb-3" id="payment-method-row">
                        <label class="form-label fs-2 fw-semibold text-muted mb-1 d-flex align-items-center gap-1">
                            <i class="ti ti-credit-card text-primary"></i> Metode Pembayaran
                        </label>
                        <select id="payment-method-select" class="form-select fs-2 select2">
                            <option value="cash">💵 Tunai / Transfer Manual</option>
                            <option value="wallet">💳 Saldo Wallet Reseller</option>
                        </select>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button id="btn-checkout" class="btn btn-primary py-2.5 rounded-3 fw-bold shadow-sm fs-3" disabled>
                            <i class="ti ti-cash me-1 fs-5"></i> Proses Pembayaran
                        </button>
                        <button id="btn-clear" class="btn btn-outline-danger btn-sm rounded-3">
                            Kosongkan Keranjang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pos-cart-overlay" id="pos-cart-overlay"></div>
<button type="button" class="btn btn-primary pos-cart-fab" id="pos-cart-toggle">
    <i class="ti ti-shopping-cart"></i>
    <span id="pos-cart-fab-count">0</span>
</button>

<!-- Draft Orders Modal -->
<div class="modal fade" id="draftOrdersModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-header border-bottom p-4 bg-primary text-white">
                <h5 class="modal-title fw-bold text-white d-flex align-items-center gap-2">
                    <i class="ti ti-download fs-5"></i> Muat Pesanan Pending / Draft
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr class="text-uppercase fs-2 text-muted tracking-wider border-bottom">
                                <th>
                                    <input type="checkbox" class="form-check-input" id="check-all-drafts">
                                </th>
                                <th>ID Order</th>
                                <th>Gudang</th>
                                <th>Item</th>
                                <th>Total</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody id="draft-list-container">
                            <!-- Drafts loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer border-top p-3.5 bg-light">
                <button type="button" class="btn btn-outline-secondary rounded-3 px-4" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary rounded-3 px-4 shadow-sm" id="btn-process-drafts">Muat Yang Dipilih</button>
            </div>
        </div>
    </div>
</div>

<!-- Invoice Modal -->
<div class="modal fade" id="invoiceModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
            <div class="modal-body p-0" id="invoice-modal-content">
                <!-- Ajax content loads here -->
            </div>
            <div class="modal-footer d-none">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    window.csrfToken = '{{ csrf_token() }}';
    window.posRoutes = {
        products: '{{ route("pos.products") }}',
        checkout: '{{ route("pos.checkout") }}',
        drafts: '{{ route("admin.draft-orders.index") }}'
    };
</script>
<script src="{{ asset('js/pos.js') }}"></script>
@endsection
