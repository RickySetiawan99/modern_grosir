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
          @@include("partials/breadcrumb.html", {"title": "Striped-Row", "subtitle": 'Home'})
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Project Assinging</h4>
              <p class="card-subtitle">
                Add <mark><code>.striped-rows</code></mark> class in the form
                with bordered form styling.
              </p>
            </div>

            <div>
              <h4 class="card-title p-4 mb-0">Personal Info</h4>
              <div class="row p-3 mx-0 bg-light-subtle">
                <div class="col-sm-3">
                  <div class="b-label">
                    <label for="pi-fname" class="col-form-label">First Name</label>
                  </div>
                </div>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="pi-fname" placeholder="First Name Here" />
                </div>
              </div>
              <div class="row p-3 mx-0">
                <div class="col-sm-3">
                  <div class="b-label">
                    <label for="inputEmail4" class="col-form-label">Last Name</label>
                  </div>
                </div>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputEmail4" placeholder="Last Name Here" />
                </div>
              </div>
              <div class="row p-3 mx-0 bg-light-subtle">
                <div class="col-sm-3">
                  <div class="b-label">
                    <label for="inputEmail5" class="col-form-label">Email</label>
                  </div>
                </div>
                <div class="col-sm-9">
                  <input type="email" class="form-control" id="inputEmail5" placeholder="Email Here" />
                </div>
              </div>
              <div class="row p-3 mx-0">
                <div class="col-sm-3">
                  <div class="b-label">
                    <label for="inputEmail6" class="col-form-label">Contact No</label>
                  </div>
                </div>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputEmail6" placeholder="Contact No Here" />
                </div>
              </div>
            </div>
            <hr />
            <div>
              <h4 class="card-title p-4 mb-0">Requirements</h4>
              <div class="row p-3 mx-0 bg-light-subtle">
                <div class="col-sm-3">
                  <div class="b-label">
                    <label for="require2" class="col-form-label">Company</label>
                  </div>
                </div>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="require2" placeholder="Company Name Here" />
                </div>
              </div>
              <div class="row p-3 mx-0">
                <div class="col-sm-3">
                  <div class="b-label">
                    <label for="inputEmail3" class="col-form-label">Interested In</label>
                  </div>
                </div>
                <div class="col-sm-9">
                  <select class="form-select">
                    <option>Choose Your Option</option>
                    <option>Desiging</option>
                    <option>Development</option>
                    <option>Videography</option>
                  </select>
                </div>
              </div>
              <div class="row p-3 mx-0 bg-light-subtle">
                <div class="col-sm-3">
                  <div class="b-label">
                    <label for="inputEmail3" class="col-form-label">Budget</label>
                  </div>
                </div>
                <div class="col-sm-9">
                  <select class="form-select">
                    <option>Choose Your Option</option>
                    <option>Less then $5000</option>
                    <option>$5000 - $10000</option>
                    <option>$10000 - $20000</option>
                  </select>
                </div>
              </div>
              <div class="row p-3 mx-0">
                <div class="col-sm-3">
                  <div class="b-label">
                    <label for="inputEmail3" class="col-form-label">Select File</label>
                  </div>
                </div>
                <div class="col-sm-9">
                  <div class="input-group flex-nowrap">
                    <span class="input-group-text">Upload</span>

                    <div class="custom-file w-100">
                      <input type="file" class="form-control" id="inputGroupFile01" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="row p-3 mx-0 bg-light-subtle">
                <div class="col-sm-3">
                  <div class="b-label">
                    <label for="inputEmail3" class="col-form-label">About Project</label>
                  </div>
                </div>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="inputEmail3" placeholder="About Project Here" />
                </div>
              </div>
            </div>
            <div class="p-3 border-top">
              <div class="form-group mb-0 text-end">
                <button type="submit" class="btn btn-primary">
                  Save
                </button>
                <button type="submit" class="btn bg-danger-subtle text-danger ms-6">
                  Cancel
                </button>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Employee Timing</h4>
              <p class="card-subtitle">
                Add <mark><code>.striped-rows</code></mark> class in the
                form with bordered form styling.
              </p>
            </div>
            <form class="border-top">
              <div>
                <div class="mx-0 p-3 row bg-light-subtle">
                  <div class="col-3">
                    <div class="b-label">
                      <label for="inputEmail3" class="col-form-label">Employee Name</label>
                    </div>
                  </div>
                  <div class="col-9">
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon1">
                        <i class="ti ti-user fs-5"></i>
                      </span>
                      <input type="text" class="form-control" aria-label="Username"
                        aria-describedby="basic-addon1" />
                    </div>
                  </div>
                </div>
                <div class="mx-0 p-3 row">
                  <div class="col-3">
                    <div class="b-label">
                      <label for="inputEmail3" class="col-form-label">Project Name</label>
                    </div>
                  </div>
                  <div class="col-9">
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon1">
                        <i class="ti ti-briefcase fs-5"></i>
                      </span>
                      <input type="text" class="form-control" aria-label="Username"
                        aria-describedby="basic-addon1" />
                    </div>
                  </div>
                </div>
                <div class="mx-0 p-3 row bg-light-subtle">
                  <div class="col-3">
                    <div class="b-label">
                      <label for="inputEmail3" class="col-form-label">Date</label>
                    </div>
                  </div>
                  <div class="col-9">
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon1">
                        <i class="ti ti-message-circle fs-5"></i>
                      </span>
                      <input type="date" class="form-control" placeholder="Date here" aria-label="Username"
                        aria-describedby="basic-addon1" />
                    </div>
                  </div>
                </div>
                <div class="mx-0 p-3 row">
                  <div class="col-3">
                    <div class="b-label">
                      <label for="inputEmail3" class="col-form-label">Rate Per Hour</label>
                    </div>
                  </div>
                  <div class="col-9">
                    <div class="input-group">
                      <span class="input-group-text">$</span>
                      <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" />
                      <span class="input-group-text">.00</span>
                    </div>
                  </div>
                </div>
                <div class="mx-0 p-3 row bg-light-subtle">
                  <div class="col-3">
                    <div class="b-label">
                      <label for="inputEmail3" class="col-form-label">Start Time</label>
                    </div>
                  </div>
                  <div class="col-9">
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon1">
                        <i class="ti ti-clock-hour-4 fs-5"></i>
                      </span>
                      <input type="time" class="form-control" placeholder="Date here" aria-label="Username"
                        aria-describedby="basic-addon1" />
                    </div>
                  </div>
                </div>
                <div class="mx-0 p-3 row">
                  <div class="col-3">
                    <div class="b-label">
                      <label for="inputEmail3" class="col-form-label">End Time</label>
                    </div>
                  </div>
                  <div class="col-9">
                    <div class="input-group">
                      <span class="input-group-text" id="basic-addon1">
                        <i class="ti ti-clock-hour-4 fs-5"></i>
                      </span>
                      <input type="time" class="form-control" placeholder="Date here" aria-label="Username"
                        aria-describedby="basic-addon1" />
                    </div>
                  </div>
                </div>
                <div class="mx-0 p-3 row bg-light-subtle">
                  <div class="col-3">
                    <div class="b-label">
                      <label for="inputEmail3" class="col-form-label">Notes</label>
                    </div>
                  </div>
                  <div class="col-9">
                    <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
                  </div>
                </div>
              </div>
              <div class="p-3 border-top">
                <div class="form-group mb-0 text-end">
                  <button type="submit" class="btn btn-primary">
                    Save
                  </button>
                  <button type="submit" class="btn bg-danger-subtle text-danger ms-6">
                    Cancel
                  </button>
                </div>
              </div>
            </form>
          </div>
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Event Registration</h4>
              <p class="card-subtitle">
                Add <mark><code>.striped-rows</code></mark> class in the
                form with bordered form styling.
              </p>
            </div>
            <form class="border-top">
              <div>
                <div class="p-3 mx-0 bg-light-subtle row">
                  <div class="col-3">
                    <div class="b-label">
                      <label for="er-email" class="col-form-label">Full Name</label>
                    </div>
                  </div>
                  <div class="col-9">
                    <input type="text" class="form-control" id="er-email" placeholder="Full Name Here" />
                  </div>
                </div>
                <div class="p-3 mx-0 row">
                  <div class="col-3">
                    <div class="b-label">
                      <label for="er-title" class="col-form-label">Title</label>
                    </div>
                  </div>
                  <div class="col-9">
                    <input type="text" class="form-control" id="er-title" placeholder="Title Here" />
                  </div>
                </div>
                <div class="p-3 mx-0 bg-light-subtle row">
                  <div class="col-3">
                    <div class="b-label">
                      <label for="er-company" class="col-form-label">Company</label>
                    </div>
                  </div>
                  <div class="col-9">
                    <input type="text" class="form-control" id="er-company" placeholder="Company Name Here" />
                  </div>
                </div>
                <div class="p-3 mx-0 row">
                  <div class="col-3">
                    <div class="b-label">
                      <label for="er-email2" class="col-form-label">Email</label>
                    </div>
                  </div>
                  <div class="col-9">
                    <input type="email" class="form-control" id="er-email2" placeholder="Email Here" />
                  </div>
                </div>
                <div class="p-3 mx-0 bg-light-subtle row">
                  <div class="col-3">
                    <div class="b-label">
                      <label for="er-cno" class="col-form-label">Contact No</label>
                    </div>
                  </div>
                  <div class="col-9">
                    <input type="text" class="form-control" id="er-cno" placeholder="Contact No Here" />
                  </div>
                </div>
                <div class="p-3 mx-0 row">
                  <div class="col-3">
                    <div class="b-label">
                      <label class="col-form-label">Existing Customer</label>
                    </div>
                  </div>
                  <div class="col-9">
                    <div class="form-check mt-1">
                      <input type="radio" class="form-check-input" id="customControlValidation2"
                        name="radio-stacked" required />
                      <label class="form-check-label" for="customControlValidation2">Yes</label>
                    </div>
                    <div class="form-check">
                      <input type="radio" class="form-check-input" id="customControlValidation3"
                        name="radio-stacked" required />
                      <label class="form-check-label" for="customControlValidation3">No</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="p-3 border-top">
                <div class="form-group mb-0 text-end">
                  <button type="submit" class="btn btn-primary">
                    Save
                  </button>
                  <button type="submit" class="btn bg-danger-subtle text-danger ms-6">
                    Cancel
                  </button>
                </div>
              </div>
            </form>
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