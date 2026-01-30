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
          @@include("partials/breadcrumb.html", {"title": "Form Detail", "subtitle": 'Home'})
          <!-- start Form with view only -->
          <div class="card">
            <div class="card-header text-bg-primary">
              <h5 class="mb-0 text-white">Form with view only</h5>
            </div>
            <form class="form-horizontal">
              <div class="form-body">
                <div class="card-body">
                  <h5 class="card-title mb-0">Person Info</h5>
                </div>
                <hr class="m-0" />
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="form-label text-end col-md-3">First Name:</label>
                        <div class="col-md-9">
                          <p>John</p>
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="form-label text-end col-md-3">Last Name:</label>
                        <div class="col-md-9">
                          <p>Doe</p>
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                  </div>
                  <!--/row-->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="form-label text-end col-md-3">Gender:</label>
                        <div class="col-md-9">
                          <p>Male</p>
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="form-label text-end col-md-3">Date of Birth:</label>
                        <div class="col-md-9">
                          <p>11/06/1987</p>
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                  </div>
                  <!--/row-->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="form-label text-end col-md-3">Category:</label>
                        <div class="col-md-9">
                          <p>Category1</p>
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="form-label text-end col-md-3">Membership:</label>
                        <div class="col-md-9">
                          <p>Free</p>
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                  </div>
                  <!--/row-->

                </div>
                <hr class="m-0" />
                <div class="card-body">
                  <h5 class="card-title mb-0">Address</h5>
                </div>
                <hr class="m-0" />
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="form-label text-end col-md-3">Address:</label>
                        <div class="col-md-9">
                          <p>
                            E104, Dharti-2, Near silverstar mall
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="form-label text-end col-md-3">City:</label>
                        <div class="col-md-9">
                          <p>Bhavnagar</p>
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="form-label text-end col-md-3">State:</label>
                        <div class="col-md-9">
                          <p>Gujarat</p>
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                  </div>
                  <!--/row-->
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="form-label text-end col-md-3">Post Code:</label>
                        <div class="col-md-9">
                          <p>457890</p>
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="form-label text-end col-md-3">Country:</label>
                        <div class="col-md-9">
                          <p>India</p>
                        </div>
                      </div>
                    </div>
                    <!--/span-->
                  </div>
                </div>
                <div class="form-actions border-top">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn btn-primary">
                              <i class="ti ti-edit fs-5"></i>
                              Edit
                            </button>
                            <button type="button" class="btn bg-danger-subtle text-danger ms-6">
                              Cancel
                            </button>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6"></div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <!-- start Form with view only -->
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