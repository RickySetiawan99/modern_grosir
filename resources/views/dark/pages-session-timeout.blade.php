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
          @@include("partials/breadcrumb.html", {"title": "Session Timeout", "subtitle": 'Home'})
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">
                Session Timeout Notification Control
              </h4>
              <p>
                After a set amount of time, a dialog is shown to the user
                with the option to either log out now, or stay connected. If
                log out now is selected, the page is redirected to a logout
                URL. If stay connected is selected, a keep-alive URL is
                requested through AJAX. If no options is selected after
                another set amount of time, the page is automatically
                redirected to a timeout URL.
              </p>
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
  <script src="{{ URL::asset('build/js/extra-libs/jquery-sessiontimeout/jquery.sessionTimeout.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/extra-libs/jquery-sessiontimeout/session-timeout-init.js') }}"></script>
</body>

</html>