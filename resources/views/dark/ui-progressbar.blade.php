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
          @@include("partials/breadcrumb.html", {"title": "Progress Bars", "subtitle": 'Home'})
          <div class="row">
            <!-- column -->
            <div class="col-md-4 d-flex align-items-stretch">
              <!-- start Default Progress bars -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">Default Progress bars</h4>
                  <div class="progress">
                    <div class="progress-bar text-bg-danger" style="width: 60%; height: 6px" role="progressbar"></div>
                  </div>
                </div>
              </div>
              <!-- end Default Progress bars -->
            </div>
            <!-- column -->
            <div class="col-md-4 d-flex align-items-stretch">
              <!-- start Label Progress bars -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">Label Progress bars</h4>
                  <div class="progress" style="height: 10px">
                    <div class="progress-bar text-bg-success" style="width: 75%" role="progressbar">
                      75%
                    </div>
                  </div>
                </div>
              </div>
              <!-- end Label Progress bars -->
            </div>
            <!-- column -->
            <div class="col-md-4 d-flex align-items-stretch">
              <!-- start Multiple Progress bar  -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">Multiple Progress bar</h4>
                  <div class="progress">
                    <div class="progress-bar text-bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15"
                      aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar text-bg-cyan" role="progressbar" style="width: 30%" aria-valuenow="30"
                      aria-valuemin="0" aria-valuemax="100"></div>
                    <div class="progress-bar text-bg-info" role="progressbar" style="width: 20%" aria-valuenow="20"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
              <!-- end Multiple Progress bar  -->
            </div>
            <!-- column -->
            <div class="col-md-6 d-flex align-items-stretch">
              <!-- start Colored Progress -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">Colored Progress</h4>
                  <div class="progress">
                    <div class="progress-bar text-bg-danger" style="width: 60%; height: 6px" role="progressbar"></div>
                  </div>
                  <div class="progress mt-4">
                    <div class="progress-bar text-bg-info" style="width: 40%; height: 6px" role="progressbar"></div>
                  </div>
                  <div class="progress mt-4">
                    <div class="progress-bar text-bg-success" style="width: 20%; height: 6px" role="progressbar"></div>
                  </div>
                  <div class="progress mt-4">
                    <div class="progress-bar text-bg-primary" style="width: 30%; height: 6px" role="progressbar"></div>
                  </div>
                  <div class="progress mt-4">
                    <div class="progress-bar text-bg-warning" style="width: 80%; height: 6px" role="progressbar"></div>
                  </div>
                  <div class="progress mt-4">
                    <div class="progress-bar text-bg-inverse" style="width: 40%; height: 6px" role="progressbar"></div>
                  </div>
                </div>
              </div>
              <!-- end Colored Progress -->
            </div>
            <!-- column -->
            <div class="col-md-6 d-flex align-items-stretch">
              <!-- start Different Height Progress -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">Different Height Progress</h4>
                  <div class="progress" style="height: 15px">
                    <div class="progress-bar text-bg-danger" style="width: 60%" role="progressbar"></div>
                  </div>
                  <div class="progress mt-4" style="height: 15px">
                    <div class="progress-bar text-bg-info" style="width: 40%" role="progressbar"></div>
                  </div>
                  <div class="progress mt-4" style="height: 15px">
                    <div class="progress-bar text-bg-success" style="width: 20%" role="progressbar"></div>
                  </div>
                  <div class="progress mt-4" style="height: 15px">
                    <div class="progress-bar text-bg-primary" style="width: 30%" role="progressbar"></div>
                  </div>
                  <div class="progress mt-4" style="height: 15px">
                    <div class="progress-bar text-bg-warning" style="width: 80%" role="progressbar"></div>
                  </div>
                  <div class="progress mt-4" style="height: 15px">
                    <div class="progress-bar text-bg-inverse" style="width: 40%" role="progressbar"></div>
                  </div>
                </div>
              </div>
              <!-- end Different Height Progress -->
            </div>
            <!-- column -->
            <div class="col-md-6 d-flex align-items-stretch">
              <!-- start Striped Progress -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">Striped Progress</h4>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped text-bg-danger" style="width: 60%; height: 6px"
                      role="progressbar"></div>
                  </div>
                  <div class="progress mt-4">
                    <div class="progress-bar progress-bar-striped text-bg-info" style="width: 40%; height: 6px"
                      role="progressbar"></div>
                  </div>
                  <div class="progress mt-4">
                    <div class="progress-bar progress-bar-striped text-bg-success" style="width: 20%; height: 6px"
                      role="progressbar"></div>
                  </div>
                  <div class="progress mt-4">
                    <div class="progress-bar progress-bar-striped text-bg-primary" style="width: 30%; height: 6px"
                      role="progressbar"></div>
                  </div>
                  <div class="progress mt-4">
                    <div class="progress-bar progress-bar-striped text-bg-warning" style="width: 80%; height: 6px"
                      role="progressbar"></div>
                  </div>
                  <div class="progress mt-4">
                    <div class="progress-bar progress-bar-striped text-bg-inverse" style="width: 40%; height: 6px"
                      role="progressbar"></div>
                  </div>
                </div>
              </div>
              <!-- end Striped Progress -->
            </div>
            <!-- column -->
            <div class="col-md-6 d-flex align-items-stretch">
              <!-- start Animated Progress -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">Animated Progress</h4>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped text-bg-primary progress-bar-animated"
                      role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                    </div>
                  </div>
                  <div class="progress mt-4">
                    <div class="progress-bar progress-bar-striped text-bg-info progress-bar-animated" role="progressbar"
                      aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%"></div>
                  </div>
                  <div class="progress mt-4">
                    <div class="progress-bar progress-bar-striped text-bg-success progress-bar-animated"
                      role="progressbar" aria-valuenow="52" aria-valuemin="0" aria-valuemax="100" style="width: 52%">
                    </div>
                  </div>
                  <div class="progress mt-4">
                    <div class="progress-bar progress-bar-striped text-bg-danger progress-bar-animated"
                      role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                    </div>
                  </div>
                  <div class="progress mt-4">
                    <div class="progress-bar progress-bar-striped text-bg-warning progress-bar-animated"
                      role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100" style="width: 12%">
                    </div>
                  </div>
                  <div class="progress mt-4">
                    <div class="progress-bar progress-bar-striped text-bg-dark progress-bar-animated" role="progressbar"
                      aria-valuenow="67" aria-valuemin="0" aria-valuemax="100" style="width: 67%"></div>
                  </div>
                </div>
              </div>
              <!-- end Animated Progress -->
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