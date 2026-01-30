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
          @@include("partials/breadcrumb.html", {"title": "Toastr", "subtitle": 'Home'})
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Basic</h4>
                </div>
                <div class="card-body">
                  <div class="button-group">
                    <button type="button" class="
                        btn
                        px-4
                        fs-4
                        bg-success-subtle
                        text-success
                        fw-medium
                      " id="ts-success">
                      Success
                    </button>
                    <button type="button" class="
                        btn
                        px-4
                        fs-4
                        bg-info-subtle
                        text-info
                        fw-medium
                      " id="ts-info">
                      Info
                    </button>
                    <button type="button" class="
                        btn
                        px-4
                        fs-4
                        bg-warning-subtle
                        text-warning
                        fw-medium
                      " id="ts-warning">
                      Warning
                    </button>
                    <button type="button" class="
                        btn
                        px-4
                        fs-4
                        bg-danger-subtle
                        text-danger
                        fw-medium
                      " id="ts-error">
                      Error
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Animation</h4>
                </div>
                <div class="card-body">
                  <div class="button-group">
                    <button type="button" class="
                        btn
                        px-4
                        fs-4
                        bg-primary-subtle
                        text-primary
                        fw-medium
                      " id="slide-toast">
                      slideDown - slideUp
                    </button>
                    <button type="button" class="
                        btn
                        px-4
                        fs-4
                        bg-success-subtle
                        text-success
                        fw-medium
                      " id="fade-toast">
                      fadeIn - fadeOut
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="border-bottom title-part-padding">
              <h4 class="card-title mb-0">Positions</h4>
            </div>
            <div class="card-body">
              <div class="button-group">
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-primary-subtle
                    text-primary
                    fw-medium
                  " id="pos-top-left">
                  Top Left
                </button>
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-success-subtle
                    text-success
                    fw-medium
                  " id="pos-top-center">
                  Top Center
                </button>
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-warning-subtle
                    text-warning
                    fw-medium
                  " id="pos-top-right">
                  Top Right
                </button>
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-danger-subtle
                    text-danger
                    fw-medium
                  " id="pos-top-full">
                  Top Full Width
                </button>
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-primary-subtle
                    text-primary
                    fw-medium
                  " id="pos-bottom-left">
                  Bottom Left
                </button>
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-success-subtle
                    text-success
                    fw-medium
                  " id="pos-bottom-center">
                  Bottom Center
                </button>
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-warning-subtle
                    text-warning
                    fw-medium
                  " id="pos-bottom-right">
                  Bottom Right
                </button>
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-danger-subtle
                    text-danger
                    fw-medium
                  " id="pos-bottom-full">
                  Bottom Full Width
                </button>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3 col-sm-12">
                  <h4 class="card-title">Only Text</h4>
                  <p>This notification just includes text.</p>
                  <button type="button" class="
                      btn
                      px-4
                      fs-4
                      bg-success-subtle
                      text-success
                      fw-medium
                    " id="text-notification">
                    Show Toast
                  </button>
                </div>
                <div class="col-md-3 col-sm-12">
                  <h4 class="card-title">With Close Button</h4>
                  <p>Close on close button.</p>
                  <button type="button" class="
                      btn
                      px-4
                      fs-4
                      bg-danger-subtle
                      text-danger
                      fw-medium
                    " id="close-button">
                    Show Toast
                  </button>
                </div>
                <div class="col-md-3 col-sm-12">
                  <h4 class="card-title">With Progress</h4>
                  <p>Indicates toast's progress.</p>
                  <button type="button" class="
                      btn
                      px-4
                      fs-4
                      bg-primary-subtle
                      text-primary
                      fw-medium
                    " id="progress-bar">
                    Show Toast
                  </button>
                </div>
                <div class="col-md-3 col-sm-12">
                  <h4 class="card-title">With Button</h4>
                  <p>Add button to force clearing a toast.</p>
                  <button type="button" class="
                      btn
                      px-4
                      fs-4
                      bg-warning-subtle
                      text-warning
                      fw-medium
                    " id="clear-toast-btn">
                    Show Toast
                  </button>
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
  <script src="{{ URL::asset('build/js/plugins/toastr-init.js') }}"></script>
</body>

</html>