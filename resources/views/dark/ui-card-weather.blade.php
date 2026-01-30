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
          @@include("partials/breadcrumb.html", {"title": "Weather", "subtitle": 'Home'})
          <!-- Row -->
          <div class="row">
            <div class="col-md-12">
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
            <div class="col-md-6">
              <div class="card text-bg-info">
                <div class="card-body">
                  <div class="text-center text-white">
                    <h4 class="card-title text-white">Lester, London</h4>
                    <h5 class="fw-light text-white">MONDAY May 11, 2017</h5>
                    <div class="mt-4">
                      <span class="display-5 text-white"><i class="wi wi-day-rain-mix"></i></span>
                      <div class="d-inline-block ms-4">
                        <h2 class="text-white">29° C</h2>
                        <h4 class="fw-light text-white">Day Rain</h4>
                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-md-12">
                        <div class="row text-center">
                          <div class="col-6 col-md-2">
                            <div class="mb-2">TUE</div>
                            <i class="ti ti-cloud fs-7 mb-2"></i>
                            <div>
                              24°
                              <span>C</span>
                            </div>
                          </div>
                          <div class="col-6 col-md-2">
                            <div class="mb-2">WED</div>
                            <i class="ti ti-cloud fs-7 mb-2"></i>
                            <div>
                              21°
                              <span>C</span>
                            </div>
                          </div>
                          <div class="col-6 col-md-2">
                            <div class="mb-2">THU</div>
                            <i class="ti ti-sun-high fs-7 mb-2"></i>
                            <div>
                              25°
                              <span>C</span>
                            </div>
                          </div>
                          <div class="col-6 col-md-2">
                            <div class="mb-2">FRI</div>
                            <i class="ti ti-cloud-fog fs-7 mb-2"></i>
                            <div>
                              20°
                              <span>C</span>
                            </div>
                          </div>
                          <div class="col-6 col-md-2">
                            <div class="mb-2">SAT</div>
                            <i class="ti ti-cloud-storm fs-7 mb-2"></i>
                            <div>
                              18°
                              <span>C</span>
                            </div>
                          </div>
                          <div class="col-6 col-md-2">
                            <div class="mb-2">SUN</div>
                            <i class="ti ti-cloud-rain fs-7 mb-2"></i>
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
            </div>
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-header text-bg-success text-white">
                      <h4 class="card-title text-white mb-0">
                        <i class="ti ti-map-pin"></i> Lester
                      </h4>
                    </div>
                    <div class="card-body">
                      <div class="d-flex  align-items-center">
                        <div>
                          <h4 class="text-muted fw-light">Fri 20/5</h4>
                          <h2 class="fs-7 mb-0">27° C</h2>
                        </div>
                        <div class="ms-auto text-muted">
                          <span><i class="display-6 ti ti-cloud"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="card">
                    <div class="card-body">
                      <div class="d-flex  align-items-center">
                        <div class="text-muted">
                          <span class="display-6"><i class="ti ti-cloud-fog"></i></span>
                          <h6 class="mt-2">
                            <i class="ti ti-map-pin"></i> Lester
                          </h6>
                        </div>
                        <div class="ms-auto">
                          <h2 class="fs-7 mb-0">27° C</h2>
                          <h4 class="text-muted fw-light">Fri 20/5</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-group mb-4">
              <!-- Column -->
              <div class="card text-bg-dark">
                <div class="card-body text-center">
                  <div class="text-white p-3">
                    <h2 class="text-white fs-7">27° C</h2>
                    <h5 class="fw-light text-white">Lester, London</h5>
                  </div>
                </div>
              </div>
              <!-- Column -->
              <!-- Column -->
              <div class="card">
                <div class="card-body text-center">
                  <span class="text-muted display-6"><i class="ti ti-cloud"></i></span>
                  <div class="d-flex  align-items-center mt-3">
                    <h5 class="fw-light fs-4">
                      <i class="ti ti-wind"></i> 10kmph
                    </h5>
                    <div class="ms-auto">
                      <h5 class="fw-light fs-4">40%</h5>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Column -->
            </div>
            <div class="col-md-6">
              <div class="card-group mb-4">
                <!-- Column -->
                <div class="card text-bg-success">
                  <div class="card-body text-center text-white">
                    <div class="p-3">
                      <h2 class="text-white fs-7">27° C</h2>
                      <h5 class="fw-light mt-3 text-white">Lester, London</h5>
                    </div>
                  </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="card text-bg-success">
                  <div class="card-body text-center text-white">
                    <span class="display-6"><i class="ti ti-cloud-rain"></i></span>
                    <div class="mt-3">
                      <h5 class="fw-light text-white">12.10.2018</h5>
                    </div>
                  </div>
                </div>
                <!-- Column -->
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
                    <span>C</span>
                    <span class="fs-5">/ 7° C</span>
                  </div>
                </div>
                <div class="card-footer text-primary text-bg-white">5 May 2018</div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card overflow-hidden">
                <div class="card-body text-bg-info text-white text-center p-10">
                  <div class="d-inline-block ms-3">
                    <span class="display-6">4°</span>
                    <span>C</span>
                    <span class="fs-5">/ 7° C</span>
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
            <div class="col-md-6">
              <div class="card text-center overflow-hidden">
                <div class="card-body text-bg-primary text-white p-10">
                  <div class="p-4">
                    <span><i class="display-4 wi wi-sleet"></i></span>
                    <br />
                    <span class="display-6 mt-3">-9°</span>
                    <span>C</span>
                    <h5 class="fw-light text-white">Snowing</h5>
                  </div>
                </div>
                <div class="card-footer text-primary text-bg-white">
                  <h4 class="fw-medium text-primary fs-5">
                    Lester, London
                  </h4>
                  <h5 class="fw-light mb-0 fs-4">Today, 04:00AM</h5>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card overflow-hidden">
                <div class="card-body text-bg-white text-center text-muted p-10">
                  <div class="p-30">
                    <span><i class="display-6 ti ti-cloud"></i></span>
                  </div>
                </div>
                <div class="card-footer text-white text-bg-dark p-30">
                  <div class="d-flex  align-items-center">
                    <div class="text-center">
                      <h3 class="fw-medium text-white fs-6">
                        <i class="text-success ti ti-chevron-up"></i> 14° C
                      </h3>
                      <h5 class="fw-light text-white fs-4 mb-0">High</h5>
                    </div>
                    <div class="ms-auto">
                      <div class="text-center">
                        <h3 class="fw-medium text-white fs-6">
                          <i class="text-danger ti ti-chevron-down"></i> 2° C
                        </h3>
                        <h5 class="fw-light text-white fs-4 mb-0">Low</h5>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- End Row -->
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