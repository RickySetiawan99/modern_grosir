@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Edit Reseller Tier')

@section('pageContent')
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Edit Reseller Tier</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('master.reseller-tiers.index') }}">Reseller Tiers</a></li>
            <li class="breadcrumb-item" aria-current="page">Edit</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Tier Information</h5>
        <form action="{{ route('master.reseller-tiers.update', $resellerTier->id) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="name" class="form-label">Tier Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $resellerTier->name) }}" placeholder="e.g., Bronze, Silver, Gold">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="discount_percentage" class="form-label">Discount Percentage (%)</label>
            <div class="input-group">
              <input type="number" step="0.01" class="form-control @error('discount_percentage') is-invalid @enderror" id="discount_percentage" name="discount_percentage" value="{{ old('discount_percentage', $resellerTier->discount_percentage) }}" placeholder="0.00">
              <span class="input-group-text">%</span>
              @error('discount_percentage')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Update Tier</button>
          <a href="{{ route('master.reseller-tiers.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
