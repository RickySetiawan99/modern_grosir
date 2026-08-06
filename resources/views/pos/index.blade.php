@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - POS')

@section('pageContent')

<div id="pos-wrapper" class="w-100 h-100 bg-body" style="overflow-y: auto;">
    <div class="row">
        <!-- LEFT PANEL: Product Grid -->
        <div class="col-lg-8">
            <div class="card bg-light-info shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h4 class="fw-semibold mb-0">Point of Sales</h4>
                        
                        <!-- Warehouse Selector & Fullscreen -->
                        <div class="d-flex align-items-center gap-2">
                            <button class="btn btn-outline-primary btn-sm" id="btn-fullscreen" title="Toggle Fullscreen">
                                <i class="ti ti-maximize"></i>
                            </button>
                            <span class="fs-2 fw-semibold">Warehouse:</span>
                            <select id="warehouse-select" class="form-select form-select-sm" style="min-width: 150px;">
                                @foreach($warehouses as $warehouse)
                                    <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
    
                    <!-- Search & Filters -->
                    <div class="row g-3">
                        <div class="col-md-8">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti ti-search"></i></span>
                                <input type="text" id="search-input" class="form-control" placeholder="Scan barcode or search product...">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <select id="category-filter" class="form-select">
                                <option value="all">All Categories</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
    
            <div id="product-grid-container" style="max-height: 70vh; overflow-y: auto;">
                <div class="row g-3" id="product-grid">
                    <!-- Products injected by JS -->
                </div>
            </div>
        </div>
    
        <!-- RIGHT PANEL: Cart -->
        <div class="col-lg-4 pos-cart-column">
            <div class="card h-100 d-flex flex-column">
                <div class="card-header bg-primary text-white p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="text-white mb-0"><i class="ti ti-shopping-cart me-2"></i>Current Order</h5>
                        <div>
                            <button class="btn btn-sm btn-light text-primary d-lg-none me-2" id="pos-cart-close">
                                <i class="ti ti-x"></i>
                            </button>
                            <button class="btn btn-sm btn-light text-primary me-2" id="btn-load-drafts" style="display: none;">
                                <i class="ti ti-download me-1"></i> Load Drafts
                            </button>
                            <span class="badge bg-white text-primary" id="cart-count">0 items</span>
                        </div>
                    </div>
                </div>
                
                <div class="p-3 border-bottom bg-light">
                    <label class="form-label fs-2 fw-semibold">Customer (Optional)</label>
                    <select id="customer-select" class="form-select text-dark">
                        <option value="">Guest (Retail Price)</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" 
                                data-tier="{{ $customer->reseller->tier->name }}" 
                                data-discount="{{ $customer->reseller->tier->discount_percentage }}">
                                {{ $customer->name }} ({{ $customer->reseller->tier->name }} - {{ $customer->reseller->tier->discount_percentage }}%)
                            </option>
                        @endforeach
                    </select>
                </div>
    
                <div class="card-body p-0 overflow-auto" style="max-height: 500px;">
                    <div id="cart-items" class="p-3">
                        <!-- Cart items injected here -->
                        <div class="text-center text-muted p-5">
                            <i class="ti ti-shopping-cart-off fs-8 mb-3 d-block"></i>
                            Cart is empty
                        </div>
                    </div>
                </div>
    
                <div class="card-footer bg-white border-top p-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="text-muted fs-3">Subtotal</span>
                        <span class="fs-4 fw-semibold text-dark" id="subtotal-display">Rp 0</span>
                    </div>
                    <!-- Reseller Discount Display -->
                    <div class="d-flex justify-content-between align-items-center mb-2 d-none" id="discount-row">
                        <span class="text-success fs-3">Reseller Discount</span>
                        <span class="fs-4 fw-semibold text-success" id="discount-display">- Rp 0</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <span class="fs-5 fw-bold text-dark">TOTAL</span>
                        <span class="fs-6 fw-bolder text-primary" id="total-display">Rp 0</span>
                    </div>

                    <div class="mb-3 mt-3" id="payment-method-row">
                        <label class="form-label fs-2 fw-semibold">Payment Method</label>
                        <select id="payment-method-select" class="form-select">
                            <option value="cash">💵 Cash / Manual Transfer</option>
                            <option value="wallet">💳 Wallet Balance</option>
                        </select>
                    </div>
                    
                    <div class="d-grid gap-2">
                        <button id="btn-checkout" class="btn btn-primary btn-lg" disabled>
                            <i class="ti ti-cash me-2"></i> Process Payment
                        </button>
                        <button id="btn-clear" class="btn btn-outline-danger btn-sm">
                            Clear Cart
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Load Pending Orders</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="form-check-input" id="check-all-drafts">
                                </th>
                                <th>Order ID</th>
                                <th>Warehouse</th>
                                <th>Items</th>
                                <th>Total</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody id="draft-list-container">
                            <!-- Drafts loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-process-drafts">Load Selected</button>
            </div>
        </div>
    </div>
</div>

<!-- Invoice Modal -->
<div class="modal fade" id="invoiceModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0" id="invoice-modal-content">
                <!-- Ajax content loads here -->
            </div>
            <div class="modal-footer d-none">
                <!-- Buttons are inside the partial, but we can have a fallback close here if needed -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
