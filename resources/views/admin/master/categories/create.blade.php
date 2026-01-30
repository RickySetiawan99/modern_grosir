@extends('layouts.master')

@section('title', 'ModernGrosir - Add Category')

@section('pageContent')
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Add New Category</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('master.categories.index') }}">Categories</a></li>
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
          <button type="submit" class="btn btn-primary">Save Category</button>
          <a href="{{ route('master.categories.index') }}" class="btn btn-outline-secondary ms-2">Cancel</a>
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
