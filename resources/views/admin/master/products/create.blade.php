@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Add Product')

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Master Data</span>
                    <span class="text-muted fs-2">&bull; Tambah Produk Baru</span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Tambah Produk Baru</h3>
                <p class="text-muted mb-0 fs-3">Isi form di bawah untuk menambahkan produk baru ke database.</p>
            </div>
        </div>
    </div>
</div>

<form action="{{ route('master.products.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="image" class="form-label">Product Image</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
            <small class="text-muted">Max size: 2MB. Recommended: Square ratio.</small>
            @error('image')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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
          <div class="mb-3">
            <label for="safety_stock" class="form-label">Safety Stock (Stok Aman)</label>
            <input type="number" class="form-control @error('safety_stock') is-invalid @enderror" id="safety_stock" name="safety_stock" value="{{ old('safety_stock', 0) }}" placeholder="e.g., 10">
            <small class="text-muted">Indikator stok menipis akan muncul di dashboard jika stok berada di bawah angka ini.</small>
            @error('safety_stock')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" id="has_expiration" name="has_expiration" {{ old('has_expiration') ? 'checked' : '' }}>
              <label class="form-check-label fw-semibold" for="has_expiration">Lacak Kedaluwarsa (Expiration Tracking)</label>
            </div>
            <small class="text-muted">Aktifkan jika produk ini memiliki tanggal kedaluwarsa dan ingin menggunakan sistem FEFO.</small>
          </div>
          <div class="d-flex gap-2 mt-4">
            <a href="{{ route('master.products.index') }}" class="btn btn-outline-secondary w-50">Cancel</a>
            <button type="submit" class="btn btn-primary w-50">Save Product</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
