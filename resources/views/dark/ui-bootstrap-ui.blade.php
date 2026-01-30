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
          @@include("partials/breadcrumb.html", {"title": "Bootstrap UI", "subtitle": 'Home'})
          <div class="row">
            <!-- ------------------------------------- -->
            <!-- 1. Image rounded -->
            <!-- ------------------------------------- -->
            <div class="col-lg-4">
              <!-- start Image with round corner -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Image with round corner</h4>
                  <p class="mb-3 card-subtitle">
                    Use Class for rounded image<mark><code>.rounded</code></mark>
                  </p>
                  <div class="text-center">
                    <img src="{{ URL::asset('build/images/products/s7.jpg') }}" alt="image" class="rounded" width="200" />
                  </div>
                </div>
              </div>
              <!-- end Image with round corner -->
            </div>
            <!-- ------------------------------------- -->
            <!-- 2. Image Circle -->
            <!-- ------------------------------------- -->
            <div class="col-lg-4">
              <!-- start Image with Circle -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Image with Circle</h4>
                  <p class="mb-3 card-subtitle">
                    Use Class for rounded image<mark><code>.rounded-circle</code></mark>
                  </p>
                  <div class="text-center">
                    <img src="{{ URL::asset('build/images/products/s7.jpg') }}" alt="image" class="rounded-circle" width="200" />
                  </div>
                </div>
              </div>
              <!-- end Image with Circle -->
            </div>
            <!-- ------------------------------------- -->
            <!-- 3. Image Thumbnail -->
            <!-- ------------------------------------- -->
            <div class="col-lg-4">
              <!-- start Image Thumbnail -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Image Thumbnail</h4>
                  <p class="mb-3 card-subtitle">
                    Use Class for thumbnail image<mark><code>.img-thumbnail</code></mark>
                  </p>
                  <div class="text-center">
                    <img src="{{ URL::asset('build/images/products/s7.jpg') }}" alt="image" class="img-thumbnail" width="200" />
                  </div>
                </div>
              </div>
              <!-- end Image Thumbnail -->
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