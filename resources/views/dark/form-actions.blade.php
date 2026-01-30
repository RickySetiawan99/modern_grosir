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
          @@include("partials/breadcrumb.html", {"title": "Form Actions", "subtitle": 'Home'})
          <!-- row -->
          <div class="row">
            <div class="col-lg-6 d-flex align-items-stretch">
              <!-- start Project Assigning -->
              <div class="card w-100">
                <form>
                  <div class="card-body">
                    <h4 class="card-title">Project Assigning</h4>
                    <p class="card-subtitle mb-3">Sample form for project assign.</p>
                    <div class="alert bg-primary-subtle text-primary alert-dismissible fade show" role="alert">
                      <div class="d-flex align-items-center text-primary ">
                        <i class="ti ti-info-circle me-2 fs-4"></i>
                        Form Action at begining of the form.
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="text-start">
                      <button type="submit" class="btn btn-primary me-6">
                        Save
                      </button>
                      <button type="submit" class="btn bg-danger-subtle text-danger">
                        Cancel
                      </button>
                    </div>
                  </div>

                  <div class="card-body border-top">
                    <h5>Personal Info</h5>
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                          <label for="inputname" class="form-label">First Name</label>
                          <input type="text" class="form-control" id="inputname" placeholder="First Name Here" />
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                          <label for="inputlname" class="form-label">Last Name</label>
                          <input type="text" class="form-control" id="inputlname" placeholder="Last Name Here" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                          <label for="inputEmail3" class="form-label">Email</label>
                          <input type="email" class="form-control" id="inputEmail3" placeholder="Email Here" />
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                          <label for="inputcontact" class="form-label">Contact No</label>
                          <input type="text" class="form-control" id="inputcontact" placeholder="Contact Here" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body border-top">
                    <h5>Requirements</h5>
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="inputcom" class="form-label">Company</label>
                          <input type="text" class="form-control" id="inputcom" placeholder="Company Here" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                          <label class="form-label">Interested In</label>
                          <select class="form-select">
                            <option>Choose Your Option</option>
                            <option>Desiging</option>
                            <option>Development</option>
                            <option>Videography</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                          <label class="form-label">Budget</label>
                          <select class="form-select">
                            <option>Choose Your Option</option>
                            <option>Less then $5000</option>
                            <option>$5000 - $10000</option>
                            <option>$10000 - $20000</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Select File</label>
                          <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Upload</span>
                            </div>
                            <div class="custom-file">
                              <input type="file" class="form-control" id="inputGroupFile01" />
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">About Project</label>
                          <textarea class="form-control" aria-label="With textarea"
                            placeholder="About Project Here"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- end Project Assigning -->
            </div>
            <div class="col-lg-6 d-flex align-items-stretch">
              <!-- start Employee Profile -->
              <div class="card w-100">
                <div class="card-body pb-0">
                  <h4 class="card-title">Employee Profile</h4>
                  <p class="card-subtitle mb-3">Sample Form for Employee Profile.</p>
                  <div class="alert bg-primary-subtle text-info alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center text-primary ">
                      <i class="ti ti-info-circle me-2 fs-4"></i>
                      Form Action at ending of the form.
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                </div>
                <div class="card-body border-top">
                  <h5 class="mb-3">About Employee</h5>
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="mb-3">
                        <label for="inputfname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="inputfname" placeholder="First Name Here" />
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="mb-3">
                        <label for="inputlname2" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="inputlname2" placeholder="Last Name Here" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="mb-3">
                        <label for="uname" class="form-label">Username</label>
                        <input type="email" class="form-control" id="uname" placeholder="Username Here" />
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="mb-3">
                        <label for="nname" class="form-label">Nick Name</label>
                        <input type="text" class="form-control" id="nname" placeholder="Nick Name Here" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-body border-top">
                  <h5>Contact Info &amp; Bio</h5>
                  <div class="row">
                    <div class="col-sm-12 col-md-6">
                      <div class="mb-3">
                        <label for="email1" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email1" placeholder="Email Here" />
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="mb-3">
                        <label for="wen1" class="form-label">Website</label>
                        <input type="text" class="form-control" id="wen1" placeholder="http://" />
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-3">
                        <label for="cono" class="form-label">Contact No</label>
                        <input type="text" class="form-control" id="cono" placeholder="Contact No Here" />
                      </div>
                    </div>
                    <div class="col-12">
                      <label class="form-label">Bio</label>
                      <textarea class="form-control" aria-label="With textarea" placeholder="Bio Here"></textarea>
                    </div>
                  </div>
                </div>
                <div class="p-3 border-top">
                  <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                      Save
                    </button>
                    <button type="submit" class="btn bg-danger-subtle text-danger ms-6 px-4">
                      Cancel
                    </button>
                  </div>
                </div>
              </div>
              <!-- end Employee Profile -->
            </div>
            <div class="col-lg-6 d-flex align-items-stretch">
              <!-- start Donation -->
              <div class="card w-100">
                <form>
                  <div class="card-body">
                    <div class="d-flex  align-items-center">
                      <h4 class="card-title mb-0">Donation</h4>
                      <div class="ms-auto">
                        <input type="text" class="form-control" id="text1" placeholder="Search" />
                      </div>
                    </div>
                    <p class="card-subtitle mb-3">Sample Form for Donation.</p>
                    <div class="alert bg-primary-subtle text-primary alert-dismissible fade show" role="alert">
                      <div class="d-flex align-items-center text-primary ">
                        <i class="ti ti-info-circle me-2 fs-4"></i>
                        Form Action at center align of the form.
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="fname1" class="form-label">Full Name</label>
                          <input type="text" class="form-control" id="fname1" placeholder="Full Name Here" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <div class="mb-3">
                            <label for="email2" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email2" placeholder="Email Here" />
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <div class="mb-3">
                            <label for="cono1" class="form-label">Contact No</label>
                            <input type="text" class="form-control" id="cono1" placeholder="Contact no Here" />
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="donate1" class="form-label">Donation Type</label>
                          <input type="text" class="form-control" id="donate1" placeholder="Donation Type Here" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Amount</label>
                          <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" placeholder="Amount"
                              aria-label="Amount (to the nearest dollar)" />
                            <span class="input-group-text">.00</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Comments</label>
                          <textarea class="form-control" id="exampleTextarea1" rows="2"
                            placeholder="Comments Here"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="p-3 border-top">
                    <div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                          Save
                        </button>
                        <button type="submit" class="btn bg-danger-subtle text-danger ms-6 px-4">
                          Cancel
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- end Donation -->
            </div>
            <div class="col-lg-6 d-flex align-items-stretch">
              <!-- start Complaint Form -->
              <div class="card w-100">
                <form>
                  <div class="card-body">
                    <div class="d-flex  align-items-center">
                      <h4 class="card-title mb-0">Complaint Form</h4>
                      <div class="ms-auto">
                        <div class="btn-group">
                          <button type="button" class="btn bg-primary-subtle text-primary  dropdown-toggle"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p class="card-subtitle mb-3">Sample Form for Complaint Form.</p>
                    <div class="alert bg-primary-subtle text-info alert-dismissible fade show" role="alert">
                      <div class="d-flex align-items-center text-primary ">
                        <i class="ti ti-info-circle me-2 fs-4"></i>
                        Form Action at center align of the form.
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="com1" class="form-label">Company</label>
                          <input type="text" class="form-control" id="com1" placeholder="Company Name Here" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="emp1" class="form-label">Employee</label>
                          <input type="text" class="form-control" id="emp1" placeholder="Employee Name Here" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="datec" class="form-label">Date of Complaint</label>
                          <input type="date" class="form-control" id="datec" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="suname" class="form-label">Supervisor's Name</label>
                          <input type="text" class="form-control" id="suname" placeholder="Supervisor's Name Here" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Complaint</label>
                          <textarea class="form-control" id="exampleTextarea2" rows="2"
                            placeholder="Complaint Here"></textarea>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="sign" class="form-label">Signature</label>
                          <input type="text" class="form-control" id="sign" placeholder="Signature Here" />
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="p-3 border-top">
                    <div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">
                          Save
                        </button>
                        <button type="submit" class="btn bg-danger-subtle text-danger ms-6 px-4">
                          Cancel
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- end Complaint Form -->
            </div>
            <div class="col-lg-6 d-flex align-items-stretch">
              <!-- start Employee Timing -->
              <div class="card w-100">
                <form>
                  <div class="card-body">
                    <h4 class="card-title">Employee Timing</h4>
                    <p class="card-subtitle mb-3">Sample Form for Employee Timing.</p>
                    <div class="alert bg-primary-subtle text-info alert-dismissible fade show" role="alert">
                      <div class="d-flex align-items-center text-primary ">
                        <i class="ti ti-info-circle me-2 fs-4"></i>
                        Form Action at begining and ending of the form.
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div>
                      <div class="text-start">
                        <button type="submit" class="btn btn-primary">
                          Save
                        </button>
                        <button type="submit" class="btn bg-danger-subtle text-danger ms-6">
                          Cancel
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="card-body border-top">
                    <div class="row">
                      <div class="col-12">
                        <label for="inputEmail3" class="form-label">Employee Name</label>
                        <div class="input-group">
                          <span class="input-group-text" id="basic-addon1">
                            <i class="ti ti-user fs-4"></i>
                          </span>
                          <input type="text" class="form-control" placeholder="Employee Name here" aria-label="Username"
                            aria-describedby="basic-addon1" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="inputEmail3" class="form-label">Project Name</label>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                              <i class="ti ti-briefcase fs-4"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Project Name here"
                              aria-label="Username" aria-describedby="basic-addon1" />
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="inputEmail3" class="form-label">Date</label>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                              <i class="ti ti-calendar fs-4"></i>
                            </span>
                            <input type="date" class="form-control" aria-label="Username"
                              aria-describedby="basic-addon1" />
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <label for="inputEmail3" class="form-label">Rate Per Hour</label>
                        <div class="input-group">
                          <span class="input-group-text">$</span>
                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" />
                          <span class="input-group-text">.00</span>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                          <label for="inputEmail3" class="form-label">Start Time</label>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                              <i class="ti ti-clock-hour-4 fs-4"></i>
                            </span>
                            <input type="time" class="form-control" aria-label="Username"
                              aria-describedby="basic-addon1" />
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                          <label for="inputEmail3" class="form-label">End Time</label>
                          <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">
                              <i class="ti ti-clock-hour-4 fs-4"></i>
                            </span>
                            <input type="time" class="form-control" aria-label="Username" />
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="inputEmail3" class="form-label">Notes</label>
                          <textarea class="form-control" id="exampleTextarea10" rows="3"
                            placeholder="Notes Here"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="p-3 border-top">
                    <div>
                      <div class="text-start">
                        <button type="submit" class="btn btn-primary">
                          Save
                        </button>
                        <button type="submit" class="btn bg-danger-subtle text-danger ms-6 px-4">
                          Cancel
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- end Employee Timing -->
            </div>
            <div class="col-lg-6 d-flex align-items-stretch">
              <!-- start Issue Tracking -->
              <div class="card w-100">
                <form>
                  <div class="card-body">
                    <h4 class="card-title">Issue Tracking</h4>
                    <p class="card-subtitle mb-3">Sample Form for Issue Tracking.</p>
                    <div class="alert bg-primary-subtle text-info alert-dismissible fade show" role="alert">
                      <div class="d-flex align-items-center text-primary ">
                        <i class="ti ti-info-circle me-2 fs-4"></i>
                        Form Action at begining and ending of the form.
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div>
                      <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                          Save
                        </button>
                        <button type="submit" class="btn bg-danger-subtle text-danger ms-6 px-4">
                          Cancel
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="card-body border-top">
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="isst" class="form-label">Issue Title</label>
                          <input type="text" class="form-control" id="isst" placeholder="Issue title Here" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="open" class="form-label">Opened By</label>
                          <input type="text" class="form-control" id="open" placeholder="Opened by Here" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                          <label for="dateopen" class="form-label">Date Opened</label>
                          <input type="date" class="form-control" id="dateopen" />
                        </div>
                      </div>
                      <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                          <label for="datefixe" class="form-label">Date Fixed</label>
                          <input type="date" class="form-control" id="datefixe" />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Priority</label>
                          <select class="form-select">
                            <option>Low</option>
                            <option>Medium</option>
                            <option>High</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Status</label>
                          <select class="form-select">
                            <option>Started</option>
                            <option>Not Started</option>
                            <option>Fixed</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Comments</label>
                          <textarea class="form-control" id="exampleTextarea20" rows="2"
                            placeholder="Comments Here"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="p-3 border-top">
                    <div>
                      <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                          Save
                        </button>
                        <button type="submit" class="btn bg-danger-subtle text-danger ms-6">
                          Cancel
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- end Issue Tracking -->
            </div>
            <div class="col-12">
              <!-- start Event Registration -->
              <div class="card">
                <form>
                  <div class="card-body">
                    <h4 class="card-title">Event Registration</h4>
                    <p class="card-subtitle mb-3">Sample Form for Event Registration.</p>
                    <div class="alert bg-primary-subtle text-info alert-dismissible fade show" role="alert">
                      <div class="d-flex align-items-center text-primary ">
                        <i class="ti ti-info-circle me-2 fs-4"></i>
                        Form Action at mulitple space top,bottom and
                        left,right.
                      </div>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="d-flex flex-wrap gap-6 align-items-center">
                      <div>
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">
                            Save
                          </button>
                          <button type="submit" class="btn bg-danger-subtle text-danger ms-6">
                            Cancel
                          </button>
                        </div>
                      </div>
                      <div class="ms-auto d-flex align-items-center flex-wrap gap-6">
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-download fs-4"></i>
                            Import
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                          </div>
                        </div>
                        <div class="btn-group">
                          <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-transition-right me-1 fs-4"></i>
                            Export
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                          </div>
                        </div>
                        <div class="btn-group">
                          <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-upload me-1 fs-4"></i>
                            Upload
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-body border-top">
                    <div class="row">
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="fname3" class="form-label">Full Name</label>
                          <input type="text" class="form-control" id="fname3" placeholder="Full Name Here" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="title2" class="form-label">Title</label>
                          <input type="text" class="form-control" id="title2" placeholder="Title Here" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label for="comname1" class="form-label">Company Name</label>
                          <input type="text" class="form-control" id="comname1" placeholder="Company Name Here" />
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <div class="mb-3">
                            <label for="email4" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email4" placeholder="Email Here" />
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <div class="mb-3">
                            <label for="conno2" class="form-label">Contact No</label>
                            <input type="text" class="form-control" id="conno2" placeholder="Contact no Here" />
                          </div>
                        </div>
                      </div>
                      <div class="col-12">
                        <div class="mb-3">
                          <label class="form-label">Existing Customer</label>
                          <div class="form-check">
                            <input type="radio" class="form-check-input" id="customControlValidation2"
                              name="radio-stacked" />
                            <label class="form-check-label" for="customControlValidation2">Yes</label>
                          </div>
                          <div class="form-check">
                            <input type="radio" class="form-check-input" id="customControlValidation3"
                              name="radio-stacked" />
                            <label class="form-check-label" for="customControlValidation3">No</label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="p-3 border-top">
                    <div class="d-flex flex-wrap gap-6 align-items-center">
                      <div>
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary">
                            Save
                          </button>
                          <button type="submit" class="btn bg-danger-subtle text-danger ms-6 px-4">
                            Cancel
                          </button>
                        </div>
                      </div>
                      <div class="ms-auto d-flex flex-wrap gap-6 align-items-center">
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-download fs-4"></i>
                            Import
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                          </div>
                        </div>
                        <div class="btn-group">
                          <button type="button" class="btn btn-danger dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-transition-right me-1 fs-4"></i>
                            Export
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                          </div>
                        </div>
                        <div class="btn-group">
                          <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-upload me-1 fs-4"></i>
                            Upload
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="javascript:void(0)">Action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                            <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- end Event Registration -->
            </div>
          </div>
          <!-- End row -->
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