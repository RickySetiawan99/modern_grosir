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
                    <h3 class="fw-bolder fs-7 mb-3">Two Step Verification</h3>
                    <p>We sent a verification code to your mobile. Enter the code from the mobile in the field below.
                    </p>
                    <h6 class="fw-bolder">******1234</h6>
                  </div>
                  <form>
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label fw-semibold">Type your 6 digits security
                        code</label>
                      <div class="d-flex align-items-center gap-2 gap-sm-3">
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                        <input type="text" class="form-control" placeholder="">
                      </div>
                    </div>
                    <a href="javascript:void(0)" class="btn btn-primary w-100 py-8 mb-4">Verify My Account</a>
                    <div class="d-flex align-items-center">
                      <p class="fs-4 mb-0 text-dark">Didn't get the code?</p>
                      <a class="text-primary fw-medium ms-2" href="javascript:void(0)">Resend</a>
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