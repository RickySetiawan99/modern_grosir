@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Add Category')

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Master Data</span>
                    <span class="text-muted fs-2">&bull; Tambah Kategori Baru</span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Tambah Kategori Baru</h3>
                <p class="text-muted mb-0 fs-3">Isi form di bawah untuk menambahkan kategori produk baru.</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Category Information</h5>
        <form action="{{ route('master.categories.store') }}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g., Electronics" onkeyup="createSlug()">
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" placeholder="electronics">
            @error('slug')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">Used for URL purposes, usually lowercase with hyphens.</div>
          </div>
          <a href="{{ route('master.categories.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
          <button type="submit" class="btn btn-primary">Save Category</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  function createSlug() {
    let name = document.getElementById('name').value;
    let slug = name.toLowerCase()
      .replace(/[^\w ]+/g, '')
      .replace(/ +/g, '-');
    document.getElementById('slug').value = slug;
  }
</script>
@endsection
