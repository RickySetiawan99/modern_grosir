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
          @@include("partials/breadcrumb.html", {"title": "Table Coloured", "subtitle": 'Home'})
          <div class="row">
            <div class="col-lg-6">
              <!--  start Primary Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Primary Table</h4>
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
                                Primary Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table&quot;&gt;
    &lt;thead class=&quot;bg-primary text-white&quot;&gt;
        &lt;tr&gt;
            &lt;th&gt;#&lt;/th&gt;
            &lt;th&gt;First Name&lt;/th&gt;
            &lt;th&gt;Last Name&lt;/th&gt;
            &lt;th&gt;Username&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &lt;tr&gt;
            &lt;td&gt;1&lt;/td&gt;
            &lt;td&gt;Nigam&lt;/td&gt;
            &lt;td&gt;Eichmann&lt;/td&gt;
            &lt;td&gt;@Sonu&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;2&lt;/td&gt;
            &lt;td&gt;Deshmukh&lt;/td&gt;
            &lt;td&gt;Prohaska&lt;/td&gt;
            &lt;td&gt;@Genelia&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;3&lt;/td&gt;
            &lt;td&gt;Roshan&lt;/td&gt;
            &lt;td&gt;Rogahn&lt;/td&gt;
            &lt;td&gt;@Hritik&lt;/td&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class <code>.table-primary</code> in
                    the <code>&lt;thead&gt;</code>.
                  </p>
                  <div class="table-responsive border rounded-4">
                    <table class="table mb-0">
                      <thead class="table-primary">
                        <!-- start row -->
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <td>1</td>
                          <td>Nigam</td>
                          <td>Eichmann</td>
                          <td>@Sonu</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>2</td>
                          <td>Deshmukh</td>
                          <td>Prohaska</td>
                          <td>@Genelia</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>3</td>
                          <td>Roshan</td>
                          <td>Rogahn</td>
                          <td>@Hritik</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Primary Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Success Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Success Table</h4>
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
                                Success Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table&quot;&gt;
    &lt;thead class=&quot;bg-success text-white&quot;&gt;
        &lt;tr&gt;
            &lt;th&gt;#&lt;/th&gt;
            &lt;th&gt;First Name&lt;/th&gt;
            &lt;th&gt;Last Name&lt;/th&gt;
            &lt;th&gt;Username&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &lt;tr&gt;
            &lt;td&gt;1&lt;/td&gt;
            &lt;td&gt;Nigam&lt;/td&gt;
            &lt;td&gt;Eichmann&lt;/td&gt;
            &lt;td&gt;@Sonu&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;2&lt;/td&gt;
            &lt;td&gt;Deshmukh&lt;/td&gt;
            &lt;td&gt;Prohaska&lt;/td&gt;
            &lt;td&gt;@Genelia&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;3&lt;/td&gt;
            &lt;td&gt;Roshan&lt;/td&gt;
            &lt;td&gt;Rogahn&lt;/td&gt;
            &lt;td&gt;@Hritik&lt;/td&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class <code>.table-success</code> in
                    the <code>&lt;thead&gt;</code>.
                  </p>
                  <div class="table-responsive border rounded-4">
                    <table class="table mb-0">
                      <thead class="table-success">
                        <!-- start row -->
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <td>1</td>
                          <td>Nigam</td>
                          <td>Eichmann</td>
                          <td>@Sonu</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>2</td>
                          <td>Deshmukh</td>
                          <td>Prohaska</td>
                          <td>@Genelia</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>3</td>
                          <td>Roshan</td>
                          <td>Rogahn</td>
                          <td>@Hritik</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Success Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Info Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Info Table</h4>
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
                                Info Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table&quot;&gt;
    &lt;thead class=&quot;bg-info text-white&quot;&gt;
        &lt;tr&gt;
            &lt;th&gt;#&lt;/th&gt;
            &lt;th&gt;First Name&lt;/th&gt;
            &lt;th&gt;Last Name&lt;/th&gt;
            &lt;th&gt;Username&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &lt;tr&gt;
            &lt;td&gt;1&lt;/td&gt;
            &lt;td&gt;Nigam&lt;/td&gt;
            &lt;td&gt;Eichmann&lt;/td&gt;
            &lt;td&gt;@Sonu&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;2&lt;/td&gt;
            &lt;td&gt;Deshmukh&lt;/td&gt;
            &lt;td&gt;Prohaska&lt;/td&gt;
            &lt;td&gt;@Genelia&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;3&lt;/td&gt;
            &lt;td&gt;Roshan&lt;/td&gt;
            &lt;td&gt;Rogahn&lt;/td&gt;
            &lt;td&gt;@Hritik&lt;/td&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class <code>.table-info</code> in the
                    <code>&lt;thead&gt; </code>.
                  </p>
                  <div class="table-responsive border rounded-4">
                    <table class="table mb-0">
                      <thead class="table-info">
                        <!-- start row -->
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <td>1</td>
                          <td>Nigam</td>
                          <td>Eichmann</td>
                          <td>@Sonu</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>2</td>
                          <td>Deshmukh</td>
                          <td>Prohaska</td>
                          <td>@Genelia</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>3</td>
                          <td>Roshan</td>
                          <td>Rogahn</td>
                          <td>@Hritik</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Info Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Warning Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Warning Table</h4>
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
                                Warning Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table&quot;&gt;
    &lt;thead class=&quot;bg-warning text-white&quot;&gt;
        &lt;tr&gt;
            &lt;th&gt;#&lt;/th&gt;
            &lt;th&gt;First Name&lt;/th&gt;
            &lt;th&gt;Last Name&lt;/th&gt;
            &lt;th&gt;Username&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &lt;tr&gt;
            &lt;td&gt;1&lt;/td&gt;
            &lt;td&gt;Nigam&lt;/td&gt;
            &lt;td&gt;Eichmann&lt;/td&gt;
            &lt;td&gt;@Sonu&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;2&lt;/td&gt;
            &lt;td&gt;Deshmukh&lt;/td&gt;
            &lt;td&gt;Prohaska&lt;/td&gt;
            &lt;td&gt;@Genelia&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;3&lt;/td&gt;
            &lt;td&gt;Roshan&lt;/td&gt;
            &lt;td&gt;Rogahn&lt;/td&gt;
            &lt;td&gt;@Hritik&lt;/td&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class <code>.table-warning</code> in
                    the <code>&lt;thead&gt;</code>.
                  </p>
                  <div class="table-responsive border rounded-4">
                    <table class="table mb-0">
                      <thead class="table-warning text-white">
                        <!-- start row -->
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <td>1</td>
                          <td>Nigam</td>
                          <td>Eichmann</td>
                          <td>@Sonu</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>2</td>
                          <td>Deshmukh</td>
                          <td>Prohaska</td>
                          <td>@Genelia</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>3</td>
                          <td>Roshan</td>
                          <td>Rogahn</td>
                          <td>@Hritik</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Warning Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Danger Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Danger Table</h4>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                      <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                        data-bs-toggle="modal" data-bs-target="#view-code5-modal">
                        <i class="ti ti-code fs-5 d-flex"></i>
                      </button>
                      <!-- Code Modal -->
                      <div id="view-code5-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header border-bottom">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Danger Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;
  &lt;table class=&quot;table&quot;&gt;
      &lt;thead class=&quot;bg-danger text-white&quot;&gt;
          &lt;tr&gt;
              &lt;th&gt;#&lt;/th&gt;
              &lt;th&gt;First Name&lt;/th&gt;
              &lt;th&gt;Last Name&lt;/th&gt;
              &lt;th&gt;Username&lt;/th&gt;
          &lt;/tr&gt;
      &lt;/thead&gt;
      &lt;tbody&gt;
          &lt;tr&gt;
              &lt;td&gt;1&lt;/td&gt;
              &lt;td&gt;Nigam&lt;/td&gt;
              &lt;td&gt;Eichmann&lt;/td&gt;
              &lt;td&gt;@Sonu&lt;/td&gt;
          &lt;/tr&gt;
          &lt;tr&gt;
              &lt;td&gt;2&lt;/td&gt;
              &lt;td&gt;Deshmukh&lt;/td&gt;
              &lt;td&gt;Prohaska&lt;/td&gt;
              &lt;td&gt;@Genelia&lt;/td&gt;
          &lt;/tr&gt;
          &lt;tr&gt;
              &lt;td&gt;3&lt;/td&gt;
              &lt;td&gt;Roshan&lt;/td&gt;
              &lt;td&gt;Rogahn&lt;/td&gt;
              &lt;td&gt;@Hritik&lt;/td&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class <code>.table-danger</code> in
                    the <code>&lt;thead&gt;</code>.
                  </p>
                  <div class="table-responsive border rounded-4">
                    <table class="table mb-0">
                      <thead class="table-danger">
                        <!-- start row -->
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <td>1</td>
                          <td>Nigam</td>
                          <td>Eichmann</td>
                          <td>@Sonu</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>2</td>
                          <td>Deshmukh</td>
                          <td>Prohaska</td>
                          <td>@Genelia</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>3</td>
                          <td>Roshan</td>
                          <td>Rogahn</td>
                          <td>@Hritik</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Danger Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Inverse Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Inverse Table</h4>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                      <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                        data-bs-toggle="modal" data-bs-target="#view-code6-modal">
                        <i class="ti ti-code fs-5 d-flex"></i>
                      </button>
                      <!-- Code Modal -->
                      <div id="view-code6-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header border-bottom">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Inverse Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;
  &lt;table class=&quot;table&quot;&gt;
      &lt;thead class=&quot;bg-inverse text-white&quot;&gt;
          &lt;tr&gt;
              &lt;th&gt;#&lt;/th&gt;
              &lt;th&gt;First Name&lt;/th&gt;
              &lt;th&gt;Last Name&lt;/th&gt;
              &lt;th&gt;Username&lt;/th&gt;
          &lt;/tr&gt;
      &lt;/thead&gt;
      &lt;tbody&gt;
          &lt;tr&gt;
              &lt;td&gt;1&lt;/td&gt;
              &lt;td&gt;Nigam&lt;/td&gt;
              &lt;td&gt;Eichmann&lt;/td&gt;
              &lt;td&gt;@Sonu&lt;/td&gt;
          &lt;/tr&gt;
          &lt;tr&gt;
              &lt;td&gt;2&lt;/td&gt;
              &lt;td&gt;Deshmukh&lt;/td&gt;
              &lt;td&gt;Prohaska&lt;/td&gt;
              &lt;td&gt;@Genelia&lt;/td&gt;
          &lt;/tr&gt;
          &lt;tr&gt;
              &lt;td&gt;3&lt;/td&gt;
              &lt;td&gt;Roshan&lt;/td&gt;
              &lt;td&gt;Rogahn&lt;/td&gt;
              &lt;td&gt;@Hritik&lt;/td&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class <code>.table-dark</code> in
                    the <code>&lt;thead&gt;</code>.
                  </p>
                  <div class="table-responsive border rounded-4">
                    <table class="table mb-0">
                      <thead class="table-dark">
                        <!-- start row -->
                        <tr>
                          <th class="text-white">#</th>
                          <th class="text-white">First Name</th>
                          <th class="text-white">Last Name</th>
                          <th class="text-white">Username</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <td>1</td>
                          <td>Nigam</td>
                          <td>Eichmann</td>
                          <td>@Sonu</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>2</td>
                          <td>Deshmukh</td>
                          <td>Prohaska</td>
                          <td>@Genelia</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>3</td>
                          <td>Roshan</td>
                          <td>Rogahn</td>
                          <td>@Hritik</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Inverse Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Primary border Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Primary border Table</h4>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                      <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                        data-bs-toggle="modal" data-bs-target="#view-code7-modal">
                        <i class="ti ti-code fs-5 d-flex"></i>
                      </button>
                      <!-- Code Modal -->
                      <div id="view-code7-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header border-bottom">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Primary border Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive rounded-4&quot;&gt;
  &lt;table class=&quot;table table-bordered border-primary&quot;&gt;
      &lt;thead class=&quot;bg-primary text-white&quot;&gt;
          &lt;tr&gt;
              &lt;th&gt;#&lt;/th&gt;
              &lt;th&gt;First Name&lt;/th&gt;
              &lt;th&gt;Last Name&lt;/th&gt;
              &lt;th&gt;Username&lt;/th&gt;
          &lt;/tr&gt;
      &lt;/thead&gt;
      &lt;tbody&gt;
          &lt;tr&gt;
              &lt;td&gt;1&lt;/td&gt;
              &lt;td&gt;Nigam&lt;/td&gt;
              &lt;td&gt;Eichmann&lt;/td&gt;
              &lt;td&gt;@Sonu&lt;/td&gt;
          &lt;/tr&gt;
          &lt;tr&gt;
              &lt;td&gt;2&lt;/td&gt;
              &lt;td&gt;Deshmukh&lt;/td&gt;
              &lt;td&gt;Prohaska&lt;/td&gt;
              &lt;td&gt;@Genelia&lt;/td&gt;
          &lt;/tr&gt;
          &lt;tr&gt;
              &lt;td&gt;3&lt;/td&gt;
              &lt;td&gt;Roshan&lt;/td&gt;
              &lt;td&gt;Rogahn&lt;/td&gt;
              &lt;td&gt;@Hritik&lt;/td&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class <code>.bg-primary .text-white</code> in
                    the <code>&lt;thead&gt;</code> and add class
                    <code>.border .border-primary</code> in
                    <code>&lt;tbody&gt;</code>
                  </p>
                  <div class="table-responsive rounded-4">
                    <table class="table table-bordered mb-0 border-primary">
                      <thead class="bg-primary text-white">
                        <!-- start row -->
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <td>1</td>
                          <td>Nigam</td>
                          <td>Eichmann</td>
                          <td>@Sonu</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>2</td>
                          <td>Deshmukh</td>
                          <td>Prohaska</td>
                          <td>@Genelia</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>3</td>
                          <td>Roshan</td>
                          <td>Rogahn</td>
                          <td>@Hritik</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Primary border Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Success border Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Success border Table</h4>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                      <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                        data-bs-toggle="modal" data-bs-target="#view-code8-modal">
                        <i class="ti ti-code fs-5 d-flex"></i>
                      </button>
                      <!-- Code Modal -->
                      <div id="view-code8-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header border-bottom">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Success border Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive rounded-4&quot;&gt;
&lt;table class=&quot;table table-bordered border-success&quot;&gt;
    &lt;thead class=&quot;bg-success text-white&quot;&gt;
        &lt;tr&gt;
            &lt;th&gt;#&lt;/th&gt;
            &lt;th&gt;First Name&lt;/th&gt;
            &lt;th&gt;Last Name&lt;/th&gt;
            &lt;th&gt;Username&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &lt;tr&gt;
            &lt;td&gt;1&lt;/td&gt;
            &lt;td&gt;Nigam&lt;/td&gt;
            &lt;td&gt;Eichmann&lt;/td&gt;
            &lt;td&gt;@Sonu&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;2&lt;/td&gt;
            &lt;td&gt;Deshmukh&lt;/td&gt;
            &lt;td&gt;Prohaska&lt;/td&gt;
            &lt;td&gt;@Genelia&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;3&lt;/td&gt;
            &lt;td&gt;Roshan&lt;/td&gt;
            &lt;td&gt;Rogahn&lt;/td&gt;
            &lt;td&gt;@Hritik&lt;/td&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class <code>.bg-success .text-white</code> in
                    the <code>&lt;thead&gt;</code> and add class
                    <code>.border .border-success</code> in
                    <code>&lt;tbody&gt;</code>
                  </p>
                  <div class="table-responsive rounded-4">
                    <table class="table table-bordered mb-0 border-success">
                      <thead class="bg-success text-white">
                        <!-- start row -->
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <td>1</td>
                          <td>Nigam</td>
                          <td>Eichmann</td>
                          <td>@Sonu</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>2</td>
                          <td>Deshmukh</td>
                          <td>Prohaska</td>
                          <td>@Genelia</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>3</td>
                          <td>Roshan</td>
                          <td>Rogahn</td>
                          <td>@Hritik</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Success border Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Info border Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Info border Table</h4>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                      <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                        data-bs-toggle="modal" data-bs-target="#view-code9-modal">
                        <i class="ti ti-code fs-5 d-flex"></i>
                      </button>
                      <!-- Code Modal -->
                      <div id="view-code9-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header border-bottom">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Info border Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive rounded-4&quot;&gt;
&lt;table class=&quot;table border-info table-bordered&quot;&gt;
    &lt;thead class=&quot;bg-info text-white&quot;&gt;
        &lt;tr&gt;
            &lt;th&gt;#&lt;/th&gt;
            &lt;th&gt;First Name&lt;/th&gt;
            &lt;th&gt;Last Name&lt;/th&gt;
            &lt;th&gt;Username&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &lt;tr&gt;
            &lt;td&gt;1&lt;/td&gt;
            &lt;td&gt;Nigam&lt;/td&gt;
            &lt;td&gt;Eichmann&lt;/td&gt;
            &lt;td&gt;@Sonu&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;2&lt;/td&gt;
            &lt;td&gt;Deshmukh&lt;/td&gt;
            &lt;td&gt;Prohaska&lt;/td&gt;
            &lt;td&gt;@Genelia&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;3&lt;/td&gt;
            &lt;td&gt;Roshan&lt;/td&gt;
            &lt;td&gt;Rogahn&lt;/td&gt;
            &lt;td&gt;@Hritik&lt;/td&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class <code>.bg-info .text-white</code> in the
                    <code>&lt;thead&gt;</code> and add class
                    <code>.border .border-info</code>
                    in
                    <code>&lt;tbody&gt;</code>
                  </p>
                  <div class="table-responsive rounded-4">
                    <table class="table border-info table-bordered">
                      <thead class="bg-info text-white">
                        <!-- start row -->
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <td>1</td>
                          <td>Nigam</td>
                          <td>Eichmann</td>
                          <td>@Sonu</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>2</td>
                          <td>Deshmukh</td>
                          <td>Prohaska</td>
                          <td>@Genelia</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>3</td>
                          <td>Roshan</td>
                          <td>Rogahn</td>
                          <td>@Hritik</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Info border Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Warning border Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Warning border Table</h4>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                      <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                        data-bs-toggle="modal" data-bs-target="#view-code10-modal">
                        <i class="ti ti-code fs-5 d-flex"></i>
                      </button>
                      <!-- Code Modal -->
                      <div id="view-code10-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header border-bottom">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Warning border Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive rounded-4&quot;&gt;
&lt;table class=&quot;table table-bordered border-warning&quot;&gt;
    &lt;thead class=&quot;bg-warning text-white&quot;&gt;
        &lt;tr&gt;
            &lt;th&gt;#&lt;/th&gt;
            &lt;th&gt;First Name&lt;/th&gt;
            &lt;th&gt;Last Name&lt;/th&gt;
            &lt;th&gt;Username&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &lt;tr&gt;
            &lt;td&gt;1&lt;/td&gt;
            &lt;td&gt;Nigam&lt;/td&gt;
            &lt;td&gt;Eichmann&lt;/td&gt;
            &lt;td&gt;@Sonu&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;2&lt;/td&gt;
            &lt;td&gt;Deshmukh&lt;/td&gt;
            &lt;td&gt;Prohaska&lt;/td&gt;
            &lt;td&gt;@Genelia&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;3&lt;/td&gt;
            &lt;td&gt;Roshan&lt;/td&gt;
            &lt;td&gt;Rogahn&lt;/td&gt;
            &lt;td&gt;@Hritik&lt;/td&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class <code>.bg-warning .text-white</code> in
                    the <code>&lt;thead&gt;</code> and add class
                    <code>.border .border-warning</code> in
                    <code>&lt;tbody&gt;</code>
                  </p>
                  <div class="table-responsive rounded-4">
                    <table class="table table-bordered mb-0 border-warning">
                      <thead class="bg-warning text-white">
                        <!-- start row -->
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <td>1</td>
                          <td>Nigam</td>
                          <td>Eichmann</td>
                          <td>@Sonu</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>2</td>
                          <td>Deshmukh</td>
                          <td>Prohaska</td>
                          <td>@Genelia</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>3</td>
                          <td>Roshan</td>
                          <td>Rogahn</td>
                          <td>@Hritik</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Warning border Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Danger border Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Danger border Table</h4>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                      <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                        data-bs-toggle="modal" data-bs-target="#view-code11-modal">
                        <i class="ti ti-code fs-5 d-flex"></i>
                      </button>
                      <!-- Code Modal -->
                      <div id="view-code11-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header border-bottom">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Danger border Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive rounded-4&quot;&gt;
&lt;table class=&quot;table table-bordered border-danger&quot;&gt;
    &lt;thead class=&quot;bg-danger text-white&quot;&gt;
        &lt;tr&gt;
            &lt;th&gt;#&lt;/th&gt;
            &lt;th&gt;First Name&lt;/th&gt;
            &lt;th&gt;Last Name&lt;/th&gt;
            &lt;th&gt;Username&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &lt;tr&gt;
            &lt;td&gt;1&lt;/td&gt;
            &lt;td&gt;Nigam&lt;/td&gt;
            &lt;td&gt;Eichmann&lt;/td&gt;
            &lt;td&gt;@Sonu&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;2&lt;/td&gt;
            &lt;td&gt;Deshmukh&lt;/td&gt;
            &lt;td&gt;Prohaska&lt;/td&gt;
            &lt;td&gt;@Genelia&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;3&lt;/td&gt;
            &lt;td&gt;Roshan&lt;/td&gt;
            &lt;td&gt;Rogahn&lt;/td&gt;
            &lt;td&gt;@Hritik&lt;/td&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class <code>.bg-danger .text-white</code> in
                    the <code>&lt;thead&gt;</code> and add class
                    <code>.border .border-danger</code>
                    in
                    <code>&lt;tbody&gt;</code>
                  </p>
                  <div class="table-responsive rounded-4">
                    <table class="table table-bordered mb-0 border-danger">
                      <thead class="bg-danger text-white">
                        <!-- start row -->
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <td>1</td>
                          <td>Nigam</td>
                          <td>Eichmann</td>
                          <td>@Sonu</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>2</td>
                          <td>Deshmukh</td>
                          <td>Prohaska</td>
                          <td>@Genelia</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>3</td>
                          <td>Roshan</td>
                          <td>Rogahn</td>
                          <td>@Hritik</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Danger border Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Dark border Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Dark border Table</h4>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                      <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                        data-bs-toggle="modal" data-bs-target="#view-code12-modal">
                        <i class="ti ti-code fs-5 d-flex"></i>
                      </button>
                      <!-- Code Modal -->
                      <div id="view-code12-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header border-bottom">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Dark border Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive rounded-4&quot;&gt;
&lt;table class=&quot;table table-bordered border-dark&quot;&gt;
    &lt;thead class=&quot;bg-inverse text-white&quot;&gt;
        &lt;tr&gt;
            &lt;th&gt;#&lt;/th&gt;
            &lt;th&gt;First Name&lt;/th&gt;
            &lt;th&gt;Last Name&lt;/th&gt;
            &lt;th&gt;Username&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &lt;tr&gt;
            &lt;td&gt;1&lt;/td&gt;
            &lt;td&gt;Nigam&lt;/td&gt;
            &lt;td&gt;Eichmann&lt;/td&gt;
            &lt;td&gt;@Sonu&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;2&lt;/td&gt;
            &lt;td&gt;Deshmukh&lt;/td&gt;
            &lt;td&gt;Prohaska&lt;/td&gt;
            &lt;td&gt;@Genelia&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;td&gt;3&lt;/td&gt;
            &lt;td&gt;Roshan&lt;/td&gt;
            &lt;td&gt;Rogahn&lt;/td&gt;
            &lt;td&gt;@Hritik&lt;/td&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class <code>.bg-dark .text-white</code> in the
                    <code>&lt;thead&gt;</code> and add class
                    <code>.border .border-dark</code>
                    in
                    <code>&lt;tbody&gt;</code>
                  </p>
                  <div class="table-responsive rounded-4">
                    <table class="table table-bordered mb-0 border-dark">
                      <thead class="bg-inverse">
                        <!-- start row -->
                        <tr>
                          <th>#</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Username</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <td>1</td>
                          <td>Nigam</td>
                          <td>Eichmann</td>
                          <td>@Sonu</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>2</td>
                          <td>Deshmukh</td>
                          <td>Prohaska</td>
                          <td>@Genelia</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <td>3</td>
                          <td>Roshan</td>
                          <td>Rogahn</td>
                          <td>@Hritik</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Dark border Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Light Primary Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Light Primary Table</h4>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                      <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                        data-bs-toggle="modal" data-bs-target="#view-code13-modal">
                        <i class="ti ti-code fs-5 d-flex"></i>
                      </button>
                      <!-- Code Modal -->
                      <div id="view-code13-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header border-bottom">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Light Primary Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-hover table-primary&quot;&gt;
    &lt;thead class=&quot;bg-primary text-white&quot;&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class in the table
                    <code>.table-hover .table-primary</code> and add class
                    <code>.bg-primary .text-white</code> in the
                    <code>&lt;thead&gt;</code>.
                  </p>
                  <div class="table-responsive rounded-4">
                    <table class="table table-hover mb-0 table-primary text-dark table-borderless">
                      <thead>
                        <!-- start row -->
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">First</th>
                          <th scope="col">Last</th>
                          <th scope="col">Handle</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <th scope="row">3</th>
                          <td colspan="2">Larry the Bird</td>
                          <td>@twitter</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Light Primary Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Light Success Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Light Success Table</h4>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                      <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                        data-bs-toggle="modal" data-bs-target="#view-code14-modal">
                        <i class="ti ti-code fs-5 d-flex"></i>
                      </button>
                      <!-- Code Modal -->
                      <div id="view-code14-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header border-bottom">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Light Success Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-hover table-success&quot;&gt;
  &lt;thead class=&quot;bg-success text-white&quot;&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class in the table
                    <code>.table-hover .table-success</code> and add class
                    <code>.bg-success .text-white</code> in the
                    <code>&lt;thead&gt;</code>.
                  </p>
                  <div class="table-responsive rounded-4">
                    <table class="table table-hover mb-0 table-success text-dark table-borderless">
                      <thead>
                        <!-- start row -->
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">First</th>
                          <th scope="col">Last</th>
                          <th scope="col">Handle</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <th scope="row">3</th>
                          <td colspan="2">Larry the Bird</td>
                          <td>@twitter</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Light Success Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Light Info Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Light Info Table</h4>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                      <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                        data-bs-toggle="modal" data-bs-target="#view-code15-modal">
                        <i class="ti ti-code fs-5 d-flex"></i>
                      </button>
                      <!-- Code Modal -->
                      <div id="view-code15-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header border-bottom">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Light Info Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-hover table-info&quot;&gt;
    &lt;thead class=&quot;bg-info text-white&quot;&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class in the table
                    <code>.table-hover .table-info</code> and add class
                    <code>.bg-info .text-white</code> in the
                    <code>&lt;thead&gt;</code>.
                  </p>
                  <div class="table-responsive rounded-4">
                    <table class="table table-hover mb-0 table-info text-dark table-borderless">
                      <thead>
                        <!-- start row -->
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">First</th>
                          <th scope="col">Last</th>
                          <th scope="col">Handle</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <th scope="row">3</th>
                          <td colspan="2">Larry the Bird</td>
                          <td>@twitter</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Light Info Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Light Warning Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Light Warning Table</h4>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                      <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                        data-bs-toggle="modal" data-bs-target="#view-code16-modal">
                        <i class="ti ti-code fs-5 d-flex"></i>
                      </button>
                      <!-- Code Modal -->
                      <div id="view-code16-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header border-bottom">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Light Warning Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-hover table-warning&quot;&gt;
    &lt;thead class=&quot;bg-warning text-white&quot;&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class in the table
                    <code>.table-hover .table-warning</code> and add class
                    <code>.bg-warning .text-white</code> in the
                    <code>&lt;thead&gt;</code>.
                  </p>
                  <div class="table-responsive rounded-4">
                    <table class="table table-hover mb-0 table-warning text-dark table-borderless">
                      <thead>
                        <!-- start row -->
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">First</th>
                          <th scope="col">Last</th>
                          <th scope="col">Handle</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <th scope="row">3</th>
                          <td colspan="2">Larry the Bird</td>
                          <td>@twitter</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Light Warning Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Light Danger Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Light Danger Table</h4>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                      <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                        data-bs-toggle="modal" data-bs-target="#view-code17-modal">
                        <i class="ti ti-code fs-5 d-flex"></i>
                      </button>
                      <!-- Code Modal -->
                      <div id="view-code17-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header border-bottom">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Light Danger Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-hover table-danger&quot;&gt;
    &lt;thead class=&quot;bg-danger text-white&quot;&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class in the table
                    <code>.table-hover .table-danger</code> and add class
                    <code>.bg-danger .text-white</code> in the
                    <code>&lt;thead&gt;</code>.
                  </p>
                  <div class="table-responsive rounded-4">
                    <table class="table table-hover mb-0 table-danger text-dark table-borderless">
                      <thead>
                        <!-- start row -->
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">First</th>
                          <th scope="col">Last</th>
                          <th scope="col">Handle</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <th scope="row">3</th>
                          <td colspan="2">Larry the Bird</td>
                          <td>@twitter</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Light Danger Table -->
            </div>
            <div class="col-lg-6">
              <!--  start Dark Table -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex mb-1 align-items-center">
                    <div>
                      <h4 class="card-title mb-0">Dark Table</h4>
                    </div>
                    <div class="ms-auto flex-shrink-0">
                      <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                        data-bs-toggle="modal" data-bs-target="#view-code18-modal">
                        <i class="ti ti-code fs-5 d-flex"></i>
                      </button>
                      <!-- Code Modal -->
                      <div id="view-code18-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                          <div class="modal-content">
                            <div class="modal-header border-bottom">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Dark Table - View Code
                              </h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                              <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-hover table-dark&quot;&gt;
    &lt;thead class=&quot;bg-dark text-white&quot;&gt;
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
                  <p class="card-subtitle mb-3">
                    To use add class in the table
                    <code>.table-hover .table-dark</code> and add class
                    <code>.bg-dark .text-white</code> in the
                    <code>&lt;thead&gt;</code>.
                  </p>
                  <div class="table-responsive rounded-4">
                    <table class="table table-hover mb-0 table-dark table-borderless">
                      <thead>
                        <!-- start row -->
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">First</th>
                          <th scope="col">Last</th>
                          <th scope="col">Handle</th>
                        </tr>
                        <!-- end row -->
                      </thead>
                      <tbody>
                        <!-- start row -->
                        <tr>
                          <th scope="row">1</th>
                          <td>Mark</td>
                          <td>Otto</td>
                          <td>@mdo</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <th scope="row">2</th>
                          <td>Jacob</td>
                          <td>Thornton</td>
                          <td>@fat</td>
                        </tr>
                        <!-- end row -->
                        <!-- start row -->
                        <tr>
                          <th scope="row">3</th>
                          <td colspan="2">Larry the Bird</td>
                          <td>@twitter</td>
                        </tr>
                        <!-- end row -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--  end Dark Table -->
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
  <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
</body>

</html>