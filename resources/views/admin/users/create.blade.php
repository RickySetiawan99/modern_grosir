@extends('layouts.master')

@section('title', 'ModernGrosir - Create Staff')

@section('pageContent')
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
  <div class="card-body px-4 py-3">
    <div class="row align-items-center">
      <div class="col-9">
        <h4 class="fw-semibold mb-8">Create New Staff Member</h4>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a class="text-muted" href="{{ route('master.users.index') }}">Staff Users</a></li>
            <li class="breadcrumb-item" aria-current="page">Create</li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <form action="{{ route('master.users.store') }}" method="POST">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="mb-4">
            <label for="name" class="form-label fw-semibold">Full Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter full name" required>
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="email" class="form-label fw-semibold">Email Address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="example@moderngrosir.com" required>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-4">
            <label for="password" class="form-label fw-semibold">Password</label>
            <div class="input-group">
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Min. 8 characters" required>
              <button class="btn btn-outline-secondary" type="button" id="togglePassword"><i class="ti ti-eye"></i></button>
            </div>
            @error('password')
              <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repeat password" required>
          </div>
        </div>

        <div class="col-12 mt-2">
          <label class="form-label fw-semibold mb-3">Assign Roles</label>
          <div class="d-flex flex-wrap gap-3">
            @foreach($roles as $role)
              <div class="form-check p-3 border rounded-3" style="min-width: 150px;">
                <input class="form-check-input ms-0" type="checkbox" name="roles[]" value="{{ $role->name }}" id="role_{{ $role->id }}">
                <label class="form-check-label text-dark fw-semibold ms-2" for="role_{{ $role->id }}">
                  {{ ucfirst($role->name) }}
                </label>
              </div>
            @endforeach
          </div>
          @error('roles')
            <div class="text-danger mt-2 fs-2">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="d-flex align-items-center gap-3 mt-5 pt-3 border-top">
        <button type="submit" class="btn btn-primary px-4">Create Account</button>
        <a href="{{ route('master.users.index') }}" class="btn btn-outline-secondary px-4">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function() {
    $('#togglePassword').on('click', function() {
      const passInput = $('#password');
      const type = passInput.attr('type') === 'password' ? 'text' : 'password';
      passInput.attr('type', type);
      $(this).find('i').toggleClass('ti-eye ti-eye-off');
    });
  });
</script>
@endsection
