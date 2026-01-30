<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  @@include("partials/head.html")
  <title>Modernize Bootstrap Admin</title>
</head>

<body>
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


      <aside class="left-sidebar with-horizontal">
        @@include("partials/horizontal-sidebar.html", { "page": "dashboard",
        })
      </aside>

      <div class="body-wrapper">
        <div class="container-fluid">
          @@include("partials/breadcrumb.html", {"title": "Teacher details", "subtitle": 'Home'})
          <div class="row">
            <div class="col-lg-4">
              <div class="card">
                <div class="card-body">
                  <div class="text-center">
                    <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" width="110" class="rounded-3 mb-3" alt="modernize-img" />
                    <h5 class="mb-1">John Mednath</h5>
                    <span class="badge bg-primary-subtle text-primary fw-light rounded-pill">Teacher</span>
                  </div>

                  <div class="hstack justify-content-between mt-5">
                    <div class="d-flex align-items-center">
                      <span class="bg-success-subtle p-6 rounded-3 round-50 hstack justify-content-center">
                        <i class="ti ti-check text-success fs-7"></i>
                      </span>

                      <div class="ms-3">
                        <p class="fw-normal text-dark fs-5 mb-0">1.23k</p>
                        <p class="mb-0 fs-3">Tasks Done</p>
                      </div>
                    </div>

                    <div class="d-flex align-items-center">
                      <span class="bg-success-subtle p-6 rounded-3 round-50 hstack justify-content-center">
                        <i class="ti ti-cpu text-success fs-7"></i>
                      </span>

                      <div class="ms-3">
                        <p class="fw-normal text-dark fs-5 mb-0">568</p>
                        <p class="mb-0 fs-3">Projects Done</p>
                      </div>
                    </div>
                  </div>

                  <div class="mt-5">
                    <div class="pb-1 mb-2 border-bottom">
                      <h6>Details</h6>
                    </div>

                    <ul>
                      <li class="py-2">
                        <p class="fw-normal text-dark mb-0">
                          Name:
                          <span class="fw-light text-secondary ms-1">John Mednath</span>
                        </p>
                      </li>

                      <li class="py-2">
                        <p class="fw-normal text-dark mb-0">
                          Gender:
                          <span class="fw-light text-secondary ms-1">Female</span>
                        </p>
                      </li>

                      <li class="py-2">
                        <p class="fw-normal text-dark mb-0">
                          Class:
                          <span class="fw-light text-secondary ms-1">11 (Science)</span>
                        </p>
                      </li>

                      <li class="py-2">
                        <p class="fw-normal text-dark mb-0">
                          Section:
                          <span class="fw-light text-secondary ms-1">B</span>
                        </p>
                      </li>

                      <li class="py-2">
                        <p class="fw-normal text-dark mb-0">
                          Date Of Birth:
                          <span class="fw-light text-secondary ms-1">03/08/1993</span>
                        </p>
                      </li>

                      <li class="py-2">
                        <p class="fw-normal text-dark mb-0">
                          Id No. :
                          <span class="fw-light text-secondary ms-1">498376</span>
                        </p>
                      </li>

                      <li class="py-2">
                        <p class="fw-normal text-dark mb-0">
                          Phone:
                          <span class="fw-light text-secondary ms-1">+ 123 9988568</span>
                        </p>
                      </li>

                      <li class="py-2">
                        <p class="fw-normal text-dark mb-0">
                          Email:
                          <span class="fw-light text-secondary ms-1">johnmednath@gmail.com</span>
                        </p>
                      </li>
                    </ul>

                    <div class="row mt-4">
                      <div class="col-sm-6">
                        <button type="button"
                          class="btn btn-primary w-100 justify-content-center me-2 d-flex align-items-center mb-3 mb-sm-0">
                          <i class="ti ti-edit fs-5 me-2"></i>
                          Edit
                        </button>
                      </div>
                      <div class="col-sm-6">
                        <button type="button"
                          class="btn btn-danger w-100 justify-content-center d-flex align-items-center">
                          <i class="ti ti-trash fs-5 me-2"></i>
                          Delete
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-8">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item me-2" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                    type="button" role="tab" aria-controls="home" aria-selected="true">
                    Teacher Skill
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                    type="button" role="tab" aria-controls="profile" aria-selected="false">
                    Salary
                  </button>
                </li>
              </ul>

              <div class="card mt-4">
                <div class="card-body">
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                      <div class="mb-4 border-bottom pb-3">
                        <h4 class="card-title mb-0">Teacher Skill</h4>
                      </div>
                      <div class="table-responsive overflow-x-auto">
                        <table class="table align-middle text-nowrap">
                          <thead>
                            <tr>
                              <th scope="col">Code</th>
                              <th scope="col">
                                Subject Name
                              </th>
                              <th scope="col">Skill</th>
                              <th scope="col">Grade</th>
                            </tr>
                          </thead>
                          <tbody class="border-top">
                            <tr>
                              <td>
                                <p class="fw-normal mb-0 fs-3 text-dark">
                                  M103
                                </p>
                              </td>
                              <td>
                                <p class="text-dark mb-0 fw-normal">
                                  Mathematics
                                </p>
                              </td>
                              <td>
                                <div class="d-flex flex-column">
                                  <small class="mb-1">90%</small>
                                  <div class="progress w-100 me-3 bg-success-subtle">
                                    <div class="progress-bar w-90 text-bg-success" aria-valuenow="90%" aria-valuemin="0"
                                      aria-valuemax="100"></div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="fw-bold text-success mb-0">A</p>
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <p class="fw-normal mb-0 fs-3 text-dark">
                                  S221
                                </p>
                              </td>
                              <td>
                                <p class="text-dark mb-0 fw-normal">
                                  Science
                                </p>
                              </td>
                              <td>
                                <div class="d-flex flex-column">
                                  <small class="mb-1">70%</small>
                                  <div class="progress w-100 me-3 bg-warning-subtle">
                                    <div class="progress-bar w-70 text-bg-warning" aria-valuenow="70%" aria-valuemin="0"
                                      aria-valuemax="100"></div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="fw-bold text-warning mb-0">B</p>
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <p class="fw-normal mb-0 fs-3 text-dark">
                                  E452
                                </p>
                              </td>
                              <td>
                                <p class="text-dark mb-0 fw-normal">
                                  English
                                </p>
                              </td>
                              <td>
                                <div class="d-flex flex-column">
                                  <small class="mb-1">50%</small>
                                  <div class="progress w-100 me-3 bg-danger-subtle">
                                    <div class="progress-bar w-50 text-bg-danger" aria-valuenow="50%" aria-valuemin="0"
                                      aria-valuemax="100"></div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="fw-bold text-danger mb-0">C</p>
                              </td>
                            </tr>

                            <tr>
                              <td>
                                <p class="fw-normal mb-0 fs-3 text-dark">
                                  B541
                                </p>
                              </td>
                              <td>
                                <p class="text-dark mb-0 fw-normal">
                                  Biology
                                </p>
                              </td>
                              <td>
                                <div class="d-flex flex-column">
                                  <small class="mb-1">25%</small>
                                  <div class="progress w-100 me-3 bg-primary-subtle">
                                    <div class="progress-bar w-25 text-bg-primary" aria-valuenow="25%" aria-valuemin="0"
                                      aria-valuemax="100"></div>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <p class="fw-bold text-primary mb-0">E</p>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                      <div class="mb-4 border-bottom pb-3">
                        <h4 class="card-title mb-0">Salary Report</h4>
                      </div>
                      <div class="d-flex justify-content-between align-items-start">
                        <span class="badge text-bg-primary">Standard</span>
                        <div class="d-flex justify-content-center">
                          <sup class="h5 mt-3 mb-0 me-1 text-primary">$</sup>
                          <h1 class="display-5 mb-0 text-primary">50</h1>
                          <sub class="fs-6 pricing-duration mt-auto mb-3">/ month</sub>
                        </div>
                      </div>
                      <ul class="g-2 my-4">
                        <li class="mb-2 align-middle">
                          <i class="ti ti-circle-check fs-5 me-2 text-success"></i>
                          3 Periods per day
                        </li>

                        <li class="mb-2 align-middle">
                          <i class="ti ti-circle-check fs-5 me-2 text-success"></i>
                          Included Documents
                        </li>

                        <li class="mb-2 align-middle">
                          <i class="ti ti-circle-check fs-5 me-2 text-success"></i>
                          Free Books
                        </li>

                        <li class="mb-2 align-middle">
                          <i class="ti ti-circle-check fs-5 me-2 text-success"></i>
                          Students Help Salary
                        </li>
                      </ul>
                      <div class="d-flex justify-content-between align-items-center mb-1">
                        <span>Days</span>
                        <span>75% Completed</span>
                      </div>
                      <div class="progress bg-primary-subtle mb-1">
                        <div class="progress-bar text-bg-primary w-75" role="progressbar" aria-valuenow="75"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <span>4 days remaining</span>
                      <div class="d-grid w-100 mt-4 pt-2">
                        <button class="btn btn-primary" data-bs-target="#upgradePlanModal" data-bs-toggle="modal">
                          Pay Full Salary
                        </button>
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
    <div class="dark-transparent sidebartoggler"></div>



  </div>

  @@include("partials/scripts.html")
</body>

</html>