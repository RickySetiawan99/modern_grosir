@extends('layouts.master')

@section('title', 'Product Catalog')

@section('css')
<link rel="stylesheet" href="{{ asset('css/reseller/catalog.css') }}">
@endsection

@section('pageContent')
<div class="container-fluid">
<div class="product-catalog-redesign">
    <!-- Hero Section -->
    <div class="card border-0 shadow-none position-relative overflow-hidden mb-4 catalog-hero" style="background: linear-gradient(135deg, #1e4db7 0%, #3074e0 100%); min-height: 240px; border-radius: 20px;">
        <div class="card-body px-5 py-5 h-100 d-flex flex-column justify-content-center">
            <div class="row align-items-center">
                <div class="col-lg-7 text-white mt-1">
                    <h2 class="fw-bolder mb-3 text-white fs-10 mb-2">ModernGrosir Catalog</h2>
                    <p class="fs-4 opacity-75 mb-4">Discover high-quality products from multiple warehouses at your exclusive reseller rates.</p>
                    
                    <!-- Integrated Search Bar -->
                    <div class="integrated-search shadow-lg">
                        <div class="input-group input-group-lg bg-white rounded-pill p-1 overflow-hidden">
                            <span class="input-group-text bg-white border-0 ps-3"><i class="ti ti-search fs-6 text-primary"></i></span>
                            <input type="text" id="search-input" class="form-control border-0 px-2" placeholder="Search by name or SKU..." style="box-shadow: none;">
                            <button class="btn btn-primary rounded-pill px-4" type="button">Find</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="hero-image-wrapper text-end">
                         <img src="{{ URL::asset('build/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid" style="max-height: 220px; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.2));">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Navigation & Filter Section -->
    <div class="card border-0 shadow-sm mb-4" style="border-radius: 15px;">
        <div class="card-body p-3">
            <div class="row align-items-center g-3">
                <div class="col-lg-8">
                    <!-- Scrollable Category Pills -->
                    <div class="category-pills-wrapper">
                        <div class="d-flex overflow-x-auto pb-1 gap-2 hide-scrollbar" id="category-pills">
                            <button class="btn btn-primary rounded-pill px-4 cat-pill active" data-id="all">All Items</button>
                            @foreach($categories as $cat)
                                <button class="btn btn-outline-primary rounded-pill px-4 cat-pill" data-id="{{ $cat->id }}">{{ $cat->name }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex gap-2">
                        <div class="flex-grow-1">
                            <div class="input-group input-group-sm rounded-pill border overflow-hidden px-2 py-1">
                                <span class="input-group-text bg-transparent border-0"><i class="ti ti-building-warehouse text-primary"></i></span>
                                <select id="warehouse-filter" class="form-select border-0 fs-3" style="box-shadow: none;">
                                    <option value="all">All Warehouses</option>
                                    @foreach($warehouses as $wh)
                                        <option value="{{ $wh->id }}">{{ $wh->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Product Grid Section -->
    <div id="product-grid-container">
        <div class="row g-4" id="product-grid">
            <!-- Products will be loaded here via AJAX -->
        </div>
    </div>

    <!-- Enhanced Pagination -->
    <div class="card border-0 shadow-sm mt-4" style="border-radius: 15px;">
        <div class="card-body py-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
                <div id="showing-info" class="text-muted fs-3"></div>
                <div id="pagination-container"></div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
    window.catalogRoutes = {
        products: '{{ route("reseller.catalog.products") }}'
    };
</script>
<script src="{{ asset('js/reseller/catalog.js') }}"></script>
@endsection
