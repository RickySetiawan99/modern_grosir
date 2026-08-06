@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Add Supplier')

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Master Data</span>
                    <span class="text-muted fs-2">&bull; Tambah Supplier Baru</span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Tambah Supplier Baru</h3>
                <p class="text-muted mb-0 fs-3">Isi form di bawah untuk menambahkan data supplier baru.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Supplier Information</h5>
        <form action="{{ route('master.suppliers.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Supplier Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g., PT. Maju Bersama">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="08123456789">
              @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="supplier@example.com">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Office Address</label>
            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" placeholder="Jl. Sudirman No. 123, Jakarta">{{ old('address') }}</textarea>
            @error('address')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <a href="{{ route('master.suppliers.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
          <button type="submit" class="btn btn-primary">Save Supplier</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
