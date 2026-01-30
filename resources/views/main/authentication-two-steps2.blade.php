@extends('layouts.master-auth')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')
  <div id="main-wrapper" class="auth-customizer-none">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
            <div class="card mb-0">
              <div class="card-body pt-5">
                <a href="/main/index" class="text-nowrap logo-img text-center d-block mb-4 w-100">
                  <img src="{{ URL::asset('build/images/logos/dark-logo.svg') }}" class="dark-logo" alt="Logo-Dark" />
                  <img src="{{ URL::asset('build/images/logos/light-logo.svg') }}" class="light-logo" alt="Logo-light" />
                </a>
                <div class="mb-5 text-center">
                  <p>We sent a verification code to your mobile. Enter the code from the mobile in the field below.</p>
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
@endsection