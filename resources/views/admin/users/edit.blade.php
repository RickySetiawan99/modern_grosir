@extends('layouts.master')

@section('title', config('app.name', 'ModernGrosir') . ' - Edit Staff')

@section('pageContent')
<div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4 bg-primary-subtle position-relative">
    <div class="card-body p-4">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <span class="badge bg-primary text-white px-2.5 py-1 rounded-pill fs-2 fw-medium">Access Control</span>
                    <span class="text-muted fs-2">&bull; Edit Data Staff</span>
                </div>
                <h3 class="fw-bold mb-1 text-dark">Edit Staff Member</h3>
                <p class="text-muted mb-0 fs-3">Perbarui informasi akun staf yang sudah ada.</p>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm">
  <div class="card-body">
    <form action="{{ route('master.users.update', $user->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-6">
          <div class="mb-4">
            <label for="name" class="form-label fw-semibold">Full Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" placeholder="Enter full name" required>
            @error('name')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="email" class="form-label fw-semibold">Email Address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" placeholder="example@moderngrosir.com" required>
            @error('email')
              <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="mb-4">
            <label for="password" class="form-label fw-semibold">Password <small class="text-muted fw-normal">(Leave empty to keep current)</small></label>
            <div class="input-group">
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Min. 8 characters">
              <button class="btn btn-outline-secondary" type="button" id="togglePassword"><i class="ti ti-eye"></i></button>
            </div>
            @error('password')
              <div class="invalid-feedback d-block">{{ $message }}</div>
            @enderror
          </div>

          <div class="mb-4">
            <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Repeat password">
          </div>
        </div>

        <div class="col-12 mt-2">
          <label class="form-label fw-semibold mb-3">Assign Roles</label>
          <div class="d-flex flex-wrap gap-3">
            @foreach($roles as $role)
              <div class="form-check p-3 border rounded-3 {{ in_array($role->id, $userRoles) ? 'border-primary bg-primary-subtle' : '' }}" style="min-width: 150px;">
                <input class="form-check-input ms-0" type="checkbox" name="roles[]" value="{{ $role->name }}" id="role_{{ $role->id }}" {{ in_array($role->id, $userRoles) ? 'checked' : '' }}>
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
        <a href="{{ route('master.users.index') }}" class="btn btn-outline-secondary me-2">Cancel</a>
          <button type="submit" class="btn btn-primary px-4">Update Profile</button>
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

    // Visual feedback for selected roles
    $('.form-check-input').on('change', function() {
        if($(this).is(':checked')) {
            $(this).closest('.border').addClass('border-primary bg-primary-subtle');
        } else {
            $(this).closest('.border').removeClass('border-primary bg-primary-subtle');
        }
    });
  });
</script>
@endsection
