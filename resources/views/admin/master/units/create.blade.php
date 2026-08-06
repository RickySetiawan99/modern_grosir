@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Add Unit')

@section('pageContent')
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Add New Unit (Satuan)</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('master.units.index') }}">Units</a></li>
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
        <h5 class="card-title fw-semibold mb-4">Unit Information</h5>
        <form action="{{ route('master.units.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g., Kilogram">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="short_name" class="form-label">Short Name / Symbol</label>
            <input type="text" class="form-control @error('short_name') is-invalid @enderror" id="short_name" name="short_name" value="{{ old('short_name') }}" placeholder="e.g., Kg">
            @error('short_name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Save Unit</button>
          <a href="{{ route('master.units.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
