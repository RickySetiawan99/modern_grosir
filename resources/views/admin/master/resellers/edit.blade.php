@extends('layouts.master')

@section('title', 'ModernGrosir - Edit Reseller')

@section('pageContent')
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Edit Reseller</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('master.resellers.index') }}">Resellers</a></li>
            <li class="breadcrumb-item" aria-current="page">Edit</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Update Reseller & User Account</h5>
        <form action="{{ route('master.resellers.update', $reseller->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="name" class="form-label">Full Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $reseller->user->name ?? '') }}" placeholder="e.g., John Doe">
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $reseller->user->email ?? '') }}" placeholder="john@example.com">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="password" class="form-label">Update Password (Optional)</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Leave blank to keep current">
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label for="reseller_tier_id" class="form-label">Reseller Tier</label>
              <select class="form-select @error('reseller_tier_id') is-invalid @enderror" id="reseller_tier_id" name="reseller_tier_id">
                <option value="">Select Tier</option>
                @foreach($tiers as $tier)
                  <option value="{{ $tier->id }}" {{ old('reseller_tier_id', $reseller->reseller_tier_id) == $tier->id ? 'selected' : '' }}>{{ $tier->name }} ({{ $tier->discount_percentage }}% Discount)</option>
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
              <input type="number" class="form-control @error('credit_limit') is-invalid @enderror" id="credit_limit" name="credit_limit" value="{{ old('credit_limit', $reseller->credit_limit) }}">
              @error('credit_limit')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <hr class="my-4">
          <h6 class="fw-semibold mb-3">Business Information (Optional)</h6>

          <div class="mb-3">
            <label for="store_name" class="form-label">Store/Business Name</label>
            <input type="text" class="form-control @error('store_name') is-invalid @enderror" id="store_name" name="store_name" value="{{ old('store_name', $reseller->store_name) }}" placeholder="e.g., Toko Sejahtera">
            @error('store_name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $reseller->phone) }}" placeholder="e.g., 08123456789">
            @error('phone')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="address" class="form-label">Business Address</label>
            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3" placeholder="Full business address">{{ old('address', $reseller->address) }}</textarea>
            @error('address')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <button type="submit" class="btn btn-primary">Update Reseller</button>
          <a href="{{ route('master.resellers.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
