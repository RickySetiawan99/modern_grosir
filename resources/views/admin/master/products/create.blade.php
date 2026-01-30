@extends('layouts.master')

@section('title', 'ModernGrosir - Add Product')

@section('pageContent')
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Add New Product</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('master.products.index') }}">Products</a></li>
            <li class="breadcrumb-item" aria-current="page">Add New</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<form action="{{ route('master.products.store') }}" method="POST">
  @csrf
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Product Basic Details</h5>
          <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g., Indomie Goreng Spesial">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="sku" class="form-label">SKU / Barcode</label>
              <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ old('sku') }}" placeholder="89912345678">
              @error('sku')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6 mb-3">
              <label for="category_id" class="form-label">Category</label>
              <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror">
                <option value="">Select Category</option>
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
              </select>
              @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Optional product description">{{ old('description') }}</textarea>
            @error('description')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title fw-semibold mb-4">Pricing & Unit</h5>
          <div class="mb-3">
            <label for="unit_id" class="form-label">Base Unit (Satuan)</label>
            <select name="unit_id" id="unit_id" class="form-select @error('unit_id') is-invalid @enderror">
              <option value="">Select Unit</option>
              @foreach ($units as $unit)
                <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->name }} ({{ $unit->short_name }})</option>
              @endforeach
            </select>
            @error('unit_id')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="purchase_price" class="form-label">Purchase Price (Harga Modal)</label>
            <div class="input-group">
              <span class="input-group-text">Rp</span>
              <input type="number" step="0.01" class="form-control @error('purchase_price') is-invalid @enderror" id="purchase_price" name="purchase_price" value="{{ old('purchase_price', 0) }}">
              @error('purchase_price')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="mb-3">
            <label for="retail_price" class="form-label">Retail Sale Price (Harga Jual)</label>
            <div class="input-group">
              <span class="input-group-text">Rp</span>
              <input type="number" step="0.01" class="form-control @error('retail_price') is-invalid @enderror" id="retail_price" name="retail_price" value="{{ old('retail_price', 0) }}">
              @error('retail_price')
                <div class="invalid-feedback d-block">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <div class="mt-4">
            <button type="submit" class="btn btn-primary w-100 mb-2">Save Product</button>
            <a href="{{ route('master.products.index') }}" class="btn btn-outline-secondary w-100">Cancel</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
