@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Add Reseller')

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Partners</span>
                    <span class="text-muted fs-2">&bull; Tambah Reseller Baru</span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Tambah Reseller Baru</h3>
                <p class="text-muted mb-0 fs-3">Isi form di bawah untuk mendaftarkan akun reseller baru.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Reseller & User Account Info</h5>
        <form action="{{ route('master.resellers.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g., John Doe">
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="john@example.com">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="password" class="form-label">Account Password</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Min 8 characters">
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label for="reseller_tier_id" class="form-label">Reseller Tier</label>
              <select class="form-select @error('reseller_tier_id') is-invalid @enderror" id="reseller_tier_id" name="reseller_tier_id">
                <option value="">Select Tier</option>
                @foreach($tiers as $tier)
                  <option value="{{ $tier->id }}" {{ old('reseller_tier_id') == $tier->id ? 'selected' : '' }}>{{ $tier->name }} ({{ $tier->discount_percentage }}% Discount)</option>
                @endforeach
              </select>
              @error('reseller_tier_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="mb-3">
            <label for="credit_limit" class="form-label">Credit Limit (IDR)</label>
            <div class="input-group">
              <span class="input-group-text">Rp</span>
              <input type="number" class="form-control @error('credit_limit') is-invalid @enderror" id="credit_limit" name="credit_limit" value="{{ old('credit_limit', 0) }}">
              @error('credit_limit')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <hr class="my-4">
          <h6 class="fw-semibold mb-3">Business Information (Optional)</h6>

          <div class="mb-3">
            <label for="store_name" class="form-label">Store/Business Name</label>
            <input type="text" class="form-control @error('store_name') is-invalid @enderror" id="store_name" name="store_name" value="{{ old('store_name') }}" placeholder="e.g., Toko Sejahtera">
            @error('store_name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}" placeholder="e.g., 08123456789">
            @error('phone')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="address" class="form-label">Business Address</label>
            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" placeholder="Full business address">{{ old('address') }}</textarea>
            @error('address')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <a href="{{ route('master.resellers.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
          <button type="submit" class="btn btn-primary">Save Reseller</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
