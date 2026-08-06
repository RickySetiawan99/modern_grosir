@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Edit Unit')

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Master Data</span>
                    <span class="text-muted fs-2">&bull; Edit Data Satuan</span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Edit Satuan</h3>
                <p class="text-muted mb-0 fs-3">Perbarui informasi satuan ukuran yang sudah ada.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Unit Information</h5>
        <form action="{{ route('master.units.update', $unit->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $unit->name) }}" placeholder="e.g., Kilogram">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="short_name" class="form-label">Short Name / Symbol</label>
            <input type="text" class="form-control @error('short_name') is-invalid @enderror" id="short_name" name="short_name" value="{{ old('short_name', $unit->short_name) }}" placeholder="e.g., Kg">
            @error('short_name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <a href="{{ route('master.units.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
          <button type="submit" class="btn btn-primary">Update Unit</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
