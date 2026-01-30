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
          @@include("partials/breadcrumb.html", {"title": "Row Separator", "subtitle": 'Home'})
          <!-- start Project Assinging -->
          <div class="card">
            <div class="card-body pb-0">
              <h4 class="card-title">Project Assinging</h4>
              <p class="card-subtitle mb-0">
                To use add <mark><code>.r-separator</code></mark> class in
                the form with form styling.
              </p>
            </div>
            <form class="form-horizontal r-separator">
              <div class="card-body">
                <h5>Personal Info</h5>
              </div>
              <div class="form-group p-3 mb-3">
                <div class="row">
                  <label for="inputEmail3" class="col-sm-3 text-end  col-form-label">First Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="First Name Here" />
                  </div>
                </div>
              </div>
              <div class="form-group mb-3 p-3 pt-0">
                <div class="row">
                  <label for="inputText1" class="col-sm-3 text-end  col-form-label">Last Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText1" placeholder="Last Name Here" />
                  </div>
                </div>
              </div>
              <div class="form-group mb-3 p-3 pt-0">
                <div class="row">
                  <label for="inputEmail4" class="col-sm-3 text-end  col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email Here" />
                  </div>
                </div>
              </div>
              <div class="form-group p-3 pt-0">
                <div class="row">
                  <label for="inputText2" class="col-sm-3 text-end  col-form-label">Contact No</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText2" placeholder="Contact No Here" />
                  </div>
                </div>
              </div>

              <div class="card-body text-bg-light">
                <h4 class="card-title mt-2 pb-3">Requirements</h4>
              </div>
              <div class="form-group p-3 text-bg-light">
                <div class="row">
                  <label for="inputEmail5" class="col-sm-3 text-end  col-form-label">Company</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail5" placeholder="Company Name Here" />
                  </div>
                </div>
              </div>
              <div class="form-group p-3 text-bg-light">
                <div class="row">
                  <label for="inputSelect1" class="col-sm-3 text-end  col-form-label">Interested
                    In</label>
                  <div class="col-sm-9">
                    <select class="form-select" id="inputSelect1">
                      <option>Choose Your Option</option>
                      <option>Desiging</option>
                      <option>Development</option>
                      <option>Videography</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group p-3 text-bg-light">
                <div class="row">
                  <label for="inputSelect2" class="col-sm-3 text-end  col-form-label">Budget</label>
                  <div class="col-sm-9">
                    <select class="form-select" id="inputSelect2">
                      <option>Choose Your Option</option>
                      <option>Less then $5000</option>
                      <option>$5000 - $10000</option>
                      <option>$10000 - $20000</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group p-3 text-bg-light">
                <div class="row">
                  <label for="inputGroupFile01" class="col-sm-3 text-end  col-form-label">Select
                    File</label>
                  <div class="col-sm-9">
                    <div class="input-group">
                      <span class="input-group-text">Upload</span>

                      <div class="custom-file">
                        <input type="file" class="form-control" id="inputGroupFile01" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group p-3 text-bg-light">
                <div class="row mb-3">
                  <label for="inputText3" class="col-sm-3 text-end  col-form-label">About
                    Project</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputText3" placeholder="About Project Here" />
                  </div>
                </div>
              </div>

              <div class="p-3">
                <div class="form-group text-end">
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
          <!-- end Project Assinging -->
          <!-- start Employee Profile -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Employee Profile</h4>
              <p class="card-subtitle mb-0">
                To use add <mark><code>.r-separator</code></mark> class in
                the form with form styling.
              </p>
            </div>
            <form class="form-horizontal r-separator">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12 col-lg-6">
                    <div class="form-group mb-3 row">
                      <label for="inputText4" class="col-sm-3 text-end  col-form-label">First
                        Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputText4" placeholder="First Name Here" />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-lg-6">
                    <div class="form-group mb-3 row">
                      <label for="inputText5" class="col-sm-3 text-end  col-form-label">Last
                        Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputText5" placeholder="Last Name Here" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-lg-6">
                    <div class="form-group mb-3 row pt-3">
                      <label for="inputEmail6"
                        class="col-sm-3 text-end  col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputEmail6" placeholder="Username Here" />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-lg-6">
                    <div class="form-group mb-3 row pt-3">
                      <label for="inputText6" class="col-sm-3 text-end  col-form-label">Nick
                        Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputText6" placeholder="Nick Name Here" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body text-bg-light">
                <h4 class="card-title mt-2 pb-3">
                  Contact Info &amp; Bio
                </h4>
                <div class="row">
                  <div class="col-sm-12 col-lg-6">
                    <div class="form-group mb-3 row">
                      <label for="inputEmail7" class="col-sm-3 text-end  col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputEmail7" placeholder="Email Here" />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-lg-6">
                    <div class="form-group mb-3 row">
                      <label for="inputText7" class="col-sm-3 text-end  col-form-label">Website</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputText7" placeholder="http://" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-lg-6">
                    <div class="form-group mb-3 row pt-3">
                      <label for="inputText8" class="col-sm-3 text-end  col-form-label">Contact
                        No</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputText8" placeholder="Contact No Here" />
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-lg-6">
                    <div class="form-group mb-3 row pt-3">
                      <label for="inputText9" class="col-sm-3 text-end  col-form-label">Bio</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputText9" placeholder="Bio Here" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="p-3">
                <div class="form-group text-end">
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
          <!-- end Employee Profile -->
          <!-- start Employee Timing -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Employee Timing</h4>
              <p class="card-subtitle mb-0">
                To use add <mark><code>.r-separator</code></mark> class in
                the form with form styling.
              </p>
            </div>
            <form class="form-horizontal r-separator">
              <div>
                <div class="form-group mb-3 p-3">
                  <div class="row">
                    <label for="inputText10" class="col-sm-3 text-end  col-form-label">Employee
                      Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputText10" placeholder="Employee Name Here" />
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3 p-3 pt-0">
                  <div class="row">
                    <label for="inputText11" class="col-sm-3 text-end  col-form-label">Project
                      Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputText11" placeholder="Project Name Here" />
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3 p-3 pt-0">
                  <div class="row">
                    <label for="inputdate1" class="col-sm-3 text-end  col-form-label">Date</label>
                    <div class="col-sm-9">
                      <input type="date" class="form-control" id="inputdate1" placeholder="Date Here" />
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3 p-3 pt-0">
                  <div class="row">
                    <label for="inputText12" class="col-sm-3 text-end  col-form-label">Rate Per
                      Hour</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputText12" placeholder="Rate Per Hour Here" />
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3 p-3 pt-0">
                  <div class="row">
                    <label for="inputtime2" class="col-sm-3 text-end  col-form-label">Start
                      Time</label>
                    <div class="col-sm-9">
                      <input type="time" class="form-control" id="inputtime2" placeholder="Start Time Here" />
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3 p-3 pt-0">
                  <div class="row">
                    <label for="inputtime3" class="col-sm-3 text-end  col-form-label">End Time</label>
                    <div class="col-sm-9">
                      <input type="time" class="form-control" id="inputtime3" placeholder="End Time Here" />
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3 p-3 pt-0">
                  <div class="row">
                    <label for="inputText13" class="col-sm-3 text-end  col-form-label">Notes</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputText13" placeholder="Notes Here" />
                    </div>
                  </div>
                </div>
              </div>
              <div class="p-3 border-top">
                <div class="form-group text-end">
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
          <!-- end Employee Timing -->
          <!-- start Event Registration -->
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Event Registration</h4>
              <p class="card-subtitle mb-3">
                To use add <mark><code>.r-separator</code></mark> class in
                the form with form styling.
              </p>
            </div>
            <form class="form-horizontal r-separator border-top">
              <div>
                <div class="form-group mb-3 p-3">
                  <div class="row">
                    <label for="inputText14" class="col-sm-3 text-end  col-form-label">Full
                      Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputText14" placeholder="Full Name Here" />
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3 p-3 pt-0">
                  <div class="row">
                    <label for="inputText15" class="col-sm-3 text-end  col-form-label">Title</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputText15" placeholder="Title Here" />
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3 p-3 pt-0">
                  <div class="row">
                    <label for="inputText16" class="col-sm-3 text-end  col-form-label">Company</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputText16" placeholder="Company Name Here" />
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3 p-3 pt-0">
                  <div class="row">
                    <label for="inputEmail8" class="col-sm-3 text-end  col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="inputEmail8" placeholder="Email Here" />
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3 p-3 pt-0">
                  <div class="row">
                    <label for="inputText17" class="col-sm-3 text-end  col-form-label">Contact
                      No</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="inputText17" placeholder="Contact No Here" />
                    </div>
                  </div>
                </div>
                <div class="form-group mb-3 p-3 pt-0">
                  <div class="row">
                    <label for="inputEmail3" class="col-sm-3 text-end  col-form-label">Existing
                      Customer</label>
                    <div class="col-sm-9">
                      <div class="form-check">
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
              </div>
              <div class="p-3 border-top">
                <div class="form-group text-end">
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
          <!-- end Event Registration -->
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