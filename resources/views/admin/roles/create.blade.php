@extends('layouts.master')

@section('title', 'ModernGrosir - Create Role')

@section('pageContent')
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Create New Role</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('master.roles.index') }}">Roles</a></li>
            <li class="breadcrumb-item" aria-current="page">Create</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="card">
  <div class="card-body">
    <form action="{{ route('master.roles.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6 mb-4">
          <label for="name" class="form-label fw-semibold">Role Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="e.g. Supervisor, Warehouse Staff" required>
          @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="mb-4">
        <label class="form-label fw-semibold mb-3">Permissions</label>
        <div class="row g-3">
          @foreach($permissions as $permission)
            <div class="col-md-3">
              <div class="form-check form-check-inline p-3 border rounded-3 w-100">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm_{{ $permission->id }}">
                <label class="form-check-label text-dark fw-semibold ms-2" for="perm_{{ $permission->id }}">
                  {{ ucwords(str_replace('manage ', '', $permission->name)) }}
                </label>
                <div class="text-muted fs-2 ms-4 d-block">{{ $permission->name }}</div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <div class="d-flex align-items-center gap-3 mt-4">
        <button type="submit" class="btn btn-primary px-4">Create Role</button>
        <a href="{{ route('master.roles.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection
