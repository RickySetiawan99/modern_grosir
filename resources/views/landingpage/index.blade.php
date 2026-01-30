<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  @@include("../main/partials/head")
  <title>Modernize Bootstrap Admin</title>
  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="{{ URL::asset('build/libs/owl.carousel/dist/assets/owl.carousel.min.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('build/libs/aos/dist/aos.css') }}" />
</head>

<body>
  <div class="toast toast-onload align-items-center text-bg-primary border-0" role="alert" aria-live="assertive"
    aria-atomic="true">
    <div class="toast-body hstack align-items-start gap-6">
      <i class="ti ti-alert-circle fs-6"></i>
      <div>
        <h5 class="text-white fs-3 mb-1">Welcome to Modernize</h5>
        <h6 class="text-white fs-2 mb-0">Easy to costomize the Template!!!</h6>
      </div>
      <button type="button" class="btn-close btn-close-white fs-2 m-0 ms-auto shadow-none" data-bs-dismiss="toast"
        aria-label="Close"></button>
    </div>
  </div>
  <!-- Preloader -->
  <div class="preloader">
    <img src="{{ URL::asset('build/images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <div id="main-wrapper flex-column">
    <header class="header">
      <nav class="navbar navbar-expand-lg py-0">
        <div class="container">
          <a class="navbar-brand me-0 py-0" href="index">
            <img src="{{ URL::asset('build/images/logos/dark-logo.svg') }}') }}" alt="img-fluid" />
          </a>
          <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="ti ti-menu-2 fs-9"></i>
          </button>
          <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <i class="ti ti-menu-2 fs-9"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-center mb-2 mb-lg-0 ms-auto">
              <li class="nav-item dropdown hover-dd mega-dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button"
                  aria-expanded="false">
                  Demos
                  <span class="d-flex align-items-center">
                    <i class="ti ti-chevron-down"></i>
                  </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-animate-up p-4">
                  <div class="row justify-content-center">
                    <div class="col-md-12">
                      <h5 class="fs-5 fw-semibold">Different Demos</h5>
                      <p class="mb-0">Included with the Package</p>
                    </div>
                  </div>
                  <div class="row justify-content-center my-4">
                    <div class="col-lg-12">
                      <div class="row">
                        <div class="col">
                          <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                            <img src="{{ URL::asset('build/images/demos/demo-main.jpg') }}" alt="modernize-img" class="img-fluid" />
                            <a target="_blank" href="/main/index"
                              class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                              Preview</a>
                          </div>
                          <h6 class="mb-0 text-center fw-bolder fs-3">
                            Main
                          </h6>
                        </div>
                        <div class="col">
                          <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                            <img src="{{ URL::asset('build/images/demos/demo-dark.jpg') }}" alt="modernize-img" class="img-fluid" />
                            <a target="_blank" href="/dark/index2"
                              class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                              Preview</a>
                          </div>
                          <h6 class="mb-0 text-center fw-bolder fs-3">
                            Dark
                          </h6>
                        </div>
                        <div class="col">
                          <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                            <img src="{{ URL::asset('build/images/demos/demo-horizontal.jpg') }}" alt="modernize-img" class="img-fluid" />
                            <a target="_blank" href="/horizontal/index3"
                              class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                              Preview</a>
                          </div>
                          <h6 class="mb-0 text-center fw-bolder fs-3">
                            Horizontal
                          </h6>
                        </div>
                        <div class="col">
                          <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                            <img src="{{ URL::asset('build/images/demos/demo-minisidebar.jpg') }}" alt="modernize-img" class="img-fluid" />
                            <a target="_blank" href="/minisidebar/index4"
                              class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                              Preview</a>
                          </div>
                          <h6 class="mb-0 text-center fw-bolder fs-3">
                            Minisidebar
                          </h6>
                        </div>
                        <div class="col">
                          <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                            <img src="{{ URL::asset('build/images/demos/demo-rtl.jpg') }}" alt="modernize-img" class="img-fluid" />
                            <a target="_blank" href="/rtl/index5"
                              class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                              Preview</a>
                          </div>
                          <h6 class="mb-0 text-center fw-bolder fs-3">RTL</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center mb-4">
                    <div class="col-md-12">
                      <h5 class="fs-5 fw-semibold mt-8">Different Apps</h5>
                    </div>
                  </div>
                  <div class="row justify-content-center">
                    <div class="col-lg-12">
                      <div class="row justify-content-between">
                        <div class="col">
                          <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                            <img src="{{ URL::asset('build/images/apps/app-calendar.jpg') }}" alt="modernize-img" class="img-fluid" />
                            <a target="_blank" href="/main/app-calendar"
                              class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                              Preview</a>
                          </div>
                          <h6 class="mb-0 text-center fw-bolder fs-3">
                            Calendar
                          </h6>
                        </div>
                        <div class="col">
                          <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                            <img src="{{ URL::asset('build/images/apps/app-chat.jpg') }}" alt="modernize-img" class="img-fluid" />
                            <a target="_blank" href="/main/app-chat"
                              class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                              Preview</a>
                          </div>
                          <h6 class="mb-0 text-center fw-bolder fs-3">
                            Chat
                          </h6>
                        </div>
                        <div class="col">
                          <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                            <img src="{{ URL::asset('build/images/apps/app-email.jpg') }}" alt="modernize-img" class="img-fluid" />
                            <a target="_blank" href="/main/app-email"
                              class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                              Preview</a>
                          </div>
                          <h6 class="mb-0 text-center fw-bolder fs-3">
                            Email
                          </h6>
                        </div>
                        <div class="col">
                          <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                            <img src="{{ URL::asset('build/images/apps/app-contact.jpg')}}" alt="modernize-img" class="img-fluid" />
                            <a target="_blank" href="/main/app-contact2"
                              class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                              Preview</a>
                          </div>
                          <h6 class="mb-0 text-center fw-bolder fs-3">
                            Contact
                          </h6>
                        </div>
                        <div class="col">
                          <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                            <img src="{{ URL::asset('build/images/apps/app-invoice.jpg') }}" alt="modernize-img" class="img-fluid" />
                            <a target="_blank" href="/main/app-invoice"
                              class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                              Preview</a>
                          </div>
                          <h6 class="mb-0 text-center fw-bolder fs-3">
                            Invoice
                          </h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </ul>
              </li>
              <li class="nav-item dropdown hover-dd mega-dropdown pages-dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button"
                  aria-expanded="false">
                  Pages
                  <span class="d-flex align-items-center">
                    <i class="ti ti-chevron-down"></i>
                  </span>
                </a>
                <div class="dropdown-menu dropdown-menu-animate-up py-0">
                  <div class="row">
                    <div class="col-md-8">
                      <div class="p-4">
                        <div>
                          <div class="row">
                            <div class="col-6">
                              <div class="position-relative">
                                <a target="_blank" href="/main/app-chat"
                                  class="d-flex align-items-center pb-9 position-relative lh-base">
                                  <div
                                    class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ URL::asset('build/images/svgs/icon-dd-chat.svg') }}') }}" alt="modernize-img" class="img-fluid"
                                      width="24" height="24" />
                                  </div>
                                  <div>
                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                      Chat Application
                                    </h6>
                                    <span class="fs-2 d-block text-muted">New messages arrived</span>
                                  </div>
                                </a>
                                <a target="_blank" href="/main/app-invoice"
                                  class="d-flex align-items-center pb-9 position-relative lh-base">
                                  <div
                                    class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ URL::asset('build/images/svgs/icon-dd-invoice.svg') }}') }}" alt="modernize-img" class="img-fluid"
                                      width="24" height="24" />
                                  </div>
                                  <div>
                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                      Invoice App
                                    </h6>
                                    <span class="fs-2 d-block text-muted">Get latest invoice</span>
                                  </div>
                                </a>
                                <a target="_blank" href="/main/app-contact2"
                                  class="d-flex align-items-center pb-9 position-relative lh-base">
                                  <div
                                    class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ URL::asset('build/images/svgs/icon-dd-mobile.svg') }}') }}" alt="modernize-img" class="img-fluid"
                                      width="24" height="24" />
                                  </div>
                                  <div>
                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                      Contact Application
                                    </h6>
                                    <span class="fs-2 d-block text-muted">2 Unsaved Contacts</span>
                                  </div>
                                </a>
                                <a target="_blank" href="/main/app-email"
                                  class="d-flex align-items-center pb-9 position-relative lh-base">
                                  <div
                                    class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ URL::asset('build/images/svgs/icon-dd-message-box.svg') }}') }}" alt="modernize-img"
                                      class="img-fluid" width="24" height="24" />
                                  </div>
                                  <div>
                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                      Email App
                                    </h6>
                                    <span class="fs-2 d-block text-muted">Get new emails</span>
                                  </div>
                                </a>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="position-relative">
                                <a target="_blank" href="/main/page-user-profile"
                                  class="d-flex align-items-center pb-9 position-relative lh-base">
                                  <div
                                    class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ URL::asset('build/images/icon-dd-cart.svg') }}" alt="modernize-img" class="img-fluid"
                                      width="24" height="24" />
                                  </div>
                                  <div>
                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                      User Profile
                                    </h6>
                                    <span class="fs-2 d-block text-muted">learn more information</span>
                                  </div>
                                </a>
                                <a target="_blank" href="/main/app-calendar"
                                  class="d-flex align-items-center pb-9 position-relative lh-base">
                                  <div
                                    class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ URL::asset('build/images/icon-dd-date.svg') }}" alt="modernize-img" class="img-fluid"
                                      width="24" height="24" />
                                  </div>
                                  <div>
                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                      Calendar App
                                    </h6>
                                    <span class="fs-2 d-block text-muted">Get dates</span>
                                  </div>
                                </a>
                                <a target="_blank" href="/main/app-contact"
                                  class="d-flex align-items-center pb-9 position-relative lh-base">
                                  <div
                                    class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ URL::asset('build/images/icon-dd-lifebuoy.svg') }}" alt="modernize-img"
                                      class="img-fluid" width="24" height="24" />
                                  </div>
                                  <div>
                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                      Contact List Table
                                    </h6>
                                    <span class="fs-2 d-block text-muted">Add new contact</span>
                                  </div>
                                </a>
                                <a target="_blank" href="/main/app-notes"
                                  class="d-flex align-items-center pb-9 position-relative lh-base">
                                  <div
                                    class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                    <img src="{{ URL::asset('build/images/icon-dd-application.svg') }}" alt="modernize-img"
                                      class="img-fluid" width="24" height="24" />
                                  </div>
                                  <div>
                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                      Notes Application
                                    </h6>
                                    <span class="fs-2 d-block text-muted">To-do and Daily tasks</span>
                                  </div>
                                </a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="position-relative p-4 border-start h-100">
                        <h5 class="fs-5 mb-7 fw-semibold">Quick Links</h5>
                        <ul class="list-unstyled">
                          <li class="mb-3">
                            <a class="fw-semibold text-dark text-hover-primary" target="_blank"
                              href="/main/page-pricing">Pricing Page</a>
                          </li>
                          <li class="mb-3">
                            <a class="fw-semibold text-dark text-hover-primary" target="_blank"
                              href="/main/authentication-login">Authentication Design</a>
                          </li>
                          <li class="mb-3">
                            <a class="fw-semibold text-dark text-hover-primary" target="_blank"
                              href="/main/authentication-register">Register Now</a>
                          </li>
                          <li class="mb-3">
                            <a class="fw-semibold text-dark text-hover-primary" target="_blank"
                              href="/main/authentication-error">404 Error Page</a>
                          </li>
                          <li class="mb-3">
                            <a class="fw-semibold text-dark text-hover-primary" target="_blank"
                              href="/main/app-notes">Notes App</a>
                          </li>
                          <li class="mb-3">
                            <a class="fw-semibold text-dark text-hover-primary" target="_blank"
                              href="/main/page-user-profile">User Application</a>
                          </li>
                          <li class="mb-3">
                            <a class="fw-semibold text-dark text-hover-primary" target="_blank"
                              href="/main/page-account-settings">Account Settings</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/docs/index"
                  target="_blank">Documentation</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="https://adminmart.com/support/"
                  target="_blank">Support</a>
              </li>
              <li class="nav-item ms-2">
                <a class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2"
                  href="/main/authentication-login">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="body-wrapper overflow-hidden pt-0">
      <section class="hero-section position-relative overflow-hidden mb-0 mb-lg-5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-xl-6">
              <div class="hero-content my-5 my-xl-0">
                <h6 class="d-flex align-items-center gap-2 fs-4 fw-semibold mb-3" data-aos="fade-up"
                  data-aos-delay="200" data-aos-duration="1000">
                  <i class="ti ti-rocket text-secondary fs-6"></i>Kick start
                  your project with
                </h6>
                <h1 class="fw-bolder mb-7 fs-13" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                  Most powerful &
                  <span class="text-primary"> Developer friendly</span>
                  dashboard
                </h1>
                <p class="fs-5 mb-5 text-dark fw-normal" data-aos="fade-up" data-aos-delay="600"
                  data-aos-duration="1000">
                  Modernize comes with light & dark color skins, well designed
                  dashboards, applications and pages.
                </p>
                <div class="d-sm-flex align-items-center gap-3" data-aos="fade-up" data-aos-delay="800"
                  data-aos-duration="1000">
                  <a class="btn btn-primary px-5 py-6 btn-hover-shadow d-block mb-3 mb-sm-0"
                    href="/main/authentication-login">Login</a>
                  <a class="btn btn-outline-primary d-block scroll-link px-7 py-6" href="#production-template">Live
                    Preview</a>
                </div>
              </div>
            </div>
            <div class="col-xl-6 d-none d-xl-block">
              <div class="hero-img-slide position-relative bg-primary-subtle p-4 rounded">
                <div class="d-flex flex-row">
                  <div class="">
                    <div class="banner-img-1 slideup">
                      <img src="{{ URL::asset('build/images/hero-img/bannerimg1.svg') }}" alt="modernize-img" class="img-fluid" />
                    </div>
                    <div class="banner-img-1 slideup">
                      <img src="{{ URL::asset('build/images/hero-img/bannerimg1.svg') }}" alt="modernize-img" class="img-fluid" />
                    </div>
                  </div>
                  <div class="">
                    <div class="banner-img-2 slideDown">
                      <img src="{{ URL::asset('build/images/hero-img/bannerimg2.svg') }}" alt="modernize-img" class="img-fluid" />
                    </div>
                    <div class="banner-img-2 slideDown">
                      <img src="{{ URL::asset('build/images/hero-img/bannerimg2.svg') }}" alt="modernize-img" class="img-fluid" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="production pb-5 pb-md-5 mb-5" id="production-template">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
              <div class="d-sm-flex align-items-center text-center gap-2 justify-content-center mb-7">
                <ul
                  class="list-unstyled d-flex align-items-center justify-content-center justify-content-sm-start mb-2 mb-sm-0">
                  <li class="">
                    <a class="d-block" href="javascript:void(0)">
                      <img src="{{ URL::asset('build/images/user-1.jpg') }}" alt="modernize-img"
                        class="img-fluid border border-2 rounded-circle border-white" width="32" height="32" />
                    </a>
                  </li>
                  <li class="ms-n2">
                    <a class="d-block" href="javascript:void(0)">
                      <img src="{{ URL::asset('build/images/user-2.jpg') }}" alt="modernize-img"
                        class="img-fluid border border-2 rounded-circle border-white" width="32" height="32" />
                    </a>
                  </li>
                  <li class="ms-n2">
                    <a class="d-block" href="javascript:void(0)">
                      <img src="{{ URL::asset('build/images/user-3.jpg') }}" alt="modernize-img"
                        class="img-fluid border border-2 rounded-circle border-white" width="32" height="32" />
                    </a>
                  </li>
                </ul>
                <p class="mb-0 fw-semibold fs-4 text-dark">
                  <span>52,589+</span> developers & agencies using our
                  templates
                </p>
              </div>
              <h2 class="text-center mb-0 fs-9 fw-bolder">
                Production Ready & Developer Friendly Bootstrap Admin Template
              </h2>
            </div>
          </div>
          <div class="domo-contect position-relative">
            <div class="demos-view mt-5 pt-lg-5">
              <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/demos/demo-main.jpg') }}" alt="modernize-img" class="img-fluid" />
                    <a target="_blank" href="/main/index"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">Main</h6>
                </div>
                <div class="col-sm-6 col-lg-4 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/demos/demo-dark.jpg') }}" alt="modernize-img" class="img-fluid" />
                    <a target="_blank" href="/dark/index2"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">Dark</h6>
                </div>
                <div class="col-sm-6 col-lg-4 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/demos/demo-horizontal.jpg') }}" alt="modernize-img" class="img-fluid" />
                    <a target="_blank" href="/horizontal/index3"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">Horizontal</h6>
                </div>
                <div class="col-sm-6 col-lg-4 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/demos/demo-minisidebar.jpg') }}" alt="modernize-img" class="img-fluid" />
                    <a target="_blank" href="/minisidebar/index4"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">Minisidebar</h6>
                </div>
                <div class="col-sm-6 col-lg-4 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/demos/demo-rtl.jpg') }}" alt="modernize-img" class="img-fluid" />
                    <a target="_blank" href="/rtl/index5"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">RTL</h6>
                </div>
              </div>
            </div>
            <div class="demos-view mt-4">
              <div class="badge text-bg-primary text-center mb-7 fs-4 py-6 px-4 d-table mx-auto rounded-pill">
                Apps
              </div>
              <div class="row justify-content-center">
                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/apps/app-calendar.jpg') }}" alt="modernize-img" class="img-fluid" />
                    <a target="_blank" href="/main/app-calendar"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">Calendar</h6>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/apps/app-chat.jpg') }}" alt="modernize-img" class="img-fluid" />
                    <a target="_blank" href="/main/app-chat"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">Chat</h6>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/apps/app-email.jpg') }}" alt="modernize-img" class="img-fluid" />
                    <a target="_blank" href="/main/app-email"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">Email</h6>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/apps/app-contact.jpg')}}" alt="modernize-img" class="img-fluid" />
                    <a target="_blank" href="/main/app-contact2"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">Contact</h6>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/apps/app-invoice.jpg') }}" alt="modernize-img" class="img-fluid" />
                    <a target="_blank" href="/main/app-invoice"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">Invoice</h6>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/apps/modernize-bt-app-contact-list.jpg') }}" alt="modernize-img"
                      class="img-fluid" />
                    <a target="_blank" href="/main/app-contact"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">Contact List</h6>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/apps/app-user-profile.jpg') }}" alt="modernize-img" class="img-fluid" />
                    <a target="_blank" href="/main/page-user-profile"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">User Profile</h6>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/apps/modernize-vue-app-blog.jpg') }}" alt="modernize-img" class="img-fluid" />
                    <a target="_blank" href="/main/blog-posts"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">Blog</h6>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/apps/modernize-vue-app-blog-detail.jpg') }}" alt="modernize-img"
                      class="img-fluid" />
                    <a target="_blank" href="/main/blog-detail"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">Blog Detail</h6>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/apps/modernize-vue-app-shop.jpg') }}" alt="modernize-img" class="img-fluid" />
                    <a target="_blank" href="/main/eco-shop"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">eCommerce Shop</h6>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/apps/app-ecommerce-detail.jpg') }}" alt="modernize-img" class="img-fluid" />
                    <a target="_blank" href="/main/eco-shop-detail"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">eCommerce Detail</h6>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                  <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                    <img src="{{ URL::asset('build/images/apps/app-ecommerce-list.jpg') }}" alt="modernize-img" class="img-fluid" />
                    <a target="_blank" href="/main/eco-product-list"
                      class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                      Preview</a>
                  </div>
                  <h6 class="mb-0 text-center fs-3">eCommerce List</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="text-bg-light py-5">
        <div class="py-md-5">
          <div class="container-fluid">
            <div class="row justify-content-center">
              <div class="col-lg-8 col-xxl-8">
                <h2 class="fs-9 text-center mb-5 fw-bolder">
                  Increase speed of your development and launch quickly with
                  Modernize
                </h2>
              </div>
            </div>
          </div>
          <div class="sliding-wrapper position-relative overflow-hidden">
            <div class="slide-background d-flex flex-row w-100">
              <div class="slide">
                <img src="{{ URL::asset('build/images/slider/slider-group.png') }}" alt="slide" height="100%" />
              </div>
              <div class="slide">
                <img src="{{ URL::asset('build/images/slider/slider-group.png') }}" alt="slide" height="100%" />
              </div>
              <div class="slide">
                <img src="{{ URL::asset('build/images/slider/slider-group.png') }}" alt="slide" height="100%" />
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="review-section pt-5">
        <div class="container pt-md-5">
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <h2 class="fs-9 text-center mb-4 mb-lg-5 fw-bolder" data-aos="fade-up" data-aos-delay="200"
                data-aos-duration="1000">
                Don’t just take our words for it, See what developers like you
                are saying
              </h2>
            </div>
          </div>
          <div class="review-slider" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
            <div class="owl-carousel owl-theme">
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-1.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                          <p class="mb-0 text-dark">Features availability</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 mb-0 text-dark">
                      The dashboard template from adminmart has helped me
                      provide a clean and sleek look to my dashboard and made
                      it look exactly the way I wanted it to, mainly without
                      having.
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-2.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">Minshan Cui</h6>
                          <p class="mb-0 text-dark">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 text-dark mb-0">
                      The quality of design is excellent, customizability and
                      flexibility much better than the other products
                      available in the market. I strongly recommend the
                      AdminMart to other buyers.
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-3.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">
                            Eminson Mendoza
                          </h6>
                          <p class="mb-0 fw-normal">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 text-dark mb-0">
                      This template is great, UI-rich and up-to-date. Although
                      it is pretty much complete, I suggest to improve a bit
                      of documentation. Thanks & Highly recomended!
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-1.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                          <p class="mb-0 text-dark">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 mb-0 text-dark">
                      The dashboard template from adminmart has helped me
                      provide a clean and sleek look to my dashboard and made
                      it look exactly the way I wanted it to, mainly without
                      having.
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-2.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">Minshan Cui</h6>
                          <p class="mb-0 text-dark">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 text-dark mb-0">
                      The quality of design is excellent, customizability and
                      flexibility much better than the other products
                      available in the market. I strongly recommend the
                      AdminMart to other buyers.
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-3.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">
                            Eminson Mendoza
                          </h6>
                          <p class="mb-0 fw-normal">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 text-dark mb-0">
                      This template is great, UI-rich and up-to-date. Although
                      it is pretty much complete, I suggest to improve a bit
                      of documentation. Thanks & Highly recomended!
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-1.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                          <p class="mb-0 text-dark">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 mb-0 text-dark">
                      The dashboard template from adminmart has helped me
                      provide a clean and sleek look to my dashboard and made
                      it look exactly the way I wanted it to, mainly without
                      having.
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-2.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">Minshan Cui</h6>
                          <p class="mb-0 text-dark">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 text-dark mb-0">
                      The quality of design is excellent, customizability and
                      flexibility much better than the other products
                      available in the market. I strongly recommend the
                      AdminMart to other buyers.
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-3.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">
                            Eminson Mendoza
                          </h6>
                          <p class="mb-0 fw-normal">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 text-dark mb-0">
                      This template is great, UI-rich and up-to-date. Although
                      it is pretty much complete, I suggest to improve a bit
                      of documentation. Thanks & Highly recomended!
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-1.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                          <p class="mb-0 text-dark">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 mb-0 text-dark">
                      The dashboard template from adminmart has helped me
                      provide a clean and sleek look to my dashboard and made
                      it look exactly the way I wanted it to, mainly without
                      having.
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-2.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">Minshan Cui</h6>
                          <p class="mb-0 text-dark">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 text-dark mb-0">
                      The quality of design is excellent, customizability and
                      flexibility much better than the other products
                      available in the market. I strongly recommend the
                      AdminMart to other buyers.
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-3.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">
                            Eminson Mendoza
                          </h6>
                          <p class="mb-0 fw-normal">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 text-dark mb-0">
                      This template is great, UI-rich and up-to-date. Although
                      it is pretty much complete, I suggest to improve a bit
                      of documentation. Thanks & Highly recomended!
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-1.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                          <p class="mb-0 text-dark">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 mb-0 text-dark">
                      The dashboard template from adminmart has helped me
                      provide a clean and sleek look to my dashboard and made
                      it look exactly the way I wanted it to, mainly without
                      having.
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-2.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">Minshan Cui</h6>
                          <p class="mb-0 text-dark">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 text-dark mb-0">
                      The quality of design is excellent, customizability and
                      flexibility much better than the other products
                      available in the market. I strongly recommend the
                      AdminMart to other buyers.
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-3.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">
                            Eminson Mendoza
                          </h6>
                          <p class="mb-0 fw-normal">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 text-dark mb-0">
                      This template is great, UI-rich and up-to-date. Although
                      it is pretty much complete, I suggest to improve a bit
                      of documentation. Thanks & Highly recomended!
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-1.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                          <p class="mb-0 text-dark">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 mb-0 text-dark">
                      The dashboard template from adminmart has helped me
                      provide a clean and sleek look to my dashboard and made
                      it look exactly the way I wanted it to, mainly without
                      having.
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-2.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">Minshan Cui</h6>
                          <p class="mb-0 text-dark">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 text-dark mb-0">
                      The quality of design is excellent, customizability and
                      flexibility much better than the other products
                      available in the market. I strongly recommend the
                      AdminMart to other buyers.
                    </p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="card">
                  <div class="card-body p-4">
                    <div class="d-flex justify-content-between mb-4">
                      <div class="d-flex align-items-center">
                        <img src="{{ URL::asset('build/images/user-3.jpg') }}" alt="modernize-img" class="w-auto me-3 rounded-circle"
                          width="40" height="40" />
                        <div>
                          <h6 class="fs-4 mb-1 fw-semibold">
                            Eminson Mendoza
                          </h6>
                          <p class="mb-0 fw-normal">Features avaibility</p>
                        </div>
                      </div>
                      <div>
                        <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                          <li>
                            <a href="">
                              <img src="{{ URL::asset('build/images/icon-star.svg') }}" alt="modernize-img" class="img-fluid" />
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <p class="fs-4 text-dark mb-0">
                      This template is great, UI-rich and up-to-date. Although
                      it is pretty much complete, I suggest to improve a bit
                      of documentation. Thanks & Highly recomended!
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="features-section py-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="text-center" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                <small class="text-primary fw-bold mb-2 d-block fs-3">ALMOST COVERED EVERYTHING</small>
                <h2 class="fs-9 text-center mb-4 mb-lg-5 fw-bolder">
                  Other Amazing Features & Flexibility Provided
                </h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
              <div class="text-center mb-5">
                <i class="d-block ti ti-wand text-primary fs-10"></i>
                <h5 class="fs-5 fw-semibold mt-8">6 Theme Colors</h5>
                <p class="mb-0 text-dark">
                  We have included 6 pre-defined Theme Colors with Modernize
                  Admin.
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
              <div class="text-center mb-5">
                <i class="d-block ti ti-layout-sidebar text-primary fs-10"></i>
                <h5 class="fs-5 fw-semibold mt-8">Dark & Light Sidebar</h5>
                <p class="mb-0 text-dark">
                  Included Dark and Light Sidebar for getting desire look and
                  feel.
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
              <div class="text-center mb-5">
                <i class="d-block ti ti-archive text-primary fs-10"></i>
                <h5 class="fs-5 fw-semibold mt-8">425+ Page Templates</h5>
                <p class="mb-0 text-dark">
                  Yes, we have 5 demos & 79+ Pages per demo to make it easier.
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
              <div class="text-center mb-5">
                <i class="d-block ti ti-adjustments text-primary fs-10"></i>
                <h5 class="fs-5 fw-semibold mt-8">150+ UI Components</h5>
                <p class="mb-0 text-dark">
                  Almost 150+ UI Components being given with Modernize Admin
                  Pack.
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1000">
              <div class="text-center mb-5">
                <i class="d-block ti ti-tag text-primary fs-10"></i>
                <h5 class="fs-5 fw-semibold mt-8">Bootstrap 5x</h5>
                <p class="mb-0 text-dark">
                  Its been made with Bootstrap 5 and full responsive layout.
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1000">
              <div class="text-center mb-5">
                <i class="d-block ti ti-diamond text-primary fs-10"></i>
                <h5 class="fs-5 fw-semibold mt-8">200+ Font Icons</h5>
                <p class="mb-0 text-dark">
                  Lots of Icon Fonts are included here in the package of
                  Modernize Admin.
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1000">
              <div class="text-center mb-5">
                <i class="d-block ti ti-device-desktop text-primary fs-10"></i>
                <h5 class="fs-5 fw-semibold mt-8">Fully Responsive</h5>
                <p class="mb-0 text-dark">
                  All the layout of Modernize Admin is Fully Responsive and
                  widely tested.
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1000">
              <div class="text-center mb-5">
                <i class="d-block ti ti-database text-primary fs-10"></i>
                <h5 class="fs-5 fw-semibold mt-8">SassBase CSS</h5>
                <p class="mb-0 text-dark">
                  Our Css is written Sass Base to make your life easier.
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1200" data-aos-duration="1000">
              <div class="text-center mb-5">
                <i class="d-block ti ti-arrows-shuffle text-primary fs-10"></i>
                <h5 class="fs-5 fw-semibold mt-8">Easy to Customize</h5>
                <p class="mb-0 text-dark">
                  Customization will be easy as we understand your pain.
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1200" data-aos-duration="1000">
              <div class="text-center mb-5">
                <i class="d-block ti ti-chart-pie text-primary fs-10"></i>
                <h5 class="fs-5 fw-semibold mt-8">Lots of Chart Options</h5>
                <p class="mb-0 text-dark">
                  You name it and we have it, Yes lots of variations for
                  Charts.
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1200" data-aos-duration="1000">
              <div class="text-center mb-5">
                <i class="d-block ti ti-layers-intersect text-primary fs-10"></i>
                <h5 class="fs-5 fw-semibold mt-8">Lots of Table Examples</h5>
                <p class="mb-0 text-dark">
                  Data Tables are initial requirement and we added them.
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1200" data-aos-duration="1000">
              <div class="text-center mb-5">
                <i class="d-block ti ti-refresh text-primary fs-10"></i>
                <h5 class="fs-5 fw-semibold mt-8">Regular Updates</h5>
                <p class="mb-0 text-dark">
                  We are constantly updating our pack with new features.
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1400" data-aos-duration="1000">
              <div class="text-center mb-5">
                <i class="d-block ti ti-book text-primary fs-10"></i>
                <h5 class="fs-5 fw-semibold mt-8">Detailed Documentation</h5>
                <p class="mb-0 text-dark">
                  We have made detailed documentation, so it will easy to use.
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1400" data-aos-duration="1000">
              <div class="text-center mb-5">
                <i class="d-block ti ti-calendar text-primary fs-10"></i>
                <h5 class="fs-5 fw-semibold mt-8">Calendar Design</h5>
                <p class="mb-0 text-dark">
                  Calendar is available with our package & in nice design.
                </p>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1400" data-aos-duration="1000">
              <div class="text-center mb-5">
                <i class="d-block ti ti-brand-wechat text-primary fs-10"></i>
                <h5 class="fs-5 fw-semibold mt-8">Dedicated Support</h5>
                <p class="mb-0 text-dark">
                  We believe in supreme support is key and we offer that.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="py-md-5 mb-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="card c2a-box" data-aos="fade-up" data-aos-delay="1600" data-aos-duration="1000">
                <div class="card-body text-center p-4 pt-7">
                  <h3 class="fs-7 fw-semibold pt-6">
                    Haven't found an answer to your question?
                  </h3>
                  <p class="mb-7 pb-2 text-dark">
                    Connect with us either on discord or email us
                  </p>
                  <div class="d-sm-flex align-items-center justify-content-center gap-3 mb-4">
                    <a href="https://discord.com/invite/eMzE8F6Wqs" target="_blank"
                      class="btn btn-primary d-block mb-3 mb-sm-0 btn-hover-shadow px-7 py-6" type="button">Ask on
                      Discord</a>
                    <a href="https://adminmart.com/support" target="_blank"
                      class="btn btn-outline-secondary d-block px-7 py-6" type="button">Submit Ticket</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="bg-primary pt-5 pb-8">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-lg-7 col-xl-5 pt-lg-5 mb-5 mb-lg-0">
              <h2 class="fs-9 text-white text-center text-lg-start fw-bolder mb-7">
                Build your app with our highly customizable Bootstrap based
                Dashboard
              </h2>
              <div class="d-sm-flex align-items-center justify-content-center justify-content-lg-start gap-3">
                <a href="/main/authentication-login"
                  class="btn bg-white text-primary fw-semibold d-block mb-3 mb-sm-0 btn-hover-shadow px-7 py-6">Login</a>
                <a href="/main/authentication-register"
                  class="btn border-white text-white fw-semibold btn-hover-white d-block px-7 py-6">Register</a>
              </div>
            </div>
            <div class="col-lg-5 col-xl-5">
              <div class="text-center text-lg-end">
                <img src="{{ URL::asset('build/images/backgrounds/business-woman-checking-her-mail.png') }}" alt="modernize-img"
                  class="img-fluid" />
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <footer class="footer-part pt-7 pb-5">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="text-center">
              <a href="index-new">
                <img src="{{ URL::asset('build/images/logos/favicon.ico') }}" alt="modernize-img" class="img-fluid pb-3" />
              </a>
              <p class="mb-0 text-dark">
                All rights reserved by Modernize. Designed & Developed by
                <a class="text-dark text-hover-primary border-bottom border-primary"
                  href="https://adminmart.com/">AdminMart.</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <div class="offcanvas offcanvas-start modernize-lp-offcanvas" tabindex="-1" id="offcanvasNavbar"
      aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header p-4">
        <img src="{{ URL::asset('build/images/logos/dark-logo.svg') }}" alt="modernize-img" class="img-fluid" width="150" />
      </div>
      <div class="offcanvas-body p-4">
        <ul class="navbar-nav justify-content-end flex-grow-1">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-between fs-3 text-dark"
              href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Demos <i class="ti ti-chevron-down fs-14"></i></a>
            <ul class="dropdown-menu ps-2">
              <li>
                <a class="dropdown-item text-dark" href="./index">Dark</a>
              </li>
              <li>
                <a class="dropdown-item text-dark" href="./index">Horizontal</a>
              </li>
              <li>
                <a class="dropdown-item text-dark" href="./index">LTR</a>
              </li>
              <li>
                <a class="dropdown-item text-dark" href="./index">Minisidebar</a>
              </li>
              <li>
                <a class="dropdown-item text-dark" href="./index">RTL</a>
              </li>
            </ul>
          </li>
          <li class="nav-item mt-3 dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-between fs-3 text-dark"
              href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Pages <i class="ti ti-chevron-down fs-14"></i></a>
            <div class="dropdown-menu mt-3 ps-1">
              <!-- apps -->
              <div class="row">
                <div class="col-12">
                  <div class="position-relative">
                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                      <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{ URL::asset('build/images/svgs/icon-dd-chat.svg') }}') }}" alt="modernize-img" class="img-fluid" width="24"
                          height="24" />
                      </div>
                      <div>
                        <h6 class="mb-1 fw-semibold text-hover-primary">
                          Chat Application
                        </h6>
                        <span class="fs-2 d-block text-muted">New messages arrived</span>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                      <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{ URL::asset('build/images/svgs/icon-dd-invoice.svg') }}') }}" alt="modernize-img" class="img-fluid" width="24"
                          height="24" />
                      </div>
                      <div>
                        <h6 class="mb-1 fw-semibold text-hover-primary">
                          Invoice App
                        </h6>
                        <span class="fs-2 d-block text-muted">Get latest invoice</span>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                      <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{ URL::asset('build/images/svgs/icon-dd-mobile.svg') }}') }}" alt="modernize-img" class="img-fluid" width="24"
                          height="24" />
                      </div>
                      <div>
                        <h6 class="mb-1 fw-semibold text-hover-primary">
                          Contact Application
                        </h6>
                        <span class="fs-2 d-block text-muted">2 Unsaved Contacts</span>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                      <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{ URL::asset('build/images/svgs/icon-dd-message-box.svg') }}') }}" alt="modernize-img" class="img-fluid"
                          width="24" height="24" />
                      </div>
                      <div>
                        <h6 class="mb-1 fw-semibold text-hover-primary">
                          Email App
                        </h6>
                        <span class="fs-2 d-block text-muted">Get new emails</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-12">
                  <div class="position-relative">
                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                      <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{ URL::asset('build/images/icon-dd-cart.svg') }}" alt="modernize-img" class="img-fluid" width="24"
                          height="24" />
                      </div>
                      <div>
                        <h6 class="mb-1 fw-semibold text-hover-primary">
                          User Profile
                        </h6>
                        <span class="fs-2 d-block text-muted">learn more information</span>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                      <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{ URL::asset('build/images/icon-dd-date.svg') }}" alt="modernize-img" class="img-fluid" width="24"
                          height="24" />
                      </div>
                      <div>
                        <h6 class="mb-1 fw-semibold text-hover-primary">
                          Calendar App
                        </h6>
                        <span class="fs-2 d-block text-muted">Get dates</span>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                      <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{ URL::asset('build/images/icon-dd-lifebuoy.svg') }}" alt="modernize-img" class="img-fluid" width="24"
                          height="24" />
                      </div>
                      <div>
                        <h6 class="mb-1 fw-semibold text-hover-primary">
                          Contact List Table
                        </h6>
                        <span class="fs-2 d-block text-muted">Add new contact</span>
                      </div>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                      <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                        <img src="{{ URL::asset('build/images/icon-dd-application.svg') }}" alt="modernize-img" class="img-fluid"
                          width="24" height="24" />
                      </div>
                      <div>
                        <h6 class="mb-1 fw-semibold text-hover-primary">
                          Notes Application
                        </h6>
                        <span class="fs-2 d-block text-muted">To-do and Daily tasks</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="col-12">
                  <!-- quick links -->
                  <h5 class="fs-5 mb-7 fw-semibold">Quick Links</h5>
                  <ul class="list-unstyled px-1">
                    <li class="mb-3">
                      <a class="fw-semibold text-dark text-hover-primary" href="javascript:void(0)">Pricing Page</a>
                    </li>
                    <li class="mb-3">
                      <a class="fw-semibold text-dark text-hover-primary" href="javascript:void(0)">Authentication
                        Design</a>
                    </li>
                    <li class="mb-3">
                      <a class="fw-semibold text-dark text-hover-primary" href="javascript:void(0)">Register Now</a>
                    </li>
                    <li class="mb-3">
                      <a class="fw-semibold text-dark text-hover-primary" href="javascript:void(0)">404 Error Page</a>
                    </li>
                    <li class="mb-3">
                      <a class="fw-semibold text-dark text-hover-primary" href="javascript:void(0)">Notes App</a>
                    </li>
                    <li class="mb-3">
                      <a class="fw-semibold text-dark text-hover-primary" href="javascript:void(0)">User Application</a>
                    </li>
                    <li class="mb-3">
                      <a class="fw-semibold text-dark text-hover-primary" href="javascript:void(0)">Account Settings</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item mt-3">
            <a class="nav-link fs-3 text-dark active" aria-current="page" href="../docs/index">Documentation</a>
          </li>
          <li class="nav-item mt-3">
            <a class="nav-link fs-3 text-dark" href="javascript:void(0)">Pages</a>
          </li>
        </ul>
        <form class="d-flex mt-3" role="search">
          <a href="/main/authentication-login" class="btn btn-primary w-100 py-2">Login</a>
        </form>
      </div>
    </div>
  </div>
  <div class="dark-transparent sidebartoggler"></div>
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  @@include("../main/partials/scripts2")
  <script src="{{ URL::asset('build/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/aos/dist/aos.js') }}"></script>
  <script src="{{ URL::asset('build/js/landingpage/landingpage.js') }}"></script>
</body>

</html>