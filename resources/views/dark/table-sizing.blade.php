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

          @@include("partials/breadcrumb.html", {"title": "Table Sizing", "subtitle": 'Home'})
          <!-- start Default Size Light Table -->
          <div class="card">
            <div class="card-body">
              <div class="d-flex mb-2 align-items-center">
                <div>
                  <h5>Default Size Light Table</h5>
                </div>
                <div class="ms-auto flex-shrink-0">
                  <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                    data-bs-toggle="modal" data-bs-target="#view-code1-modal">
                    <i class="ti ti-code fs-5 d-flex"></i>
                  </button>
                  <!-- Code Modal -->
                  <div id="view-code1-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header border-bottom">
                          <h5 class="modal-title" id="exampleModalLabel">
                            Default Size Light Table - View Code
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                          <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;  
&lt;table class=&quot;table mb-0&quot;&gt;
&lt;thead&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
        &lt;th scope=&quot;col&quot;&gt;First&lt;/th&gt;
        &lt;th scope=&quot;col&quot;&gt;Last&lt;/th&gt;
        &lt;th scope=&quot;col&quot;&gt;Handle&lt;/th&gt;
    &lt;/tr&gt;
&lt;/thead&gt;
&lt;tbody&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
        &lt;td&gt;Mark&lt;/td&gt;
        &lt;td&gt;Otto&lt;/td&gt;
        &lt;td&gt;@mdo&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
        &lt;td&gt;Jacob&lt;/td&gt;
        &lt;td&gt;Thornton&lt;/td&gt;
        &lt;td&gt;@fat&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
        &lt;td&gt;Larry&lt;/td&gt;
        &lt;td&gt;the Bird&lt;/td&gt;
        &lt;td&gt;@twitter&lt;/td&gt;
    &lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
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
              <div class="table-responsive border rounded-4">
                <table class="table text-nowrap customize-table mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">User</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Project Name</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Team</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Budget</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Sunil Joshi</h6>
                            <span class="fw-normal">Web Designer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Elite Admin</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            S
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            D
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-success-subtle text-success">Active</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$3.9k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Arlene McCoy</h6>
                            <span class="fw-normal">Project Manager</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Real Homes WP Theme</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-primary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            A
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-warning text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            X
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            N
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-warning-subtle text-warning">Pending</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$24.5k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Christopher Jamil</h6>
                            <span class="fw-normal">Project Manager</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">MedicalPro WP Theme</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            X
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-primary-subtle text-primary">Completed</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$12.8k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Evelyn Pope</h6>
                            <span class="fw-normal">Frontend Engineer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-primary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            Y
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            X
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-success-subtle text-success">Active</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$2.4k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Micheal Doe</h6>
                            <span class="fw-normal">Content Writer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            S
                          </a>
                        </div>
                      </td>
                      <td>
                        <span class="badge bg-danger-subtle text-danger">Cancel</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$9.3k</h6>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- end Default Size Light Table -->
          <!-- start Default Size Dark Table -->
          <div class="card">
            <div class="card-body">
              <div class="d-flex mb-2 align-items-center">
                <div>
                  <h5>Default Size Dark Table</h5>
                </div>
                <div class="ms-auto flex-shrink-0">
                  <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                    data-bs-toggle="modal" data-bs-target="#view-code2-modal">
                    <i class="ti ti-code fs-5 d-flex"></i>
                  </button>
                  <!-- Code Modal -->
                  <div id="view-code2-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header border-bottom">
                          <h5 class="modal-title" id="exampleModalLabel">
                            Default Size Dark Table - View Code
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                          <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;  
&lt;table class=&quot;table table-dark mb-0&quot;&gt;
&lt;thead&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
        &lt;th scope=&quot;col&quot;&gt;First&lt;/th&gt;
        &lt;th scope=&quot;col&quot;&gt;Last&lt;/th&gt;
        &lt;th scope=&quot;col&quot;&gt;Handle&lt;/th&gt;
    &lt;/tr&gt;
&lt;/thead&gt;
&lt;tbody&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
        &lt;td&gt;Mark&lt;/td&gt;
        &lt;td&gt;Otto&lt;/td&gt;
        &lt;td&gt;@mdo&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
        &lt;td&gt;Jacob&lt;/td&gt;
        &lt;td&gt;Thornton&lt;/td&gt;
        &lt;td&gt;@fat&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
        &lt;td&gt;Larry&lt;/td&gt;
        &lt;td&gt;the Bird&lt;/td&gt;
        &lt;td&gt;@twitter&lt;/td&gt;
    &lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
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
              <div class="table-responsive border rounded-4" data-bs-theme="dark">
                <table class="table table-dark text-nowrap customize-table mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">User</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Project Name</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Team</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Budget</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Sunil Joshi</h6>
                            <span class="fw-normal">Web Designer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Elite Admin</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            S
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            D
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-success-subtle text-success">Active</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$3.9k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Arlene McCoy</h6>
                            <span class="fw-normal">Project Manager</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Real Homes WP Theme</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-primary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            A
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-warning text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            X
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            N
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-warning-subtle text-warning">Pending</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$24.5k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Christopher Jamil</h6>
                            <span class="fw-normal">Project Manager</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">MedicalPro WP Theme</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            X
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-primary-subtle text-primary">Completed</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$12.8k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Evelyn Pope</h6>
                            <span class="fw-normal">Frontend Engineer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-primary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            Y
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            X
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-success-subtle text-success">Active</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$2.4k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Micheal Doe</h6>
                            <span class="fw-normal">Content Writer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            S
                          </a>
                        </div>
                      </td>
                      <td>
                        <span class="badge bg-danger-subtle text-danger">Cancel</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$9.3k</h6>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- end Default Size Dark Table -->
          <!-- start Small Size Light Table -->
          <div class="card">
            <div class="card-body">
              <div class="d-flex mb-2 align-items-center">
                <div>
                  <h5>Small Size Light Table</h5>
                </div>
                <div class="ms-auto flex-shrink-0">
                  <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                    data-bs-toggle="modal" data-bs-target="#view-code3-modal">
                    <i class="ti ti-code fs-5 d-flex"></i>
                  </button>
                  <!-- Code Modal -->
                  <div id="view-code3-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header border-bottom">
                          <h5 class="modal-title" id="exampleModalLabel">
                            Small Size Light Table - View Code
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                          <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;  
&lt;table class=&quot;table table-sm mb-0&quot;&gt;
&lt;thead&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
        &lt;th scope=&quot;col&quot;&gt;First&lt;/th&gt;
        &lt;th scope=&quot;col&quot;&gt;Last&lt;/th&gt;
        &lt;th scope=&quot;col&quot;&gt;Handle&lt;/th&gt;
    &lt;/tr&gt;
&lt;/thead&gt;
&lt;tbody&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
        &lt;td&gt;Mark&lt;/td&gt;
        &lt;td&gt;Otto&lt;/td&gt;
        &lt;td&gt;@mdo&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
        &lt;td&gt;Jacob&lt;/td&gt;
        &lt;td&gt;Thornton&lt;/td&gt;
        &lt;td&gt;@fat&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
        &lt;td colspan=&quot;2&quot;&gt;Larry the Bird&lt;/td&gt;
        &lt;td&gt;@twitter&lt;/td&gt;
    &lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
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
              <div class="table-responsive border rounded-4">
                <table class="table table-sm text-nowrap customize-table mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">User</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Project Name</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Team</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Budget</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Sunil Joshi</h6>
                            <span class="fw-normal">Web Designer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Elite Admin</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            S
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            D
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-success-subtle text-success">Active</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$3.9k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Arlene McCoy</h6>
                            <span class="fw-normal">Project Manager</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Real Homes WP Theme</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-primary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            A
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-warning text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            X
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            N
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-warning-subtle text-warning">Pending</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$24.5k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Christopher Jamil</h6>
                            <span class="fw-normal">Project Manager</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">MedicalPro WP Theme</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            X
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-primary-subtle text-primary">Completed</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$12.8k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Evelyn Pope</h6>
                            <span class="fw-normal">Frontend Engineer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-primary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            Y
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            X
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-success-subtle text-success">Active</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$2.4k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Micheal Doe</h6>
                            <span class="fw-normal">Content Writer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            S
                          </a>
                        </div>
                      </td>
                      <td>
                        <span class="badge bg-danger-subtle text-danger">Cancel</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$9.3k</h6>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- end Small Size Light Table -->
          <!-- start Small Size Dark Table -->
          <div class="card">
            <div class="card-body">
              <div class="d-flex mb-2 align-items-center">
                <div>
                  <h5>Small Size Dark Table</h5>
                </div>
                <div class="ms-auto flex-shrink-0">
                  <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                    data-bs-toggle="modal" data-bs-target="#view-code4-modal">
                    <i class="ti ti-code fs-5 d-flex"></i>
                  </button>
                  <!-- Code Modal -->
                  <div id="view-code4-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header border-bottom">
                          <h5 class="modal-title" id="exampleModalLabel">
                            Small Size Dark Table - View Code
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                          <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;  
&lt;table class=&quot;table table-sm table-dark mb-0&quot;&gt;
&lt;thead&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
        &lt;th scope=&quot;col&quot;&gt;First&lt;/th&gt;
        &lt;th scope=&quot;col&quot;&gt;Last&lt;/th&gt;
        &lt;th scope=&quot;col&quot;&gt;Handle&lt;/th&gt;
    &lt;/tr&gt;
&lt;/thead&gt;
&lt;tbody&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
        &lt;td&gt;Mark&lt;/td&gt;
        &lt;td&gt;Otto&lt;/td&gt;
        &lt;td&gt;@mdo&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
        &lt;td&gt;Jacob&lt;/td&gt;
        &lt;td&gt;Thornton&lt;/td&gt;
        &lt;td&gt;@fat&lt;/td&gt;
    &lt;/tr&gt;
    &lt;tr&gt;
        &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
        &lt;td colspan=&quot;2&quot;&gt;Larry the Bird&lt;/td&gt;
        &lt;td&gt;@twitter&lt;/td&gt;
    &lt;/tr&gt;
&lt;/tbody&gt;
&lt;/table&gt;
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
              <div class="table-responsive border rounded-4" data-bs-theme="dark">
                <table class="table table-sm table-dark text-nowrap customize-table mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">User</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Project Name</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Team</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Budget</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Sunil Joshi</h6>
                            <span class="fw-normal">Web Designer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Elite Admin</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            S
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            D
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-success-subtle text-success">Active</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$3.9k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Arlene McCoy</h6>
                            <span class="fw-normal">Project Manager</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Real Homes WP Theme</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-primary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            A
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-warning text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            X
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            N
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-warning-subtle text-warning">Pending</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$24.5k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Christopher Jamil</h6>
                            <span class="fw-normal">Project Manager</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">MedicalPro WP Theme</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            X
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-primary-subtle text-primary">Completed</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$12.8k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Evelyn Pope</h6>
                            <span class="fw-normal">Frontend Engineer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-primary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            Y
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            X
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-success-subtle text-success">Active</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$2.4k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Micheal Doe</h6>
                            <span class="fw-normal">Content Writer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center"
                            >
                            S
                          </a>
                        </div>
                      </td>
                      <td>
                        <span class="badge bg-danger-subtle text-danger">Cancel</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$9.3k</h6>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- end Small Size Dark Table -->
        </div>
      </div>
      @@include("partials/customizer.html")
    </div>

    


  </div>
  <div class="dark-transparent sidebartoggler"></div>
  @@include("partials/scripts.html")
  <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
</body>

</html>