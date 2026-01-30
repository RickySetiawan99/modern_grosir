@extends('layouts.master-auth')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')
  <div id="main-wrapper" class="auth-customizer-none">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
      <div class="position-relative z-index-5">
        <div class="row">
          <div class="col-lg-6 col-xl-8">
            <a href="/main/index" class="text-nowrap logo-img d-block px-4 py-9 w-100">
              <img src="{{ URL::asset('build/images/logos/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
              <img src="{{ URL::asset('build/images/logos/light-logo.svg') }}" class="light-logo" alt="Logo-light" />
            </a>
            <div class="d-none d-lg-flex align-items-center justify-content-center h-n80">
              <img src="{{ URL::asset('build/images/backgrounds/login-security.svg') }}" alt="modernize-img" class="img-fluid"
                width="500">
            </div>
          </div>
          <div class="col-lg-6 col-xl-4">
            <div class="card mb-0 shadow-none rounded-0 min-vh-100 h-100">
              <div class="auth-max-width mx-auto d-flex align-items-center w-100 h-100">
                <div class="card-body">
                  <div class="mb-5">
                    <h2 class="fw-bolder fs-7 mb-3">Forgot your password?</h2>
                    <p class="mb-0 ">
                      Please enter the email address associated with your account and We will email you a link to reset
                      your password.
                    </p>
                  </div>
                  <form>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <a href="javascript:void(0)" class="btn btn-primary w-100 py-8 mb-3">Forgot Password</a>
                    <a href="/main/authentication-login" class="btn bg-primary-subtle text-primary w-100 py-8">Back to
                      Login</a>
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