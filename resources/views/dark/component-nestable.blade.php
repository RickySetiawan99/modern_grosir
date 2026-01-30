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
          @@include("partials/breadcrumb.html", {"title": "Nestable", "subtitle": 'Home'})
          <div class="row">
            <div class="col-lg-4 col-md-12">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Nestable1</h4>
                </div>
                <div class="card-body">
                  <div class="myadmin-dd dd" id="nestable">
                    <ol class="dd-list">
                      <li class="dd-item" data-id="1">
                        <div class="dd-handle">Item 1</div>
                      </li>
                      <li class="dd-item" data-id="2">
                        <div class="dd-handle">Item 2</div>
                        <ol class="dd-list">
                          <li class="dd-item" data-id="3">
                            <div class="dd-handle">Item 3</div>
                          </li>
                          <li class="dd-item" data-id="4">
                            <div class="dd-handle">Item 4</div>
                          </li>
                          <li class="dd-item" data-id="5">
                            <div class="dd-handle">Item 5</div>
                            <ol class="dd-list">
                              <li class="dd-item" data-id="6">
                                <div class="dd-handle">Item 6</div>
                              </li>
                              <li class="dd-item" data-id="7">
                                <div class="dd-handle">Item 7</div>
                              </li>
                              <li class="dd-item" data-id="8">
                                <div class="dd-handle">Item 8</div>
                              </li>
                            </ol>
                          </li>
                          <li class="dd-item" data-id="9">
                            <div class="dd-handle">Item 9</div>
                          </li>
                          <li class="dd-item" data-id="10">
                            <div class="dd-handle">Item 10</div>
                          </li>
                        </ol>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Nestable2</h4>
                </div>
                <div class="card-body">
                  <div class="myadmin-dd-empty dd" id="nestable2">
                    <ol class="dd-list">
                      <li class="dd-item dd3-item" data-id="13">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">Item 13</div>
                      </li>
                      <li class="dd-item dd3-item" data-id="14">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">Item 14</div>
                      </li>
                      <li class="dd-item dd3-item" data-id="14">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">Item 16</div>
                      </li>
                      <li class="dd-item dd3-item" data-id="14">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">Item 17</div>
                      </li>
                      <li class="dd-item dd3-item" data-id="14">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">Item 18</div>
                      </li>
                      <li class="dd-item dd3-item" data-id="14">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">Item 19</div>
                      </li>
                      <li class="dd-item dd3-item" data-id="15">
                        <div class="dd-handle dd3-handle"></div>
                        <div class="dd3-content">Item 15</div>
                        <ol class="dd-list">
                          <li class="dd-item dd3-item" data-id="16">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">Item 16</div>
                          </li>
                          <li class="dd-item dd3-item" data-id="17">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">Item 17</div>
                          </li>
                          <li class="dd-item dd3-item" data-id="18">
                            <div class="dd-handle dd3-handle"></div>
                            <div class="dd3-content">Item 18</div>
                          </li>
                        </ol>
                      </li>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-12">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Nestable3</h4>
                </div>
                <div class="card-body">
                  <div class="dd myadmin-dd" id="nestable-menu">
                    <ol class="dd-list">
                      <li class="dd-item" data-id="13">
                        <div class="dd-handle">Item 13</div>
                      </li>
                      <li class="dd-item" data-id="13">
                        <div class="dd-handle">Item 13</div>
                      </li>
                      <li class="dd-item" data-id="14">
                        <div class="dd-handle">Item 14</div>
                      </li>
                      <li class="dd-item" data-id="15">
                        <div class="dd-handle">Item 15</div>
                        <ol class="dd-list">
                          <li class="dd-item" data-id="16">
                            <div class="dd-handle">Item 16</div>
                          </li>
                          <li class="dd-item" data-id="17">
                            <div class="dd-handle">Item 17</div>
                          </li>
                          <li class="dd-item" data-id="18">
                            <div class="dd-handle">Item 18</div>
                          </li>
                          <li class="dd-item" data-id="16">
                            <div class="dd-handle">Item 19</div>
                          </li>
                          <li class="dd-item" data-id="17">
                            <div class="dd-handle">Item 20</div>
                          </li>
                          <li class="dd-item" data-id="18">
                            <div class="dd-handle">Item 21</div>
                          </li>
                        </ol>
                      </li>
                    </ol>
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
  <script src="{{ URL::asset('build/libs/nestable/jquery.nestable.js') }}"></script>
  <script src="{{ URL::asset('build/js/plugins/nestable-init.js') }}"></script>
</body>

</html>