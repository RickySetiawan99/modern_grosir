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
          @@include("partials/breadcrumb.html", {"title": "Search Result", "subtitle": 'Home'})
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Search Result For "Angular Js"</h4>
              <p class="card-subtitle mb-4">
                About 14,700 result ( 0.10 seconds)
              </p>
              <div class="vstack gap-3">
                <div class="pb-3 border-bottom">
                  <a href="javascript:void(0)" class="text-dark fw-semibold link-primary fs-5">AngularJs</a>
                  <a href="javascript:void(0)" class="text-primary d-block">http://www.google.com/angularjs</a>
                  <p class="mb-0">
                    Lorem Ipsum viveremus probamus opus apeirian haec
                    perveniri, memoriter.Praebeat pecunias viveremus
                    probamus opus apeirian haec perveniri, memoriter.
                  </p>
                </div>
                <div class="pb-3 border-bottom">
                  <a href="javascript:void(0)" class="text-dark fw-semibold link-primary fs-5">AngularJs — Superheroic JavaScript MVW Framework</a>
                  <a href="javascript:void(0)" class="text-primary d-block">http://www.google.com/angularjs</a>
                  <p class="mb-0">
                    Lorem Ipsum viveremus probamus opus apeirian haec
                    perveniri, memoriter.Praebeat pecunias viveremus
                    probamus opus apeirian haec perveniri, memoriter.
                  </p>
                </div>
                <div class="pb-3 border-bottom">
                  <a href="javascript:void(0)" class="text-dark fw-semibold link-primary fs-5">AngularJS Tutorial - W3Schools</a>
                  <a href="javascript:void(0)" class="text-primary d-block">http://www.google.com/angularjs</a>
                  <p class="mb-0">
                    Lorem Ipsum viveremus probamus opus apeirian haec
                    perveniri, memoriter.Praebeat pecunias viveremus
                    probamus opus apeirian haec perveniri, memoriter.
                  </p>
                </div>
                <div class="pb-3 border-bottom">
                  <a href="javascript:void(0)" class="text-dark fw-semibold link-primary fs-5">Introduction to AngularJS - W3Schools</a>
                  <a href="javascript:void(0)" class="text-primary d-block">http://www.google.com/angularjs</a>
                  <p class="mb-0">
                    Lorem Ipsum viveremus probamus opus apeirian haec
                    perveniri, memoriter.Praebeat pecunias viveremus
                    probamus opus apeirian haec perveniri, memoriter.
                  </p>
                </div>
                <div class="pb-3 border-bottom">
                  <a href="javascript:void(0)" class="text-dark fw-semibold link-primary fs-5">AngularJS Tutorial</a>
                  <a href="javascript:void(0)" class="text-primary d-block">http://www.google.com/angularjs</a>
                  <p class="mb-0">
                    Lorem Ipsum viveremus probamus opus apeirian haec
                    perveniri, memoriter.Praebeat pecunias viveremus
                    probamus opus apeirian haec perveniri, memoriter.
                  </p>
                </div>
                <div class="pb-3 border-bottom">
                  <a href="javascript:void(0)" class="text-dark fw-semibold link-primary fs-5">Angular 2: One framework</a>
                  <a href="javascript:void(0)" class="text-primary d-block">http://www.google.com/angularjs</a>
                  <p class="mb-0">
                    Lorem Ipsum viveremus probamus opus apeirian haec
                    perveniri, memoriter.Praebeat pecunias viveremus
                    probamus opus apeirian haec perveniri, memoriter.
                  </p>
                </div>
              </div>

              <nav aria-label="Page navigation example" class="mt-5">
                <ul class="pagination">
                  <li class="page-item disabled">
                    <a class="page-link" href="javascript:void(0)" tabindex="-1">Previous</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="javascript:void(0)">1</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="javascript:void(0)">2</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="javascript:void(0)">3</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="javascript:void(0)">Next</a>
                  </li>
                </ul>
              </nav>
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