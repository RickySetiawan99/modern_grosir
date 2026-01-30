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
          @@include("partials/breadcrumb.html", {"title": "Buttons", "subtitle": 'Home'})
          <div class="row">
            <!-- ------------------------------------------------ -->
            <!-- 1. Solid Buttons -->
            <!-- ------------------------------------------------ -->
            <div class="col-xl-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">General Buttons</h4>
                  <p class="mb-3 card-subtitle">
                    Use a classes <mark><code>btn btn-success</code></mark> to
                    quickly create a General btn.
                  </p>
                  <div class="button-group">
                    <button type="button" class="btn btn-primary">
                      Primary
                    </button>
                    <button type="button" class="btn btn-secondary">
                      Secondary
                    </button>
                    <button type="button" class="btn btn-success">
                      Success
                    </button>
                    <button type="button" class="btn btn-info">
                      Info
                    </button>
                    <button type="button" class="btn btn-warning">
                      Warning
                    </button>
                    <button type="button" class="btn btn-danger">
                      Danger
                    </button>
                    <button type="button" class="btn btn-light">
                      Light
                    </button>
                    <button type="button" class="btn btn-dark">
                      Dark
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 2. Light Buttons -->
            <!-- ------------------------------------------------ -->
            <div class="col-xl-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Light Buttons</h4>
                  <p class="mb-3 card-subtitle">
                    Use <mark><code>btn-light</code></mark> class for light
                    buttons
                  </p>
                  <div class="button-group">
                    <button type="button" class="btn bg-primary-subtle text-primary">
                      Primary
                    </button>
                    <button type="button" class="btn bg-secondary-subtle text-secondary">
                      Secondary
                    </button>
                    <button type="button" class="btn bg-success-subtle text-success">
                      Success
                    </button>
                    <button type="button" class="btn bg-info-subtle text-info">
                      Info
                    </button>
                    <button type="button" class="btn bg-warning-subtle text-warning">
                      Warning
                    </button>
                    <button type="button" class="btn bg-danger-subtle text-danger">
                      Danger
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 3. Buttons with outline -->
            <!-- ------------------------------------------------ -->
            <div class="col-xl-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Button with outline</h4>
                  <p class="mb-3 card-subtitle">
                    Use a classes
                    <mark><code>btn btn-outline-success</code></mark> to
                    quickly create a General btn.
                  </p>
                  <div class="button-group">
                    <button type="button" class="btn btn-outline-primary">
                      Primary
                    </button>
                    <button type="button" class="btn btn-outline-secondary">
                      Secondary
                    </button>
                    <button type="button" class="btn btn-outline-success">
                      Success
                    </button>
                    <button type="button" class="btn btn-outline-info">
                      Info
                    </button>
                    <button type="button" class="btn btn-outline-warning">
                      Warning
                    </button>
                    <button type="button" class="btn btn-outline-danger">
                      Danger
                    </button>
                    <button type="button" class="btn btn-outline-light">
                      Light
                    </button>
                    <button type="button" class="btn btn-outline-dark">
                      Dark
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 4. Buttons Tags -->
            <!-- ------------------------------------------------ -->
            <div class="col-xl-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Button Tags</h4>
                  <p class="mb-3 card-subtitle">
                    The <mark><code>.btn</code></mark> classes are designed to
                    be used with the
                    <mark><code>.&lt;button&gt;</code></mark> element.
                  </p>
                  <div class="button-group">
                    <a class="btn mb-1 btn-primary" href="javascript:void(0)" role="button">Link</a>
                    <button class="btn mb-1 btn-primary" type="submit">
                      Button
                    </button>
                    <input class="btn mb-1 btn-primary" type="button" value="Input" />
                    <input class="btn mb-1 btn-primary" type="submit" value="Submit" />
                    <input class="btn mb-1 btn-primary" type="reset" value="Reset" />
                  </div>
                </div>
              </div>
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 5. Rounded Buttons -->
            <!-- ------------------------------------------------ -->
            <div class="col-xl-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Rounded Buttons</h4>
                  <p class="mb-3 card-subtitle">
                    Use a classes
                    <mark><code>btn btn-rounded btn-success</code></mark> to
                    quickly create a General btn.
                  </p>
                  <div class="button-group">
                    <button type="button" class="btn btn-rounded btn-primary">
                      Primary
                    </button>
                    <button type="button" class="btn btn-rounded btn-secondary">
                      Secondary
                    </button>
                    <button type="button" class="btn btn-rounded btn-success">
                      Success
                    </button>
                    <button type="button" class="btn btn-rounded btn-info">
                      Info
                    </button>
                    <button type="button" class="btn btn-rounded btn-warning">
                      Warning
                    </button>
                    <button type="button" class="btn btn-rounded btn-danger">
                      Danger
                    </button>
                    <button type="button" class="btn btn-rounded btn-light">
                      Light
                    </button>
                    <button type="button" class="btn btn-rounded btn-dark">
                      Dark
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 6. Light Rounded Buttons -->
            <!-- ------------------------------------------------ -->
            <div class="col-xl-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Rounded light Buttons</h4>
                  <p class="mb-3 card-subtitle">
                    Use a classes
                    <mark><code>btn btn-rounded bg-success-subtle</code></mark>
                    to quickly create a General btn.
                  </p>
                  <div class="button-group">
                    <button type="button" class="btn btn-rounded bg-primary-subtle text-primary">
                      Primary
                    </button>
                    <button type="button" class="btn btn-rounded bg-secondary-subtle text-secondary">
                      Secondary
                    </button>
                    <button type="button" class="btn btn-rounded bg-success-subtle text-success">
                      Success
                    </button>
                    <button type="button" class="btn waves-effect waves-light btn-rounded bg-info-subtle text-info">
                      Info
                    </button>
                    <button type="button" class="btn btn-rounded bg-warning-subtle text-warning">
                      Warning
                    </button>
                    <button type="button" class="btn waves-effect waves-light btn-rounded bg-danger-subtle text-danger">
                      Danger
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 7. Rounded outline Buttons -->
            <!-- ------------------------------------------------ -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Rounded outlined Buttons</h4>
                  <p class="mb-3 card-subtitle">
                    Use a classes
                    <mark><code>btn btn-rounded btn-outline-success</code></mark>
                    to quickly create a General btn.
                  </p>
                  <div class="button-group">
                    <button type="button" class="btn btn-rounded btn-outline-primary">
                      Primary
                    </button>
                    <button type="button" class="btn btn-rounded btn-outline-secondary">
                      Secondary
                    </button>
                    <button type="button" class="btn btn-rounded btn-outline-success">
                      Success
                    </button>
                    <button type="button" class="btn btn-rounded btn-outline-info">
                      Info
                    </button>
                    <button type="button" class="btn btn-rounded btn-outline-warning">
                      Warning
                    </button>
                    <button type="button" class="btn btn-rounded btn-outline-danger">
                      Danger
                    </button>
                    <button type="button" class="btn btn-rounded btn-outline-light">
                      Light
                    </button>
                    <button type="button" class="btn btn-rounded btn-outline-dark">
                      Dark
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 8. Button sizes -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Button Sizes</h4>
                  <p class="mb-3 card-subtitle">
                    Use a classes
                    <mark><code>btn btn-lg btn-success</code></mark> to
                    quickly create a General btn.
                  </p>
                  <div class="button-group">
                    <button type="button" class="btn btn-lg btn-primary">
                      Large .btn-lg
                    </button>
                    <button type="button" class="btn btn-primary">
                      Normal .btn
                    </button>
                    <button type="button" class="btn btn-sm btn-primary">
                      Small .btn-sm
                    </button>
                    <button type="button" class="btn btn-xs btn-primary">
                      Tiny .btn-xs
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 9. Rounded Button sizes -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Button Sizes with rounded</h4>
                  <p class="mb-3 card-subtitle">
                    Use a classes
                    <mark><code>btn btn-lg btn-rounded btn-success</code></mark>
                    to create a btn.
                  </p>
                  <div class="button-group">
                    <button type="button" class="btn btn-lg btn-rounded btn-primary">
                      Large .btn-lg
                    </button>
                    <button type="button" class="btn btn-rounded btn-primary">
                      Normal .btn
                    </button>
                    <button type="button" class="btn btn-rounded btn-sm btn-primary">
                      Small .btn-sm
                    </button>
                    <button type="button" class="btn btn-rounded btn-xs btn-primary">
                      Tiny .btn-xs
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 10. Block Button -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 col-xl-3 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Block buttons</h4>
                  <p class="mb-3 card-subtitle">
                    Use a classes for <mark><code>d-grid gap-2</code></mark>creating a block button.
                  </p>
                  <div class="row justify-content-center">
                    <div class="col-md-12 d-grid gap-2">
                      <button type="button" class="btn waves-effect waves-light btn-primary">
                        Primary
                      </button>
                      <button type="button" class="btn waves-effect waves-light btn-secondary">
                        Secondary
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 11. Block Rounded Button -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 col-xl-3 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Rounded Block buttons</h4>
                  <p class="mb-3 card-subtitle">
                    Use a classe <mark><code>rounded-pill</code></mark>.
                  </p>
                  <div class="row justify-content-center">
                    <div class="col-md-12 d-grid gap-2">
                      <button type="button" class="btn rounded-pill waves-effect waves-light btn-primary">
                        Primary
                      </button>
                      <button type="button" class="btn rounded-pill waves-effect waves-light btn-secondary">
                        Secondary
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 12. Light Block Button -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 col-xl-3 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Light Block buttons</h4>
                  <p class="mb-3 card-subtitle">
                    Use a classes <mark><code>d-grid gap-2</code></mark> to
                    quickly create a block button.
                  </p>
                  <div class="row justify-content-center">
                    <div class="col-md-12 d-grid gap-2">
                      <button type="button" class="btn waves-effect waves-light bg-primary-subtle text-primary ">
                        Primary
                      </button>
                      <button type="button" class="btn waves-effect waves-light bg-secondary-subtle text-secondary ">
                        Secondary
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 13. Light Block Rounded Button -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 col-xl-3 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Rounded Block buttons</h4>
                  <p class="mb-3 card-subtitle">
                    Use a classes
                    <mark><code>btn btn-block btn-success</code></mark> to
                    quickly create a General btn.
                  </p>
                  <div class="row justify-content-center">
                    <div class="col-md-12 d-grid gap-2">
                      <button type="button"
                        class="btn rounded-pill waves-effect waves-light bg-primary-subtle text-primary ">
                        Primary
                      </button>
                      <button type="button"
                        class="btn rounded-pill waves-effect waves-light bg-secondary-subtle text-secondary ">
                        Secondary
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 14. Block Outline Button -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 col-xl-3 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Block outline buttons</h4>
                  <p class="mb-3 card-subtitle">
                    Use a classes
                    <mark><code>btn btn-outline-success</code></mark> to
                    quickly create a General btn.
                  </p>
                  <div class="row justify-content-center">
                    <div class="col-md-12 d-grid gap-2">
                      <button type="button" class="btn waves-effect waves-light btn-outline-primary">
                        Primary
                      </button>
                      <button type="button" class="btn waves-effect waves-light btn-outline-secondary">
                        Secondary
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 15. Rounded Block Outline Button -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 col-xl-3 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Rounded outline Block buttons</h4>
                  <p class="mb-3 card-subtitle">
                    Use a classes <mark><code>rounded-pill</code></mark> to
                    quickly create a General btn.
                  </p>
                  <div class="row justify-content-center">
                    <div class="col-md-12 d-grid gap-2">
                      <button type="button" class="btn rounded-pill waves-effect waves-light btn-outline-primary">
                        Primary
                      </button>
                      <button type="button" class="btn rounded-pill waves-effect waves-light btn-outline-secondary">
                        Secondary
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 16. Large Block Outline Button -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 col-xl-3 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Large Block buttons</h4>
                  <p class="mb-3 card-subtitle">
                    Use a classes
                    <mark><code>btn btn-lg btn-success</code></mark> to
                    quickly create a General btn.
                  </p>
                  <div class="row justify-content-center">
                    <div class="col-md-12 d-grid gap-2">
                      <button type="button" class="btn btn-lg waves-effect waves-light btn-outline-primary">
                        Primary
                      </button>
                      <button type="button" class="btn btn-lg waves-effect waves-light btn-outline-secondary">
                        Secondary
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Button with icon</h4>

                  <div class="row button-group">
                    <div class="col-lg-6">
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-primary d-flex align-items-center">
                        <i class="ti ti-heart fs-4 me-2"></i>
                        Heart
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-secondary d-flex align-items-center">
                        <i class="ti ti-heart fs-4 me-2"></i>
                        Heart
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-success d-flex align-items-center">
                        <i class="ti ti-heart fs-4 me-2"></i>
                        Heart
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-info d-flex align-items-center">
                        <i class="ti ti-heart fs-4 me-2"></i>
                        Heart
                      </button>
                    </div>
                    <div class="col-lg-6">
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-warning d-flex align-items-center">
                        <i class="ti ti-heart fs-4 me-2"></i>
                        Heart
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-danger d-flex align-items-center">
                        <i class="ti ti-heart fs-4 me-2"></i>
                        Heart
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-light d-flex align-items-center">
                        <i class="ti ti-heart fs-4 me-2"></i>
                        Heart
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-dark d-flex align-items-center">
                        <i class="ti ti-heart fs-4 me-2"></i>
                        Heart
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Rounded Button with icon</h4>


                  <div class="row button-group">
                    <div class="col-lg-6">
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-primary d-flex align-items-center">
                        <i class="ti ti-send fs-4 me-2"></i>
                        Send
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-secondary d-flex align-items-center">
                        <i class="ti ti-send fs-4 me-2"></i>
                        Send
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-success d-flex align-items-center">
                        <i class="ti ti-send fs-4 me-2"></i>
                        Send
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-info d-flex align-items-center">
                        <i class="ti ti-send fs-4 me-2"></i>
                        Send
                      </button>
                    </div>
                    <div class="col-lg-6">
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-warning d-flex align-items-center">
                        <i class="ti ti-send fs-4 me-2"></i>
                        Send
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-danger d-flex align-items-center">
                        <i class="ti ti-send fs-4 me-2"></i>
                        Send
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-light d-flex align-items-center">
                        <i class="ti ti-send fs-4 me-2"></i>
                        Send
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-dark d-flex align-items-center">
                        <i class="ti ti-send fs-4 me-2"></i>
                        Send
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Outline Button with icon</h4>


                  <div class="row button-group">
                    <div class="col-lg-6">
                      <button
                        class="btn mb-1 d-flex align-items-center justify-content-center w-100 btn-outline-primary waves-effect waves-light"
                        type="button">
                        <i class="ti ti-mail fs-4 me-2"></i>
                        Mail
                      </button>

                      <button class="btn mb-1 d-block w-100 btn-outline-secondary waves-effect waves-light"
                        type="button">
                        <i class="ti ti-mail fs-4 me-2"></i>
                        Mail
                      </button>

                      <button class="btn mb-1 d-block w-100 btn-outline-success waves-effect waves-light" type="button">
                        <i class="ti ti-mail fs-4 me-2"></i>
                        Mail
                      </button>

                      <button class="btn mb-1 d-block w-100 btn-outline-info waves-effect waves-light" type="button">
                        <i class="ti ti-mail fs-4 me-2"></i>
                        Mail
                      </button>
                    </div>
                    <div class="col-lg-6">
                      <button class="btn mb-1 d-block w-100 btn-outline-warning waves-effect waves-light" type="button">
                        <i class="ti ti-mail fs-4 me-2"></i>
                        Mail
                      </button>

                      <button class="btn mb-1 d-block w-100 btn-outline-danger waves-effect waves-light" type="button">
                        <i class="ti ti-mail fs-4 me-2"></i>
                        Mail
                      </button>

                      <button class="btn mb-1 d-block w-100 btn-outline-light text-dark waves-effect waves-light"
                        type="button">
                        <i class="ti ti-mail fs-4 me-2"></i>
                        Mail
                      </button>

                      <button class="btn mb-1 d-block w-100 btn-outline-dark waves-effect waves-light" type="button">
                        <i class="ti ti-mail fs-4 me-2"></i>
                        Mail
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Rounded Outline Button with icon</h4>


                  <div class="row button-group">
                    <div class="col-lg-6">
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-outline-primary d-flex align-items-center">
                        <i class="ti ti-inbox fs-4 me-2"></i>
                        Inbox
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-outline-secondary d-flex align-items-center">
                        <i class="ti ti-inbox fs-4 me-2"></i>
                        Inbox
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-outline-success d-flex align-items-center">
                        <i class="ti ti-inbox fs-4 me-2"></i>
                        Inbox
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-outline-info d-flex align-items-center">
                        <i class="ti ti-inbox fs-4 me-2"></i>
                        Inbox
                      </button>
                    </div>
                    <div class="col-lg-6">
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-outline-warning d-flex align-items-center">
                        <i class="ti ti-inbox fs-4 me-2"></i>
                        Inbox
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-outline-danger d-flex align-items-center">
                        <i class="ti ti-inbox fs-4 me-2"></i>
                        Inbox
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-outline-light d-flex text-dark align-items-center">
                        <i class="ti ti-inbox fs-4 me-2"></i>
                        Inbox
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-outline-dark d-flex align-items-center">
                        <i class="ti ti-inbox fs-4 me-2"></i>
                        Inbox
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Light Button with icon</h4>


                  <div class="row button-group">
                    <div class="col-lg-6">
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 bg-primary-subtle text-primary  d-flex align-items-center">
                        <i class="ti ti-bell fs-4 me-2"></i>
                        Alert
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 bg-secondary-subtle text-secondary  d-flex align-items-center">
                        <i class="ti ti-bell fs-4 me-2"></i>
                        Alert
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 bg-success-subtle text-success  d-flex align-items-center">
                        <i class="ti ti-bell fs-4 me-2"></i>
                        Alert
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 bg-info-subtle text-info  d-flex align-items-center">
                        <i class="ti ti-bell fs-4 me-2"></i>
                        Alert
                      </button>
                    </div>
                    <div class="col-lg-6">
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 bg-warning-subtle text-warning  d-flex align-items-center">
                        <i class="ti ti-bell fs-4 me-2"></i>
                        Alert
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 bg-danger-subtle text-danger  d-flex align-items-center">
                        <i class="ti ti-bell fs-4 me-2"></i>
                        Alert
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-light text-dark  d-flex text-dark align-items-center">
                        <i class="ti ti-bell fs-4 me-2"></i>
                        Alert
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-dark d-flex align-items-center">
                        <i class="ti ti-bell fs-4 me-2"></i>
                        Alert
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Rounded Light Button with icon</h4>


                  <div class="row button-group">
                    <div class="col-lg-6">
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded bg-primary-subtle text-primary  d-flex align-items-center">
                        <i class="ti ti-clock-hour-4 fs-4 me-2"></i>
                        Time
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded bg-secondary-subtle text-secondary  d-flex align-items-center">
                        <i class="ti ti-clock-hour-4 fs-4 me-2"></i>
                        Time
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded bg-success-subtle text-success  d-flex align-items-center">
                        <i class="ti ti-clock-hour-4 fs-4 me-2"></i>
                        Time
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded bg-info-subtle text-info  d-flex align-items-center">
                        <i class="ti ti-clock-hour-4 fs-4 me-2"></i>
                        Time
                      </button>
                    </div>
                    <div class="col-lg-6">
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded bg-warning-subtle text-warning  d-flex align-items-center">
                        <i class="ti ti-clock-hour-4 fs-4 me-2"></i>
                        Time
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded bg-danger-subtle text-danger  d-flex align-items-center">
                        <i class="ti ti-clock-hour-4 fs-4 me-2"></i>
                        Time
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-light text-dark  d-flex text-dark align-items-center">
                        <i class="ti ti-clock-hour-4 fs-4 me-2"></i>
                        Time
                      </button>
                      <button type="button"
                        class="justify-content-center w-100 btn mb-1 btn-rounded btn-dark d-flex align-items-center">
                        <i class="ti ti-clock-hour-4 fs-4 me-2"></i>
                        Time
                      </button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-lg-6 d-flex align-items-stretch">

              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Small Circle Buttons</h4>

                  <div class="button-group">
                    <button type="button"
                      class="btn mb-1 btn-secondary rounded-circle round-40 btn-sm d-inline-flex align-items-center justify-content-center">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn mb-1 btn-primary rounded-circle round-40 btn-sm d-inline-flex align-items-center justify-content-center">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn mb-1 btn-success rounded-circle round-40 btn-sm d-inline-flex align-items-center justify-content-center">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn mb-1 btn-info rounded-circle round-40 btn-sm d-inline-flex align-items-center justify-content-center">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn mb-1 btn-warning rounded-circle round-40 btn-sm d-inline-flex align-items-center justify-content-center">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn mb-1 btn-danger rounded-circle round-40 btn-sm d-inline-flex align-items-center justify-content-center">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                  </div>

                  <div class="my-4">
                    <h5 class="mb-0">Small Light Circle Buttons</h5>
                  </div>
                  <div class="button-group">
                    <button type="button"
                      class="btn mb-1 bg-secondary-subtle rounded-circle round-40 btn-sm d-inline-flex align-items-center justify-content-center">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn mb-1 bg-primary-subtle rounded-circle round-40 btn-sm d-inline-flex align-items-center justify-content-center">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn mb-1 bg-success-subtle rounded-circle round-40 btn-sm d-inline-flex align-items-center justify-content-center">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn mb-1 bg-info-subtle rounded-circle round-40 btn-sm d-inline-flex align-items-center justify-content-center">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn mb-1 bg-warning-subtle rounded-circle round-40 btn-sm d-inline-flex align-items-center justify-content-center">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn mb-1 bg-danger-subtle rounded-circle round-40 btn-sm d-inline-flex align-items-center justify-content-center">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-lg-6 d-flex align-items-stretch">

              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Circle Buttons</h4>

                  <div class="button-group">
                    <button type="button"
                      class="btn mb-1 btn-secondary rounded-circle round d-inline-flex align-items-center justify-content-center px-2">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn mb-1 btn-primary rounded-circle round d-inline-flex align-items-center justify-content-center px-2">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn mb-1 btn-success rounded-circle round d-inline-flex align-items-center justify-content-center px-2">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn mb-1 btn-info rounded-circle round d-inline-flex align-items-center justify-content-center px-2">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn mb-1 btn-warning rounded-circle round d-inline-flex align-items-center justify-content-center px-2">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn mb-1 btn-danger rounded-circle round d-inline-flex align-items-center justify-content-center px-2">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                  </div>

                  <div class="my-4">
                    <h5 class="mb-0">Light Circle Buttons</h5>
                  </div>
                  <div class="button-group">
                    <button type="button"
                      class="btn bg-secondary-subtle rounded-circle round d-inline-flex align-items-center justify-content-center px-2">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn bg-primary-subtle rounded-circle round d-inline-flex align-items-center justify-content-center px-2">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn bg-success-subtle rounded-circle round d-inline-flex align-items-center justify-content-center px-2">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn bg-info-subtle rounded-circle round d-inline-flex align-items-center justify-content-center px-2">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn bg-warning-subtle rounded-circle round d-inline-flex align-items-center justify-content-center px-2">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                    <button type="button"
                      class="btn bg-danger-subtle rounded-circle round d-inline-flex align-items-center justify-content-center px-2">
                      <i class="fs-5 ti ti-heart"></i>
                    </button>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-lg-6 d-flex align-items-stretch">

              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Circle Large buttons</h4>

                  <div class="button-group">
                    <button type="button"
                      class="d-inline-flex align-items-center justify-content-center btn btn-secondary rounded-circle btn-lg round-48">
                      <i class="fs-5 ti ti-file-description"></i>
                    </button>
                    <button type="button"
                      class="d-inline-flex align-items-center justify-content-center btn btn-primary rounded-circle btn-lg round-48">
                      <i class="fs-5 ti ti-file-description"></i>
                    </button>
                    <button type="button"
                      class="d-inline-flex align-items-center justify-content-center btn btn-success rounded-circle btn-lg round-48">
                      <i class="fs-5 ti ti-file-description"></i>
                    </button>
                    <button type="button"
                      class="d-inline-flex align-items-center justify-content-center btn btn-info rounded-circle btn-lg round-48">
                      <i class="fs-5 ti ti-file-description"></i>
                    </button>
                    <button type="button"
                      class="d-inline-flex align-items-center justify-content-center btn btn-warning rounded-circle btn-lg round-48">
                      <i class="fs-5 ti ti-file-description"></i>
                    </button>
                    <button type="button"
                      class="d-inline-flex align-items-center justify-content-center btn btn-danger rounded-circle btn-lg round-48">
                      <i class="fs-5 ti ti-file-description"></i>
                    </button>
                  </div>

                  <div class="my-4">
                    <h5 class="mb-0">Light Circle Large Buttons</h5>
                  </div>
                  <div class="button-group">
                    <button type="button" class="btn bg-secondary-subtle rounded-circle btn-lg round-48">
                      <i class="ti ti-file-text fs-4"></i>
                    </button>
                    <button type="button" class="btn bg-primary-subtle rounded-circle btn-lg round-48">
                      <i class="ti ti-file-text fs-4"></i>
                    </button>
                    <button type="button" class="btn bg-success-subtle rounded-circle btn-lg round-48">
                      <i class="ti ti-file-text fs-4"></i>
                    </button>
                    <button type="button" class="btn bg-info-subtle rounded-circle btn-lg round-48">
                      <i class="ti ti-file-text fs-4"></i>
                    </button>
                    <button type="button" class="btn bg-warning-subtle rounded-circle btn-lg round-48">
                      <i class="ti ti-file-text fs-4"></i>
                    </button>
                    <button type="button" class="btn bg-danger-subtle rounded-circle btn-lg round-48">
                      <i class="ti ti-file-text fs-4"></i>
                    </button>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-lg-6 d-flex align-items-stretch">

              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Circle Extra Large buttons</h4>

                  <div>
                    <button type="button" class="btn btn-secondary rounded-circle round-56 me-1 mb-1 px-2">
                      <i class="ti ti-folder fs-7"></i>
                    </button>
                    <button type="button" class="btn btn-primary rounded-circle round-56 me-1 mb-1 px-2">
                      <i class="ti ti-folder fs-7"></i>
                    </button>
                    <button type="button" class="btn btn-success rounded-circle round-56 me-1 mb-1 px-2">
                      <i class="ti ti-folder fs-7"></i>
                    </button>
                    <button type="button" class="btn btn-info rounded-circle round-56 me-1 mb-1 px-2">
                      <i class="ti ti-folder fs-7"></i>
                    </button>
                    <button type="button" class="btn btn-warning rounded-circle round-56 me-1 mb-1 px-2">
                      <i class="ti ti-folder fs-7"></i>
                    </button>
                    <button type="button" class="btn btn-danger rounded-circle round-56 me-1 mb-1 px-2">
                      <i class="ti ti-folder fs-7"></i>
                    </button>
                  </div>

                  <div class="my-4">
                    <h5 class="mb-0">Light Circle Extra Large Buttons</h5>
                  </div>
                  <div>
                    <button type="button" class="btn bg-secondary-subtle rounded-circle round-56 me-1 mb-1 px-2">
                      <i class="ti ti-folder fs-7"></i>
                    </button>
                    <button type="button" class="btn bg-primary-subtle rounded-circle round-56 me-1 mb-1 px-2">
                      <i class="ti ti-folder fs-7"></i>
                    </button>
                    <button type="button" class="btn bg-success-subtle rounded-circle round-56 me-1 mb-1 px-2">
                      <i class="ti ti-folder fs-7"></i>
                    </button>
                    <button type="button" class="btn bg-info-subtle rounded-circle round-56 me-1 mb-1 px-2">
                      <i class="ti ti-folder fs-7"></i>
                    </button>
                    <button type="button" class="btn bg-warning-subtle rounded-circle round-56 me-1 mb-1 px-2">
                      <i class="ti ti-folder fs-7"></i>
                    </button>
                    <button type="button" class="btn bg-danger-subtle rounded-circle round-56 me-1 mb-1 px-2">
                      <i class="ti ti-folder fs-7"></i>
                    </button>
                  </div>
                </div>
              </div>

            </div>
            <!-- ------------------------------------------------ -->
            <!-- 18. Group buttons -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 col-xl-4 d-flex align-items-stretch">

              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Group buttons</h4>

                  <p class="mb-3 card-subtitle">
                    Wrap a series of buttons with
                    <mark><code>.btn</code></mark> in
                    <mark><code>.btn-group</code></mark>
                  </p>
                  <div class="btn-group mb-2" role="group" aria-label="Basic example">
                    <button type="button" class="btn bg-primary-subtle text-primary ">
                      Left
                    </button>
                    <button type="button" class="btn bg-primary-subtle text-primary ">
                      Middle
                    </button>
                    <button type="button" class="btn bg-primary-subtle text-primary ">
                      Right
                    </button>
                  </div>
                  <div class="btn-group mb-2" role="group" aria-label="Basic example">
                    <button type="button" class="btn bg-secondary-subtle text-secondary ">
                      <i class="ti ti-align-left fs-4"></i>
                    </button>
                    <button type="button" class="btn bg-secondary-subtle text-secondary ">
                      <i class="ti ti-align-justified fs-4"></i>
                    </button>
                    <button type="button" class="btn bg-secondary-subtle text-secondary ">
                      <i class="ti ti-align-right fs-4"></i>
                    </button>
                  </div>
                  <div class="btn-group mb-2" role="group" aria-label="Basic example">
                    <button type="button" class="btn bg-success-subtle text-success">
                      <i class="ti ti-player-skip-back fs-4"></i>
                    </button>
                    <button type="button" class="btn bg-success-subtle text-success">
                      <i class="ti ti-player-play fs-4"></i>
                    </button>
                    <button type="button" class="btn bg-success-subtle text-success">
                      <i class="ti ti-player-skip-forward fs-4"></i>
                    </button>
                  </div>
                </div>
              </div>

            </div>
            <!-- ------------------------------------------------ -->
            <!-- 19. Group buttons sizing -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 col-xl-4 d-flex align-items-stretch">

              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Group buttons sizing</h4>

                  <p class="mb-3 card-subtitle">
                    Wrap a series of buttons with
                    <mark><code>.btn</code></mark> in
                    <mark><code>.btn-group-lg , *-sm</code></mark>
                  </p>
                  <div class="btn-group btn-group-lg mb-2" role="group" aria-label="Basic example">
                    <button type="button" class="btn bg-primary-subtle text-primary ">
                      Left
                    </button>
                    <button type="button" class="btn bg-primary-subtle text-primary ">
                      Middle
                    </button>
                    <button type="button" class="btn bg-primary-subtle text-primary ">
                      Right
                    </button>
                  </div>
                  <div class="btn-group mb-2" role="group" aria-label="Basic example">
                    <button type="button" class="btn bg-secondary-subtle text-secondary ">
                      <i class="ti ti-align-left fs-4"></i>
                    </button>
                    <button type="button" class="btn bg-secondary-subtle text-secondary ">
                      <i class="ti ti-align-justified fs-4"></i>
                    </button>
                    <button type="button" class="btn bg-secondary-subtle text-secondary ">
                      <i class="ti ti-align-right fs-4"></i>
                    </button>
                  </div>
                  <div class="btn-group btn-group-sm mb-2" role="group" aria-label="Basic example">
                    <button type="button" class="btn bg-success-subtle text-success">
                      <i class="ti ti-player-skip-back fs-4"></i>
                    </button>
                    <button type="button" class="btn bg-success-subtle text-success">
                      <i class="ti ti-player-play fs-4"></i>
                    </button>
                    <button type="button" class="btn bg-success-subtle text-success">
                      <i class="ti ti-player-skip-forward fs-4"></i>
                    </button>
                  </div>
                </div>
              </div>

            </div>
            <!-- ------------------------------------------------ -->
            <!-- 20. Button toolbar pagination -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 col-xl-4 d-flex align-items-stretch">

              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Button toolbar pagination</h4>

                  <p class="mb-3 card-subtitle">
                    Wrap a series of buttons with
                    <mark><code>.btn</code></mark> in
                    <mark><code>.btn-group</code></mark>
                  </p>
                  <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                      <button type="button" class="btn bg-info-subtle text-info  disabled">
                        1
                      </button>
                      <button type="button" class="btn btn-info">2</button>
                      <button type="button" class="btn bg-info-subtle text-info ">
                        3
                      </button>
                      <button type="button" class="btn bg-info-subtle text-info ">
                        4
                      </button>
                    </div>
                    <div class="btn-group me-2 mb-2" role="group" aria-label="Second group">
                      <button type="button" class="btn bg-info-subtle text-info ">
                        5
                      </button>
                      <button type="button" class="btn bg-info-subtle text-info ">
                        6
                      </button>
                      <button type="button" class="btn bg-info-subtle text-info ">
                        7
                      </button>
                    </div>
                    <div class="btn-group mb-2" role="group" aria-label="Third group">
                      <button type="button" class="btn bg-info-subtle text-info ">
                        8
                      </button>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- ------------------------------------------------ -->
            <!-- 21. Button Toolbar with Input Group -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 col-xl-4 d-flex align-items-stretch">

              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Button Toolbar with Input Group</h4>

                  <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
                    <div class="btn-group me-2 mb-2" role="group" aria-label="First group">
                      <button type="button" class="btn btn-secondary">
                        <i class="ti ti-printer fs-4"></i>
                      </button>
                      <button type="button" class="btn btn-secondary">
                        <i class="ti ti-trash fs-4"></i>
                      </button>
                      <button type="button" class="btn btn-secondary">
                        <i class="ti ti-device-floppy fs-4"></i>
                      </button>
                      <button type="button" class="btn btn-secondary">
                        <i class="ti ti-settings fs-4"></i>
                      </button>
                    </div>
                    <div class="input-group mt-2 mt-md-0">
                      <div class="input-group-text" id="btnGroupAddon">
                        <i class="ti ti-mail fs-4"></i>
                      </div>
                      <input type="text" class="form-control" placeholder="Subscribe Now"
                        aria-label="Input group example" aria-describedby="btnGroupAddon" />
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- ------------------------------------------------ -->
            <!-- 22. Button Toolbar with Jutify Content Input Group -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 col-xl-4 d-flex align-items-stretch">

              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">
                    Toolbar with Jutify Content Input Group
                  </h4>
                  <div class=" btn-toolbar justify-content-between" role="toolbar"
                    aria-label="Toolbar with button groups">
                    <div class="btn-group mb-2" role="group" aria-label="First group">
                      <button type="button" class="btn btn-secondary">
                        <i class="ti ti-printer fs-4"></i>
                      </button>
                      <button type="button" class="btn btn-secondary">
                        <i class="ti ti-trash fs-4"></i>
                      </button>
                      <button type="button" class="btn btn-secondary">
                        <i class="ti ti-device-floppy fs-4"></i>
                      </button>
                      <button type="button" class="btn btn-secondary">
                        <i class="ti ti-settings fs-4"></i>
                      </button>
                    </div>
                    <div class="input-group mt-2 mt-md-0">
                      <div class="input-group-text" id="btnGroupAddon2">
                        <i class="ti ti-mail fs-4"></i>
                      </div>
                      <input type="text" class="form-control" placeholder="Subscribe Now"
                        aria-label="Input group example" aria-describedby="btnGroupAddon2" />
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- ------------------------------------------------ -->
            <!-- 23. Button with js elements -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 col-xl-4 d-flex align-items-stretch">

              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Button with js elements</h4>

                  <div>
                    <button type="button" class="btn bg-success-subtle text-success  mb-2" data-bs-toggle="button"
                      aria-pressed="false">
                      <i class="ti ti-settings fs-4 text"></i>
                      <span class="text">Upload</span>
                      <i class="ti ti-check fs-4 text-active"></i>
                      <span class="text-active">Success</span>
                    </button>
                    <button type="button" class="btn bg-info-subtle text-info mb-2" data-bs-toggle="button"
                      data-more="#sh" aria-pressed="false">
                      <i class="ti ti-plus fs-7 text"></i>
                      <i class="ti ti-minus fs-7 text-active"></i>
                    </button>

                    <button type="button" class="btn bg-secondary-subtle text-secondary" data-bs-toggle="button"
                      aria-pressed="true">
                      <span class="text">
                        <i class="ti ti-plus fs-4"></i>
                        20
                      </span>
                      <span class="text-active text-danger">
                        <i class="ti ti-plus fs-4"></i>
                        21
                      </span>
                    </button>
                  </div>
                </div>
              </div>

            </div>
            <!-- ------------------------------------------------ -->
            <!-- 24. Button with checks -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 d-flex align-items-stretch">

              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Button with Checkbox</h4>

                  <div class="btn-group" data-bs-toggle="buttons">
                    <label class="btn bg-primary-subtle text-primary  active">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox0" checked />
                        <label class="form-check-label" for="checkbox0"><span class="d-block d-md-none">1</span><span
                            class="d-none d-md-block">Checked</span></label>
                      </div>
                    </label>
                    <label class="btn bg-primary-subtle text-primary ">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox1" />
                        <label class="form-check-label" for="checkbox1"><span class="d-block d-md-none">2</span><span
                            class="d-none d-md-block">Checkbox 2</span></label>
                      </div>
                    </label>
                    <label class="btn bg-primary-subtle text-primary ">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="checkbox2" />
                        <label class="form-check-label" for="checkbox2"><span class="d-block d-md-none">3</span><span
                            class="d-none d-md-block">Checkbox 3</span></label>
                      </div>
                    </label>
                  </div>
                </div>
              </div>

            </div>
            <!-- ------------------------------------------------ -->
            <!-- 25. Button with radios -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 d-flex align-items-stretch">

              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Button with Radio</h4>

                  <div class="btn-group" data-bs-toggle="buttons">
                    <label class="btn bg-primary-subtle text-primary  active">
                      <div class="form-check">
                        <input type="radio" id="customRadio4" name="customRadio" class="form-check-input" checked />
                        <label class="form-check-label" for="customRadio4"><span class="d-block d-md-none">1</span><span
                            class="d-none d-md-block">Radio 1</span></label>
                      </div>
                    </label>
                    <label class="btn bg-primary-subtle text-primary ">
                      <div class="form-check">
                        <input type="radio" id="customRadio5" name="customRadio" class="form-check-input" />
                        <label class="form-check-label" for="customRadio5"><span class="d-block d-md-none">2</span><span
                            class="d-none d-md-block">Radio 2</span></label>
                      </div>
                    </label>
                    <label class="btn bg-primary-subtle text-primary ">
                      <div class="form-check">
                        <input type="radio" id="customRadio6" name="customRadio" class="form-check-input" />
                        <label class="form-check-label" for="customRadio6"><span class="d-block d-md-none">3</span><span
                            class="d-none d-md-block">Radio 3</span></label>
                      </div>
                    </label>
                  </div>
                </div>
              </div>

            </div>
            <!-- ------------------------------------------------ -->
            <!-- 26. Nesting Button -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 d-flex align-items-stretch">

              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Nesting buttons with small size</h4>

                  <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="btn bg-primary-subtle btn-sm text-primary ">
                      1
                    </button>
                    <button type="button" class="btn bg-primary-subtle btn-sm text-primary ">
                      2
                    </button>
                    <div class="btn-group btn-group-sm" role="group">
                      <button id="btnGroupDrop1" type="button"
                        class="btn bg-primary-subtle text-primary  dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Dropdown
                      </button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                        <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                      </div>
                    </div>
                  </div>
                  <h4 class="card-title mt-4">
                    Nesting buttons with regular size
                  </h4>
                  <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="btn bg-primary-subtle text-primary  rounded-start">
                      1
                    </button>
                    <button type="button" class="btn bg-primary-subtle text-primary ">
                      2
                    </button>
                    <div class="btn-group" role="group">
                      <button id="btnGroupDrop1" type="button"
                        class="btn bg-primary-subtle text-primary  dropdown-toggle rounded-end"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                      </button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                        <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                      </div>
                    </div>
                  </div>
                  <h4 class="card-title mt-4">
                    Nesting buttons with large size
                  </h4>
                  <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                    <button type="button" class="btn bg-primary-subtle btn-lg text-primary ">
                      1
                    </button>
                    <button type="button" class="btn bg-primary-subtle btn-lg text-primary ">
                      2
                    </button>
                    <div class="btn-group btn-group-lg" role="group">
                      <button id="btnGroupDrop1" type="button"
                        class="btn bg-primary-subtle text-primary  dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Dropdown
                      </button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                        <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <!-- ------------------------------------------------ -->
            <!-- 27. Nesting Buttons with vertical align -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 d-flex align-items-stretch">

              <div class="card w-100">
                <div class="card-body">

                  <h4 class="card-title">Nesting Buttons with vertical align</h4>

                  <p class="mb-3 card-subtitle">
                    create vertical button with class of
                    <mark><code>.btn-group-vertical</code></mark>
                  </p>
                  <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                    <button type="button" class="btn bg-primary-subtle text-primary  rounded-top">
                      Button
                    </button>
                    <button type="button" class="btn bg-primary-subtle text-primary ">
                      Button
                    </button>
                    <button type="button" class="btn bg-primary-subtle text-primary ">
                      Button
                    </button>
                    <button type="button" class="btn bg-primary-subtle text-primary ">
                      Button
                    </button>
                    <button type="button" class="btn bg-primary-subtle text-primary ">
                      Button
                    </button>
                    <button type="button" class="btn bg-primary-subtle text-primary  rounded-bottom">
                      Button
                    </button>
                  </div>
                  <div class="btn-group-vertical" role="group" aria-label="Vertical button group">
                    <button type="button" class="btn bg-primary-subtle text-primary  rounded-top">
                      Button
                    </button>
                    <div class="btn-group" role="group">
                      <button id="btnGroupVerticalDrop1" type="button"
                        class="btn bg-primary-subtle text-primary  dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Dropdown
                      </button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                        <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                        <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                      </div>
                    </div>
                    <button type="button" class="btn bg-primary-subtle text-primary ">
                      Button
                    </button>
                    <div class="btn-group" role="group">
                      <button id="btnGroupVerticalDrop2" type="button"
                        class="btn bg-primary-subtle text-primary  dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Dropdown
                      </button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop2">
                        <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                        <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                      </div>
                    </div>
                    <div class="btn-group" role="group">
                      <button id="btnGroupVerticalDrop3" type="button"
                        class="btn bg-primary-subtle text-primary  dropdown-toggle" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Dropdown
                      </button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop3">
                        <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                        <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                      </div>
                    </div>
                    <div class="btn-group" role="group">
                      <button id="btnGroupVerticalDrop4" type="button"
                        class="btn bg-primary-subtle text-primary  dropdown-toggle rounded-bottom"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                      </button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop4">
                        <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                        <a class="dropdown-item" href="javascript:void(0)">Dropdown link</a>
                      </div>
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
  @@include("partials/scripts.html")
</body>

</html>