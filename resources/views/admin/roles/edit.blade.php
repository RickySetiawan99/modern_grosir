@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Edit Role')

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Access Control</span>
                    <span class="text-muted fs-2">&bull; Edit Data Role</span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Edit Role</h3>
                <p class="text-muted mb-0 fs-3">Perbarui hak akses dan izin operasional per role.</p>
            </div>
        </div>
    </div>
</div>

<div class="card">
  <div class="card-body">
    <form action="{{ route('master.roles.update', $role->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-6 mb-4">
          <label for="name" class="form-label fw-semibold">Role Name</label>
          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $role->name) }}" placeholder="e.g. Supervisor, Warehouse Staff" required>
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
              <div class="form-check form-check-inline p-3 border rounded-3 w-100 {{ in_array($permission->id, $rolePermissions) ? 'border-primary bg-primary-subtle' : '' }}">
                <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}" id="perm_{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
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
        <a href="{{ route('master.roles.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
          <button type="submit" class="btn btn-primary px-4">Update Role</button>
      </div>
    </form>
  </div>
</div>
@endsection
