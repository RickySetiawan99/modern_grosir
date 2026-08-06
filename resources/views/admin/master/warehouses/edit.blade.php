@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Edit Warehouse')

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Master Data</span>
                    <span class="text-muted fs-2">&bull; Edit Data Gudang</span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Edit Gudang</h3>
                <p class="text-muted mb-0 fs-3">Perbarui informasi gudang yang sudah ada.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Warehouse Information</h5>
        <form action="{{ route('master.warehouses.update', $warehouse->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="name" class="form-label">Warehouse Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $warehouse->name) }}" placeholder="e.g., Central Warehouse">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
              <option value="gudang" {{ old('type', $warehouse->type) == 'gudang' ? 'selected' : '' }}>Gudang (Warehouse)</option>
              <option value="toko" {{ old('type', $warehouse->type) == 'toko' ? 'selected' : '' }}>Toko (Store)</option>
            </select>
            @error('type')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <textarea class="form-control @error('location') is-invalid @enderror" id="location" name="location" rows="3" placeholder="Jl. Raya No. 123...">{{ old('location', $warehouse->location) }}</textarea>
            @error('location')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <a href="{{ route('master.warehouses.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
          <button type="submit" class="btn btn-primary">Update Warehouse</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
