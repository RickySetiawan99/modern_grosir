<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  @@include("partials/head.html")
  <title>Modernize Bootstrap Admin</title>
  <link rel="stylesheet" href="{{ URL::asset('build/libs/prismjs/themes/prism-okaidia.min.css') }}">
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
          @@include("partials/breadcrumb.html", {"title": "Form Input Grid", "subtitle": 'Home'})
          <!-- start Horizontal Grid -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-3">Horizontal Grid</h4>
              <form action="#">
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-1">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="1" />
                      </div>
                    </div>
                    <div class="col-md-11">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-11" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-2" />
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-10" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-3" />
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-9" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-4" />
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-8" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-5" />
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-7" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-6" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-6" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="d-flex justify-content-end gap-6">
                    <button type="submit" class="btn btn-primary ">
                      Submit
                    </button>
                    <button type="reset" class="btn bg-danger-subtle text-danger ">
                      Reset
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- end Horizontal Grid -->
          <!-- start Grid With Row Label -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-3">Grid With Row Label</h4>
              <form action="#">
                <div class="form-body">
                  <label class="form-label">Row Label </label>
                  <div class="row">
                    <div class="col-md-1">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="1" />
                      </div>
                    </div>
                    <div class="col-md-11">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-11" />
                      </div>
                    </div>
                  </div>
                  <label class="form-label">Row Label </label>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-2" />
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-10" />
                      </div>
                    </div>
                  </div>
                  <label class="form-label">Row Label </label>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-3" />
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-9" />
                      </div>
                    </div>
                  </div>
                  <label class="form-label">Row Label </label>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-4" />
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-8" />
                      </div>
                    </div>
                  </div>
                  <label class="form-label">Row Label </label>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-5" />
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-7" />
                      </div>
                    </div>
                  </div>
                  <label class="form-label">Row Label </label>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-6" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-6" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="d-flex justify-content-end gap-6">
                    <button type="submit" class="btn btn-primary ">
                      Submit
                    </button>
                    <button type="reset" class="btn bg-danger-subtle text-danger ">
                      Reset
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- end Grid With Row Label -->
          <!-- start Grid With Label -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-3">Grid With Label</h4>
              <form action="#">
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-1">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="1" />
                      </div>
                    </div>
                    <div class="col-md-11">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-11" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-2" />
                      </div>
                    </div>
                    <div class="col-md-10">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-10" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-3" />
                      </div>
                    </div>
                    <div class="col-md-9">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-9" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-4" />
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-8" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-5" />
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-7" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-6" />
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-6" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="d-flex justify-content-end gap-6">
                    <button type="submit" class="btn btn-primary ">
                      Submit
                    </button>
                    <button type="reset" class="btn bg-danger-subtle text-danger ">
                      Reset
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- end Grid With Label -->
          <!-- start Right Offset -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-3">Right Offset</h4>
              <form action="#">
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-12" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-11">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-11" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-10" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-9" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-8" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-7" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-6" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-5" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-4" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-3" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-2" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="1" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="text-start">
                    <button type="submit" class="btn btn-primary  me-6">
                      Submit
                    </button>
                    <button type="reset" class="btn bg-danger-subtle text-danger ">
                      Reset
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- end Right Offset -->
          <!-- start Left Offset -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-3">Left Offset</h4>
              <form action="#">
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-12" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-11 ms-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-11 ms-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 ms-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-10 ms-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 ms-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-9 ms-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 ms-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-8 ms-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7 ms-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-7 ms-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 ms-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-6 ms-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-5 ms-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-5 ms-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 ms-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-4 ms-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-3 ms-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-3 ms-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 ms-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-2 ms-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-1 ms-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="11" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="text-end">
                    <button type="submit" class="btn btn-primary  me-6">
                      Submit
                    </button>
                    <button type="reset" class="btn bg-danger-subtle text-danger ">
                      Reset
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- end Left Offset -->
          <!-- start Centered Input -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-3">Centered Input</h4>
              <form action="#">
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-12" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 m-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-10 m-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 m-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-8 m-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 m-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-6 m-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 m-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-4 m-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 m-auto">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-2 m-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-md-4 text-end form-label">Label</label>
                    <div class="col-md-4">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-4" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-md-3 text-end form-label">Label</label>
                    <div class="col-md-6">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-6" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label class="col-md-2 text-end form-label">Label</label>
                    <div class="col-md-8">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-8" />
                      </div>
                    </div>
                  </div>
                  <div class="row justify-content-center">

                    <div class="col-md-10">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="col-md-10" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary me-6 ">
                      Submit
                    </button>
                    <button type="reset" class="btn bg-danger-subtle text-danger ">
                      Reset
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- end Centered Input -->
          <!-- start Centered Input with Default label -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-3">Centered Input with Default label</h4>
              <form action="#">
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-12" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 m-auto">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-10 m-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9 m-auto">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-8 m-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 m-auto">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-6 m-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-4 m-auto">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-4 m-auto" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 m-auto">
                      <div class="mb-3">
                        <label class="form-label">Label</label>
                        <input type="text" class="form-control" placeholder="col-md-2 m-auto" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions mt-4">
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary  me-6">
                      Submit
                    </button>
                    <button type="reset" class="btn bg-danger-subtle text-danger ">
                      Reset
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- end Centered Input with Default label -->
          <!-- start Grid With Row Label -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-3">Grid With Row Label</h4>
              <form action="#">
                <div class="form-body">
                  <div class="mb-3">
                    <div class="row">
                      <label class="col-lg-1 form-label">Label</label>
                      <div class="col-lg-11">
                        <div class="row">
                          <div class="col-md-1 mb-2 mb-md-0">
                            <input type="text" class="form-control" placeholder="col-md-1" />
                          </div>
                          <div class="col-md-11">
                            <input type="text" class="form-control" placeholder="col-md-11" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <label class="col-lg-1 form-label">Label</label>
                      <div class="col-lg-11">
                        <div class="row">
                          <div class="col-md-2 mb-2 mb-md-0">
                            <input type="text" class="form-control" placeholder="col-md-2" />
                          </div>
                          <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="col-md-10" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <label class="col-lg-1 form-label">Label</label>
                      <div class="col-lg-11">
                        <div class="row">
                          <div class="col-md-3 mb-2 mb-md-0">
                            <input type="text" class="form-control" placeholder="col-md-3" />
                          </div>
                          <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="col-md-9" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <label class="col-lg-1 form-label">Label</label>
                      <div class="col-lg-11">
                        <div class="row">
                          <div class="col-md-4 mb-2 mb-md-0">
                            <input type="text" class="form-control" placeholder="col-md-4" />
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="col-md-8" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <label class="col-lg-1 form-label">Label</label>
                      <div class="col-lg-11">
                        <div class="row">
                          <div class="col-md-5 mb-2 mb-md-0">
                            <input type="text" class="form-control" placeholder="col-md-5" />
                          </div>
                          <div class="col-md-7">
                            <input type="text" class="form-control" placeholder="col-md-7" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <label class="col-lg-1 form-label">Label</label>
                      <div class="col-lg-11">
                        <div class="row">
                          <div class="col-md-6 mb-2 mb-md-0">
                            <input type="text" class="form-control" placeholder="col-md-6" />
                          </div>
                          <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="col-md-6" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="text-end">
                    <button type="submit" class="btn btn-primary  me-6">
                      Submit
                    </button>
                    <button type="reset" class="btn bg-danger-subtle text-danger ">
                      Reset
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- end Grid With Row Label -->
          <!-- start Grid With Inline Input Label -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-3">Grid With Inline Input Label</h4>
              <form action="#">
                <div class="form-body">
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="row">
                          <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="col-md-2" />
                          </div>
                          <label class="form-label col-md-4">Label </label>
                        </div>
                      </div>
                      <div class="col-md-10">
                        <div class="row">
                          <label class="form-label col-md-4 text-end">Label </label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="col-md-10" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-3">
                        <div class="row">
                          <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="col-md-3" />
                          </div>
                          <label class="form-label col-md-4">Label </label>
                        </div>
                      </div>
                      <div class="col-md-9">
                        <div class="row">
                          <label class="form-label col-md-4 text-end">Label </label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="col-md-9" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="row">
                          <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="col-md-4" />
                          </div>
                          <label class="form-label col-md-4">Label </label>
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="row">
                          <label class="form-label col-md-4 text-end">Label </label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="col-md-8" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-5">
                        <div class="row">
                          <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="col-md-5" />
                          </div>
                          <label class="form-label col-md-4">Label </label>
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="row">
                          <label class="form-label col-md-4 text-end">Label </label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="col-md-7" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="row">
                          <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="col-md-6" />
                          </div>
                          <label class="form-label col-md-4">Label </label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="row">
                          <label class="form-label col-md-4 text-end">Label </label>
                          <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="col-md-6" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="text-end">
                    <button type="submit" class="btn btn-primary  me-6">
                      Submit
                    </button>
                    <button type="reset" class="btn bg-danger-subtle text-danger ">
                      Reset
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- end Grid With Inline Input Label -->
          <!-- start Multiple Input With Default Label -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-3">Multiple Input With Default Label</h4>
              <form action="#">
                <div class="form-body">
                  <label class="form-label">Label </label>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="First Input &amp; First Row" />
                      </div>
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="First Input &amp; Second Row" />
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Second Input &amp; First Row" />
                      </div>
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Second Input &amp; Second Row" />
                      </div>
                    </div>
                  </div>
                  <label class="form-label">Multiple width Input Label</label>
                  <div class="row">
                    <div class="col-md-7">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="First Input &amp; First Row" />
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Second Input &amp; First Row" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="First Input &amp; Second Row" />
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Second Input &amp; Second Row" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="text-end">
                    <button type="submit" class="btn btn-primary  me-6">
                      Submit
                    </button>
                    <button type="reset" class="btn bg-danger-subtle text-danger ">
                      Reset
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- end Multiple Input With Default Label -->
          <!-- start Multiple Input With Inline Label -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title mb-3">Multiple Input With Inline Label</h4>
              <form action="#">
                <div class="form-body">
                  <div class="form-group row">
                    <label class="form-label col-md-2">Label </label>
                    <div class="col-md-10">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="mb-3">
                            <input type="text" class="form-control" placeholder="First Input &amp; First Row" />
                          </div>
                          <div class="mb-3">
                            <input type="text" class="form-control" placeholder="First Input &amp; Second Row" />
                          </div>
                        </div>
                        <div class="col-md-8">
                          <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Second Input &amp; First Row" />
                          </div>
                          <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Second Input &amp; Second Row" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="form-label col-md-2">Multiple width Input Label
                    </label>
                    <div class="col-md-10">
                      <div class="row">
                        <div class="col-md-7">
                          <div class="mb-3">
                            <input type="text" class="form-control" placeholder="First Input &amp; First Row" />
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Second Input &amp; First Row" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="mb-3">
                            <input type="text" class="form-control" placeholder="First Input &amp; Second Row" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Second Input &amp; Second Row" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="text-end">
                    <button type="submit" class="btn btn-primary  me-6">
                      Submit
                    </button>
                    <button type="reset" class="btn bg-danger-subtle text-danger ">
                      Reset
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- end Multiple Input With Inline Label -->
        </div>
      </div>
      @@include("partials/customizer.html")
    </div>

    @@include("partials/header-components/dd-searchbar.html")
    @@include("partials/header-components/dd-shopping-cart.html")
  </div>
  <div class="dark-transparent sidebartoggler"></div>
  @@include("partials/scripts.html")
  <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
</body>

</html>