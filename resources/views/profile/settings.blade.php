@extends('layouts.master')

@section('title', 'Account Setting')

@section('pageContent')
<div class="container-fluid">
    @include('layouts.breadcrumb', ['title' => 'Account Setting', 'subtitle' => 'Home'])
    
    <div class="card">
        <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-3" id="pills-account-tab" data-bs-toggle="pill" data-bs-target="#pills-account" type="button" role="tab" aria-controls="pills-account" aria-selected="true">
                    <i class="ti ti-user-circle me-2 fs-6"></i>
                    <span class="d-none d-md-block">Account</span>
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-3" id="pills-security-tab" data-bs-toggle="pill" data-bs-target="#pills-security" type="button" role="tab" aria-controls="pills-security" aria-selected="false">
                    <i class="ti ti-lock me-2 fs-6"></i>
                    <span class="d-none d-md-block">Security</span>
                </button>
            </li>
        </ul>
        <div class="card-body">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 d-flex align-items-stretch">
                                <div class="card w-100 border position-relative overflow-hidden">
                                    <div class="card-body p-4">
                                        <h4 class="card-title">Change Profile</h4>
                                        <p class="card-subtitle mb-4">Change your profile picture from here</p>
                                        <div class="text-center">
                                            <div class="position-relative d-inline-block">
                                                <img src="{{ $user->avatar ? asset($user->avatar) : URL::asset('build/images/profile/user-1.jpg') }}" id="avatar-preview" alt="modernize-img" class="rounded-circle" width="120" height="120" style="object-fit: cover; border: 3px solid var(--bs-primary-bg-subtle);">
                                            </div>
                                            <div class="d-flex align-items-center justify-content-center my-4 gap-6">
                                                <div class="btn btn-primary position-relative overflow-hidden">
                                                    Upload
                                                    <input type="file" name="avatar" id="avatar-input" class="position-absolute top-0 start-0 opacity-0 cursor-pointer" style="font-size: 100px;" onchange="previewImage(this)">
                                                </div>
                                                <button type="button" class="btn bg-danger-subtle text-danger" onclick="document.getElementById('reset-avatar-form').submit()">Reset</button>
                                            </div>
                                            
                                            <h6 class="fw-semibold mb-3">Or choose default:</h6>
                                            <div class="d-flex flex-wrap justify-content-center gap-2 mb-4">
                                                @for($i = 1; $i <= 12; $i++)
                                                    @php $defaultPath = 'build/images/profile/user-'.$i.'.jpg'; @endphp
                                                    <div class="default-avatar-pick {{ $user->avatar == $defaultPath ? 'active' : '' }}" onclick="selectDefaultAvatar('{{ $defaultPath }}', this)">
                                                        <img src="{{ asset($defaultPath) }}" class="rounded-circle cursor-pointer" width="40" height="40" style="object-fit: cover;">
                                                    </div>
                                                @endfor
                                            </div>
                                            <input type="hidden" name="selected_avatar" id="selected-avatar-input">

                                            <p class="mb-0 text-muted fs-2">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="col-lg-6 d-flex align-items-stretch">
                            <div class="card w-100 border position-relative overflow-hidden">
                                <div class="card-body p-4">
                                    <h4 class="card-title">Personal Details</h4>
                                    <p class="card-subtitle mb-4">To change your personal detail, edit and save from here</p>
                                    
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Your Name</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter your name" value="{{ old('name', $user->name) }}">
                                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" value="{{ old('email', $user->email) }}">
                                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form id="reset-avatar-form" action="{{ route('profile.reset-avatar') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-security" role="tabpanel" aria-labelledby="pills-security-tab" tabindex="0">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card border shadow-none">
                                <div class="card-body p-4">
                                    <h4 class="card-title mb-3">Change Password</h4>
                                    <p class="card-subtitle mb-4">To change your password please confirm here</p>
                                    <form action="{{ route('profile.password') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="current_password" class="form-label">Current Password</label>
                                            <input type="password" name="current_password" class="form-control" id="current_password">
                                            @error('current_password') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">New Password</label>
                                            <input type="password" name="password" class="form-control" id="password">
                                            @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                                        </div>
                                        <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                            <button type="submit" class="btn btn-primary">Update Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    @if(session('success'))
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            timer: 3000,
            showConfirmButton: false
        });
    @endif

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#avatar-preview').attr('src', e.target.result);
                // Clear default selection
                $('.default-avatar-pick').removeClass('active');
                $('#selected-avatar-input').val('');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function selectDefaultAvatar(path, element) {
        const fullPath = "{{ asset('') }}" + path;
        $('#avatar-preview').attr('src', fullPath);
        $('#selected-avatar-input').val(path);
        
        // Update UI
        $('.default-avatar-pick').removeClass('active');
        $(element).addClass('active');
        
        // Clear file input
        $('#avatar-input').val('');
    }
</script>


@endsection
