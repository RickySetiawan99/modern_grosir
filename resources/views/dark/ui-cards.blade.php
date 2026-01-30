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
          @@include("partials/breadcrumb.html", {"title": "UI Card", "subtitle": 'Home'})
          <!-- Row -->
          <div class="row">
            <div class="col-12">
              <!-- 1. card with img -->
              <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
                <h4 class="mb-0 fs-5">Card with Image</h4>
                <div class="ms-auto flex-shrink-0">
                  <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                    data-bs-toggle="modal" data-bs-target="#view-code1-modal">
                    <i class="ti ti-code fs-6"></i>
                  </button>
                  <!-- Code Modal -->
                  <div id="view-code1-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header border-bottom">
                          <h5 class="modal-title" id="exampleModalLabel">
                            Card with Image - View Code
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <pre class="language-html">
    <code>
    &lt;div class=&quot;row&quot;&gt;
    &lt;!-- column --&gt;
    &lt;div class=&quot;col-lg-4 col-md-6&quot;&gt;
    &lt;!-- Card --&gt;
    &lt;div class=&quot;card&quot;&gt;
      &lt;img class=&quot;card-img-top img-responsive&quot; src=&quot;./assets/images/blog/blog-img1.jpg&quot;
        alt=&quot;Card image cap&quot; /&gt;
      &lt;div class=&quot;card-body&quot;&gt;
        &lt;h4 class=&quot;card-title&quot;&gt;Card title&lt;/h4&gt;
        &lt;p class=&quot;card-text&quot;&gt;
          Some quick example text to build on the card title and make up the bulk of the card's content.
        &lt;/p&gt;
        &lt;a href=&quot;javascript:void(0)&quot; class=&quot;btn btn-primary&quot;&gt;Go somewhere&lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;!-- Card --&gt;
    &lt;/div&gt;
    &lt;!-- column --&gt;
    &lt;!-- column --&gt;
    &lt;div class=&quot;col-lg-4 col-md-6&quot;&gt;
    &lt;!-- Card --&gt;
    &lt;div class=&quot;card&quot;&gt;
      &lt;img class=&quot;card-img-top img-responsive&quot; src=&quot;./assets/images/blog/blog-img2.jpg&quot;
        alt=&quot;Card image cap&quot; /&gt;
      &lt;div class=&quot;card-body&quot;&gt;
        &lt;h4 class=&quot;card-title&quot;&gt;Card title&lt;/h4&gt;
        &lt;p class=&quot;card-text&quot;&gt;
          Some quick example text to build on the card title and make up the bulk of the card's content.
        &lt;/p&gt;
        &lt;a href=&quot;javascript:void(0)&quot; class=&quot;btn btn-primary&quot;&gt;Go somewhere&lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;!-- Card --&gt;
    &lt;/div&gt;
    &lt;!-- column --&gt;
    &lt;!-- column --&gt;
    &lt;div class=&quot;col-lg-4 col-md-6&quot;&gt;
    &lt;!-- Card --&gt;
    &lt;div class=&quot;card&quot;&gt;
      &lt;img class=&quot;card-img-top img-responsive&quot; src=&quot;./assets/images/blog/blog-img3.jpg&quot;
        alt=&quot;Card image cap&quot; /&gt;
      &lt;div class=&quot;card-body&quot;&gt;
        &lt;h4 class=&quot;card-title&quot;&gt;Card title&lt;/h4&gt;
        &lt;p class=&quot;card-text&quot;&gt;
          Some quick example text to build on the card title and make up the bulk of the card's content.
        &lt;/p&gt;
        &lt;a href=&quot;javascript:void(0)&quot; class=&quot;btn btn-primary&quot;&gt;Go somewhere&lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;!-- Card --&gt;
    &lt;/div&gt;
    &lt;!-- column --&gt;
    &lt;!-- column --&gt;
    &lt;div class=&quot;col-lg-4 col-md-6&quot;&gt;
    &lt;!-- Card --&gt;
    &lt;div class=&quot;card&quot;&gt;
      &lt;img class=&quot;card-img-top img-responsive&quot; src=&quot;./assets/images/blog/blog-img4.jpg&quot;
        alt=&quot;Card image cap&quot; /&gt;
      &lt;div class=&quot;card-body&quot;&gt;
        &lt;h4 class=&quot;card-title&quot;&gt;Card title&lt;/h4&gt;
        &lt;p class=&quot;card-text&quot;&gt;
          Some quick example text to build on the card title and make up the bulk of the card's content.
        &lt;/p&gt;
        &lt;a href=&quot;javascript:void(0)&quot; class=&quot;btn btn-primary&quot;&gt;Go somewhere&lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;!-- Card --&gt;
    &lt;/div&gt;
    &lt;!-- column --&gt;
    &lt;!-- column --&gt;
    &lt;div class=&quot;col-lg-4 col-md-6&quot;&gt;
    &lt;!-- Card --&gt;
    &lt;div class=&quot;card&quot;&gt;
      &lt;img class=&quot;card-img-top img-responsive&quot; src=&quot;./assets/images/blog/blog-img5.jpg&quot;
        alt=&quot;Card image cap&quot; /&gt;
      &lt;div class=&quot;card-body&quot;&gt;
        &lt;h4 class=&quot;card-title&quot;&gt;Card title&lt;/h4&gt;
        &lt;p class=&quot;card-text&quot;&gt;
          Some quick example text to build on the card title and make up the bulk of the card's content.
        &lt;/p&gt;
        &lt;a href=&quot;javascript:void(0)&quot; class=&quot;btn btn-primary&quot;&gt;Go somewhere&lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;!-- Card --&gt;
    &lt;/div&gt;
    &lt;!-- column --&gt;
    &lt;!-- column --&gt;
    &lt;div class=&quot;col-lg-4 col-md-6&quot;&gt;
    &lt;!-- Card --&gt;
    &lt;div class=&quot;card&quot;&gt;
      &lt;img class=&quot;card-img-top img-responsive&quot; src=&quot;./assets/images/blog/blog-img6.jpg&quot;
        alt=&quot;Card image cap&quot; /&gt;
      &lt;div class=&quot;card-body&quot;&gt;
        &lt;h4 class=&quot;card-title&quot;&gt;Card title&lt;/h4&gt;
        &lt;p class=&quot;card-text&quot;&gt;
          Some quick example text to build on the card title and make up the bulk of the card's content.
        &lt;/p&gt;
        &lt;a href=&quot;javascript:void(0)&quot; class=&quot;btn btn-primary&quot;&gt;Go somewhere&lt;/a&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;!-- Card --&gt;
    &lt;/div&gt;
    &lt;!-- column --&gt;
    &lt;/div&gt;
    </code>
    </pre>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
              </div>
            </div>
            <!-- column -->
            <div class="col-lg-4 col-md-6">
              <!-- Card -->
              <div class="card">
                <img class="card-img-top img-responsive" src="{{ URL::asset('build/images/blog/blog-img1.jpg') }}"
                  alt="Card image cap" />
                <div class="card-body">
                  <h4 class="card-title">Card title</h4>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <!-- Card -->
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-4 col-md-6">
              <!-- Card -->
              <div class="card">
                <img class="card-img-top img-responsive" src="{{ URL::asset('build/images/blog/blog-img2.jpg') }}"
                  alt="Card image cap" />
                <div class="card-body">
                  <h4 class="card-title">Card title</h4>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <!-- Card -->
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-4 col-md-6">
              <!-- Card -->
              <div class="card">
                <img class="card-img-top img-responsive" src="{{ URL::asset('build/images/blog/blog-img3.jpg') }}"
                  alt="Card image cap" />
                <div class="card-body">
                  <h4 class="card-title">Card title</h4>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <!-- Card -->
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-4 col-md-6">
              <!-- Card -->
              <div class="card">
                <img class="card-img-top img-responsive" src="{{ URL::asset('build/images/blog/blog-img4.jpg') }}"
                  alt="Card image cap" />
                <div class="card-body">
                  <h4 class="card-title">Card title</h4>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <!-- Card -->
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-4 col-md-6">
              <!-- Card -->
              <div class="card">
                <img class="card-img-top img-responsive" src="{{ URL::asset('build/images/blog/blog-img5.jpg') }}"
                  alt="Card image cap" />
                <div class="card-body">
                  <h4 class="card-title">Card title</h4>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <!-- Card -->
            </div>
            <!-- column -->
            <!-- column -->
            <div class="col-lg-4 col-md-6">
              <!-- Card -->
              <div class="card">
                <img class="card-img-top img-responsive" src="{{ URL::asset('build/images/blog/blog-img6.jpg') }}"
                  alt="Card image cap" />
                <div class="card-body">
                  <h4 class="card-title">Card title</h4>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
              <!-- Card -->
            </div>
            <!-- column -->
            <div class="col-12">
              <!-- 2. card with body -->
              <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
                <h4 class="mb-0 fs-5">Card without image</h4>
                <div class="ms-auto flex-shrink-0">
                  <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                    data-bs-toggle="modal" data-bs-target="#view-code2-modal">
                    <i class="ti ti-code fs-6"></i>
                  </button>
                  <!-- Code Modal -->
                  <div id="view-code2-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header border-bottom">
                          <h5 class="modal-title" id="exampleModalLabel">
                            Card without image - View Code
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <pre class="language-html">
    <code>
    &lt;div class=&quot;row&quot;&gt;
    &lt;div class=&quot;col-md-6 col-lg-3&quot;&gt;
      &lt;div class=&quot;card&quot;&gt;
        &lt;div class=&quot;card-body&quot;&gt;
          &lt;h5 class=&quot;card-title&quot;&gt;James Smith&lt;/h5&gt;
          &lt;h6 class=&quot;card-subtitle mb-2 text-muted d-flex align-items-center&quot;&gt;&lt;i class=&quot;ti ti-map-pin me-1 fs-5&quot;&gt;&lt;/i&gt;Albania&lt;/h6&gt;
          &lt;p class=&quot;card-text pt-2&quot;&gt;
            Some quick example text to build on the card title and make up the bulk of the card's content.
          &lt;/p&gt;
          &lt;a href=&quot;#&quot; class=&quot;card-link&quot;&gt;Follow&lt;/a&gt;
          &lt;a href=&quot;#&quot; class=&quot;card-link&quot;&gt;View profile&lt;/a&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col-md-6 col-lg-3&quot;&gt;
      &lt;div class=&quot;card&quot;&gt;
        &lt;div class=&quot;card-body&quot;&gt;
          &lt;h5 class=&quot;card-title&quot;&gt;Michael Smith&lt;/h5&gt;
          &lt;h6 class=&quot;card-subtitle mb-2 text-muted d-flex align-items-center&quot;&gt;&lt;i class=&quot;ti ti-map-pin me-1 fs-5&quot;&gt;&lt;/i&gt;Belize&lt;/h6&gt;
          &lt;p class=&quot;card-text pt-2&quot;&gt;
            Some quick example text to build on the card title and make up the bulk of the card's content.
          &lt;/p&gt;
          &lt;a href=&quot;#&quot; class=&quot;card-link&quot;&gt;Follow&lt;/a&gt;
          &lt;a href=&quot;#&quot; class=&quot;card-link&quot;&gt;View profile&lt;/a&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col-md-6 col-lg-3&quot;&gt;
      &lt;div class=&quot;card&quot;&gt;
        &lt;div class=&quot;card-body&quot;&gt;
          &lt;h5 class=&quot;card-title&quot;&gt;Maria Hernandez&lt;/h5&gt;
          &lt;h6 class=&quot;card-subtitle mb-2 text-muted d-flex align-items-center&quot;&gt;&lt;i class=&quot;ti ti-map-pin me-1 fs-5&quot;&gt;&lt;/i&gt;Colombia&lt;/h6&gt;
          &lt;p class=&quot;card-text pt-2&quot;&gt;
            Some quick example text to build on the card title and make up the bulk of the card's content.
          &lt;/p&gt;
          &lt;a href=&quot;#&quot; class=&quot;card-link&quot;&gt;Follow&lt;/a&gt;
          &lt;a href=&quot;#&quot; class=&quot;card-link&quot;&gt;View profile&lt;/a&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col-md-6 col-lg-3&quot;&gt;
      &lt;div class=&quot;card&quot;&gt;
        &lt;div class=&quot;card-body&quot;&gt;
          &lt;h5 class=&quot;card-title&quot;&gt;David Margaret&lt;/h5&gt;
          &lt;h6 class=&quot;card-subtitle mb-2 text-muted d-flex align-items-center&quot;&gt;&lt;i class=&quot;ti ti-map-pin me-1 fs-5&quot;&gt;&lt;/i&gt;Egypt&lt;/h6&gt;
          &lt;p class=&quot;card-text pt-2&quot;&gt;
            Some quick example text to build on the card title and make up the bulk of the card's content.
          &lt;/p&gt;
          &lt;a href=&quot;#&quot; class=&quot;card-link&quot;&gt;Follow&lt;/a&gt;
          &lt;a href=&quot;#&quot; class=&quot;card-link&quot;&gt;View profile&lt;/a&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    </code>
    </pre>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">James Smith</h5>
                  <p class="card-subtitle mb-2 d-flex align-items-center"><i
                      class="ti ti-map-pin me-1 fs-5"></i>Albania</p>
                  <p class="card-text pt-2">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                  <a href="javascript:void(0)" class="card-link">Follow</a>
                  <a href="javascript:void(0)" class="card-link">View profile</a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Michael Smith</h5>
                  <p class="card-subtitle mb-2 d-flex align-items-center"><i
                      class="ti ti-map-pin me-1 fs-5"></i>Belize</p>
                  <p class="card-text pt-2">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                  <a href="javascript:void(0)" class="card-link">Follow</a>
                  <a href="javascript:void(0)" class="card-link">View profile</a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Maria Hernandez</h5>
                  <p class="card-subtitle mb-2 d-flex align-items-center"><i
                      class="ti ti-map-pin me-1 fs-5"></i>Colombia</p>
                  <p class="card-text pt-2">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                  <a href="javascript:void(0)" class="card-link">Follow</a>
                  <a href="javascript:void(0)" class="card-link">View profile</a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">David Margaret</h5>
                  <p class="card-subtitle mb-2 d-flex align-items-center"><i
                      class="ti ti-map-pin me-1 fs-5"></i>Egypt</p>
                  <p class="card-text pt-2">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                  <a href="javascript:void(0)" class="card-link">Follow</a>
                  <a href="javascript:void(0)" class="card-link">View profile</a>
                </div>
              </div>
            </div>
            <div class="col-12">
              <!-- 3. kichen sink -->
              <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
                <h4 class="mb-0 fs-5">Kichen Sink</h4>
                <div class="ms-auto flex-shrink-0">
                  <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                    data-bs-toggle="modal" data-bs-target="#view-code3-modal">
                    <i class="ti ti-code fs-6"></i>
                  </button>
                  <!-- Code Modal -->
                  <div id="view-code3-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header border-bottom">
                          <h5 class="modal-title" id="exampleModalLabel">
                            Kichen Sink - View Code
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <pre class="language-html">
    <code>
    &lt;div class=&quot;row justify-content-center&quot;&gt;
    &lt;div class=&quot;col-lg-4 col-md-6&quot;&gt;
    &lt;div class=&quot;card&quot;&gt;
      &lt;img src=&quot;./assets/images/blog/blog-img5.jpg&quot; class=&quot;card-img-top&quot; alt=&quot;...&quot; /&gt;
      &lt;div class=&quot;card-body p-10&quot;&gt;
        &lt;h5 class=&quot;card-title fs-5&quot;&gt;Nancy Henry&lt;/h5&gt;
        &lt;p class=&quot;card-text&quot;&gt;
          Some quick example text to build on the card title and make up the bulk of the card's content.
        &lt;/p&gt;
      &lt;/div&gt;
      &lt;ul class=&quot;list-group list-group-flush&quot;&gt;
        &lt;li class=&quot;list-group-item&quot;&gt;Cras justo odio&lt;/li&gt;
        &lt;li class=&quot;list-group-item&quot;&gt;Dapibus ac facilisis in&lt;/li&gt;
        &lt;li class=&quot;list-group-item&quot;&gt;Vestibulum at eros&lt;/li&gt;
      &lt;/ul&gt;
      &lt;div class=&quot;card-body button-group d-flex align-items-stretch p-10&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center&quot;&gt;&lt;i class=&quot;ti ti-heart fs-6 me-1&quot;&gt;&lt;/i&gt; Like&lt;/a&gt;
        &lt;a href=&quot;#&quot; class=&quot;btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center&quot;&gt;&lt;i class=&quot;ti ti-message-circle fs-6 me-1&quot;&gt;&lt;/i&gt; Comment&lt;/a&gt;
        &lt;div class=&quot;ms-auto&quot;&gt;
          &lt;a href=&quot;#&quot; class=&quot;btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center flex-column flex-sm-row&quot;&gt;&lt;i class=&quot;ti ti-share fs-6&quot;&gt;&lt;/i&gt; &lt;/a&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col-lg-4 col-md-6&quot;&gt;
    &lt;div class=&quot;card&quot;&gt;
      &lt;img src=&quot;./assets/images/blog/blog-img6.jpg&quot; class=&quot;card-img-top&quot; alt=&quot;...&quot; /&gt;
      &lt;div class=&quot;card-body p-10&quot;&gt;
        &lt;h5 class=&quot;card-title fs-5&quot;&gt;George Jane&lt;/h5&gt;
        &lt;p class=&quot;card-text&quot;&gt;
          Some quick example text to build on the card title and make up the bulk of the card's content.
        &lt;/p&gt;
      &lt;/div&gt;
      &lt;ul class=&quot;list-group list-group-flush&quot;&gt;
        &lt;li class=&quot;list-group-item&quot;&gt;Cras justo odio&lt;/li&gt;
        &lt;li class=&quot;list-group-item&quot;&gt;Dapibus ac facilisis in&lt;/li&gt;
        &lt;li class=&quot;list-group-item&quot;&gt;Vestibulum at eros&lt;/li&gt;
      &lt;/ul&gt;
      &lt;div class=&quot;card-body button-group d-flex align-items-stretch p-10&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center&quot;&gt;&lt;i class=&quot;ti ti-heart fs-6 me-1&quot;&gt;&lt;/i&gt; Like&lt;/a&gt;
        &lt;a href=&quot;#&quot; class=&quot;btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center&quot;&gt;&lt;i class=&quot;ti ti-message-circle fs-6 me-1&quot;&gt;&lt;/i&gt; Comment&lt;/a&gt;
        &lt;div class=&quot;ms-auto&quot;&gt;
          &lt;a href=&quot;#&quot; class=&quot;btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center flex-column flex-sm-row&quot;&gt;&lt;i class=&quot;ti ti-share fs-6&quot;&gt;&lt;/i&gt; &lt;/a&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col-lg-4 col-md-6&quot;&gt;
    &lt;div class=&quot;card&quot;&gt;
      &lt;img src=&quot;./assets/images/blog/blog-img8.jpg&quot; class=&quot;card-img-top&quot; alt=&quot;...&quot; /&gt;
      &lt;div class=&quot;card-body p-10&quot;&gt;
        &lt;h5 class=&quot;card-title fs-5&quot;&gt;Samuel Eliza&lt;/h5&gt;
        &lt;p class=&quot;card-text&quot;&gt;
          Some quick example text to build on the card title and make up the bulk of the card's content.
        &lt;/p&gt;
      &lt;/div&gt;
      &lt;ul class=&quot;list-group list-group-flush&quot;&gt;
        &lt;li class=&quot;list-group-item&quot;&gt;Cras justo odio&lt;/li&gt;
        &lt;li class=&quot;list-group-item&quot;&gt;Dapibus ac facilisis in&lt;/li&gt;
        &lt;li class=&quot;list-group-item&quot;&gt;Vestibulum at eros&lt;/li&gt;
      &lt;/ul&gt;
      &lt;div class=&quot;card-body button-group d-flex align-items-stretch p-10&quot;&gt;
        &lt;a href=&quot;#&quot; class=&quot;btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center&quot;&gt;&lt;i class=&quot;ti ti-heart fs-6 me-1&quot;&gt;&lt;/i&gt; Like&lt;/a&gt;
        &lt;a href=&quot;#&quot; class=&quot;btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center&quot;&gt;&lt;i class=&quot;ti ti-message-circle fs-6 me-1&quot;&gt;&lt;/i&gt; Comment&lt;/a&gt;
        &lt;div class=&quot;ms-auto&quot;&gt;
          &lt;a href=&quot;#&quot; class=&quot;btn bg-secondary-subtle text-secondary px-2 d-flex align-items-center flex-column flex-sm-row&quot;&gt;&lt;i class=&quot;ti ti-share fs-6&quot;&gt;&lt;/i&gt; &lt;/a&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    </code>
    </pre>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card">
                <img src="{{ URL::asset('build/images/blog/blog-img5.jpg') }}" class="card-img-top" alt="modernize-img" />
                <div class="card-body p-10">
                  <h4 class="card-title">Nancy Henry</h4>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Cras justo odio</li>
                  <li class="list-group-item">Dapibus ac facilisis in</li>
                  <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                <div class="card-body d-flex align-items-center p-10 gap-6">
                  <a href="javascript:void(0)" class="link-primary text-muted d-flex align-items-center"><i
                      class="ti ti-heart fs-6 me-1"></i>3</a>
                  <a href="javascript:void(0)" class="link-primary text-muted d-flex align-items-center"><i
                      class="ti ti-message-circle fs-6 me-1"></i>1</a>
                  <div class="ms-auto">
                    <a href="javascript:void(0)"
                      class="link-primary text-muted d-flex align-items-center flex-column flex-sm-row"><i
                        class="ti ti-share fs-6"></i> </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card">
                <img src="{{ URL::asset('build/images/blog/blog-img6.jpg') }}" class="card-img-top" alt="modernize-img" />
                <div class="card-body p-10">
                  <h5 class="card-title fs-5">George Jane</h5>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Cras justo odio</li>
                  <li class="list-group-item">Dapibus ac facilisis in</li>
                  <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                <div class="card-body d-flex align-items-center p-10 gap-6">
                  <a href="javascript:void(0)" class="link-primary text-muted d-flex align-items-center"><i
                      class="ti ti-heart fs-6 me-1"></i>3</a>
                  <a href="javascript:void(0)" class="link-primary text-muted d-flex align-items-center"><i
                      class="ti ti-message-circle fs-6 me-1"></i>1</a>
                  <div class="ms-auto">
                    <a href="javascript:void(0)"
                      class="link-primary text-muted d-flex align-items-center flex-column flex-sm-row"><i
                        class="ti ti-share fs-6"></i> </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6">
              <div class="card">
                <img src="{{ URL::asset('build/images/blog/blog-img8.jpg') }}" class="card-img-top" alt="modernize-img" />
                <div class="card-body p-10">
                  <h5 class="card-title fs-5">Samuel Eliza</h5>
                  <p class="card-text">
                    Some quick example text to build on the card title and make up the bulk of the card's content.
                  </p>
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">Cras justo odio</li>
                  <li class="list-group-item">Dapibus ac facilisis in</li>
                  <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                <div class="card-body d-flex align-items-center p-10 gap-6">
                  <a href="javascript:void(0)" class="link-primary text-muted d-flex align-items-center"><i
                      class="ti ti-heart fs-6 me-1"></i>3</a>
                  <a href="javascript:void(0)" class="link-primary text-muted d-flex align-items-center"><i
                      class="ti ti-message-circle fs-6 me-1"></i>1</a>
                  <div class="ms-auto">
                    <a href="javascript:void(0)"
                      class="link-primary text-muted d-flex align-items-center flex-column flex-sm-row"><i
                        class="ti ti-share fs-6"></i> </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
                <h4 class="mb-0 fs-5">Header and footer Card</h4>
                <div class="ms-auto flex-shrink-0">
                  <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                    data-bs-toggle="modal" data-bs-target="#view-code4-modal">
                    <i class="ti ti-code fs-6"></i>
                  </button>
                  <!-- Code Modal -->
                  <div id="view-code4-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header border-bottom">
                          <h5 class="modal-title" id="exampleModalLabel">
                            Header and footer Card - View Code
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <pre class="language-html">
    <code>
    &lt;div class=&quot;row&quot;&gt;
    &lt;div class=&quot;col-lg-6&quot;&gt;
      &lt;div class=&quot;card&quot;&gt;
        &lt;div class=&quot;card-header&quot;&gt;Featured&lt;/div&gt;
        &lt;div class=&quot;card-body&quot;&gt;
          &lt;h5 class=&quot;card-title&quot;&gt;Special title treatment&lt;/h5&gt;
          &lt;p class=&quot;card-text&quot;&gt;
            With supporting text below as a natural lead-in to additional content.
          &lt;/p&gt;
          &lt;a href=&quot;#&quot; class=&quot;btn btn-primary&quot;&gt;Go somewhere&lt;/a&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col-lg-6&quot;&gt;
      &lt;div class=&quot;card text-center&quot;&gt;
        &lt;div class=&quot;card-header&quot;&gt;Featured&lt;/div&gt;
        &lt;div class=&quot;card-body&quot;&gt;
          &lt;h5 class=&quot;card-title&quot;&gt;Special title treatment&lt;/h5&gt;
          &lt;p class=&quot;card-text&quot;&gt;
            With supporting text below as a natural lead-in to additional content.
          &lt;/p&gt;
          &lt;a href=&quot;#&quot; class=&quot;btn btn-primary&quot;&gt;Go somewhere&lt;/a&gt;
        &lt;/div&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    </code>
    </pre>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">Featured</div>
                <div class="card-body">
                  <h4 class="card-title">Special title treatment</h4>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card text-center">
                <div class="card-header">Featured</div>
                <div class="card-body">
                  <h4 class="card-title">Special title treatment</h4>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-12">
              <!-- 5. card with background -->
              <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
                <h4 class="mb-0 fs-5">Card with background</h4>
                <div class="ms-auto flex-shrink-0">
                  <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                    data-bs-toggle="modal" data-bs-target="#view-code5-modal">
                    <i class="ti ti-code fs-6"></i>
                  </button>
                  <!-- Code Modal -->
                  <div id="view-code5-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header border-bottom">
                          <h5 class="modal-title" id="exampleModalLabel">
                            Card with background - View Code
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <pre class="language-html">
    <code>
    &lt;div class=&quot;row gx-3&quot;&gt;
    &lt;div class=&quot;col-lg-4 col-xxl-2 col-6&quot;&gt;
    &lt;div class=&quot;card text-white bg-primary rounded&quot;&gt;
      &lt;div class=&quot;card-body p-4&quot;&gt;
        &lt;span&gt;
          &lt;i class=&quot;ti ti-layout-grid fs-8&quot;&gt;&lt;/i&gt;
        &lt;/span&gt;
        &lt;h3 class=&quot;card-title mt-3 mb-0 text-white&quot;&gt;450&lt;/h3&gt;
        &lt;p class=&quot;card-text text-white-50 fs-3 fw-normal&quot;&gt;
          New Products
        &lt;/p&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col-lg-4 col-xxl-2 col-6&quot;&gt;
    &lt;div class=&quot;card text-white text-bg-success&quot;&gt;
      &lt;div class=&quot;card-body p-4&quot;&gt;
        &lt;span&gt;
          &lt;i class=&quot;ti ti-archive fs-8&quot;&gt;&lt;/i&gt;
        &lt;/span&gt;
        &lt;h3 class=&quot;card-title mt-3 mb-0 text-white&quot;&gt;50&lt;/h3&gt;
        &lt;p class=&quot;card-text text-white-50 fs-3 fw-normal&quot;&gt;
          Pending Apps
        &lt;/p&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col-lg-4 col-xxl-2 col-6&quot;&gt;
    &lt;div class=&quot;card text-white text-bg-warning&quot;&gt;
      &lt;div class=&quot;card-body p-4&quot;&gt;
        &lt;span&gt;
          &lt;i class=&quot;ti ti-users fs-8&quot;&gt;&lt;/i&gt;
        &lt;/span&gt;
        &lt;h3 class=&quot;card-title mt-3 mb-0 text-white&quot;&gt;80&lt;/h3&gt;
        &lt;p class=&quot;card-text text-white-50 fs-3 fw-normal&quot;&gt;
          New Customers
        &lt;/p&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col-lg-4 col-xxl-2 col-6&quot;&gt;
    &lt;div class=&quot;card text-white text-bg-danger&quot;&gt;
      &lt;div class=&quot;card-body p-4&quot;&gt;
        &lt;span&gt;
          &lt;i class=&quot;ti ti-gift fs-8&quot;&gt;&lt;/i&gt;
        &lt;/span&gt;
        &lt;h3 class=&quot;card-title mt-3 mb-0 text-white&quot;&gt;15&lt;/h3&gt;
        &lt;p class=&quot;card-text text-white-50 fs-3 fw-normal&quot;&gt;
          Birthday Gifts
        &lt;/p&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col-lg-4 col-xxl-2 col-6&quot;&gt;
    &lt;div class=&quot;card text-white text-bg-info&quot;&gt;
      &lt;div class=&quot;card-body p-4&quot;&gt;
        &lt;span&gt;
          &lt;i class=&quot;ti ti-credit-card fs-8&quot;&gt;&lt;/i&gt;
        &lt;/span&gt;
        &lt;h3 class=&quot;card-title mt-3 mb-0 text-white&quot;&gt;1800&lt;/h3&gt;
        &lt;p class=&quot;card-text text-white-50 fs-3 fw-normal&quot;&gt;
          Total Budgets
        &lt;/p&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    &lt;div class=&quot;col-lg-4 col-xxl-2 col-6&quot;&gt;
    &lt;div class=&quot;card text-white text-bg-secondary&quot;&gt;
      &lt;div class=&quot;card-body p-4&quot;&gt;
        &lt;span&gt;
          &lt;i class=&quot;ti ti-brand-github fs-8&quot;&gt;&lt;/i&gt;
        &lt;/span&gt;
        &lt;h3 class=&quot;card-title mt-3 mb-0 text-white&quot;&gt;90&lt;/h3&gt;
        &lt;p class=&quot;card-text text-white-50 fs-3 fw-normal&quot;&gt;
          Best Designers
        &lt;/p&gt;
      &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    &lt;/div&gt;
    </code>
    </pre>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xxl-2 col-6">
              <div class="card text-white text-bg-primary">
                <div class="card-body p-4">
                  <span>
                    <i class="ti ti-layout-grid fs-8"></i>
                  </span>
                  <h4 class="card-title mt-3 mb-0 text-white">450</h4>
                  <p class="card-text text-white opacity-75 fs-3 fw-normal">
                    New Products
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xxl-2 col-6">
              <div class="card text-white text-bg-success">
                <div class="card-body p-4">
                  <span>
                    <i class="ti ti-archive fs-8"></i>
                  </span>
                  <h4 class="card-title mt-3 mb-0 text-white">50</h4>
                  <p class="card-text text-white opacity-75 fs-3 fw-normal">
                    Pending Apps
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xxl-2 col-6">
              <div class="card text-white text-bg-warning">
                <div class="card-body p-4">
                  <span>
                    <i class="ti ti-users fs-8"></i>
                  </span>
                  <h4 class="card-title mt-3 mb-0 text-white">80</h4>
                  <p class="card-text text-white opacity-75 fs-3 fw-normal">
                    New Customers
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xxl-2 col-6">
              <div class="card text-white text-bg-danger">
                <div class="card-body p-4">
                  <span>
                    <i class="ti ti-gift fs-8"></i>
                  </span>
                  <h4 class="card-title mt-3 mb-0 text-white">15</h4>
                  <p class="card-text text-white opacity-75 fs-3 fw-normal">
                    Birthday Gifts
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xxl-2 col-6">
              <div class="card text-white text-bg-info">
                <div class="card-body p-4">
                  <span>
                    <i class="ti ti-credit-card fs-8"></i>
                  </span>
                  <h4 class="card-title mt-3 mb-0 text-white">1800</h4>
                  <p class="card-text text-white opacity-75 fs-3 fw-normal">
                    Total Budgets
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-xxl-2 col-6">
              <div class="card text-white text-bg-secondary">
                <div class="card-body p-4">
                  <span>
                    <i class="ti ti-brand-github fs-8"></i>
                  </span>
                  <h4 class="card-title mt-3 mb-0 text-white">90</h4>
                  <p class="card-text text-white opacity-75 fs-3 fw-normal">
                    Best Designers
                  </p>
                </div>
              </div>
            </div>
            <div class="col-12">
              <!-- 6. advertise card -->
              <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
                <h4 class="mb-0 fs-5">Advertise card</h4>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="p-4 d-flex align-items-stretch h-100">
                  <div class="row">
                    <div class="col-4 col-md-3 d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/products/s1.jpg') }}" class="rounded img-fluid" />
                    </div>
                    <div class="col-8 col-md-9 d-flex align-items-center">
                      <div>
                        <a href="javascript:void(0)" class="card-title link-primary fw-semibold text-dark">50% sell on wrist
                          watch</a>
                        <p class="card-subtitle mt-1">
                          By Daniel Jubile
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="p-4 d-flex align-items-stretch h-100">
                  <div class="row">
                    <div class="col-4 col-md-3 d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/products/s2.jpg') }}" class="rounded img-fluid" />
                    </div>
                    <div class="col-8 col-md-9 d-flex align-items-center">
                      <div>
                        <a href="javascript:void(0)" class="card-title link-primary fw-semibold text-dark">Small Cabin Luggage
                          </a>
                        <p class="card-subtitle mt-1">
                          By John Smith
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="p-4 d-flex align-items-stretch h-100">
                  <div class="row">
                    <div class="col-4 col-md-3 d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/products/s3.jpg') }}" class="rounded img-fluid" />
                    </div>
                    <div class="col-8 col-md-9 d-flex align-items-center">
                      <div>
                        <a href="javascript:void(0)" class="card-title link-primary fw-semibold text-dark">Women Heels
                          Sandal</a>
                        <p class="card-subtitle mt-1">
                          By Nancy Deo
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="p-4 d-flex align-items-stretch h-100">
                  <div class="row">
                    <div class="col-4 col-md-3 d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/products/s4.jpg') }}" class="rounded img-fluid" />
                    </div>
                    <div class="col-8 col-md-9 d-flex align-items-center">
                      <div>
                        <a href="javascript:void(0)" class="card-title link-primary fw-semibold text-dark">Boat
                          Wireless Headset </a>
                        <p class="card-subtitle mt-1">
                          Yellow , On the Ear
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="p-4 d-flex align-items-stretch h-100">
                  <div class="row">
                    <div class="col-4 col-md-3 d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/products/s5.jpg') }}" class="rounded img-fluid" />
                    </div>
                    <div class="col-8 col-md-9 d-flex align-items-center">
                      <div>
                        <a href="javascript:void(0)" class="card-title link-primary fw-semibold text-dark">Beauty Blender
                         blender</a>
                        <p class="card-subtitle mt-1">
                          By Nancy Deo
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="p-4 d-flex align-items-stretch h-100">
                  <div class="row">
                    <div class="col-4 col-md-3 d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/products/s6.jpg') }}" class="rounded img-fluid" />
                    </div>
                    <div class="col-8 col-md-9 d-flex align-items-center">
                      <div>
                        <a href="javascript:void(0)" class="card-title link-primary fw-semibold text-dark">Canvas Shoes For
                          Men</a>
                        <p class="card-subtitle mt-1">
                          Absolute Comfort
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <!-- 7. Stats card -->
              <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
                <h4 class="mb-0 fs-5">Stats card</h4>
              </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <a href="javascript:void(0)" class="card text-bg-success text-white w-100 card-hover">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="ti ti-basket display-6"></i>
                    <div class="ms-auto">
                      <i class="ti ti-arrow-right fs-8"></i>
                    </div>
                  </div>
                  <div class="mt-4">
                    <h4 class="card-title mb-1 text-white">Selling Products</h4>
                    <p class="card-text fw-normal text-white opacity-75">
                      Shoes, Jeans, Party wear, Watchs
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <a href="javascript:void(0)" class="card text-bg-warning text-white w-100 card-hover">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="ti ti-glass display-6"></i>
                    <div class="ms-auto">
                      <i class="ti ti-arrow-right fs-8"></i>
                    </div>
                  </div>
                  <div class="mt-4">
                    <h4 class="card-title mb-1 text-white">Spicy Food</h4>
                    <p class="card-text fw-normal text-white opacity-75">
                      Black Bean and Corn Jalapeño Poppers
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <a href="javascript:void(0)" class="card text-bg-danger text-white w-100 card-hover">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="ti ti-calendar display-6"></i>
                    <div class="ms-auto">
                      <i class="ti ti-arrow-right fs-8"></i>
                    </div>
                  </div>
                  <div class="mt-4">
                    <h4 class="card-title mb-1 text-white">
                      Dispatch Products
                    </h4>
                    <p class="card-text fw-normal text-white opacity-75">
                      Shoes, Jeans, Party wear, Watchs
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <a href="javascript:void(0)" class="card text-bg-primary text-white w-100 card-hover">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="ti ti-brand-apple display-6"></i>
                    <div class="ms-auto">
                      <i class="ti ti-arrow-right fs-8"></i>
                    </div>
                  </div>
                  <div class="mt-4">
                    <h4 class="card-title mb-1 text-white">
                      Apple Accessories
                    </h4>
                    <p class="card-text fw-normal text-white opacity-75">
                      Magsafe charger, Solo Loop
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <a href="javascript:void(0)" class="card text-bg-info text-white w-100 card-hover">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="ti ti-folders display-6"></i>
                    <div class="ms-auto">
                      <i class="ti ti-arrow-right fs-8"></i>
                    </div>
                  </div>
                  <div class="mt-4">
                    <h4 class="card-title mb-1 text-white">Manage Data</h4>
                    <p class="card-text fw-normal text-white opacity-75">
                      on mobile, on site
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <a href="javascript:void(0)" class="card text-bg-secondary text-white w-100 card-hover">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <i class="ti ti-alert-octagon display-6"></i>
                    <div class="ms-auto">
                      <i class="ti ti-arrow-right fs-8"></i>
                    </div>
                  </div>
                  <div class="mt-4">
                    <h4 class="card-title mb-1 text-white">
                      New Notifications
                    </h4>
                    <p class="card-text fw-normal text-white opacity-75">
                      Facebook, Instagram
                    </p>
                  </div>
                </div>
              </a>
            </div>
            <div class="col-12">
              <!-- 8. Card Header -->
              <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
                <h4 class="mb-0 fs-5">Card Header</h4>
              </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-header text-bg-primary">
                  <h4 class="mb-0 text-white card-title">Card Title</h4>
                </div>
                <div class="card-body">
                  <h3 class="card-title">Special title treatment</h3>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-header text-bg-success">
                  <h4 class="mb-0 text-white card-title">Card Title</h4>
                </div>
                <div class="card-body">
                  <h3 class="card-title">Special title treatment</h3>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-success">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-header text-bg-warning">
                  <h4 class="mb-0 text-white card-title">Card Title</h4>
                </div>
                <div class="card-body">
                  <h3 class="card-title">Special title treatment</h3>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-warning">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-header text-bg-danger">
                  <h4 class="mb-0 text-white card-title">Card Title</h4>
                </div>
                <div class="card-body">
                  <h3 class="card-title">Special title treatment</h3>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-danger">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-header text-bg-info">
                  <h4 class="mb-0 text-white card-title">Card Title</h4>
                </div>
                <div class="card-body">
                  <h3 class="card-title">Special title treatment</h3>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-info">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-header text-bg-secondary">
                  <h4 class="mb-0 text-white card-title">Card Title</h4>
                </div>
                <div class="card-body">
                  <h3 class="card-title">Special title treatment</h3>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <a href="javascript:void(0)" class="btn btn-secondary">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-12">
              <!-- 9. Progress Card -->
              <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
                <h4 class="mb-0 fs-5 fs-5">Progress Card</h4>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100 rounded-bottom-0">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title mb-0">Outbound calls</h4>
                    <div class="ms-auto">
                      <span class="text-danger fs-3 ">( <i class="ti ti-caret-down fs-4"></i> 18% High
                        )</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center my-3">
                    <div class="border-end pe-3">
                      <h6 class="text-muted fw-normal">Yearly</h6>
                      <b>80.40%</b>
                    </div>
                    <div class="ms-3 border-end pe-3">
                      <h6 class="text-muted fw-normal">Montly</h6>
                      <b>15.40%</b>
                    </div>
                    <div class="ms-3">
                      <h6 class="text-muted fw-normal">Day</h6>
                      <b>5.50%</b>
                    </div>
                  </div>
                  <a href="javascript:void(0)" class="btn bg-primary-subtle text-primary ">Learn
                    More</a>
                </div>
                <div class="progress text-bg-light">
                  <div class="progress-bar progress-bar-striped text-bg-primary progress-bar-animated"
                    style="width: 60%; height: 6px;" role="progressbar">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100 rounded-bottom-0">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title mb-0">Contracts closed</h4>
                    <div class="ms-auto">
                      <span class="text-success fs-3 ">( <i class="ti ti-caret-down fs-4"></i> 10% Down
                        )</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center my-3">
                    <div class="border-end pe-3">
                      <h6 class="text-muted fw-normal">Yearly</h6>
                      <b>80.40%</b>
                    </div>
                    <div class="ms-3 border-end pe-3">
                      <h6 class="text-muted fw-normal">Montly</h6>
                      <b>15.40%</b>
                    </div>
                    <div class="ms-3">
                      <h6 class="text-muted fw-normal">Day</h6>
                      <b>5.50%</b>
                    </div>
                  </div>
                  <a href="javascript:void(0)" class="btn bg-success-subtle text-success ">Learn
                    More</a>
                </div>
                <div class="progress text-bg-light">
                  <div class="progress-bar progress-bar-striped text-bg-success progress-bar-animated"
                    style="width: 60%; height: 6px;" role="progressbar">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100 rounded-bottom-0">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title mb-0">Call/Contract Ratio</h4>
                    <div class="ms-auto">
                      <span class="text-success fs-3 ">( <i class="ti ti-caret-down fs-4"></i> 10% Down
                        )</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center my-3">
                    <div class="border-end pe-3">
                      <h6 class="text-muted fw-normal">Yearly</h6>
                      <b>80.40%</b>
                    </div>
                    <div class="ms-3 border-end pe-3">
                      <h6 class="text-muted fw-normal">Montly</h6>
                      <b>15.40%</b>
                    </div>
                    <div class="ms-3">
                      <h6 class="text-muted fw-normal">Day</h6>
                      <b>5.50%</b>
                    </div>
                  </div>
                  <a href="javascript:void(0)" class="btn bg-warning-subtle text-warning ">Learn
                    More</a>
                </div>
                <div class="progress text-bg-light">
                  <div class="progress-bar progress-bar-striped text-bg-warning progress-bar-animated"
                    style="width: 60%; height: 6px;" role="progressbar">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100 rounded-bottom-0">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title mb-0">Incoming Deals</h4>
                    <div class="ms-auto">
                      <span class="text-danger fs-3 ">( <i class="ti ti-caret-down fs-4"></i> 06% Down
                        )</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center my-3">
                    <div class="border-end pe-3">
                      <h6 class="text-muted fw-normal">Yearly</h6>
                      <b>80.40%</b>
                    </div>
                    <div class="ms-3 border-end pe-3">
                      <h6 class="text-muted fw-normal">Montly</h6>
                      <b>15.40%</b>
                    </div>
                    <div class="ms-3">
                      <h6 class="text-muted fw-normal">Day</h6>
                      <b>5.50%</b>
                    </div>
                  </div>
                  <a href="javascript:void(0)" class="btn bg-danger-subtle text-danger ">Learn
                    More</a>
                </div>
                <div class="progress text-bg-light">
                  <div class="progress-bar progress-bar-striped text-bg-danger progress-bar-animated"
                    style="width: 60%; height: 6px;" role="progressbar">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100 rounded-bottom-0">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title mb-0">Average Contract</h4>
                    <div class="ms-auto">
                      <span class="text-danger fs-3 ">( <i class="ti ti-caret-down fs-4"></i> 04% Down
                        )</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center my-3">
                    <div class="border-end pe-3">
                      <h6 class="text-muted fw-normal">Yearly</h6>
                      <b>80.40%</b>
                    </div>
                    <div class="ms-3 border-end pe-3">
                      <h6 class="text-muted fw-normal">Montly</h6>
                      <b>15.40%</b>
                    </div>
                    <div class="ms-3">
                      <h6 class="text-muted fw-normal">Day</h6>
                      <b>5.50%</b>
                    </div>
                  </div>
                  <a href="javascript:void(0)" class="btn bg-info-subtle text-info">Learn More</a>
                </div>
                <div class="progress text-bg-light">
                  <div class="progress-bar progress-bar-striped text-bg-info progress-bar-animated"
                    style="width: 60%; height: 6px;" role="progressbar">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4 d-flex align-items-stretch">
              <div class="card w-100 rounded-bottom-0">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title mb-0">Contract Rate</h4>
                    <div class="ms-auto">
                      <span class="text-danger fs-3 ">( <i class="ti ti-caret-down fs-4"></i> 15% Down
                        )</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center my-3">
                    <div class="border-end pe-3">
                      <h6 class="text-muted fw-normal">Yearly</h6>
                      <b>80.40%</b>
                    </div>
                    <div class="ms-3 border-end pe-3">
                      <h6 class="text-muted fw-normal">Montly</h6>
                      <b>15.40%</b>
                    </div>
                    <div class="ms-3">
                      <h6 class="text-muted fw-normal">Day</h6>
                      <b>5.50%</b>
                    </div>
                  </div>
                  <a href="javascript:void(0)" class="btn bg-secondary-subtle text-secondary ">Learn
                    More</a>
                </div>
                <div class="progress text-bg-light">
                  <div class="progress-bar progress-bar-striped text-bg-secondary progress-bar-animated"
                    style="width: 60%; height: 6px;" role="progressbar">
                    <span class="sr-only">60% Complete</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-start">
                    <div class="bg-warning-subtle text-warning d-inline-block px-4 py-3 rounded">
                      <i class="ti ti-brand-google-drive display-6"></i>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="link text-dark" id="dropdownMenuButton" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          <i class="ti ti-dots fs-7"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li>
                            <h6 class="dropdown-header">New</h6>
                          </li>
                          <li><a class="dropdown-item" href="javascript:void(0)">Folder</a></li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Google Docs</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Google Sheets</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Google Slides</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="mt-5">
                    <h4 class="card-title">Google Drive</h4>
                    <div class="progress mt-4 bg-light">
                      <div class="progress-bar text-bg-warning" style="width: 78%; height: 6px;" role="progressbar">
                        <span class="sr-only">60% Complete</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center mt-2 ">
                      <span>13.1Gb</span>
                      <div class="ms-auto">
                        <span>15Gb</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-start">
                    <div class="bg-info-subtle text-info d-inline-block px-4 py-3 rounded">
                      <i class="ti ti-brand-facebook display-6"></i>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="link text-dark" id="dropdownMenuButton" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          <i class="ti ti-dots fs-7"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Upload Files</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Upload Folder</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">New Folder</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">New Shared Folder</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="mt-5">
                    <h4 class="card-title">Facebook</h4>
                    <div class="progress mt-4 bg-light">
                      <div class="progress-bar text-bg-info" style="width: 50%; height: 6px;" role="progressbar">
                        <span class="sr-only">50% Complete</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center mt-2 ">
                      <span>7.5Gb</span>
                      <div class="ms-auto">
                        <span>15Gb</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-start">
                    <div class="bg-primary-subtle text-primary d-inline-block px-4 py-3 rounded">
                      <i class="ti ti-brand-soundcloud display-6"></i>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="link text-dark" id="dropdownMenuButton" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          <i class="ti ti-dots fs-7"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Upload Files</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Upload Folder</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">New Folder</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">New Shared Folder</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="mt-5">
                    <h4 class="card-title">One Drive</h4>
                    <div class="progress mt-4 bg-light">
                      <div class="progress-bar text-bg-primary" style="width: 20%; height: 6px;" role="progressbar">
                        <span class="sr-only">50% Complete</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center mt-2 ">
                      <span>2Gb</span>
                      <div class="ms-auto">
                        <span>15Gb</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-start">
                    <div class="bg-danger-subtle text-danger d-inline-block px-4 py-3 rounded">
                      <i class="ti ti-brand-amazon display-6"></i>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="link text-dark" id="dropdownMenuButton" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          <i class="ti ti-dots fs-7"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Upload Files</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Upload Folder</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">New Folder</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">New Shared Folder</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="mt-5">
                    <h4 class="card-title">Amazon</h4>
                    <div class="progress mt-4 bg-light">
                      <div class="progress-bar text-bg-danger" style="width: 85%; height: 6px;" role="progressbar">
                        <span class="sr-only">50% Complete</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center mt-2 ">
                      <span>4Gb</span>
                      <div class="ms-auto">
                        <span>15Gb</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <!-- 10. category card -->
              <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
                <h4 class="mb-0 fs-5">Category Card</h4>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card rounded-3 card-hover">
                
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <span class="flex-shrink-0"><i class="ti ti-photo text-warning display-6"></i></span>
                    <div class="ms-4">
                      <h4 class="card-title text-dark">My Photos</h4>
                      <h6 class="card-subtitle mb-0 fs-2 fw-normal">
                        2.4GB Junk File
                      </h6>
                      <span class="fs-2 mt-1 ">Folder: 26 Items: 159 Used: 23.6GB</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card rounded-3 card-hover">
                
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <span class="flex-shrink-0"><i class="ti ti-brand-google-drive text-info display-6"></i></span>
                    <div class="ms-4">
                      <h4 class="card-title text-dark">My Google Docs</h4>
                      <h6 class="card-subtitle mb-0 fs-2 fw-normal">
                        2.4GB Junk File
                      </h6>
                      <span class="fs-2 mt-1 ">Folder: 26 Items: 159 Used: 23.6GB</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card rounded-3 card-hover">
                
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <span class="flex-shrink-0"><i class="ti ti-users text-success display-6"></i></span>
                    <div class="ms-4">
                      <h4 class="card-title text-dark">My Google Contacts</h4>
                      <h6 class="card-subtitle mb-0 fs-2 fw-normal mb-1">
                        2.4GB Junk File
                      </h6>
                      <span class="fs-2 mt-1 ">Folder: 45 Items: 78 Used: 3.6GB</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card rounded-3 card-hover">
                
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <span class="flex-shrink-0"><i class="ti ti-folder text-danger display-6"></i></span>
                    <div class="ms-4">
                      <h4 class="card-title text-dark">My Folder</h4>
                      <h6 class="card-subtitle mb-0 fs-2 fw-normal mb-1">
                        2.4GB Junk File
                      </h6>
                      <span class="fs-2 mt-1 ">Folder: 45 Items: 78 Used: 3.6GB</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card rounded-3 card-hover">
                
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <span class="flex-shrink-0"><i class="ti ti-download text-secondary display-6"></i></span>
                    <div class="ms-4">
                      <h4 class="card-title text-dark">My Downloads</h4>
                      <h6 class="card-subtitle mb-0 fs-2 fw-normal mb-1">
                        2.4GB Junk File
                      </h6>
                      <span class="fs-2 mt-1 ">Folder: 45 Items: 78 Used: 3.6GB</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card rounded-3 card-hover">
                
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <span class="flex-shrink-0"><i class="ti ti-building text-danger display-6"></i></span>
                    <div class="ms-4">
                      <h4 class="card-title text-dark">Office Work</h4>
                      <h6 class="card-subtitle mb-0 fs-2 fw-normal mb-1">
                        2.4GB Junk File
                      </h6>
                      <span class="fs-2 mt-1 ">Folder: 4 Items: 4800 Used: 2.6GB</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <!-- 11. notes -->
              <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
                <h4 class="mb-0 fs-5">Notes Card</h4>
              </div>
            </div>
            <div class="col-md-6 col-xxl-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title mb-0">Design Project</h4>
                    <div class="ms-auto">
                      <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="link text-dark" id="new" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ti ti-dots fs-7"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="new">
                          <li><a class="dropdown-item" href="javascript:void(0)">Add</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0)">Delete</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-6 mb-3">
                      <a href="javascript:void(0)" class="text-center rounded-4 border py-3 d-block">
                        <i class="ti ti-file-x display-6 text-info"></i>
                        <span class="text-muted d-block">notes.zip</span>
                      </a>
                    </div>
                    <div class="col-6 mb-3">
                      <a href="javascript:void(0)" class="text-center rounded-4 border py-3 d-block">
                        <i class="ti ti-file-description display-6 text-primary"></i>
                        <span class="text-muted d-block">File 1</span>
                      </a>
                    </div>
                    <div class="col-6">
                      <a href="javascript:void(0)" class="text-center rounded-4 border py-3 d-block">
                        <i class="ti ti-file-description display-6 text-warning"></i>
                        <span class="text-muted d-block">File 2</span>
                      </a>
                    </div>
                    <div class="col-6">
                      <a href="javascript:void(0)" class="text-center rounded-4 border py-3 d-block">
                        <i class="ti ti-file-description display-6 text-secondary"></i>
                        <span class="text-muted d-block">File 3</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xxl-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title mb-0">Wedding Plans</h4>
                    <div class="ms-auto">
                      <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="link text-dark" id="new" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ti ti-dots fs-7"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="new">
                          <li><a class="dropdown-item" href="javascript:void(0)">Add</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0)">Delete</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-6 mb-3">
                      <a href="javascript:void(0)" class="text-center rounded-4 border py-3 d-block">
                        <i class="ti ti-file-x display-6 text-primary"></i>
                        <span class="text-muted d-block">notes.zip</span>
                      </a>
                    </div>
                    <div class="col-6 mb-3">
                      <a href="javascript:void(0)" class="text-center rounded-4 border py-3 d-block">
                        <i class="ti ti-file-x display-6 text-secondary"></i>
                        <span class="text-muted d-block">photo.jpg</span>
                      </a>
                    </div>
                    <div class="col-6">
                      <a href="javascript:void(0)" class="text-center rounded-4 border py-3 d-block">
                        <i class="ti ti-file-music display-6 text-warning"></i>
                        <span class="text-muted d-block">songs.mp3</span>
                      </a>
                    </div>
                    <div class="col-6">
                      <a href="javascript:void(0)" class="text-center rounded-4 border py-3 d-block">
                        <i class="ti ti-file-x display-6 text-danger"></i>
                        <span class="text-muted d-block">design.mp4</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xxl-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title">Finances</h4>
                    <div class="ms-auto">
                      <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="link text-dark" id="new" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ti ti-dots fs-7"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="new">
                          <li><a class="dropdown-item" href="javascript:void(0)">Add</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0)">Delete</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-6 mb-3">
                      <a href="javascript:void(0)" class="text-center rounded-4 border py-3 d-block">
                        <i class="ti ti-file-description display-6 text-info"></i>
                        <span class="text-muted d-block">File 1</span>
                      </a>
                    </div>
                    <div class="col-6 mb-3">
                      <a href="javascript:void(0)" class="text-center rounded-4 border py-3 d-block">
                        <i class="ti ti-file-description display-6 text-warning"></i>
                        <span class="text-muted d-block">File 2</span>
                      </a>
                    </div>
                    <div class="col-6">
                      <div class="text-center rounded border py-3">
                        <i class="ti ti-file-description display-6 text-primary"></i>
                        <span class="text-muted d-block">File 3</span>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="text-center rounded border py-3">
                        <i class="ti ti-file-description display-6 text-success"></i>
                        <span class="text-muted d-block">File 4</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xxl-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title">Meal Plans</h4>
                    <div class="ms-auto">
                      <div class="dropdown dropstart">
                        <a href="javascript:void(0)" class="link text-dark" id="new" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ti ti-dots fs-7"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="new">
                          <li><a class="dropdown-item" href="javascript:void(0)">Add</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0)">Edit</a></li>
                          <li><a class="dropdown-item" href="javascript:void(0)">Delete</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-6 mb-3">
                      <div class="text-center rounded border py-3">
                        
                        <i class="ti ti-file-description display-6 text-info"></i>
                        <span class="text-muted d-block">File 1</span>
                      </div>
                    </div>
                    <div class="col-6 mb-3">
                      <div class="text-center rounded border py-3">
                        
                        <i class="ti ti-file-plus display-6 text-secondary"></i>
                        <span class="text-muted d-block">File 2</span>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="text-center rounded border py-3">
                        
                        <i class="ti ti-file-description display-6 text-primary"></i>
                        <span class="text-muted d-block">File 3</span>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="text-center rounded border py-3">
                        
                        <i class="ti ti-file-description display-6 text-danger"></i>
                        <span class="text-muted d-block">File 4</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <!-- 12. card action -->
              <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
                <h4 class="mb-0 fs-5">Card with Action</h4>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header text-bg-info d-flex align-items-center">
                  <h4 class="card-title text-white mb-0">Title</h4>
                  <div class="card-actions cursor-pointer ms-auto d-flex button-group">
                    <a href="javascript:void(0)" class="link text-white d-flex align-items-center"
                      data-action="collapse"><i class="ti ti-minus fs-6"></i></a>
                    <a href="javascript:void(0)"
                      class="mb-0 btn-minimize px-2 cursor-pointer text-white link d-flex align-items-center"
                      data-action="expand"><i class="ti ti-arrows-maximize fs-6"></i></a>
                    <a href="javascript:void(0)"
                      class="mb-0 link d-flex text-white align-items-center pe-0 cursor-pointer" data-action="close">
                      <i class="ti ti-x fs-6"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body collapse show">
                  <h4 class="card-title">Special title treatment</h4>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header text-bg-primary d-flex align-items-center">
                  <h4 class="card-title text-white mb-0">Title</h4>
                  <div class="card-actions cursor-pointer ms-auto d-flex button-group">
                    <a href="javascript:void(0)" class="link d-flex text-white align-items-center"
                      data-action="collapse"><i class="ti ti-minus fs-6"></i></a>
                    <a href="javascript:void(0)"
                      class="mb-0 text-white btn-minimize px-2 cursor-pointer link d-flex align-items-center"
                      data-action="expand"><i class="ti ti-arrows-maximize fs-6"></i></a>
                    <a href="javascript:void(0)"
                      class="mb-0 link text-white d-flex align-items-center pe-0 cursor-pointer" data-action="close">
                      <i class="ti ti-x fs-6"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body collapse show">
                  <h4 class="card-title">Special title treatment</h4>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header text-bg-success d-flex align-items-center">
                  <h4 class="card-title text-white mb-0">Title</h4>
                  <div class="card-actions cursor-pointer ms-auto d-flex button-group">
                    <a href="javascript:void(0)" class="link text-white d-flex align-items-center"
                      data-action="collapse"><i class="ti ti-minus fs-6"></i></a>
                    <a href="javascript:void(0)"
                      class="mb-0 text-white btn-minimize px-2 cursor-pointer link d-flex align-items-center"
                      data-action="expand"><i class="ti ti-arrows-maximize fs-6"></i></a>
                    <a href="javascript:void(0)"
                      class="mb-0 text-white link d-flex align-items-center pe-0 cursor-pointer" data-action="close">
                      <i class="ti ti-x fs-6"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body collapse show">
                  <h4 class="card-title">Special title treatment</h4>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header text-bg-danger d-flex align-items-center">
                  <h4 class="card-title text-white mb-0">Title</h4>
                  <div class="card-actions cursor-pointer ms-auto d-flex button-group">
                    <a href="javascript:void(0)" class="link d-flex text-white align-items-center"
                      data-action="collapse"><i class="ti ti-minus fs-6"></i></a>
                    <a href="javascript:void(0)"
                      class="mb-0 text-white btn-minimize px-2 cursor-pointer link d-flex align-items-center"
                      data-action="expand"><i class="ti ti-arrows-maximize fs-6"></i></a>
                    <a href="javascript:void(0)"
                      class="mb-0 text-white link d-flex align-items-center pe-0 cursor-pointer" data-action="close">
                      <i class="ti ti-x fs-6"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body collapse show">
                  <h4 class="card-title">Special title treatment</h4>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
                  <p class="card-text">
                    With supporting text below as a natural lead-in to additional content.
                  </p>
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
  <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
  <script src="{{ URL::asset('build/js/widget/ui-card-init.js') }}"></script>
</body>

</html>