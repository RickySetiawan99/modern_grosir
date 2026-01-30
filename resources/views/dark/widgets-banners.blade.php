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
          @@include("partials/breadcrumb.html", {"title": "Banner", "subtitle": 'Home'})
          <div class="row">
            <div class="col-lg-8">
              <div class="card bg-primary-gt text-white overflow-hidden shadow-none">
                <div class="card-body">
                  <div class="row justify-content-between align-items-center">
                    <div class="col-sm-6">
                      <h5 class="fw-semibold mb-9 fs-5 text-white">Welcome back Natalia!</h5>
                      <p class="mb-9 opacity-75">
                        You have earned 54% more than last month
                        which is great thing.
                      </p>
                      <button type="button" class="btn btn-danger">Check</button>
                    </div>
                    <div class="col-sm-5">
                      <div class="position-relative mb-n7 text-end">
                        <img src="{{ URL::asset('build/images/backgrounds/welcome-bg2.png') }}" alt="modernize-img" class="img-fluid">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card bg-info-subtle overflow-hidden shadow-none">
                <div class="card-body py-3">
                  <div class="row justify-content-between align-items-center">
                    <div class="col-sm-6">
                      <h5 class="fw-semibold mb-9 fs-5">Track your every Transaction Easily</h5>
                      <p class="mb-9">
                        Track and record your every income and expence easily to control your balance
                      </p>
                      <button class="btn btn-info">Download</button>
                    </div>
                    <div class="col-sm-5">
                      <div class="position-relative mb-n5 text-center">
                        <img src="{{ URL::asset('build/images/backgrounds/track-bg.png') }}" alt="modernize-img" class="img-fluid" width="180" height="230"
                          />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body text-center">
                      <img src="{{ URL::asset('build/images/backgrounds/website-under-construction.svg') }}" alt="modernize-img"
                        class="img-fluid mb-4" width="200">
                      <h5 class="fw-semibold fs-5 mb-2">Oops something went wrong!</h5>
                      <p class="mb-3 px-xl-5">Trying again to bypasses these temporary error.</p>
                      <button class="btn btn-danger">Retry</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body text-center">
                      <img src="{{ URL::asset('build/images/products/empty-shopping-bag.gif') }}" alt="modernize-img" class="img-fluid mb-4"
                        width="200">
                      <h5 class="fw-semibold fs-5 mb-2">Oop, Your cart is empty!</h5>
                      <p class="mb-3">Get back to shopping and get rewards from it.</p>
                      <button class="btn btn-primary">Go for shopping!</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body text-center">
                  <p>LEVEL UP</p>
                  <img src="{{ URL::asset('build/images/backgrounds/gold.png') }}" alt="modernize-img" class="img-fluid mb-4" width="150">
                  <h5 class="fw-semibold fs-5 mb-2">You reach all Notifications</h5>
                  <p class="mb-3 px-xl-5">Congratulations, Tap to continue next task.</p>
                  <button class="btn btn-primary">Yes, Got it!</button>
                </div>
              </div>
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="fw-semibold fs-5 mb-4">Mutual Friend Revealed</h5>
                  <div class="position-relative overflow-hidden d-inline-block">
                    <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" alt="modernize-img"
                      class="img-fluid mb-4 rounded-circle position-relative" width="140">
                    <span
                      class="badge round-20 text-bg-danger fs-2 position-absolute top-0 end-0 d-flex align-items-center justify-content-center me-3 mt-2"
                     >1</span>
                  </div>
                  <h5 class="fw-semibold fs-5 mb-2">Tommoie Henderson</h5>
                  <p class="mb-3 px-xl-5">Accept the request and type a message</p>
                  <div class="d-flex align-items-center justify-content-center gap-3">
                    <button class="btn btn-primary">Accept</button>
                    <button class="btn bg-danger-subtle text-danger">Remove</button>
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