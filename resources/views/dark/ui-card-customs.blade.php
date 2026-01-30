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
          @@include("partials/breadcrumb.html", {"title": "Customs Card", "subtitle": 'Home'})
          <div class="row">
            <div class="col-md-4 col-lg-2">
              <div class="card text-center bg-white alert-dismissible fade show alert p-0 card-hover rounded-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="p-2 d-block mt-3">
                  <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" width="75"
                    class="rounded-circle img-fluid" />
                  <h5 class="card-title mt-3">John Deo</h5>
                  <span class="badge bg-primary-subtle text-primary mb-3">active</span>
                  <a href="javascript:void(0)" class="btn btn-primary  d-block w-100">Message</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-lg-2">
              <div class="card text-center bg-white alert-dismissible fade show alert p-0 card-hover rounded-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="p-2 d-block mt-3">
                  <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" width="75"
                    class="rounded-circle img-fluid" />
                  <h5 class="card-title mt-3">John Deo</h5>
                  <span class="badge bg-secondary-subtle text-secondary mb-3">away</span>
                  <a href="javascript:void(0)" class="btn btn-secondary  d-block w-100">Message</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-lg-2">
              <div class="card text-center bg-white alert-dismissible fade show alert p-0 card-hover rounded-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="p-2 d-block mt-3">
                  <img src="{{ URL::asset('build/images/profile/user-6.jpg') }}" width="75"
                    class="rounded-circle img-fluid" />
                  <h5 class="card-title mt-3">John Deo</h5>
                  <span class="badge bg-danger-subtle text-danger mb-3">active</span>
                  <a href="javascript:void(0)" class="btn btn-danger  d-block w-100">Message</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-lg-2">
              <div class="card text-center bg-white alert-dismissible fade show alert p-0 card-hover rounded-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="p-2 d-block mt-3">
                  <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" width="75"
                    class="rounded-circle img-fluid" />
                  <h5 class="card-title mt-3">John Deo</h5>
                  <span class="badge bg-warning-subtle text-warning mb-3">offline</span>
                  <a href="javascript:void(0)" class="btn btn-warning  d-block w-100">Message</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-lg-2">
              <div class="card text-center bg-white alert-dismissible fade show alert p-0 card-hover rounded-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="p-2 d-block mt-3">
                  <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" width="75"
                    class="rounded-circle img-fluid" />
                  <h5 class="card-title mt-3">John Deo</h5>
                  <span class="badge bg-success-subtle text-success mb-3">away</span>
                  <a href="javascript:void(0)" class="btn btn-success d-block w-100">Message</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-lg-2">
              <div class="card text-center bg-white alert-dismissible fade show alert p-0 card-hover rounded-4" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="p-2 d-block mt-3">
                  <img src="{{ URL::asset('build/images/profile/user-6.jpg') }}" width="75"
                    class="rounded-circle img-fluid" />
                  <h5 class="card-title mt-3">John Deo</h5>
                  <span class="badge bg-secondary-subtle text-secondary mb-3">offline</span>
                  <a href="javascript:void(0)" class="btn btn-secondary d-block w-100">Message</a>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card text-center">
                <div class="card-body">
                  <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-1 img-fluid" width="90" />
                  <div class="mt-n2">
                    <span class="badge text-bg-primary">Editor</span>
                    <h3 class="card-title mt-3">Matt Carlson</h3>
                    <p class="card-subtitle">San Francisco, CA</p>
                  </div>
                  <div class="row mt-3 justify-content-center">
                    <div class="col-6">
                      <div class="py-2 px-3 text-bg-light rounded-4 d-flex align-items-center">
                        <span class="text-warning"><i class="ti ti-star fs-8"></i></span>
                        <div class="ms-2 text-start">
                          <h6 class="fw-normal text-muted mb-0">Reviews</h6>
                          <h4 class="mb-0 fs-5">368</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="py-2 px-3 text-bg-light rounded-4 d-flex align-items-center">
                        <span class="text-primary"><i class="ti ti-brand-google-photos fs-8"></i></span>
                        <div class="ms-2 text-start">
                          <h6 class="fw-normal text-muted mb-0">Photos</h6>
                          <h4 class="mb-0 fs-5">1200</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card text-center">
                <div class="card-body">
                  <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" class="rounded-1 img-fluid" width="90" />
                  <div class="mt-n2">
                    <span class="badge text-bg-danger">Developer</span>
                    <h3 class="card-title mt-3">Matt Carlson</h3>
                    <p class="card-subtitle">San Francisco, CA</p>
                  </div>
                  <div class="row mt-3 justify-content-center">
                    <div class="col-6">
                      <div class="py-2 px-3 text-bg-light rounded-4 d-flex align-items-center">
                        <span class="text-warning"><i class="ti ti-star fs-8"></i></span>
                        <div class="ms-2 text-start">
                          <h6 class="fw-normal text-muted mb-0">Reviews</h6>
                          <h4 class="mb-0 fs-5">368</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="py-2 px-3 text-bg-light rounded-4 d-flex align-items-center">
                        <span class="text-primary"><i class="ti ti-brand-google-photos fs-8"></i></span>
                        <div class="ms-2 text-start">
                          <h6 class="fw-normal text-muted mb-0">Photos</h6>
                          <h4 class="mb-0 fs-5">1200</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card text-center">
                <div class="card-body">
                  <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-1 img-fluid" width="90" />
                  <div class="mt-n2">
                    <span class="badge text-bg-warning">Desinger</span>
                    <h3 class="card-title mt-3">Matt Carlson</h3>
                    <p class="card-subtitle">San Francisco, CA</p>
                  </div>
                  <div class="row mt-3 justify-content-center">
                    <div class="col-6">
                      <div class="py-2 px-3 text-bg-light rounded-4 d-flex align-items-center">
                        <span class="text-warning"><i class="ti ti-star fs-8"></i></span>
                        <div class="ms-2 text-start">
                          <h6 class="fw-normal text-muted mb-0">Reviews</h6>
                          <h4 class="mb-0 fs-5">368</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="py-2 px-3 text-bg-light rounded-4 d-flex align-items-center">
                        <span class="text-primary"><i class="ti ti-brand-google-photos fs-8"></i></span>
                        <div class="ms-2 text-start">
                          <h6 class="fw-normal text-muted mb-0">Photos</h6>
                          <h4 class="mb-0 fs-5">1200</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-start">
                    <div>
                      <h4 class="card-title">Social Marketing</h4>
                      <p class="card-subtitle">65,450 sales</p>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown">
                        <a href="javascript:void(0)" class="link" id="new" data-bs-toggle="dropdown" aria-expanded="false">
                          <i data-feather="more-horizontal" class="feather-sm"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="new">
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="earnings-month mt-1"></div>
                <div class="card-body">
                  <div class="vstack gap-3">
                    <div class="hstack gap-6 border-bottom pb-3">
                      <div class="bg-primary-subtle text-primary round-48 rounded-1 hstack justify-content-center">
                        <i class="ti ti-brand-dribbble fs-7"></i>
                      </div>
                      <div>
                        <h4 class="fs-4 mb-0">Dribble</h4>
                        <p class="mb-0">
                          Ecommerce Design, App Design
                        </p>
                      </div>
                    </div>
                    <!-- 2 -->
                    <div class="hstack gap-6 border-bottom pb-3">
                      <div
                        class="bg-secondary-subtle text-secondary round-48 rounded-1 hstack justify-content-center">
                        <i class="ti ti-brand-youtube fs-7"></i>
                      </div>
                      <div>
                        <h4 class="fs-4 mb-0">Youtube</h4>
                        <p class="mb-0">
                          Waiting for new videos
                        </p>
                      </div>
                    </div>
                    <!-- 3 -->
                    <div class="hstack gap-6">
                      <div class="bg-warning-subtle text-warning round-48 rounded-1 hstack justify-content-center">
                        <i class="ti ti-brand-dribbble fs-7"></i>
                      </div>
                      <div>
                        <h4 class="fs-4 mb-0">Messanger</h4>
                        <p class="mb-0">
                          4 new notifcations
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-start">
                    <div>
                      <h4 class="card-title">Storage Clouds</h4>
                      <p class="card-subtitle">5,450 sales</p>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown">
                        <a href="javascript:void(0)" class="link" id="new" data-bs-toggle="dropdown" aria-expanded="false">
                          <i data-feather="more-horizontal" class="feather-sm"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="new">
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="earnings-month2 mt-1"></div>
                <div class="card-body">
                  <div class="vstack gap-3">
                    <!-- 3 -->
                    <div class="hstack gap-6 border-bottom pb-3">
                      <div class="bg-warning-subtle text-warning round-48 rounded-1 hstack justify-content-center">
                        <i class="ti ti-brand-dribbble fs-7"></i>
                      </div>
                      <div>
                        <h4 class="fs-4 mb-0">Messanger</h4>
                        <p class="mb-0">
                          4 new notifcations
                        </p>
                      </div>
                    </div>
                    <div class="hstack gap-6 border-bottom pb-3">
                      <div class="bg-primary-subtle text-primary round-48 rounded-1 hstack justify-content-center">
                        <i class="ti ti-brand-dribbble fs-7"></i>
                      </div>
                      <div>
                        <h4 class="fs-4 mb-0">Dribble</h4>
                        <p class="mb-0">
                          Ecommerce Design, App Design
                        </p>
                      </div>
                    </div>
                    <!-- 2 -->
                    <div class="hstack gap-6 ">
                      <div
                        class="bg-secondary-subtle text-secondary round-48 rounded-1 hstack justify-content-center">
                        <i class="ti ti-brand-youtube fs-7"></i>
                      </div>
                      <div>
                        <h4 class="fs-4 mb-0">Youtube</h4>
                        <p class="mb-0">
                          Waiting for new videos
                        </p>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-start">
                    <div>
                      <h4 class="card-title">Yearly Sales</h4>
                      <p class="card-subtitle">50,050 sales</p>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown">
                        <a href="javascript:void(0)" class="link" id="new" data-bs-toggle="dropdown" aria-expanded="false">
                          <i data-feather="more-horizontal" class="feather-sm"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="new">
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="earnings-month3 mt-1"></div>
                <div class="card-body">
                  <div class="vstack gap-3">

                    <!-- 2 -->
                    <div class="hstack gap-6 border-bottom pb-3">
                      <div
                        class="bg-secondary-subtle text-secondary round-48 rounded-1 hstack justify-content-center">
                        <i class="ti ti-brand-youtube fs-7"></i>
                      </div>
                      <div>
                        <h4 class="fs-4 mb-0">Youtube</h4>
                        <p class="mb-0">
                          Waiting for new videos
                        </p>
                      </div>
                    </div>
                    <div class="hstack gap-6 border-bottom pb-3">
                      <div class="bg-primary-subtle text-primary round-48 rounded-1 hstack justify-content-center">
                        <i class="ti ti-brand-dribbble fs-7"></i>
                      </div>
                      <div>
                        <h4 class="fs-4 mb-0">Dribble</h4>
                        <p class="mb-0">
                          Ecommerce Design, App Design
                        </p>
                      </div>
                    </div>
                    <!-- 3 -->
                    <div class="hstack gap-6">
                      <div class="bg-warning-subtle text-warning round-48 rounded-1 hstack justify-content-center">
                        <i class="ti ti-brand-dribbble fs-7"></i>
                      </div>
                      <div>
                        <h4 class="fs-4 mb-0">Messanger</h4>
                        <p class="mb-0">
                          4 new notifcations
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <h4 class="mb-3 mt-4 fs-5">Card With Progreesbar</h4>
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
                        <p class="card-subtitle mb-0">Sales Change</p>
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
                        <p class="card-subtitle mb-0">Weekly Income</p>
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
                        <p class="card-subtitle mb-0">New Users</p>
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
                        <p class="card-subtitle mb-0">
                          New Notifications
                        </p>
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
                        <p class="card-subtitle mb-0">Latest Messages</p>
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
                        <p class="card-subtitle mb-0">
                          Wainting for downloads
                        </p>
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
            <!-- Column -->
            <div class="col-xxl-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <!-- Column -->
                    <div class="col d-flex align-items-center">
                      <div>
                        <h3>86</h3>
                        <p class="mb-0">
                          New Clients
                        </p>
                      </div>
                    </div>
                    <!-- Column -->
                    <div class="col d-flex align-items-center justify-content-end">
                      <div data-label="20%" class="css-bar mb-0 css-bar-primary css-bar-20">
                        <i class="ti ti-user-circle"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-xxl-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <!-- Column -->
                    <div class="col d-flex align-items-center">
                      <div>
                        <h3>248</h3>
                        <p class="mb-0">
                          All Projects
                        </p>
                      </div>
                    </div>
                    <!-- Column -->
                    <div class="col d-flex align-items-center justify-content-end">
                      <div data-label="30%" class="css-bar mb-0 css-bar-danger css-bar-20">
                        <i class="ti ti-briefcase"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-xxl-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <!-- Column -->
                    <div class="col d-flex align-items-center">
                      <div>
                        <h3>352</h3>
                        <p class="mb-0">New Items</p>
                      </div>
                    </div>
                    <!-- Column -->
                    <div class="col d-flex align-items-center justify-content-end">
                      <div data-label="40%" class="css-bar mb-0 css-bar-warning css-bar-40">
                        <i class="ti ti-star"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-xxl-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <!-- Column -->
                    <div class="col d-flex align-items-center">
                      <div>
                        <h3>159</h3>
                        <p class="mb-0">Invoices</p>
                      </div>
                    </div>
                    <!-- Column -->
                    <div class="col d-flex align-items-center justify-content-end">
                      <div data-label="60%" class="css-bar mb-0 css-bar-info css-bar-60">
                        <i class="ti ti-receipt"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
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
            <!-- Column -->
            <!-- Column -->
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
            <!-- Column -->
            <!-- Column -->
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
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <h4 class="card-title">26%</h4>
                      <p class="card-subtitle mb-2">Total Product</p>
                    </div>
                    <div class="col-12">
                      <div class="progress text-bg-light">
                        <div class="progress-bar text-bg-success" role="progressbar"
                          style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <h4 class="card-title">60%</h4>
                      <p class="card-subtitle mb-2">Pending Product</p>
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
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <h4 class="card-title">63%</h4>
                      <p class="card-subtitle mb-2">Selling Products</p>
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
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <h4 class="card-title">29%</h4>
                      <p class="card-subtitle mb-2">Buying Products</p>
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
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row gap-6 align-items-center">
                    <div
                      class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-primary">
                      <i class="ti ti-credit-card fs-6"></i>
                    </div>
                    <div class="align-self-center">
                      <h4 class="card-title mb-1">$18090</h4>
                      <p class="card-subtitle">Income</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row gap-6 align-items-center">
                    <div
                      class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-info">
                      <i class="ti ti-users fs-6"></i>
                    </div>
                    <div class="align-self-center">
                      <h4 class="card-title mb-1">2690</h4>
                      <p class="card-subtitle">Users</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row gap-6 align-items-center">
                    <div
                      class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-danger">
                      <i class="ti ti-calendar fs-6"></i>
                    </div>
                    <div class="align-self-center">
                      <h4 class="card-title mb-1">20 march</h4>
                      <p class="card-subtitle">My birthday</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row gap-6 align-items-center">
                    <div
                      class="round-40 rounded-circle text-white d-flex align-items-center justify-content-center text-bg-success">
                      <i class="ti ti-settings fs-6"></i>
                    </div>
                    <div class="align-self-center">
                      <h4 class="card-title mb-1">6540</h4>
                      <p class="card-subtitle">Notifications</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="text-bg-info p-4 rounded-3 rounded-bottom-0">
                  <div class="text-center text-white display-6">
                    <i class="ti ti-settings"></i>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div>
                      <h4 class="fs-6">456</h4>
                      <h5 class="fs-4 fw-medium text-info mb-0">Following</h5>
                    </div>
                    <div class="ms-auto">
                      <h4 class="fs-6">1,456</h4>
                      <h5 class="fs-4 fw-medium text-info mb-0">Friends</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="text-bg-primary p-4 rounded-3 rounded-bottom-0">
                  <div class="text-center text-white display-6">
                    <i class="ti ti-brand-twitter"></i>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div>
                      <h4 class="fs-6">456</h4>
                      <h5 class="fs-4 fw-medium text-primary mb-0">Tweets</h5>
                    </div>
                    <div class="ms-auto">
                      <h4 class="fs-6">1,456</h4>
                      <h5 class="fs-4 fw-medium text-primary mb-0">Followers</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="text-bg-danger p-4 rounded-3 rounded-bottom-0">
                  <div class="text-center text-white display-6">
                    <i class="ti ti-brand-instagram"></i>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div>
                      <h4 class="fs-6">456</h4>
                      <h5 class="fs-4 fw-medium text-danger mb-0">Following</h5>
                    </div>
                    <div class="ms-auto">
                      <h4 class="fs-6">1,456</h4>
                      <h5 class="fs-4 fw-medium text-danger mb-0">Followers</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="text-bg-dark p-4 rounded-3 rounded-bottom-0">
                  <div class="text-center text-white display-6">
                    <i class="ti ti-brand-skype"></i>
                  </div>
                </div>
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div>
                      <h4 class="fs-6">456</h4>
                      <h5 class="fs-4 fw-medium text-dark mb-0">Contacts</h5>
                    </div>
                    <div class="ms-auto">
                      <h4 class="fs-6">1,456</h4>
                      <h5 class="fs-4 fw-medium text-dark mb-0">Following</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <h4 class="card-title">86%</h4>
                      <p class="card-subtitle mb-2">Total Product</p>
                    </div>
                    <div class="col-12">
                      <div class="progress text-bg-light">
                        <div class="progress-bar text-bg-success" role="progressbar"
                          style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <h4 class="card-title">40%</h4>
                      <p class="card-subtitle mb-2">Pending Product</p>
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
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <h4 class="card-title">56%</h4>
                      <p class="card-subtitle mb-2">Product A</p>
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
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <h4 class="card-title">26%</h4>
                      <p class="card-subtitle mb-2">Product B</p>
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
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card border-bottom border-info">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4 class="fs-7">120</h4>
                      <h6 class="fw-medium text-info mb-0">News Feed</h6>
                    </div>
                    <span class="text-info display-6"><i class="ti ti-file-text"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-bottom border-primary">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4 class="fs-7">150</h4>
                      <h6 class="fw-medium text-primary mb-0">Invoices</h6>
                    </div>
                    <span class="text-primary display-6"><i class="ti ti-clipboard"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="card border-bottom border-success">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4 class="fs-7">450</h4>
                      <h6 class="fw-medium text-success mb-0">Revenue</h6>
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
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4 class="fs-7">100</h4>
                      <h6 class="fw-medium text-danger mb-0">Sales</h6>
                    </div>
                    <span class="text-danger display-6"><i class="ti ti-users"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <h4 class="fs-5 mt-5 mb-3">Cards With Icon</h4>
            <div class="col-xxl-3 col-md-6">
              <div class="card border-start border-danger">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="text-danger display-6"><i class="ti ti-users"></i></span>
                    <div>
                      <h4 class="card-title fs-7">290</h4>
                      <p class="card-subtitle text-danger">New Customers</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-md-6">
              <div class="card border-start border-info">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="text-info display-6"><i class="ti ti-message-circle"></i></span>
                    <div>
                      <h4 class="card-title fs-7">120</h4>
                      <p class="card-subtitle text-info">New Messages</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-md-6">
              <div class="card border-start border-primary">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="text-primary display-6"><i class="ti ti-bell"></i></span>
                    <div>
                      <h4 class="card-title fs-7">600</h4>
                      <p class="card-subtitle text-primary">New Notification</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-md-6">
              <div class="card border-start border-success">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="text-success display-6"><i class="ti ti-briefcase"></i></span>
                    <div>
                      <h4 class="card-title fs-7">270</h4>
                      <p class="card-subtitle text-success">New Projects</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-md-6">
              <div class="card border-top border-success">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4 class="card-title fs-7">120</h4>
                      <p class="card-subtitle text-success">Top Locations</p>
                    </div>
                    <span class="text-success display-6"><i class="ti ti-map"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-md-6">
              <div class="card border-top border-dark">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4 class="card-title fs-7">201</h4>
                      <p class="card-subtitle text-dark">Top Activity Pages</p>
                    </div>
                    <span class="text-dark display-6"><i class="ti ti-archive"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-md-6">
              <div class="card border-top border-info">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4 class="card-title fs-7">140</h4>
                      <p class="card-subtitle text-info">Top Sales</p>
                    </div>
                    <span class="text-info display-6"><i class="ti ti-chart-bar"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-md-6">
              <div class="card border-top border-primary">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4 class="card-title fs-7">160</h4>
                      <p class="card-subtitle text-primary">Top Feeds</p>
                    </div>
                    <span class="text-primary display-6"><i class="ti ti-rss"></i></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-md-6">
              <div class="card border-end border-dark">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="text-dark display-6"><i class="ti ti-cast"></i></span>
                    <div>
                      <h4 class="card-title fs-7">360</h4>
                      <p class="card-subtitle text-dark">Device Variations</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-md-6">
              <div class="card border-end border-info">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="text-info display-6"><i class="ti ti-currency-dollar"></i></span>
                    <div>
                      <h4 class="card-title fs-7">120</h4>
                      <p class="card-subtitle text-info">Net Income</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-md-6">
              <div class="card border-end border-primary">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="text-primary display-6"><i class="ti ti-clock-hour-4"></i></span>
                    <div>
                      <h2 class="fs-7">471</h2>
                      <h6 class="fw-medium text-primary mb-0">Sales</h6>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xxl-3 col-md-6">
              <div class="card border-end border-success">
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between">
                    <span class="text-success display-6"><i class="ti ti-box-multiple"></i></span>
                    <div>
                      <h4 class="card-title fs-7">150</h4>
                      <p class="card-subtitle text-success">Monthly Sales</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <h4 class="fs-5 mt-5 mb-3">Cards With Propgressbar &amp; Icon</h4>
            <div class="col-lg-3 col-md-6">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center mb-3">
                    <div>
                      <h3 class="fs-6">86%</h3>
                      <p class="card-subtitle">Total Product</p>
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
                      <h3 class="fs-6">40%</h3>
                      <p class="card-subtitle">Pending Product</p>
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
                          <h3 class="fs-6">56%</h3>
                          <p class="card-subtitle">Selling</p>
                        </div>
                        <div class="ms-auto">
                          <span class="text-primary display-6"><i class="ti ti-clipboard"></i></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="progress text-bg-light">
                        <div class="progress-bar text-bg-primary" role="progressbar"
                          style="width: 56%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                        </div>
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
                          <h3 class="fs-6">26%</h3>
                          <p class="card-subtitle">Buying</p>
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
            <h4 class="fs-5 mt-5 mb-3">Crypto Cards</h4>
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
            <!-- col -->
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
            <!-- col -->
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
            <!-- col -->
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
            <!-- col -->
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
            <!-- col -->
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
            <!-- col -->
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
            <h4 class="fs-5 mt-5 mb-3">Card Icon Section</h4>
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="d-flex flex-row">
                  <div class="p-3 bg-info-subtle d-flex align-items-center">
                    <h3 class="text-info box mb-0">
                      <i class="ti ti-brand-messenger"></i>
                    </h3>
                  </div>
                  <div class="p-3">
                    <h3 class="text-info mb-0 fs-6">$980</h3>
                    <span>Free Messages</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="d-flex flex-row">
                  <div class="p-3 bg-success-subtle d-flex align-items-center">
                    <h3 class="text-success box mb-0">
                      <i class="ti ti-building-broadcast-tower"></i>
                    </h3>
                  </div>
                  <div class="p-3">
                    <h3 class="text-success mb-0 fs-6">$18090</h3>
                    <span>Free Internet</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="d-flex flex-row">
                  <div class="p-3 bg-primary-subtle d-flex align-items-center">
                    <h3 class="text-primary box mb-0">
                      <i class="ti ti-clock-hour-3"></i>
                    </h3>
                  </div>
                  <div class="p-3">
                    <h3 class="text-primary mb-0 fs-6">$18090</h3>
                    <span>Unlimited Calls</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="d-flex flex-row">
                  <div class="p-3 bg-warning-subtle d-flex align-items-center">
                    <h3 class="text-warning box mb-0">
                      <i class="ti ti-database"></i>
                    </h3>
                  </div>
                  <div class="p-3">
                    <h3 class="text-warning mb-0 fs-6">$18090</h3>
                    <span>Free Data Storage</span>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="d-flex flex-row">
                  <div class="p-3">
                    <h3 class="text-info mb-0 fs-6">$980</h3>
                    <span>Free Messages</span>
                  </div>
                  <div class="p-3 bg-info-subtle d-flex align-items-center ms-auto">
                    <h3 class="text-info box mb-0">
                      <i class="ti ti-brand-messenger"></i>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="d-flex flex-row">
                  <div class="p-3">
                    <h3 class="text-success mb-0 fs-6">$18090</h3>
                    <span>Free Internet</span>
                  </div>
                  <div class="p-3 bg-success-subtle d-flex align-items-center ms-auto">
                    <h3 class="text-success box mb-0">
                      <i class="ti ti-building-broadcast-tower"></i>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="d-flex flex-row">
                  <div class="p-3">
                    <h3 class="text-primary mb-0 fs-6">$18090</h3>
                    <span>Unlimited Calls</span>
                  </div>
                  <div class="p-3 bg-primary-subtle d-flex align-items-center ms-auto">
                    <h3 class="text-primary box mb-0">
                      <i class="ti ti-clock-hour-3"></i>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-3 col-md-6">
              <div class="card overflow-hidden">
                <div class="d-flex flex-row">
                  <div class="p-3">
                    <h3 class="text-warning mb-0 fs-6">$18090</h3>
                    <span>Free Data Storage</span>
                  </div>
                  <div class="p-3 bg-warning-subtle d-flex align-items-center ms-auto">
                    <h3 class="text-warning box mb-0">
                      <i class="ti ti-database"></i>
                    </h3>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <h4 class="fs-5 mt-5 mb-3">Title With Subtitles</h4>
            <!-- Column -->
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
            <!-- Column -->
            <!-- Column -->
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
            <!-- Column -->
            <!-- Column -->
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
            <!-- Column -->
            <!-- Column -->
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
            <!-- Column -->
            <!-- Column -->
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
            <!-- Column -->
            <!-- Column -->
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
            <!-- Column -->
            <!-- Column -->
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
            <!-- Column -->
            <!-- Column -->
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
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6">
              <div class="card overflow-hidden">
                <div class="d-flex flex-row">
                  <div class="p-4 text-bg-info">
                    <h3 class="text-white box mb-0">
                      <i class="ti ti-brand-messenger"></i>
                    </h3>
                  </div>
                  <div class="p-3">
                    <h3 class="text-info mb-0 fs-6">$980</h3>
                    <span>Free Messages</span>
                  </div>
                  <div class="align-self-center me-3 ms-auto">
                    <h2 class="fs-7 text-info mb-0">250</h2>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6">
              <div class="card overflow-hidden">
                <div class="d-flex flex-row">
                  <div class="p-4 text-bg-primary">
                    <h3 class="text-white box mb-0">
                      <i class="ti ti-building-broadcast-tower"></i>
                    </h3>
                  </div>
                  <div class="p-3">
                    <h3 class="text-primary mb-0 fs-6">$18090</h3>
                    <span>Free Internet</span>
                  </div>
                  <div class="align-self-center me-3 ms-auto">
                    <h2 class="fs-7 text-primary mb-0">125</h2>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6">
              <div class="card overflow-hidden">
                <div class="d-flex flex-row">
                  <div class="p-4 text-bg-danger">
                    <h3 class="text-white box mb-0">
                      <i class="ti ti-clock-hour-3"></i>
                    </h3>
                  </div>
                  <div class="p-3">
                    <h3 class="text-danger mb-0 fs-6">$18090</h3>
                    <span>Unlimited Calls</span>
                  </div>
                  <div class="align-self-center me-3 ms-auto">
                    <h2 class="fs-7 text-danger mb-0">450</h2>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-md-6">
              <div class="card overflow-hidden">
                <div class="d-flex flex-row">
                  <div class="p-4 text-bg-success">
                    <h3 class="text-white box mb-0">
                      <i class="ti ti-database"></i>
                    </h3>
                  </div>
                  <div class="p-3">
                    <h3 class="text-success mb-0 fs-6">$18090</h3>
                    <span>Free Data Storage</span>
                  </div>
                  <div class="align-self-center me-3 ms-auto">
                    <h2 class="fs-7 text-success mb-0">750</h2>
                  </div>
                </div>
              </div>
            </div>
            <!-- Column -->
            <h4 class="fs-5 mt-5 mb-3">Group Cards</h4>
            <div class="card-group">
              <!-- Column -->
              <div class="card">
                <div class="card-body text-center">
                  <h4 class="text-center fs-5 text-info">Unique Visit</h4>
                  <h2 class="fs-7">1200</h2>
                  <div class="row pt-2 pb-2">
                    <!-- Column -->
                    <div class="col text-center align-self-center">
                      <div data-label="20%" class="css-bar mb-0 css-bar-primary css-bar-20">
                        <i class="display-6 ti ti-user-circle"></i>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-6 border-end">
                      <h4 class="fs-5 mb-0">
                        <i class="ti ti-chevron-up fs-6 text-success"></i> <br />
                        12056
                      </h4>
                    </div>
                    <div class="col-6">
                      <h4 class="fs-5 mb-0">
                        <i class="ti ti-chevron-down fs-6 text-danger"></i> <br />
                        145
                      </h4>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Column -->
              <!-- Column -->
              <div class="card">
                <div class="card-body text-center">
                  <h4 class="text-center fs-5 text-danger">Total Visit</h4>
                  <h2 class="fs-7">1200</h2>
                  <div class="row pt-2 pb-2">
                    <!-- Column -->
                    <div class="col text-center align-self-center">
                      <div data-label="20%" class="css-bar mb-0 css-bar-danger css-bar-20">
                        <i class="display-6 ti ti-star"></i>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-6 border-end">
                      <h4 class="fs-5 mb-0">
                        <i class="ti ti-chevron-up fs-6 text-success"></i> <br />
                        21456
                      </h4>
                    </div>
                    <div class="col-6">
                      <h4 class="fs-5 mb-0">
                        <i class="ti ti-chevron-down fs-6 text-danger"></i> <br />
                        145
                      </h4>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Column -->
              <!-- Column -->
              <div class="card">
                <div class="card-body text-center">
                  <h4 class="text-center fs-5 text-success">Bounce rate</h4>
                  <h2 class="fs-7">1200</h2>
                  <div class="row pt-2 pb-2">
                    <!-- Column -->
                    <div class="col text-center align-self-center">
                      <div data-label="20%" class="css-bar mb-0 css-bar-success css-bar-20">
                        <i class="display-6 ti ti-briefcase"></i>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-6 border-end">
                      <h4 class="fs-5 mb-0">
                        <i class="ti ti-chevron-up fs-6 text-success"></i> <br />
                        12465
                      </h4>
                    </div>
                    <div class="col-6">
                      <h4 class="fs-5 mb-0">
                        <i class="ti ti-chevron-down fs-6 text-danger"></i> <br />
                        145
                      </h4>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Column -->
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
  <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/widget/card-custom.js') }}"></script>
</body>

</html>