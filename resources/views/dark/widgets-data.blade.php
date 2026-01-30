<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  @@include("partials/head.html")
  <title>Modernize Bootstrap Admin</title>
</head>

<body class="link-sidebar">
  <!-- Preloader -->
  <div class="preloader">
    <img src="{{ URL::asset('build/images/logos/favicon.png') }}" alt="loader" class="lds-ripple img-fluid" />
  </div>
  <div id="main-wrapper">
    <!-- Sidebar Start -->
    <aside class="left-sidebar with-vertical">
      <div>@@include("partials/sidebar.html", { "page": "dashboard", })</div>
    </aside>
    <!--  Sidebar End -->
    <div class="page-wrapper">
      <!--  Header Start -->
      <header class="topbar">
        <div class="with-vertical">@@include("partials/header.html")</div>
        <div class="app-header with-horizontal">
          @@include("partials/horizontal-header.html")
        </div>
      </header>
      <!--  Header End -->
      
      <aside class="left-sidebar with-horizontal">
        @@include("partials/horizontal-sidebar.html", { "page": "dashboard",
        })
      </aside>

      <div class="body-wrapper">
        <div class="container-fluid">
          @@include("partials/breadcrumb.html", {"title": "Widgets-Data", "subtitle": 'Home'})
          <div class="row">
            <div class="col-lg-4 col-md-6">
              <div class="card">
                
                <div class="card-body">
                  <div class="row">
                    <div class="col-3">
                      <div
                        class="bg-warning-subtle text-warning rounded d-flex align-items-center p-8 justify-content-center">
                        <i class="ti ti-basket fs-8"></i>
                      </div>
                    </div>
                    <div class="col-9 d-flex align-items-center justify-content-end text-end">
                      <div>
                        <h4 class="card-title">+259</h4>
                        <h6 class="card-subtitle mb-0">Sales Change</h6>
                      </div>
                    </div>
                  </div>
                  <div class="progress mt-3 text-bg-light">
                    <div class="progress-bar text-bg-warning" role="progressbar" style="width: 26%; height: 6px;"
                      aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card">
                
                <div class="card-body">
                  <div class="row">
                    <div class="col-3">
                      <div
                        class="bg-primary-subtle text-primary rounded d-flex align-items-center p-8 justify-content-center">
                        <i class="ti ti-chart-pie fs-8"></i>
                      </div>
                    </div>
                    <div class="col-9 d-flex align-items-center justify-content-end text-end">
                      <div>
                        <h4 class="card-title">750$</h4>
                        <h6 class="card-subtitle mb-0">Weekly Income</h6>
                      </div>
                    </div>
                  </div>
                  <div class="progress mt-3 text-bg-light">
                    <div class="progress-bar text-bg-primary" role="progressbar" style="width: 26%; height: 6px;"
                      aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card">
                
                <div class="card-body">
                  <div class="row">
                    <div class="col-3">
                      <div
                        class="bg-danger-subtle text-danger rounded d-flex align-items-center p-8 justify-content-center">
                        <i class="ti ti-user-plus fs-8"></i>
                      </div>
                    </div>
                    <div class="col-9 d-flex align-items-center justify-content-end text-end">
                      <div>
                        <h4 class="card-title">+6.5K</h4>
                        <h6 class="card-subtitle mb-0">New Users</h6>
                      </div>
                    </div>
                  </div>
                  <div class="progress mt-3 text-bg-light">
                    <div class="progress-bar text-bg-danger" role="progressbar" style="width: 26%; height: 6px;"
                      aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card">
                
                <div class="card-body">
                  <div class="row">
                    <div class="col-3">
                      <div
                        class="bg-success-subtle text-success rounded d-flex align-items-center p-8 justify-content-center">
                        <i class="ti ti-bell fs-8"></i>
                      </div>
                    </div>
                    <div class="col-9 d-flex align-items-center justify-content-end text-end">
                      <div>
                        <h4 class="card-title">156</h4>
                        <h6 class="card-subtitle mb-0">
                          New Notifications
                        </h6>
                      </div>
                    </div>
                  </div>
                  <div class="progress mt-3 text-bg-light">
                    <div class="progress-bar text-bg-success" role="progressbar" style="width: 26%; height: 6px;"
                      aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card">
                
                <div class="card-body">
                  <div class="row">
                    <div class="col-3">
                      <div
                        class="bg-info-subtle text-info rounded d-flex align-items-center p-8 justify-content-center">
                        <i class="ti ti-brand-messenger fs-8"></i>
                      </div>
                    </div>
                    <div class="col-9 d-flex align-items-center justify-content-end text-end">
                      <div>
                        <h4 class="card-title">15+</h4>
                        <h6 class="card-subtitle mb-0">Latest Messages</h6>
                      </div>
                    </div>
                  </div>
                  <div class="progress mt-3 text-bg-light">
                    <div class="progress-bar text-bg-info" role="progressbar" style="width: 26%; height: 6px;"
                      aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card">
                
                <div class="card-body">
                  <div class="row">
                    <div class="col-3">
                      <div
                        class="bg-secondary-subtle text-secondary rounded d-flex align-items-center p-8 justify-content-center">
                        <i class="ti ti-brand-drops fs-8"></i>
                      </div>
                    </div>
                    <div class="col-9 d-flex align-items-center justify-content-end text-end">
                      <div>
                        <h4 class="card-title">1500</h4>
                        <h6 class="card-subtitle mb-0">
                          Wainting for downloads
                        </h6>
                      </div>
                    </div>
                  </div>
                  <div class="progress mt-3 text-bg-light">
                    <div class="progress-bar text-bg-secondary" role="progressbar" style="width: 26%; height: 6px;"
                      aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="p-4 d-flex align-items-stretch h-100">
                  <div class="row">
                    <div class="col-4 col-md-3 d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/products/s1.jpg') }}" class="rounded img-fluid" />
                    </div>
                    <div class="col-8 col-md-9 d-flex align-items-center">
                      <div>
                        <a href="javascript:void(0)" class="card-title link-primary fw-semibold text-dark">50% sell on
                          wrist
                          watch</a>
                        <p class="card-subtitle mt-1">
                          By Daniel Jubile
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="p-4 d-flex align-items-stretch h-100">
                  <div class="row">
                    <div class="col-4 col-md-3 d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/products/s2.jpg') }}" class="rounded img-fluid" />
                    </div>
                    <div class="col-8 col-md-9 d-flex align-items-center">
                      <div>
                        <a href="javascript:void(0)" class="card-title link-primary fw-semibold text-dark">Small Cabin
                          Luggage
                        </a>
                        <p class="card-subtitle mt-1">
                          By John Smith
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="p-4 d-flex align-items-stretch h-100">
                  <div class="row">
                    <div class="col-4 col-md-3 d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/products/s3.jpg') }}" class="rounded img-fluid" />
                    </div>
                    <div class="col-8 col-md-9 d-flex align-items-center">
                      <div>
                        <a href="javascript:void(0)" class="card-title link-primary fw-semibold text-dark">Women Heels
                          Sandal</a>
                        <p class="card-subtitle mt-1">
                          By Nancy Deo
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="p-4 d-flex align-items-stretch h-100">
                  <div class="row">
                    <div class="col-4 col-md-3 d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/products/s4.jpg') }}" class="rounded img-fluid" />
                    </div>
                    <div class="col-8 col-md-9 d-flex align-items-center">
                      <div>
                        <a href="javascript:void(0)" class="card-title link-primary fw-semibold text-dark">Boat
                          Wireless Headset </a>
                        <p class="card-subtitle mt-1">
                          Yellow , On the Ear
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="p-4 d-flex align-items-stretch h-100">
                  <div class="row">
                    <div class="col-4 col-md-3 d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/products/s5.jpg') }}" class="rounded img-fluid" />
                    </div>
                    <div class="col-8 col-md-9 d-flex align-items-center">
                      <div>
                        <a href="javascript:void(0)" class="card-title link-primary fw-semibold text-dark">Beauty
                          Blender
                          blender</a>
                        <p class="card-subtitle mt-1">
                          By Nancy Deo
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="p-4 d-flex align-items-stretch h-100">
                  <div class="row">
                    <div class="col-4 col-md-3 d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/products/s6.jpg') }}" class="rounded img-fluid" />
                    </div>
                    <div class="col-8 col-md-9 d-flex align-items-center">
                      <div>
                        <a href="javascript:void(0)" class="card-title link-primary fw-semibold text-dark">Canvas Shoes
                          For
                          Men</a>
                        <p class="card-subtitle mt-1">
                          Absolute Comfort
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row align-items-center">
                    <div
                      class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-success">
                      <i class="ti ti-credit-card fs-6"></i>
                    </div>
                    <div class="ms-3 align-self-center">
                      <h3 class="mb-0 fs-6">$18090</h3>
                      <span class="text-muted">Income</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row align-items-center">
                    <div
                      class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-info">
                      <i class="ti ti-users fs-6"></i>
                    </div>
                    <div class="ms-3 align-self-center">
                      <h3 class="mb-0 fs-6">2690</h3>
                      <span class="text-muted">Users</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row align-items-center">
                    <div
                      class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-danger">
                      <i class="ti ti-calendar fs-6"></i>
                    </div>
                    <div class="ms-3 align-self-center">
                      <h3 class="mb-0 fs-6">20 march</h3>
                      <span class="text-muted">My birthday</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row align-items-center">
                    <div
                      class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-success">
                      <i class="ti ti-settings fs-6"></i>
                    </div>
                    <div class="ms-3 align-self-center">
                      <h3 class="mb-0 fs-6">6540</h3>
                      <span class="text-muted">Manage notifications</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-3">
                    <div>
                      <h4 class="card-title">86%</h4>
                      <p class="card-subtitle mb-1">Total Product</p>
                    </div>
                    <div class="ms-auto">
                      <span class="text-success display-6"><i class="ti ti-box"></i></span>
                    </div>
                  </div>
                  <div class="progress text-bg-light">
                    <div class="progress-bar text-bg-success" role="progressbar" style="width: 85%; height: 6px;"
                      aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-3">
                    <div>
                      <h4 class="card-title">40%</h4>
                      <p class="card-subtitle mb-1">Pending Product</p>
                    </div>
                    <div class="ms-auto">
                      <span class="text-info display-6"><i class="ti ti-cast"></i></span>
                    </div>
                  </div>
                  <div class="progress text-bg-light">
                    <div class="progress-bar text-bg-info" role="progressbar" style="width: 40%; height: 6px;"
                      aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="d-flex align-items-center mb-3">
                        <div>
                          <h4 class="card-title">56%</h4>
                          <p class="card-subtitle mb-1">Selling</p>
                        </div>
                        <div class="ms-auto">
                          <span class="text-primary display-6"><i class="ti ti-clipboard"></i></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="progress text-bg-light">
                        <div class="progress-bar text-bg-primary" role="progressbar" style="width: 56%; height: 6px;"
                          aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <div class="d-flex align-items-center mb-3">
                        <div>
                          <h4 class="card-title">26%</h4>
                          <p class="card-subtitle mb-1">Buying</p>
                        </div>
                        <div class="ms-auto">
                          <span class="text-danger display-6"><i class="ti ti-copy"></i></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="progress text-bg-light">
                        <div class="progress-bar text-bg-danger" role="progressbar" style="width: 26%; height: 6px;"
                          aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <img class="card-img-top img-responsive" src="{{ URL::asset('build/images/blog/blog-img4.jpg') }}"
                  alt="Card image cap" />
                <div class="card-body">
                  <div class="d-flex align-items-center mb-3">
                    <span class="d-flex align-items-center"><i class="ti ti-calendar me-1 fs-5"></i> 20 May
                      2024</span>
                    <div class="ms-auto">
                      <a href="javascript:void(0)" class="d-flex align-items-center"><i
                          class="ti ti-message-circle me-1 fs-5"></i> 3 Comments</a>
                    </div>
                  </div>
                  <h4 class="card-title">
                    Featured Hydroflora Pots Garden &amp; Outdoors
                  </h4>
                  <p class="mb-0 card-subtitle">
                    Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.
                  </p>
                  <div class="text-end">
                    <button class="btn btn-primary mt-3">
                      Read more
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <img class="card-img-top img-responsive" src="{{ URL::asset('build/images/blog/blog-img5.jpg') }}"
                  alt="Card image cap" />
                <div class="card-body">
                  <div class="d-flex  align-items-center mb-3">
                    <span class="d-flex align-items-center"><i class="ti ti-calendar me-1 fs-5"></i> 19 May
                      2024</span>
                    <div class="ms-auto">
                      <a href="javascript:void(0)" class="d-flex align-items-center"><i
                          class="ti ti-message-circle me-1 fs-5"></i> 16 Comments</a>
                    </div>
                  </div>
                  <h4 class="card-title">
                    Featured Hydroflora Pots Garden &amp; Outdoors
                  </h4>
                  <p class="mb-0 card-subtitle">
                    Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.
                  </p>
                  <div class="text-end">
                    <button class="btn btn-primary mt-3">
                      Read more
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <img class="card-img-top img-responsive" src="{{ URL::asset('build/images/blog/blog-img6.jpg') }}"
                  alt="Card image cap" />
                <div class="card-body">
                  <div class="d-flex  align-items-center mb-3">
                    <span class="d-flex align-items-center"><i class="ti ti-calendar me-1 fs-5"></i> 19 May
                      2024</span>
                    <div class="ms-auto">
                      <a href="javascript:void(0)" class="d-flex align-items-center"><i
                          class="ti ti-message-circle me-1 fs-5"></i> 16 Comments</a>
                    </div>
                  </div>
                  <h4 class="card-title">
                    Featured Hydroflora Pots Garden &amp; Outdoors
                  </h4>
                  <p class="mb-0 card-subtitle">
                    Titudin venenatis ipsum ac feugiat. Vestibulum ullamcorper quam.
                  </p>
                  <div class="text-end">
                    <button class="btn btn-primary mt-3">
                      Read more
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <h3 class="fs-6">26%</h3>
                      <h6 class="card-subtitle mb-2 text-muted">Total Product</h6>
                    </div>
                    <div class="col-12">
                      <div class="progress text-bg-light">
                        <div class="progress-bar text-bg-success" role="progressbar" style="width: 85%; height: 6px;"
                          aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <h3 class="fs-6">60%</h3>
                      <h6 class="card-subtitle mb-2 text-muted">Pending Product</h6>
                    </div>
                    <div class="col-12">
                      <div class="progress text-bg-light">
                        <div class="progress-bar text-bg-info" role="progressbar" style="width: 40%; height: 6px;"
                          aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <h3 class="fs-6">63%</h3>
                      <h6 class="card-subtitle mb-2 text-muted">Selling Products</h6>
                    </div>
                    <div class="col-12">
                      <div class="progress text-bg-light">
                        <div class="progress-bar text-bg-danger" role="progressbar" style="width: 56%; height: 6px;"
                          aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <h3 class="fs-6">29%</h3>
                      <h6 class="card-subtitle text-muted mb-2">Buying Products</h6>
                    </div>
                    <div class="col-12">
                      <div class="progress text-bg-light">
                        <div class="progress-bar text-bg-dark" role="progressbar" style="width: 26%; height: 6px;"
                          aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="position-relative">
                  <img class="card-img-top" src="{{ URL::asset('build/images/backgrounds/profilebg.jpg') }}" alt="Card image cap"
                    style="max-height: 450px">
                  <div class="card-img-overlay p-4">
                    <div class="text-white mt-3">
                      <span>
                        <iconify-icon icon="solar:cloud-sun-bold-duotone" class="display-4"></iconify-icon>
                      </span>
                      <div class="mb-2 mt-4">
                        <span class="display-6">20°
                          <span class="fs-6">C</span>
                        </span>
                        <span class="fs-6">/</span>
                        <span class="fs-6">7°
                          <span>C</span>
                        </span>
                      </div>
                      <p class="fs-3 mb-0 opacity-75">THURSDAY 01.08.2018</p>
                    </div>
                  </div>
                </div>

                <div class="card-footer text-bg-white">
                  <div class="row">
                    <div class="col-12">
                      <div class="row text-center">
                        <div class="col-6 col-md-2 border-end">
                          <div class="mb-2">TUE</div>
                          <i class="ti ti-cloud fs-9 mb-2"></i>
                          <div>
                            24°
                            <span>C</span>
                          </div>
                        </div>
                        <div class="col-6 col-md-2 border-end">
                          <div class="mb-2">WED</div>
                          <i class="ti ti-cloud fs-9 mb-2"></i>
                          <div>
                            21°
                            <span>C</span>
                          </div>
                        </div>
                        <div class="col-6 col-md-2 border-end">
                          <div class="mb-2">THU</div>
                          <i class="ti ti-sun-high fs-9 mb-2"></i>
                          <div>
                            25°
                            <span>C</span>
                          </div>
                        </div>
                        <div class="col-6 col-md-2 border-end">
                          <div class="mb-2">FRI</div>
                          <i class="ti ti-cloud-fog fs-9 mb-2"></i>
                          <div>
                            20°
                            <span>C</span>
                          </div>
                        </div>
                        <div class="col-6 col-md-2 border-end">
                          <div class="mb-2">SAT</div>
                          <i class="ti ti-cloud-storm fs-9 mb-2"></i>
                          <div>
                            18°
                            <span>C</span>
                          </div>
                        </div>
                        <div class="col-6 col-md-2">
                          <div class="mb-2">SUN</div>
                          <i class="ti ti-cloud-rain fs-9 mb-2"></i>
                          <div>
                            14°
                            <span>C</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-bottom border-info">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div>
                      <h4 class="card-title fs-7">120</h4>
                      <p class="card-subtitle text-info">News Feed</p>
                    </div>
                    <div class="ms-auto">
                      <span class="text-info display-6"><i class="ti ti-file-text"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-bottom border-primary">
                <div class="card-body">
                  <div class="d-flex  align-items-center">
                    <div>
                      <h4 class="card-title fs-7">150</h4>
                      <p class="card-subtitle text-primary">Invoices</p>
                    </div>
                    <div class="ms-auto">
                      <span class="text-primary display-6"><i class="ti ti-clipboard"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-bottom border-success">
                <div class="card-body">
                  <div class="d-flex  align-items-center">
                    <div>
                      <h4 class="card-title fs-7">450</h4>
                      <p class="card-subtitle text-success">Revenue</p>
                    </div>
                    <div class="ms-auto">
                      <span class="text-success display-6"><i class="ti ti-credit-card"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-bottom border-danger">
                <div class="card-body">
                  <div class="d-flex  align-items-center">
                    <div>
                      <h4 class="card-title fs-7">100</h4>
                      <p class="card-subtitle text-danger">Sales</p>
                    </div>
                    <div class="ms-auto">
                      <span class="text-danger display-6"><i class="ti ti-chart-pie"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-start border-danger">
                <div class="card-body">
                  <div class="d-flex  align-items-center">
                    <div>
                      <span class="text-danger display-6"><i class="ti ti-users"></i></span>
                    </div>
                    <div class="ms-auto">
                      <h4 class="card-title fs-7">290</h4>
                      <p class="card-subtitle text-danger">New Customers</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-start border-info">
                <div class="card-body">
                  <div class="d-flex  align-items-center">
                    <div>
                      <span class="text-info display-6"><i class="ti ti-message-circle"></i></span>
                    </div>
                    <div class="ms-auto">
                      <h4 class="card-title fs-7">120</h4>
                      <p class="card-subtitle text-info">New Messages</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-start border-primary">
                <div class="card-body">
                  <div class="d-flex  align-items-center">
                    <div>
                      <span class="text-primary display-6"><i class="ti ti-bell"></i></span>
                    </div>
                    <div class="ms-auto">
                      <h4 class="card-title fs-7">600</h4>
                      <p class="card-subtitle text-primary">New Notification</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-start border-success">
                <div class="card-body">
                  <div class="d-flex  align-items-center">
                    <div>
                      <span class="text-success display-6"><i class="ti ti-briefcase"></i></span>
                    </div>
                    <div class="ms-auto">
                      <h4 class="card-title fs-7">270</h4>
                      <p class="card-subtitle text-success">New Projects</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-top border-success">
                <div class="card-body">
                  <div class="d-flex  align-items-center">
                    <div>
                      <h4 class="card-title fs-7">120</h4>
                      <p class="card-subtitle text-success">Top Locations</p>
                    </div>
                    <div class="ms-auto">
                      <span class="text-success display-6"><i class="ti ti-map"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-top border-dark">
                <div class="card-body">
                  <div class="d-flex  align-items-center">
                    <div>
                      <h4 class="card-title fs-7">201</h4>
                      <p class="card-subtitle text-dark">Top Activity Pages</p>
                    </div>
                    <div class="ms-auto">
                      <span class="text-dark display-6"><i class="ti ti-archive"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-top border-info">
                <div class="card-body">
                  <div class="d-flex  align-items-center">
                    <div>
                      <h4 class="card-title fs-7">140</h4>
                      <p class="card-subtitle text-info">Top Sales</p>
                    </div>
                    <div class="ms-auto">
                      <span class="text-info display-6"><i class="ti ti-chart-bar"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-top border-primary">
                <div class="card-body">
                  <div class="d-flex  align-items-center">
                    <div>
                      <h4 class="card-title fs-7">160</h4>
                      <p class="card-subtitle text-primary">Top Feeds</p>
                    </div>
                    <div class="ms-auto">
                      <span class="text-primary display-6"><i class="ti ti-rss"></i></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-end border-dark">
                <div class="card-body">
                  <div class="d-flex  align-items-center">
                    <div>
                      <span class="text-dark display-6"><i class="ti ti-cast"></i></span>
                    </div>
                    <div class="ms-auto">
                      <h4 class="card-title fs-7">360</h4>
                      <p class="card-subtitle text-dark">Device Variations</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-end border-info">
                <div class="card-body">
                  <div class="d-flex  align-items-center">
                    <div>
                      <span class="text-info display-6"><i class="ti ti-currency-dollar"></i></span>
                    </div>
                    <div class="ms-auto">
                      <h4 class="card-title fs-7">120</h4>
                      <p class="card-subtitle text-info">Net Income</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-end border-primary">
                <div class="card-body">
                  <div class="d-flex  align-items-center">
                    <div>
                      <span class="text-primary display-6"><i class="ti ti-clock-hour-4"></i></span>
                    </div>
                    <div class="ms-auto">
                      <h4 class="card-title fs-7">471</h4>
                      <p class="card-subtitle text-primary">Sales Performance</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-end border-success">
                <div class="card-body">
                  <div class="d-flex  align-items-center">
                    <div>
                      <span class="text-success display-6"><i class="ti ti-box-multiple"></i></span>
                    </div>
                    <div class="ms-auto">
                      <h4 class="card-title fs-7">150</h4>
                      <p class="card-subtitle text-success">Monthly Sales</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-group mb-4">
                <div class="card text-bg-success">
                  <div class="card-body text-center text-white">
                    <div class="p-3">
                      <h2 class="text-white">27° C</h2>
                      <span class="opacity-75 mt-3 text-white">Lester, London</span>
                    </div>
                  </div>
                </div>
                <div class="card text-bg-success border-start border-white" style="--bs-border-opacity: .5;">
                  <div class="card-body text-center text-white">
                    <span class="display-6 d-block mt-3"><i class="ti ti-cloud-rain"></i></span>
                    <div class="mt-3">
                      <span class="opacity-75">12.10.2018</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card text-white">
                <img class="card-img" src="{{ URL::asset('build/images/backgrounds/profilebg.jpg') }}" alt="Card image">
                <div class="card-img-overlay text-white">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title text-white">
                      Lester, London
                    </h4>
                    <span>
                      <iconify-icon icon="solar:map-point-wave-bold-duotone" class="fs-8"></iconify-icon>
                    </span>
                  </div>

                  <div class="mt-4">
                    <span><i class="display-6 ti ti-wind"></i></span>
                    <div class="d-inline-block ms-3">
                      <span class="display-6">14°</span>
                      <span>C / 7° C</span>
                    </div>
                  </div>                  
                  <div class="mt-2">
                    <span class="opacity-75 text-white">Saturday</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card text-center overflow-hidden">
                <div class="card-body text-bg-primary text-white p-10">
                  <span><i class="display-6 ti ti-wind"></i></span>
                  <div class="d-inline-block ms-3">
                    <span class="display-6">14°</span>
                    <span>C / 7° C</span>
                  </div>
                </div>
                <div class="card-footer text-primary text-bg-white">5 May 2024</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card overflow-hidden">
                <div class="card-body text-bg-info text-white text-center p-10">
                  <div class="d-inline-block ms-3">
                    <span class="display-6">4°</span>
                    <span>C / 7° C</span>
                  </div>
                  <span class="ms-2"><i class="display-6 ti ti-cloud"></i></span>
                </div>
                <div class="card-footer text-info text-bg-white">
                  <div class="d-flex  align-items-center">
                    <h5 class="mb-0 fs-4">
                      <i class="ti ti-cloud-rain"></i> 15kmph
                    </h5>
                    <div class="ms-auto">
                      <h5 class="mb-0 fs-4">40%</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card text-bg-dark text-white">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <a href="JavaScript: void(0);"><i class="ti ti-currency-ethereum display-6 text-white"
                        title="ETH"></i></a>
                    <div class="ms-3">
                      <h4 class="card-title mb-0 text-white">
                        Ethereum
                      </h4>
                      <p class="text-white fs-4 mb-0 opacity-75">$3589.00k</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card text-bg-primary text-white">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <a href="JavaScript: void(0);"><i class="ti ti-currency-dogecoin display-6 text-white"
                        title="LTC"></i></a>
                    <div class="ms-3">
                      <h4 class="card-title mb-0 text-white">
                        Dash
                      </h4>
                      <p class="text-white fs-4 mb-0 opacity-75">$900.00k</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card text-bg-danger text-white">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <a href="JavaScript: void(0);"><i class="ti ti-currency-bitcoin display-6 text-white"
                        title="BTC"></i></a>
                    <div class="ms-3">
                      <h4 class="card-title mb-0 text-white">
                        Bitcoin
                      </h4>
                      <p class="text-white fs-4 mb-0 opacity-75">$284.50k</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card text-bg-info text-white">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <a href="JavaScript: void(0);"><i class="ti ti-currency-ripple display-6 text-white"
                        title="AMP"></i></a>
                    <div class="ms-3">
                      <h4 class="card-title mb-0 text-white">
                        Ripple
                      </h4>
                      <p class="text-white fs-4 mb-0 opacity-75">$650.80k</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card text-bg-primary">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-6">
                    <i class="ti ti-currency-bitcoin display-6 text-white" title="BTC"></i>
                    <div>
                      <h5 class="text-white mb-1">
                        Bitcoin
                      </h5>
                      <p class="text-white mb-0 opacity-75">Realestate</h6>
                    </div>
                  </div>
                  <div class="row text-center text-white mt-7">
                    <div class="col-4">
                      <span class="fs-3">% 1h</span>
                      <p class="mb-0"><i class="ti ti-arrow-up fs-5"></i> 0.08</p>
                    </div>
                    <div class="col-4">
                      <span class="fs-3">% 24h</span>
                      <p class="mb-0"><i class="ti ti-arrow-down fs-5"></i> -1.06</p>
                    </div>
                    <div class="col-4">
                      <span class="fs-3">% 7d</span>
                      <p class="mb-0"><i class="ti ti-arrow-up fs-5"></i> -20.10</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card text-bg-secondary">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-6">
                    <i class="ti ti-currency-euro display-6 text-white" title="EOS"></i>
                    <div>
                      <h5 class="text-white mb-1">
                        EOS
                      </h5>
                      <p class="text-white mb-0 opacity-75">Banking</p>
                    </div>
                  </div>
                  <div class="row text-center text-white mt-7">
                    <div class="col-4">
                      <span class="fs-3">% 1h</span>
                      <p class="mb-0"><i class="ti ti-arrow-up fs-5"></i> 0.18</p>
                    </div>
                    <div class="col-4">
                      <span class="fs-3">% 24h</span>
                      <p class="mb-0"><i class="ti ti-arrow-down fs-5"></i> -5.10</p>
                    </div>
                    <div class="col-4">
                      <span class="fs-3">% 7d</span>
                      <p class="mb-0"><i class="ti ti-arrow-up fs-5"></i> -0.10</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card text-bg-danger">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-6">
                    <i class="ti ti-currency-ethereum display-6 text-white"></i>
                    <div>
                      <h5 class="text-white mb-1">
                        Ethereum
                      </h5>
                      <p class="text-white mb-0 opacity-75">Exchange</p>
                    </div>
                  </div>
                  <div class="row text-center text-white mt-7">
                    <div class="col-4">
                      <span class="fs-3">% 1h</span>
                      <p class="mb-0"><i class="ti ti-arrow-up fs-5"></i> 1.18</p>
                    </div>
                    <div class="col-4">
                      <span class="fs-3">% 24h</span>
                      <p class="mb-0"><i class="ti ti-arrow-down fs-5"></i> -5.16</p>
                    </div>
                    <div class="col-4">
                      <span class="fs-3">% 7d</span>
                      <p class="mb-0"><i class="ti ti-arrow-up fs-5"></i> -20.10</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card text-bg-info">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-6">
                    <i class="ti ti-currency-baht display-6 text-white" title="BTM"></i>
                    <div>
                      <h5 class="text-white mb-1">
                        Bitmark
                      </h5>
                      <p class="text-white mb-0 opacity-75">Advertising</p>
                    </div>
                  </div>
                  <div class="row text-center text-white mt-7">
                    <div class="col-4">
                      <span class="fs-3">% 1h</span>
                      <p class="mb-0"><i class="ti ti-arrow-up fs-5"></i> 0.18</p>
                    </div>
                    <div class="col-4">
                      <span class="fs-3">% 24h</span>
                      <p class="mb-0"><i class="ti ti-arrow-down fs-5"></i> -2.06</p>
                    </div>
                    <div class="col-4">
                      <span class="fs-3">% 7d</span>
                      <p class="mb-0"><i class="ti ti-arrow-up fs-5"></i> -1.10</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card text-bg-dark">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-6">
                    <i class="ti ti-currency-dogecoin display-6 text-white" title="DASH"></i>
                    <div>
                      <h5 class="text-white mb-1">
                        Dash
                      </h5>
                      <p class="text-white mb-0 opacity-75">Trading</p>
                    </div>
                  </div>
                  <div class="row text-center text-white mt-7">
                    <div class="col-4">
                      <span class="fs-3">% 1h</span>
                      <p class="mb-0"><i class="ti ti-arrow-up fs-5"></i> 1.18</p>
                    </div>
                    <div class="col-4">
                      <span class="fs-3">% 24h</span>
                      <p class="mb-0"><i class="ti ti-arrow-down fs-5"></i> -1.10</p>
                    </div>
                    <div class="col-4">
                      <span class="fs-3">% 7d</span>
                      <p class="mb-0"><i class="ti ti-arrow-up fs-5"></i> -0.20</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card text-bg-warning">
                <div class="card-body">
                  <div class="d-flex align-items-center gap-6">
                    <i class="ti ti-diamond display-6 text-white" title="GEMZ"></i>
                    <div>
                      <h5 class="text-white mb-1">
                        GetGems
                      </h5>
                      <p class="text-white mb-0 opacity-75">Exchange</p>
                    </div>
                  </div>
                  <div class="row text-center text-white mt-7">
                    <div class="col-4">
                      <span class="fs-3">% 1h</span>
                      <p class="mb-0"><i class="ti ti-arrow-up fs-5"></i> 1.18</p>
                    </div>
                    <div class="col-4">
                      <span class="fs-3">% 24h</span>
                      <p class="mb-0"><i class="ti ti-arrow-down fs-5"></i> -1.10</p>
                    </div>
                    <div class="col-4">
                      <span class="fs-3">% 7d</span>
                      <p class="mb-0"><i class="ti ti-arrow-up fs-5"></i> -1.10</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row">
                    <div
                      class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-success">
                      <i class="ti ti-credit-card fs-6"></i>
                    </div>
                    <div class="ms-3 align-self-center">
                      <h4 class="mb-0 fs-5">Total Income</h4>
                      <span>Income</span>
                    </div>
                    <div class="ms-auto align-self-center">
                      <h2 class="fs-7 mb-0">$2900</h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row">
                    <div
                      class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-info">
                      <i class="ti ti-credit-card fs-6"></i>
                    </div>
                    <div class="ms-3 align-self-center">
                      <h4 class="mb-0 fs-5">Total Products</h4>
                      <span>Users</span>
                    </div>
                    <div class="ms-auto align-self-center">
                      <h2 class="fs-7 mb-0">$2690</h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row">
                    <div
                      class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-danger">
                      <i class="ti ti-credit-card fs-6"></i>
                    </div>
                    <div class="ms-3 align-self-center">
                      <h4 class="mb-0 fs-5">Total Members</h4>
                      <span>My birthday</span>
                    </div>
                    <div class="ms-auto align-self-center">
                      <h2 class="fs-7 mb-0">20 March</h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row">
                    <div
                      class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-warning">
                      <i class="ti ti-credit-card fs-6"></i>
                    </div>
                    <div class="ms-3 align-self-center">
                      <h4 class="mb-0 fs-5">Total Tasks</h4>
                      <span>pending</span>
                    </div>
                    <div class="ms-auto align-self-center">
                      <h2 class="fs-7 mb-0">6540</h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card text-bg-success">
                <div class="card-body text-white">
                  <div class="d-flex flex-row align-items-center">
                    <div class="round-40 rounded-circle d-flex align-items-center justify-content-center bg-white">
                      <i class="ti ti-credit-card fs-6 text-success"></i>
                    </div>
                    <div class="ms-3">
                      <h4 class="mb-0 text-white fs-6">Total Income</h4>
                      <span class="text-white-50">Income</span>
                    </div>
                    <div class="ms-auto">
                      <h2 class="fs-7 mb-0 text-white">
                        $2900
                      </h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card text-bg-info">
                <div class="card-body text-white">
                  <div class="d-flex flex-row align-items-center">
                    <div class="round-40 rounded-circle d-flex align-items-center justify-content-center bg-white">
                      <i class="ti ti-credit-card fs-6 text-info"></i>
                    </div>
                    <div class="ms-3">
                      <h4 class="mb-0 text-white fs-6">Total Products</h4>
                      <span class="text-white-50">Users</span>
                    </div>
                    <div class="ms-auto">
                      <h2 class="fs-7 mb-0 text-white">
                        $2690
                      </h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card text-bg-primary">
                <div class="card-body text-white">
                  <div class="d-flex flex-row align-items-center">
                    <div class="round-40 rounded-circle d-flex align-items-center justify-content-center bg-white">
                      <i class="ti ti-credit-card fs-6 text-info"></i>
                    </div>
                    <div class="ms-3">
                      <h4 class="mb-0 text-white fs-6">Total Members</h4>
                      <span class="text-white-50">My birthday</span>
                    </div>
                    <div class="ms-auto">
                      <h2 class="fs-7 mb-0 text-white">
                        20 March
                      </h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card text-bg-danger">
                <div class="card-body text-white">
                  <div class="d-flex flex-row align-items-center">
                    <div class="round-40 rounded-circle d-flex align-items-center justify-content-center bg-white">
                      <i class="ti ti-credit-card fs-6 text-danger"></i>
                    </div>
                    <div class="ms-3">
                      <h4 class="mb-0 text-white fs-6">Total Tasks</h4>
                      <span class="text-white-50">pending</span>
                    </div>
                    <div class="ms-auto">
                      <h2 class="fs-7 mb-0 text-white">
                        6540
                      </h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @@include("partials/customizer.html")
    </div>

    @@include("partials/header-components/dd-searchbar.html")
    @@include("partials/header-components/dd-shopping-cart.html")
  </div>
  <div class="dark-transparent sidebartoggler"></div>
  @@include("partials/scripts.html")
</body>

</html>