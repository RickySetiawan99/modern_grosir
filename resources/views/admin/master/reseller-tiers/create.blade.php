@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Add Reseller Tier')

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Master Data</span>
                    <span class="text-muted fs-2">&bull; Tambah Tier Baru</span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Tambah Reseller Tier Baru</h3>
                <p class="text-muted mb-0 fs-3">Isi form di bawah untuk menambahkan tingkatan reseller baru.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Tier Information</h5>
        <form action="{{ route('master.reseller-tiers.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Tier Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g., Bronze, Silver, Gold">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="discount_percentage" class="form-label">Discount Percentage (%)</label>
            <div class="input-group">
              <input type="number" step="0.01" class="form-control @error('discount_percentage') is-invalid @enderror" id="discount_percentage" name="discount_percentage" value="{{ old('discount_percentage') }}" placeholder="0.00">
              <span class="input-group-text">%</span>
              @error('discount_percentage')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-text">Percentage discount applied to retail price for this tier.</div>
          </div>
          <a href="{{ route('master.reseller-tiers.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
          <button type="submit" class="btn btn-primary">Save Tier</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
