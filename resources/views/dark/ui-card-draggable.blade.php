<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  @@include("partials/head.html")
  <title>Modernize Bootstrap Admin</title>
  <link rel="stylesheet" href="{{ URL::asset('build/libs/dragula/dist/dragula.min.css') }}">
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
          @@include("partials/breadcrumb.html", {"title": "Draggable", "subtitle": 'Home'})
          <div class="row">
            <div class="col-12">
              <h4 class="mb-3 fs-5">Basic Draggable options</h4>
              <div class="row draggable-cards" id="draggable-area">
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header text-bg-info">
                      <h4 class="mb-0 text-white card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header text-bg-danger">
                      <h4 class="mb-0 text-white card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header text-bg-success">
                      <h4 class="mb-0 text-white card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header text-bg-warning">
                      <h4 class="mb-0 text-white card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <h4 class="mb-3 mt-5 fs-5">Move card and apply color</h4>
              <div class="row draggable-cards" id="card-colors">
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header">
                      <h4 class="mb-0 text-dark card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header">
                      <h4 class="mb-0 text-dark card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header">
                      <h4 class="mb-0 text-dark card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header">
                      <h4 class="mb-0 text-dark card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
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
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  @@include("partials/scripts.html")
  <script src="{{ URL::asset('build/libs/dragula/dist/dragula.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/forms/draggable-init.js') }}"></script>
</body>

</html>