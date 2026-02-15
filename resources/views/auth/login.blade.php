@extends('layouts.master-auth')

@section('title', 'ModernGrosir - Login')

@section('pageContent')
  <div id="main-wrapper" class="auth-customizer-none">
    <div class="position-relative overflow-hidden min-vh-100 w-100 d-flex align-items-center justify-content-center">
      <div class="row justify-content-center w-100 m-0">
        <div class="col-xl-9 col-lg-11">
          <div class="card overflow-hidden border-0 shadow-lg rounded-4">
            <div class="row g-0">
              <!-- Left side: Background Image -->
              <div class="col-lg-6 d-none d-lg-block position-relative" 
                   style="background: url('{{ URL::asset('images/backgrounds/login-bg.png') }}') center center / cover no-repeat; min-height: 600px;">
                <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary opacity-25"></div>
                <div class="position-absolute bottom-0 start-0 p-5 text-white">
                  <h1 class="fw-bolder display-6 text-white text-shadow">ModernGrosir</h1>
                  <p class="fs-5 opacity-75">Efficiency in every transaction, clarity in every stock.</p>
                </div>
              </div>
              
              <!-- Right side: Login Form -->
              <div class="col-lg-6 bg-body">
                <div class="p-5 h-100 d-flex flex-column justify-content-center">
                  <div class="mb-4 text-center">
                    <img src="{{ URL::asset('images/logos/logo-dark.svg') }}" alt="ModernGrosir Logo" class="img-fluid" height="50">
                  </div>
                  <div class="text-center mb-5">
                    <h2 class="fw-bolder fs-7 mb-1">Welcome Back!</h2>
                    <p class="text-muted">Sign in to manage your inventory and sales.</p>
                  </div>
                  
                  <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="email" class="form-label fw-semibold">Email address</label>
                      <input type="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required placeholder="admin@moderngrosir.com">
                      @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                    
                    <div class="mb-4">
                      <label for="password" class="form-label fw-semibold">Password</label>
                      <input type="password" name="password" class="form-control form-control-lg" id="password" required placeholder="••••••••">
                    </div>
                    
                    <div class="d-flex align-items-center justify-content-between mb-4">
                      <div class="form-check">
                        <input class="form-check-input primary" type="checkbox" name="remember" id="remember" checked>
                        <label class="form-check-label text-dark fs-3" for="remember">
                          Remember this Device
                        </label>
                      </div>
                      <a class="text-primary fw-medium fs-3" href="javascript:void(0)">Forgot Password?</a>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 py-3 mb-4 rounded-3 fs-4 fw-bold shadow-sm">Sign In</button>
                    
                    <div class="position-relative text-center my-4">
                      <p class="mb-0 fs-3 px-3 d-inline-block bg-body text-dark z-index-5 position-relative">or sign in with</p>
                      <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                    </div>

                    <div class="row g-3">
                      <div class="col-12">
                        <a href="{{ route('auth.social', 'google') }}" class="btn btn-outline-primary w-100 py-2 rounded-3 d-flex align-items-center justify-content-center gap-2">
                          <img src="{{ URL::asset('build/images/svgs/google-icon.svg') }}" alt="Google" width="18">
                          <span>Sign in with Google</span>
                        </a>
                      </div>
                    </div>

                    <div class="text-center mt-4">
                      <p class="fs-2 text-muted mb-0">ModernGrosir Enterprise v1.0</p>
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


@endsection