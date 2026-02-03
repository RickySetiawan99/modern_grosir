@extends('layouts.master')

@section('title', 'Product Catalog')

@section('pageContent')
<div class="container-fluid">
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Product Catalog</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Catalog</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ URL::asset('build/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters -->
    <div class="card">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text"><i class="ti ti-search"></i></span>
                        <input type="text" id="search-input" class="form-control" placeholder="Search products by name or SKU...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select id="category-filter" class="form-select">
                        <option value="all">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <select id="warehouse-filter" class="form-select">
                        <option value="all">All Warehouses</option>
                        @foreach($warehouses as $wh)
                            <option value="{{ $wh->id }}">{{ $wh->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Grid -->
    <div id="product-grid-container">
        <div class="row" id="product-grid">
            <!-- Products will be loaded here via AJAX -->
        </div>
    </div>

    <!-- Pagination & Info -->
    <div class="d-flex justify-content-between align-items-center mt-4">
        <div id="showing-info" class="text-muted"></div>
        <div id="pagination-container"></div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    let currentPage = 1;
    let isLoading = false;
    let selectedWarehouse = 'all';

    $(document).ready(function() {
        fetchProducts();

        // Search & Filter
        let debounceTimer;
        $('#search-input, #category-filter, #warehouse-filter').on('input change', function() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(() => {
                currentPage = 1;
                fetchProducts();
            }, 300);
        });

        // Warehouse filter change
        $('#warehouse-filter').on('change', function() {
            selectedWarehouse = $(this).val();
        });

        // Pagination click handler
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            const page = $(this).data('page');
            if (page && page !== currentPage) {
                currentPage = page;
                fetchProducts();
            }
        });
    });

    function fetchProducts() {
        if (isLoading) return;
        isLoading = true;

        const search = $('#search-input').val();
        const catId = $('#category-filter').val();

        $('#product-grid').html('<div class="col-12 text-center py-5"><i class="ti ti-loader fs-6"></i> Loading products...</div>');

        $.ajax({
            url: '{{ route("reseller.catalog.products") }}',
            data: {
                page: currentPage,
                search: search,
                category_id: catId
            },
            success: function(response) {
                renderProducts(response.data);
                renderPagination(response);
                isLoading = false;
            },
            error: function() {
                $('#product-grid').html('<div class="col-12 text-center text-danger py-5">Failed to load products</div>');
                isLoading = false;
            }
        });
    }

    function renderProducts(products) {
        let html = '';

        if (products.length === 0) {
            html = '<div class="col-12 text-center text-muted py-5">No products found</div>';
        } else {
            products.forEach(p => {
                const stockInfo = getStockDisplay(p.stock_by_warehouse);
                const savings = p.base_price - p.your_price;
                const savingsPercent = ((savings / p.base_price) * 100).toFixed(0);
                const imageUrl = p.image ? `/${p.image}` : '/build/images/products/product-1.jpg';

                html += `
                <div class="col-md-4 col-lg-3 mb-4">
                    <div class="card h-100 hover-img shadow-sm">
                        <img src="${imageUrl}" class="card-img-top rounded-0" alt="${p.name}" style="height: 140px; object-fit: cover;">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <span class="badge bg-light-primary text-primary fw-semibold">${p.category.name}</span>
                                <span class="badge bg-light text-dark">${p.sku}</span>
                            </div>
                            <h6 class="fw-semibold mb-3">${p.name}</h6>
                            
                            <div class="mb-3">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <span class="text-muted text-decoration-line-through fs-2">Rp ${p.formatted_base_price}</span>
                                    <span class="badge bg-success-subtle text-success">-${savingsPercent}%</span>
                                </div>
                                <h5 class="fw-bold text-primary mb-0">Rp ${p.formatted_your_price}</h5>
                                <small class="text-success">You save: Rp ${new Intl.NumberFormat('id-ID').format(savings)}</small>
                            </div>

                            ${stockInfo}
                        </div>
                    </div>
                </div>`;
            });
        }

        $('#product-grid').html(html);
    }

    function getStockDisplay(stockByWarehouse) {
        const selectedWh = $('#warehouse-filter').val();
        let html = '';

        if (selectedWh !== 'all') {
            // Show only selected warehouse
            const whName = $('#warehouse-filter option:selected').text();
            const stock = stockByWarehouse[whName] || 0;
            const stockClass = stock > 0 ? 'text-success' : 'text-danger';
            html = `
                <div class="border-top pt-3">
                    <p class="text-muted fs-2 mb-2"><i class="ti ti-package me-1"></i> Stock at ${whName}:</p>
                    <div class="${stockClass} fs-3 fw-semibold">${stock} units</div>
                </div>`;
        }
        // If 'all' selected, don't show stock section

        return html;
    }

    function renderPagination(response) {
        // Showing info
        const from = response.from || 0;
        const to = response.to || 0;
        const total = response.total || 0;
        $('#showing-info').html(`Showing ${from} to ${to} of ${total} products`);

        if (response.last_page <= 1) {
            $('#pagination-container').html('');
            return;
        }

        let html = '<nav><ul class="pagination pagination-sm mb-0">';

        // Previous
        const prevDisabled = response.current_page <= 1 ? 'disabled' : '';
        html += `<li class="page-item ${prevDisabled}"><a class="page-link" href="#" data-page="${response.current_page - 1}">Previous</a></li>`;

        // Page numbers (show max 5 pages)
        const maxPages = 5;
        let startPage = Math.max(1, response.current_page - Math.floor(maxPages / 2));
        let endPage = Math.min(response.last_page, startPage + maxPages - 1);
        
        if (endPage - startPage < maxPages - 1) {
            startPage = Math.max(1, endPage - maxPages + 1);
        }

        for (let i = startPage; i <= endPage; i++) {
            const active = i === response.current_page ? 'active' : '';
            html += `<li class="page-item ${active}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
        }

        // Next
        const nextDisabled = response.current_page >= response.last_page ? 'disabled' : '';
        html += `<li class="page-item ${nextDisabled}"><a class="page-link" href="#" data-page="${response.current_page + 1}">Next</a></li>`;

        html += '</ul></nav>';
        $('#pagination-container').html(html);
    }
</script>
@endsection
