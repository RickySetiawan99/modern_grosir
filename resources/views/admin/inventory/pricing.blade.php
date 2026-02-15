@extends('layouts.master')

@section('title', 'ModernGrosir - Tiered Pricing')

@section('pageContent')
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Tiered Pricing Management</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item" aria-current="page">Pricing</li>
          </ol>
        </nav>
      </div>
      <div class="col-3">
        <div class="text-center mb-n5">
          <img src="{{ URL::asset('images/logos/favicon.svg') }}" alt="" class="img-fluid mb-n4" width="80" style="opacity: 0.1;">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h5 class="card-title fw-semibold">Product Price List</h5>
      <span class="badge bg-primary-subtle text-primary fs-2 px-3 py-2 rounded-pill">
        <i class="ti ti-info-circle me-1"></i> Star indicates manual price override
      </span>
    </div>

    <div class="table-responsive">
      <table id="main-table" class="table text-nowrap align-middle mb-0">
        <thead>
          <tr class="text-muted fw-semibold">
            <th scope="col" style="width: 50px;">No</th>
            <th scope="col">Product Name</th>
            <th scope="col">Retail Price</th>
            <th scope="col">Tiered Prices (Calculated or Overridden)</th>
            <th scope="col" class="text-end">Action</th>
          </tr>
        </thead>
        <tbody class="border-top">
        </tbody>
      </table>
    </div>
  </div>
</div>

<!-- Pricing Modal -->
<div class="modal fade" id="pricingModal" tabindex="-1" aria-labelledby="pricingModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="pricingModalLabel text-white">Manage Tiered Pricing</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="pricingForm">
        <div class="modal-body p-4">
          <div class="mb-4 text-center">
            <h4 id="modal-product-name" class="fw-bold mb-1">-</h4>
            <p class="text-muted mb-0">Retail Price: <span id="modal-retail-price" class="fw-semibold text-dark">-</span></p>
          </div>
          
          <div id="tiers-container" class="space-y-3">
            <!-- Tiers will be injected here via JS -->
          </div>
        </div>
        <div class="modal-footer bg-light px-4">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary px-4">Save Prices</button>
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
