@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Add Warehouse')

@section('pageContent')
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Add New Warehouse</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('master.warehouses.index') }}">Warehouses</a></li>
            <li class="breadcrumb-item" aria-current="page">Add New</li>
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
        <h5 class="card-title fw-semibold mb-4">Warehouse Information</h5>
        <form action="{{ route('master.warehouses.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Warehouse Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g., Central Warehouse">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
              <option value="gudang" {{ old('type') == 'gudang' ? 'selected' : '' }}>Gudang (Warehouse)</option>
              <option value="toko" {{ old('type') == 'toko' ? 'selected' : '' }}>Toko (Store)</option>
            </select>
            @error('type')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <textarea class="form-control @error('location') is-invalid @enderror" id="location" name="location" rows="3" placeholder="Jl. Raya No. 123...">{{ old('location') }}</textarea>
            @error('location')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Save Warehouse</button>
          <a href="{{ route('master.warehouses.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
