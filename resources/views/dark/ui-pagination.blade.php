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
          @@include("partials/breadcrumb.html", {"title": "Pagination", "subtitle": 'Home'})
          <div class="row">
            <!-- ------------------------------------------------ -->
            <!-- 1. Default Pagination -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-4 d-flex align-items-stretch">
              <!--  start Default Pagination -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">Default Pagination</h4>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">Previous</a>
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
              <!--  end Default Pagination -->
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 2. Pagination with Icon -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-4 d-flex align-items-stretch">
              <!--  start Pagination with Icon -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">Pagination with Icon</h4>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link link" href="javascript:void(0)" aria-label="Previous">
                          <span aria-hidden="true">
                            <i class="ti ti-chevrons-left fs-4"></i>
                          </span>
                        </a>
                      </li>
                      <li class="page-item">
                        <a class="page-link link" href="javascript:void(0)">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link link" href="javascript:void(0)">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link link" href="javascript:void(0)">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link link" href="javascript:void(0)" aria-label="Next">
                          <span aria-hidden="true">
                            <i class="ti ti-chevrons-right fs-4"></i>
                          </span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!--  end Pagination with Icon -->
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 3. Pagination with Active and Disabled States -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-4 d-flex align-items-stretch">
              <!--  start Pagination with Active and Disabled States -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">
                    Pagination with Active and Disabled States
                  </h4>
                  <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item disabled">
                        <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-disabled="true">Previous</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">1</a>
                      </li>
                      <li class="page-item active" aria-current="page">
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
              <!--  end Pagination with Active and Disabled States -->
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 4. Large Pagination -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <!--  start Large Pagination -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Large Pagination</h4>
                  <p class="mb-3 card-subtitle">
                    Fancy larger or smaller pagination? Add
                    <mark><code>.pagination-lg</code></mark> or
                    <mark><code>.pagination-sm</code></mark> for additional
                    sizes.
                  </p>
                  <nav aria-label="...">
                    <ul class="pagination pagination-lg">
                      <li class="page-item active" aria-current="page">
                        <span class="page-link">1</span>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">3</a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!--  end Large Pagination -->
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 5. Small Pagination -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <!--  start Small Pagination -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Small Pagination</h4>
                  <p class="mb-3 card-subtitle">
                    Fancy larger or smaller pagination? Add
                    <mark><code>.pagination-lg</code></mark> or
                    <mark><code>.pagination-sm</code></mark> for additional
                    sizes.
                  </p>
                  <nav aria-label="...">
                    <ul class="pagination pagination-sm">
                      <li class="page-item active" aria-current="page">
                        <span class="page-link">1</span>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">3</a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!--  end Small Pagination -->
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 6. Center Alignment Pagination -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <!--  start Center Alignment Pagination -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Center Alignment Pagination</h4>
                  <p class="mb-3 card-subtitle">
                    Change the alignment of pagination components with flexbox
                    utilities.
                  </p>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                      <li class="page-item disabled">
                        <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-disabled="true">Previous</a>
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
              <!--  end Center Alignment Pagination -->
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 6. Right Alignment Pagination -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <!--  start Right Alignment Pagination -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Right Alignment Pagination</h4>
                  <p class="mb-3 card-subtitle">
                    Change the alignment of pagination components with flexbox
                    utilities.
                  </p>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                      <li class="page-item disabled">
                        <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-disabled="true">Previous</a>
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
              <!--  end Right Alignment Pagination -->
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