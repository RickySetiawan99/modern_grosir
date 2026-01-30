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
          @@include("partials/breadcrumb.html", {"title": "Widgets-Apps", "subtitle": 'Home'})
          <div class="row widget-app-columns">
            <!-- -------------------------------------------------------------- -->
            <!-- Recent Comments copy and paste this code-->
            <!-- -------------------------------------------------------------- -->
            <div class="col-lg-4">
              <!-- Card -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-0">Recent Comments</h4>
                </div>
                <div class="comment-widgets scrollable mb-2 common-widget" style="height: 450px" data-simplebar="">
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row border-bottom p-3 gap-3">
                    <div>
                      <span ><img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle"
                          alt="user" width="50" /></span>
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="fw-medium">James Anderson</h6>
                      <p class="mb-1 fs-2 text-muted">
                        Lorem Ipsum is simply dummy text of the printing and
                        type etting industry
                      </p>
                      <div class="comment-footer mt-2">
                        <div class="d-flex align-items-center">
                          <span class="
                              badge
                              bg-info-subtle
                              text-info
                              
                            ">Pending</span>
                          <span class="action-icons">
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-edit fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-check fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-heart fs-5"></i></a>
                          </span>
                        </div>
                        <span class="
                            text-muted
                            ms-auto
                            fw-normal
                            fs-2
                            d-block
                            mt-2
                            text-end
                          ">April 14, 2024</span>
                      </div>
                    </div>
                  </div>
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row border-bottom active p-3 gap-3">
                    <div>
                      <span><img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" class="rounded-circle" alt="user"
                          width="50" /></span>
                    </div>
                    <div class="comment-text active w-100">
                      <h6 class="fw-medium">Michael Jorden</h6>
                      <p class="mb-1 fs-2 text-muted">
                        Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </p>
                      <div class="comment-footer mt-2">
                        <div class="d-flex align-items-center">
                          <span class="
                              badge
                              bg-success-subtle
                              text-success
                              
                            ">Approved</span>
                          <span class="action-icons active">
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-edit fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-circle-x fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-heart text-danger fs-5"></i></a>
                          </span>
                        </div>
                        <span class="
                            text-muted
                            ms-auto
                            fw-normal
                            fs-2
                            text-end
                            mt-2
                            d-block
                          ">April 14, 2024</span>
                      </div>
                    </div>
                  </div>
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row border-bottom p-3 gap-3">
                    <div>
                      <span><img src="{{ URL::asset('build/images/profile/user-6.jpg') }}" class="rounded-circle" alt="user"
                          width="50" /></span>
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="fw-medium">Johnathan Doeting</h6>
                      <p class="mb-1 fs-2 text-muted">
                        Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </p>
                      <div class="comment-footer mt-2">
                        <div class="d-flex align-items-center">
                          <span class="
                              badge
                              bg-danger-subtle
                              text-danger
                              
                            ">Rejected</span>
                          <span class="action-icons">
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-edit fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-check fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-heart fs-5"></i></a>
                          </span>
                        </div>
                        <span class="
                            text-muted
                            ms-auto
                            fw-normal
                            fs-2
                            d-block
                            mt-2
                            text-end
                          ">April 14, 2024</span>
                      </div>
                    </div>
                  </div>
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row p-3 gap-3">
                    <div>
                      <span><img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" class="rounded-circle" alt="user"
                          width="50" /></span>
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="fw-medium">James Anderson</h6>
                      <p class="mb-1 fs-2 text-muted">
                        Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </p>
                      <div class="comment-footer mt-2">
                        <div class="d-flex align-items-center">
                          <span class="
                              badge
                              bg-info-subtle
                              text-info
                              
                            ">Pending</span>
                          <span class="action-icons">
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-edit fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-check fs-5"></i></a>
                            <a href="javascript:void(0)" class="ps-3"><i class="ti ti-heart fs-5"></i></a>
                          </span>
                        </div>
                        <span class="
                            text-muted
                            ms-auto
                            fw-normal
                            fs-2
                            d-block
                            text-end
                            mt-2
                          ">April 14, 2024</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Card -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title mb-0">Weather Report</h4>
                    <select class="form-select w-auto ms-auto">
                      <option selected="">Today</option>
                      <option value="1">Weekly</option>
                    </select>
                  </div>
                  <div class="d-flex align-items-center flex-row mt-4">
                    <div class="p-2 display-5 text-primary">
                      <i class="ti ti-cloud-snow"></i>
                      <span>73<sup>°</sup></span>
                    </div>
                    <div class="p-2">
                      <h3 class="mb-0">Saturday</h3>
                      <small>Ahmedabad, India</small>
                    </div>
                  </div>
                  <table class="table table-borderless">
                    <tbody>
                      <tr>
                        <td>Wind</td>
                        <td class="fw-medium">ESE 17 mph</td>
                      </tr>
                      <tr>
                        <td>Humidity</td>
                        <td class="fw-medium">83%</td>
                      </tr>
                      <tr>
                        <td>Pressure</td>
                        <td class="fw-medium">28.56 in</td>
                      </tr>
                      <tr>
                        <td>Cloud Cover</td>
                        <td class="fw-medium">78%</td>
                      </tr>
                      <tr>
                        <td>Ceiling</td>
                        <td class="fw-medium">25760 ft</td>
                      </tr>
                    </tbody>
                  </table>
                  <hr />
                  <ul class="list-unstyled row text-center city-weather-days">
                    <li class="col">
                      <i class="ti ti-sun-high fs-4"></i><span>09:30</span>
                      <h3 class="mb-0 fs-14 lh-base">70<sup>°</sup></h3>
                    </li>
                    <li class="col">
                      <i class="ti ti-cloud fs-4"></i><span>11:30</span>
                      <h3 class="mb-0 fs-14 lh-base">72<sup>°</sup></h3>
                    </li>
                    <li class="col">
                      <i class="ti ti-cloud-rain fs-4"></i><span>13:30</span>
                      <h3 class="mb-0 fs-14 lh-base">75<sup>°</sup></h3>
                    </li>
                    <li class="col">
                      <i class="ti ti-cloud-snow fs-4"></i><span>15:30</span>
                      <h3 class="mb-0 fs-14 lh-base">76<sup>°</sup></h3>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="card">
                <div class="card-body text-center">
                  <div class="profile-pic mb-3 mt-3">
                    <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" width="150" class="rounded-circle"
                      alt="user" />
                    <h4 class="mt-3 mb-0">Mathew Anderson</h4>
                    <a href="mailto:danielkristeen@gmail.com">danielkristeen@gmail.com</a>
                  </div>
                  <div class="
                      badge
                      bg-primary-subtle
                      text-primary
                    ">
                    Dashboard
                  </div>
                  <div class="
                      badge
                      bg-primary-subtle
                      text-primary
                    ">
                    UI
                  </div>
                  <div class="
                      badge
                      bg-primary-subtle
                      text-primary
                    ">
                    UX
                  </div>
                  <div class="badge text-bg-primary" data-bs-toggle="tooltip" data-bs-placement="top"
                    title="3 more">
                    +3
                  </div>
                </div>
                <div class="p-4 border-top mt-3">
                  <div class="row text-center">
                    <div class="col-6 border-end">
                      <a href="javascript:void(0)" class="
                          link
                          text-dark
                          d-flex
                          align-items-center
                          justify-content-center
                          fw-medium
                        "><i class="ti ti-message me-1 fs-6"></i>Message</a>
                    </div>
                    <div class="col-6">
                      <a href="javascript:void(0)" class="
                          link
                          text-dark
                          d-flex
                          align-items-center
                          justify-content-center
                          fw-medium
                        "><i class="ti ti-artboard me-1 fs-6"></i>Portfolio</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card social-widget overflow-hidden">
                <div class="card-body text-bg-primary">
                  <div class="d-flex align-items-center text-white">
                    <div>
                      <h4 class="mb-0 text-white">People you may know</h4>
                    </div>
                    <div class="ms-auto">
                      <a href="javascript: void(0)"><i class="ti ti-menu-2 text-white fs-6"></i></a>
                    </div>
                  </div>
                  <form class="mt-4 mb-3">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control bg-body" placeholder="Search by Email" aria-label="" />
                      <button class="btn btn-light" type="button">
                        <i class="ti ti-search"></i>
                      </button>
                    </div>
                  </form>
                </div>
                <div class="card-body">
                  <div class="row mt-2">
                    <div class="col-4 text-center">
                      <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" alt="modernize-img" class="img-fluid rounded" />
                      <h6 class="fs-2 mt-1">Hanna Gover</h6>
                      <button class="btn btn-light btn-sm">Connect</button>
                    </div>
                    <div class="col-4 text-center">
                      <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" alt="modernize-img" class="img-fluid rounded" />
                      <h6 class="fs-2 mt-1">Kendra Silly</h6>
                      <button class="btn btn-light btn-sm">Connect</button>
                    </div>
                    <div class="col-4 text-center">
                      <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" alt="modernize-img" class="img-fluid rounded" />
                      <h6 class="fs-2 mt-1">Jack Sully</h6>
                      <button class="btn btn-light btn-sm">Connect</button>
                    </div>
                  </div>
                  <button class="btn d-block w-100 btn-primary mb-2 mt-5">
                    Invite friends from Twitter
                    <i class="ti ti-brand-twitter ms-2 fs-5"></i>
                  </button>
                  <button class="btn d-block w-100 btn-info">
                    Invite friends from Facebook
                    <i class="ti ti-brand-facebook ms-2 fs-5"></i>
                  </button>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Currency Exchange</h4>
                  <p class="card-subtitle">exchange currency from here</p>
                </div>
                <div class="mb-4 p-4 text-center bg-light-subtle">
                  <form>
                    <div class="row gx-0">
                      <div class="col-8">
                        <input class="form-control" type="text" value="1.02458" />
                      </div>
                      <div class="col-4">
                        <select class="form-select">
                          <option value="1">BTC</option>
                          <option value="2">ETH</option>
                          <option value="3">DASH</option>
                          <option value="4">LTC</option>
                          <option value="5">NEO</option>
                          <option value="6">XRP</option>
                          <option value="7">EOS</option>
                          <option value="8">NEM</option>
                          <option value="9">ADA</option>
                        </select>
                      </div>
                    </div>
                    <div class="
                        round-40
                        text-white
                        d-flex
                        align-items-center
                        justify-content-center
                        text-center
                        rounded-circle
                        text-bg-danger
                        my-3
                        mx-auto
                      ">
                      <i class="ti ti-exchange fs-5"></i>
                    </div>
                    <div class="row gx-0">
                      <div class="col-8">
                        <input class="form-control" type="text" value="9526.39" />
                      </div>
                      <div class="col-4">
                        <select class="form-select">
                          <option value="1">USD</option>
                          <option value="2">EUR</option>
                          <option value="3">INR</option>
                          <option value="4">AUD</option>
                          <option value="5">GBP</option>
                          <option value="6">CAD</option>
                        </select>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="card-body pt-0 text-center">
                  <button type="button" class="btn btn-primary">
                    Exchange Now
                  </button>
                </div>
              </div>
              <div class="card poll-widget">
                <div class="card-body">
                  <h4 class="card-title">Result of Poll</h4>
                  <p class="card-subtitle mb-7">
                    Here is the result for the latest poll
                  </p>
                  <p class="fw-bold text-muted">
                    What is your mobile app usage daily?
                  </p>
                  <ul class="list-style-none mt-3 mb-2">
                    <li>
                      <div class="d-flex align-items-center">
                        <div>
                          <h6 class="mb-0 fw-bold">
                            A <span class="fw-normal">30 Minutes</span>
                          </h6>
                        </div>
                        <div class="ms-auto">
                          <h6 class="mb-0 fw-bold">55%</h6>
                        </div>
                      </div>
                      <div class="progress mt-2 text-bg-light">
                        <div class="progress-bar text-bg-info" role="progressbar" style="width: 25%" aria-valuenow="25"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </li>
                    <li class="mt-4">
                      <div class="d-flex align-items-center">
                        <div>
                          <h6 class="mb-0 fw-bold">
                            B <span class="fw-normal">More than 30 minutes</span>
                          </h6>
                        </div>
                        <div class="ms-auto">
                          <h6 class="mb-0 fw-bold">20%</h6>
                        </div>
                      </div>
                      <div class="progress mt-2 text-bg-light">
                        <div class="progress-bar bg-cyan" role="progressbar" style="width: 25%" aria-valuenow="25"
                          aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </li>
                    <li class="mt-4">
                      <div class="d-flex align-items-center">
                        <div>
                          <h6 class="mb-0 fw-bold">
                            C <span class="fw-normal">1 Hour</span>
                          </h6>
                        </div>
                        <div class="ms-auto">
                          <h6 class="mb-0 fw-bold">15%</h6>
                        </div>
                      </div>
                      <div class="progress mt-2 text-bg-light">
                        <div class="progress-bar text-bg-success" role="progressbar" style="width: 25%"
                          aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </li>
                    <li class="mt-4">
                      <div class="d-flex align-items-center">
                        <div>
                          <h6 class="mb-0 fw-bold">
                            D <span class="fw-normal">More than 1 hour</span>
                          </h6>
                        </div>
                        <div class="ms-auto">
                          <h6 class="mb-0 fw-bold">10%</h6>
                        </div>
                      </div>
                      <div class="progress mt-2 text-bg-light">
                        <div class="progress-bar text-bg-danger" role="progressbar" style="width: 25%"
                          aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------------------------- -->
            <!-- To Do list copy and paste this code-->
            <!-- -------------------------------------------------------------- -->
            <div class="col-lg-4">
              <!-- Card -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">To do List</h4>
                  <div class="todo-widget">
                    <ul class="list-task todo-list list-group mb-0" data-role="tasklist">
                      <li class="
                          list-group-item
                          todo-item
                          border-0
                          mb-0
                          py-3
                          pe-3
                          ps-0
                        " data-role="task">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input success check-light-success" id="newc1" />
                          <label class="
                              form-check-label
                              todo-label
                              d-md-flex
                              align-items-center
                              ps-2
                            " for="newc1">
                            <div>
                              <h5 class="todo-desc mb-0 fs-3 fw-medium mt-n1">
                                Give purchase report to john
                              </h5>
                              <div class="todo-desc text-muted fw-normal fs-2">
                                2 January 2024
                              </div>
                            </div>
                            <div class="ms-auto">
                              <div class="dropdown dropstart">
                                <a href="javascript:void(0)" class="link" id="new" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="ti ti-dots fs-6 text-dark"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="new">
                                  <li>
                                    <h6 class="dropdown-header">
                                      Choose Label
                                    </h6>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-success-subtle
                                          text-success
                                          fw-medium
                                        ">Primary</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-primary-subtle
                                          text-primary
                                          fw-medium
                                        ">Social</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-warning-subtle
                                          text-warning
                                          fw-medium
                                        ">Promotions</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-danger-subtle
                                          text-danger
                                          fw-medium
                                        ">Trash</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </label>
                        </div>
                      </li>
                      <li class="
                          list-group-item
                          todo-item
                          border-0
                          mb-0
                          py-3
                          pe-3
                          ps-0
                        " data-role="task">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input primary check-light-primary" id="newc2" />
                          <label class="
                              form-check-label
                              todo-label
                              d-md-flex
                              align-items-center
                              ps-2
                            " for="newc2">
                            <div>
                              <h5 class="todo-desc mb-0 fs-3 fw-medium mt-n1">
                                Hit the gym
                              </h5>
                              <div class="todo-desc text-muted fw-normal fs-2">
                                5 January 2024
                              </div>
                            </div>
                            <div class="ms-auto">
                              <div class="dropdown dropstart">
                                <a href="javascript:void(0)" class="link" id="new" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="ti ti-dots fs-6 text-dark"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="new">
                                  <li>
                                    <h6 class="dropdown-header">
                                      Choose Label
                                    </h6>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-success-subtle
                                          text-success
                                          fw-medium
                                        ">Primary</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-primary-subtle
                                          text-primary
                                          fw-medium
                                        ">Social</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-warning-subtle
                                          text-warning
                                          fw-medium
                                        ">Promotions</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-danger-subtle
                                          text-danger
                                          fw-medium
                                        ">Trash</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </label>
                        </div>
                      </li>
                      <li class="
                          list-group-item
                          todo-item
                          border-0
                          mb-0
                          py-3
                          pe-3
                          ps-0
                        " data-role="task">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input danger check-light-danger" id="newc3" />
                          <label class="
                              form-check-label
                              todo-label
                              d-md-flex
                              align-items-center
                              ps-2
                            " for="newc3">
                            <div>
                              <h5 class="todo-desc mb-0 fs-3 fw-medium mt-n1">
                                Pay bills
                              </h5>
                              <div class="todo-desc text-muted fw-normal fs-2">
                                12 January 2024
                              </div>
                            </div>
                            <div class="ms-auto">
                              <div class="dropdown dropstart">
                                <a href="javascript:void(0)" class="link" id="new" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="ti ti-dots fs-6 text-dark"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="new">
                                  <li>
                                    <h6 class="dropdown-header">
                                      Choose Label
                                    </h6>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-success-subtle
                                          text-success
                                          fw-medium
                                        ">Primary</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-primary-subtle
                                          text-primary
                                          fw-medium
                                        ">Social</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-warning-subtle
                                          text-warning
                                          fw-medium
                                        ">Promotions</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-danger-subtle
                                          text-danger
                                          fw-medium
                                        ">Trash</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </label>
                        </div>
                      </li>
                      <li class="
                          list-group-item
                          todo-item
                          border-0
                          mb-0
                          py-3
                          pe-3
                          ps-0
                        " data-role="task">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input warning check-light-warning" id="newc4" />
                          <label class="
                              form-check-label
                              todo-label
                              d-md-flex
                              align-items-center
                              ps-2
                            " for="newc4">
                            <div>
                              <h5 class="todo-desc mb-0 fs-3 fw-medium mt-n1">
                                Meet George
                              </h5>
                              <div class="todo-desc text-muted fw-normal fs-2">
                                15 January 2024
                              </div>
                            </div>
                            <div class="ms-auto">
                              <div class="dropdown dropstart">
                                <a href="javascript:void(0)" class="link" id="new" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="ti ti-dots fs-6 text-dark"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="new">
                                  <li>
                                    <h6 class="dropdown-header">
                                      Choose Label
                                    </h6>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-success-subtle
                                          text-success
                                          fw-medium
                                        ">Primary</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-primary-subtle
                                          text-primary
                                          fw-medium
                                        ">Social</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-warning-subtle
                                          text-warning
                                          fw-medium
                                        ">Promotions</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-danger-subtle
                                          text-danger
                                          fw-medium
                                        ">Trash</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </label>
                        </div>
                      </li>
                      <li class="
                          list-group-item
                          todo-item
                          border-0
                          mb-0
                          py-3
                          pe-3
                          ps-0
                        " data-role="task">
                        <div class="form-check">
                          <input type="checkbox" class="
                              form-check-input
                              secondary
                              check-light-secondary
                            " id="newc5" />
                          <label class="
                              form-check-label
                              todo-label
                              d-md-flex
                              align-items-center
                              ps-2
                            " for="newc5">
                            <div>
                              <h5 class="todo-desc mb-0 fs-3 fw-medium mt-n1">
                                Read a book
                              </h5>
                              <div class="todo-desc text-muted fw-normal fs-2">
                                20 January 2024
                              </div>
                            </div>
                            <div class="ms-auto">
                              <div class="dropdown dropstart">
                                <a href="javascript:void(0)" class="link" id="new" data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="ti ti-dots fs-6 text-dark"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="new">
                                  <li>
                                    <h6 class="dropdown-header">
                                      Choose Label
                                    </h6>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-success-subtle
                                          text-success
                                          fw-medium
                                        ">Primary</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-primary-subtle
                                          text-primary
                                          fw-medium
                                        ">Social</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-warning-subtle
                                          text-warning
                                          fw-medium
                                        ">Promotions</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a class="dropdown-item" href="javascript:void(0)">
                                      <span class="
                                          badge
                                          bg-danger-subtle
                                          text-danger
                                          fw-medium
                                        ">Trash</span>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </label>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- Card -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Task List</h4>
                  <div class="to-do-widget mt-3 common-widget">
                    <!-- .modal for add task -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header d-flex">
                            <h4 class="modal-title">Add Task</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form>
                              <div class="mb-3">
                                <label>Task name</label>
                                <input type="text" class="form-control" placeholder="Enter Task Name" />
                              </div>
                              <div class="mb-3">
                                <label>Assign to</label>
                                <select class="form-select">
                                  <option selected="">Sachin</option>
                                  <option value="1">Sehwag</option>
                                </select>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                              Close
                            </button>
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">
                              Submit
                            </button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->
                    <ul class="list-task todo-list list-group mb-0" data-role="tasklist">
                      <li class="list-group-item border-0 mb-0 py-3 pe-3 ps-0" data-role="task">
                        <div class="form-check form-check-inline w-100">
                          <input type="checkbox" class="form-check-input danger check-light-danger" id="inputSchedule"
                            name="inputCheckboxesSchedule" />
                          <label for="inputSchedule" class="form-check-label fw-medium">
                            <span>Schedule meeting with</span><span
                              class="badge text-bg-danger ms-1">Today</span>
                          </label>
                        </div>
                        <ul class="assignedto list-style-none m-0 ps-4 ms-1 mt-1">
                          <li class="d-inline-block border-0 me-1">
                            <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" alt="user" data-bs-toggle="tooltip"
                              data-bs-placement="top" title="" data-original-title="Steave" class="rounded-circle" />
                          </li>
                          <li class="d-inline-block border-0 me-1">
                            <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" alt="user" data-bs-toggle="tooltip"
                              data-bs-placement="top" title="" data-original-title="Jessica" class="rounded-circle" />
                          </li>
                          <li class="d-inline-block border-0 me-1">
                            <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" alt="user" data-bs-toggle="tooltip"
                              data-bs-placement="top" title="" data-original-title="Priyanka" class="rounded-circle" />
                          </li>
                          <li class="d-inline-block border-0 me-1">
                            <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" alt="user" data-bs-toggle="tooltip"
                              data-bs-placement="top" title="" data-original-title="Selina" class="rounded-circle" />
                          </li>
                        </ul>
                      </li>
                      <li class="list-group-item border-0 mb-0 py-3 pe-3 ps-0" data-role="task">
                        <div class="form-check form-check-inline w-100">
                          <input type="checkbox" id="inputCall" class="form-check-input info check-light-info"
                            name="inputCheckboxesCall" />
                          <label for="inputCall" class="form-check-label fw-medium">
                            <span>Give Purchase report to</span>
                            <span class="badge text-bg-info ms-1">Yesterday</span>
                          </label>
                        </div>
                        <ul class="assignedto m-0 ps-4 ms-1 mt-1">
                          <li class="d-inline-block border-0 me-1">
                            <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" alt="user" data-bs-toggle="tooltip"
                              data-bs-placement="top" title="" data-original-title="Priyanka" class="rounded-circle" />
                          </li>
                          <li class="d-inline-block border-0 me-1">
                            <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" alt="user" data-bs-toggle="tooltip"
                              data-bs-placement="top" title="" data-original-title="Selina" class="rounded-circle" />
                          </li>
                        </ul>
                      </li>
                      <li class="list-group-item border-0 mb-0 py-3 pe-3 ps-0" data-role="task">
                        <div class="form-check form-check-inline w-100">
                          <input type="checkbox" id="inputBook" class="form-check-input primary check-light-primary"
                            name="inputCheckboxesBook" />
                          <label for="inputBook" class="form-check-label fw-medium">
                            <span>Book flight for holiday</span><span
                              class="badge text-bg-primary ms-1">1
                              week</span>
                          </label>
                        </div>
                        <div class="fs-2 ps-3 d-inline-block ms-2">
                          26 jun 2024
                        </div>
                      </li>
                      <li class="list-group-item border-0 mb-0 py-3 pe-3 ps-0" data-role="task">
                        <div class="form-check form-check-inline w-100">
                          <input type="checkbox" id="inputForward" class="form-check-input warning check-light-warning"
                            name="inputCheckboxesForward" />
                          <label for="inputForward" class="form-check-label fw-medium">
                            <span>Forward all tasks</span>
                            <span class="badge text-bg-warning ms-1">2 weeks</span>
                          </label>
                        </div>
                        <div class="fs-2 ps-3 d-inline-block ms-2">
                          26 jun 2024
                        </div>
                      </li>
                      <li class="list-group-item border-0 mb-0 py-3 pe-3 ps-0" data-role="task">
                        <div class="form-check form-check-inline w-100">
                          <input type="checkbox" id="inputRecieve" class="form-check-input success check-light-success"
                            name="inputCheckboxesRecieve" />
                          <label for="inputRecieve" class="form-check-label fw-medium">
                            <span>Recieve shipment</span><span
                              class="badge text-bg-success ms-1">2 weeks</span>
                          </label>
                        </div>
                        <ul class="assignedto list-style-none m-0 ps-4 ms-1 mt-1">
                          <li class="d-inline-block border-0 me-1">
                            <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" alt="user" data-bs-toggle="tooltip"
                              data-bs-placement="top" title="" data-original-title="Steave" class="rounded-circle" />
                          </li>
                          <li class="d-inline-block border-0 me-1">
                            <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" alt="user" data-bs-toggle="tooltip"
                              data-bs-placement="top" title="" data-original-title="Jessica" class="rounded-circle" />
                          </li>
                          <li class="d-inline-block border-0 me-1">
                            <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" alt="user" data-bs-toggle="tooltip"
                              data-bs-placement="top" title="" data-original-title="Priyanka" class="rounded-circle" />
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- Card -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Recent Messages</h4>
                  <div class="mailbox">
                    <div class="
                        message-center
                        contact-widget
                        position-relative
                      " style="height: 450px">
                      <a href="javascript:void(0)" class="
                          message-item
                          d-flex
                          align-items-center
                          border-bottom
                          p-3
                        ">
                        <span class="user-img position-relative d-inline-block">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" alt="user"
                            class="rounded-circle w-100 round-40" />
                          <span class="profile-status rounded-circle online"></span>
                        </span>
                        <div class="w-75 d-inline-block  ps-3">
                          <h5 class="message-title mb-0 mt-1 fs-4">Pavan kumar</h5>
                          <span class="
                              fs-2
                              text-nowrap
                              d-block
                              time
                              text-truncate text-muted
                            ">info@wrappixel.com</span>
                        </div>
                      </a>
                      <!-- Message -->
                      <a href="javascript:void(0)" class="
                          message-item
                          d-flex
                          align-items-center
                          border-bottom
                          p-3
                        ">
                        <span class="user-img position-relative d-inline-block">
                          <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" alt="user"
                            class="rounded-circle w-100 round-40" />
                          <span class="profile-status rounded-circle busy"></span>
                        </span>
                        <div class="w-75 d-inline-block  ps-3">
                          <h5 class="message-title mb-0 mt-1 fs-4">Els Idunn</h5>
                          <span class="
                              fs-2
                              text-nowrap
                              d-block
                              time
                              text-truncate text-muted
                            ">pamela1987@gmail.com</span>
                        </div>
                      </a>
                      <!-- Message -->
                      <a href="javascript:void(0)" class="
                          message-item
                          d-flex
                          align-items-center
                          border-bottom
                          p-3
                        ">
                        <span class="user-img position-relative d-inline-block">
                          <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" alt="user"
                            class="rounded-circle w-100 round-40" />
                          <span class="profile-status rounded-circle away"></span>
                        </span>
                        <div class="w-75 d-inline-block  ps-3">
                          <h5 class="message-title mb-0 mt-1 fs-4">Arijit Sinh</h5>
                          <span class="
                              fs-2
                              text-nowrap
                              d-block
                              time
                              text-truncate text-muted
                            ">cruise1298.fiplip@gmail.com</span>
                        </div>
                      </a>
                      <!-- Message -->
                      <a href="javascript:void(0)" class="
                          message-item
                          d-flex
                          align-items-center
                          border-bottom
                          p-3
                        ">
                        <span class="user-img position-relative d-inline-block">
                          <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" alt="user"
                            class="rounded-circle w-100 round-40" />
                          <span class="profile-status rounded-circle offline"></span>
                        </span>
                        <div class="w-75 d-inline-block  ps-3">
                          <h5 class="message-title mb-0 mt-1 fs-4">Micheal Doe</h5>
                          <span class="
                              fs-2
                              text-nowrap
                              d-block
                              time
                              text-truncate text-muted
                            ">kat@gmail.com</span>
                        </div>
                      </a>
                      <!-- Message -->
                      <a href="javascript:void(0)" class="
                          message-item
                          d-flex
                          align-items-center
                          border-bottom
                          p-3
                        ">
                        <span class="user-img position-relative d-inline-block">
                          <img src="{{ URL::asset('build/images/profile/user-10.jpg') }}" alt="user"
                            class="rounded-circle w-100 round-40" />
                          <span class="profile-status rounded-circle busy"></span>
                        </span>
                        <div class="w-75 d-inline-block  ps-3">
                          <h5 class="message-title mb-0 mt-1 fs-4">Alexandra</h5>
                          <span class="
                              fs-2
                              text-nowrap
                              d-block
                              time
                              text-truncate text-muted
                            ">pamela1987@gmail.com</span>
                        </div>
                      </a>
                      <!-- Message -->
                      <a href="javascript:void(0)" class="message-item d-flex align-items-center p-3">
                        <span class="user-img position-relative d-inline-block">
                          <img src="{{ URL::asset('build/images/profile/user-6.jpg') }}" alt="user"
                            class="rounded-circle w-100 round-40" />
                          <span class="profile-status rounded-circle online"></span>
                        </span>
                        <div class="w-75 d-inline-block  ps-3">
                          <h5 class="message-title mb-0 mt-1 fs-4">James Smith</h5>
                          <span class="
                              fs-2
                              text-nowrap
                              d-block
                              time
                              text-truncate text-muted
                            ">info@wrappixel.com</span>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Card -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Subscribe</h4>
                  <form>
                    <div class="mb-3">
                      <input type="text" class="form-control" id="exampleInputname2" placeholder="Enter Name" />
                    </div>
                    <div class="mb-3">
                      <input type="email" class="form-control" placeholder="Enter email" />
                    </div>
                    <button type="submit" class="
                        btn btn-primary
                        fw-medium
                        d-block
                        w-100
                      ">
                      Submit
                    </button>
                  </form>
                </div>
              </div>
              <!-- Card -->
              <div class="card overflow-hidden">
                <div class="position-relative">
                  <img class="card-img img-fluid" src="{{ URL::asset('build/images/backgrounds/profile-bg.jpg') }}"
                    alt="Card image" />
                  <div class="
                    card-img-overlay
                    d-flex
                    align-items-center
                    justify-content-center
                    flex-column
                  ">
                    <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" alt="modernize-img" class="rounded-circle" width="100" />
                    <h4 class="card-title text-white mt-3 mb-0">John doe</h4>
                  </div>
                </div>

                <div class="card-body text-center">
                  <div class="row">
                    <div class="col">
                      <h4 class="mb-0 card-title">12K</h4>
                      <p class="fs-3 mb-0">Followers</p>
                    </div>
                    <div class="col">
                      <h4 class="mb-0 card-title">420</h4>
                      <p class="fs-3 mb-0">Following</p>
                    </div>
                    <div class="col">
                      <h4 class="mb-0 card-title">128</h4>
                      <p class="fs-3 mb-0">Tweets</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Reviews</h4>
                  <p class="card-subtitle">Overview of Review</p>
                  <h2 class="fw-medium mt-5 fs-7">25426</h2>
                  <span class="text-muted">This month we got 346 New Reviews</span>
                  <div class="image-box mt-4 mb-4">
                    <a href="javascript:void(0)" class="me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Simmons"><img
                        src="{{ URL::asset('build/images/profile/user-5.jpg') }}" class="rounded-circle" width="45"
                        alt="user" /></a>
                    <a href="javascript:void(0)" class="me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Fitz"><img
                        src="{{ URL::asset('build/images/profile/user-2.jpg') }}" class="rounded-circle" width="45"
                        alt="user" /></a>
                    <a href="javascript:void(0)" class="me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Phil"><img
                        src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" width="45"
                        alt="user" /></a>
                    <a href="javascript:void(0)" class="me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Melinda"><img
                        src="{{ URL::asset('build/images/profile/user-4.jpg') }}" class="rounded-circle" width="45"
                        alt="user" /></a>
                  </div>
                  <a href="javascript:void(0)" class="btn btn-primary mt-2">Checkout All Reviews</a>
                </div>
              </div>
              <!-- Card -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Visits around the countries</h4>
                  <ul class="list-style-none country-state mt-3">
                    <li class="mb-4">
                      <h2 class="mb-0 fs-7">6350</h2>
                      <div class="d-flex align-items-center">
                        <small>From India</small>
                        <div class="ms-auto">
                          48% <i class="fas fa-level-up-alt text-success"></i>
                        </div>
                      </div>
                      <div class="progress text-bg-light">
                        <div class="progress-bar text-bg-success" role="progressbar" style="width: 48%; height: 6px"
                          aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </li>
                    <li class="mb-4">
                      <h2 class="mb-0 fs-7">3250</h2>
                      <div class="d-flex align-items-center">
                        <small>From UAE</small>
                        <div class="ms-auto">
                          98% <i class="fas fa-level-up-alt text-success"></i>
                        </div>
                      </div>
                      <div class="progress text-bg-light">
                        <div class="progress-bar text-bg-info" role="progressbar" style="width: 48%; height: 6px"
                          aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </li>
                    <li class="mb-4">
                      <h2 class="mb-0 fs-7">1250</h2>
                      <div class="d-flex align-items-center">
                        <small>From Australia</small>
                        <div class="ms-auto">
                          75% <i class="fas fa-level-down-alt text-danger"></i>
                        </div>
                      </div>
                      <div class="progress text-bg-light">
                        <div class="progress-bar text-bg-primary" role="progressbar" style="width: 48%; height: 6px"
                          aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </li>
                    <li class="mb-4">
                      <h2 class="mb-0 fs-7">1350</h2>
                      <div class="d-flex align-items-center">
                        <small>From USA</small>
                        <div class="ms-auto">
                          48% <i class="fas fa-level-up-alt text-success"></i>
                        </div>
                      </div>
                      <div class="progress text-bg-light">
                        <div class="progress-bar text-bg-warning" role="progressbar" style="width: 48%; height: 6px"
                          aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Card -->
              <div class="card earning-widget">
                <div class="card-body">
                  <div class="card-title">
                    <div class="d-flex">
                      <div>
                        <h4 class="card-title mb-0">Total Earning</h4>
                        <h2 class="mt-0 fs-7 mb-0">$586</h2>
                      </div>
                      <div class="ms-auto">
                        <select class="form-select">
                          <option selected="">Today</option>
                          <option value="1">Weekly</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="p-3 border-top">
                  <div class="d-flex align-items-center pb-2">
                    <div class="flex-shrink-0">
                      <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" width="50" class="rounded-circle"
                        alt="logo" />
                    </div>
                    <div class="ms-2 fw-medium">Andrew Simon</div>
                    <div class="ms-auto">
                      <span class="badge text-bg-info">$2300</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center py-2">
                    <div class="flex-shrink-0">
                      <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" width="50" class="rounded-circle"
                        alt="logo" />
                    </div>
                    <div class="ms-2 fw-medium">Daniel Kristeen</div>
                    <div class="ms-auto">
                      <span class="badge text-bg-primary">$4300</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center py-2">
                    <div class="flex-shrink-0">
                      <img src="{{ URL::asset('build/images/profile/user-6.jpg') }}" width="50" class="rounded-circle"
                        alt="logo" />
                    </div>
                    <div class="ms-2 fw-medium">Dany John</div>
                    <div class="ms-auto">
                      <span class="badge text-bg-success">$4300</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center py-2">
                    <div class="flex-shrink-0">
                      <img src="{{ URL::asset('build/images/profile/user-7.jpg') }}" width="50" class="rounded-circle"
                        alt="logo" />
                    </div>
                    <div class="ms-2 fw-medium">Chris gyl</div>
                    <div class="ms-auto">
                      <span class="badge text-bg-warning">$5300</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center py-2">
                    <div class="flex-shrink-0">
                      <img src="{{ URL::asset('build/images/profile/user-8.jpg') }}" width="50" class="rounded-circle"
                        alt="logo" />
                    </div>
                    <div class="ms-2 fw-medium">John Deo</div>
                    <div class="ms-auto">
                      <span class="badge text-bg-danger">$4567</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center py-2">
                    <div class="flex-shrink-0">
                      <img src="{{ URL::asset('build/images/profile/user-9.jpg') }}" width="50" class="rounded-circle"
                        alt="logo" />
                    </div>
                    <div class="ms-2 fw-medium">Krish John</div>
                    <div class="ms-auto">
                      <span class="badge text-bg-primary">$7889</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- -------------------------------------------------------------- -->
            <!-- Project of the month copy and paste this code-->
            <!-- -------------------------------------------------------------- -->
            <div class="col-lg-4">
              <!-- Card -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <h4 class="card-title">Projects of the Month</h4>
                    <select class="form-select w-auto ms-auto">
                      <option selected="">January</option>
                      <option value="1">February</option>
                      <option value="2">March</option>
                      <option value="3">April</option>
                    </select>
                  </div>
                  <div class="table-responsive">
                    <table class="table stylish-table  mb-0 text-nowrap">
                      <thead>
                        <tr>
                          <th class="border-0 text-muted fw-normal" colspan="2">
                            Assigned
                          </th>
                          <th class="border-0 text-muted fw-normal">Name</th>
                          <th class="border-0 text-muted fw-normal">
                            Priority
                          </th>
                          <th class="border-0 text-muted fw-normal">Budget</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            <span class="
                                round-40
                                text-white
                                d-flex
                                align-items-center
                                justify-content-center
                                text-center
                                rounded-circle
                                text-bg-info
                              ">S</span>
                          </td>
                          <td>
                            <h6 class="fw-medium mb-0">Sunil Joshi</h6>
                            <small class="text-muted">Web Designer</small>
                          </td>
                          <td>Elite Admin</td>
                          <td>
                            <span class="badge text-bg-success">Low</span>
                          </td>
                          <td>$3.9K</td>
                        </tr>
                        <tr class="active">
                          <td>
                            <span class="
                                round-40
                                text-white
                                d-flex
                                align-items-center
                                justify-content-center
                                text-center
                                rounded-circle
                                text-bg-info
                              "><img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" alt="user" class="rounded-circle"
                                width="40" /></span>
                          </td>
                          <td>
                            <h6 class="fw-medium mb-0">Andrew</h6>
                            <small class="text-muted">Project Manager</small>
                          </td>
                          <td>Real Homes</td>
                          <td>
                            <span class="badge text-bg-info">Medium</span>
                          </td>
                          <td>$23.9K</td>
                        </tr>
                        <tr>
                          <td>
                            <span class="
                                round-40
                                text-white
                                d-flex
                                align-items-center
                                justify-content-center
                                text-center
                                rounded-circle
                                text-bg-success
                              ">B</span>
                          </td>
                          <td>
                            <h6 class="fw-medium mb-0">
                              Bhavesh patel
                            </h6>
                            <small class="text-muted">Developer</small>
                          </td>
                          <td>MedicalPro Theme</td>
                          <td>
                            <span class="badge text-bg-primary">High</span>
                          </td>
                          <td>$12.9K</td>
                        </tr>
                        <tr>
                          <td>
                            <span class="
                                round-40
                                text-white
                                d-flex
                                align-items-center
                                justify-content-center
                                text-center
                                rounded-circle
                                text-bg-primary
                              ">N</span>
                          </td>
                          <td>
                            <h6 class="fw-medium mb-0">Nirav Joshi</h6>
                            <small class="text-muted">Frontend Eng</small>
                          </td>
                          <td>Elite Admin</td>
                          <td>
                            <span class="badge text-bg-danger">Low</span>
                          </td>
                          <td>$10.9K</td>
                        </tr>
                        <tr>
                          <td>
                            <span class="
                                round-40
                                text-white
                                d-flex
                                align-items-center
                                justify-content-center
                                text-center
                                rounded-circle
                                text-bg-warning
                              ">M</span>
                          </td>
                          <td>
                            <h6 class="fw-medium mb-0">Micheal Doe</h6>
                            <small class="text-muted">Content Writer</small>
                          </td>
                          <td>Helping Hands</td>
                          <td>
                            <span class="badge text-bg-warning">High</span>
                          </td>
                          <td>$12.9K</td>
                        </tr>
                        <tr>
                          <td>
                            <span class="
                                round-40
                                text-white
                                d-flex
                                align-items-center
                                justify-content-center
                                text-center
                                rounded-circle
                                text-bg-danger
                              ">N</span>
                          </td>
                          <td>
                            <h6 class="fw-medium mb-0">Johnathan</h6>
                            <small class="text-muted">Graphic</small>
                          </td>
                          <td>Digital Agency</td>
                          <td>
                            <span class="badge text-bg-info">High</span>
                          </td>
                          <td>$2.6K</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- Card -->
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row">
                    <div>
                      <img src="{{ URL::asset('build/images/profile/user-6.jpg') }}" alt="user" class="rounded-circle"
                        width="100" />
                    </div>
                    <div class="ps-3">
                      <h4 class="card-title">Daniel Kristeen</h4>
                      <p class="card-subtitle">UIUX Designer</p>
                      <button class="btn btn-success">
                        <i class="ti ti-plus"></i> Follow
                      </button>
                    </div>
                  </div>
                  <div class="row mt-5">
                    <div class="col border-end text-center">
                      <h2 class="fs-7">14</h2>
                      <h6 class="mb-0">Photos</h6>
                    </div>
                    <div class="col border-end text-center">
                      <h2 class="fs-7">54</h2>
                      <h6 class="mb-0">Videos</h6>
                    </div>
                    <div class="col text-center">
                      <h2 class="fs-7">145</h2>
                      <h6 class="mb-0">Tasks</h6>
                    </div>
                  </div>
                </div>
                <div>
                  <hr />
                </div>
                <div class="card-body">
                  <p class="text-center aboutscroll">
                    Lorem ipsum dolor sit ametetur adipisicing elit, sed do
                    eiusmod tempor incididunt adipisicing elit, sed do eiusmod
                    tempor incididunLorem ipsum dolor sit ametetur adipisicing
                    elit, sed do eiusmod tempor incididuntt
                  </p>
                  <ul class="
                      list-style-none list-icons
                      d-flex
                      flex-item
                      text-center
                      pt-2
                    ">
                    <li class="col">
                      <a href="javascript:void(0)" data-bs-toggle="tooltip" title="Website"><i
                          class="ti ti-world fs-6 text-dark"></i></a>
                    </li>
                    <li class="col">
                      <a href="javascript:void(0)" data-bs-toggle="tooltip" title="twitter"><i
                          class="ti ti-brand-twitter fs-6 text-dark"></i></a>
                    </li>
                    <li class="col">
                      <a href="javascript:void(0)" data-bs-toggle="tooltip" title="Facebook"><i
                          class="ti ti-brand-facebook fs-6 text-dark"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
              <!-- Card -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Browser Stats</h4>
                  <table class="table mt-3 table-borderless align-middle">
                    <tbody>
                      <tr>
                        <td class="ps-0">
                          <img src="{{ URL::asset('build/images/browser/chrome-logo.png') }}" alt="logo" />
                        </td>
                        <td class="ps-0 w-100">Google Chrome</td>
                        <td class="ps-0 text-end">23%</td>
                      </tr>
                      <tr>
                        <td class="ps-0">
                          <img src="{{ URL::asset('build/images/browser/firefox-logo.png') }}" alt="logo" />
                        </td>
                        <td class="ps-0">Mozila Firefox</td>
                        <td class="ps-0 text-end">15%</td>
                      </tr>
                      <tr>
                        <td class="ps-0">
                          <img src="{{ URL::asset('build/images/browser/safari-logo.png') }}" alt="logo" />
                        </td>
                        <td class="ps-0">Apple Safari</td>
                        <td class="ps-0 text-end">07%</td>
                      </tr>
                      <tr>
                        <td class="ps-0">
                          <img src="{{ URL::asset('build/images/browser/internet-logo.png') }}" alt="logo" />
                        </td>
                        <td class="ps-0">Internet Explorer</td>
                        <td class="ps-0 text-end">09%</td>
                      </tr>
                      <tr>
                        <td class="ps-0">
                          <img src="{{ URL::asset('build/images/browser/opera-logo.png') }}" alt="logo" />
                        </td>
                        <td class="ps-0">Opera mini</td>
                        <td class="ps-0 text-end">23%</td>
                      </tr>
                      <tr>
                        <td class="ps-0">
                          <img src="{{ URL::asset('build/images/browser/edge-logo.png') }}" alt="logo" class="rounded-circle" />
                        </td>
                        <td class="ps-0">Microsoft edge</td>
                        <td class="ps-0 text-end">09%</td>
                      </tr>
                      <tr>
                        <td class="ps-0">
                          <img src="{{ URL::asset('build/images/browser/netscape-logo.png') }}" alt="logo" />
                        </td>
                        <td class="ps-0" class="text-truncate">
                          Netscape Navigator
                        </td>
                        <td class="ps-0 text-end">04%</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <!-- Card -->
              <div class="card">
                <div class="card-body">
                  <!-- title -->
                  <div class="d-md-flex align-items-center mb-3">
                    <div>
                      <h4 class="card-title">Place your Order</h4>
                      <p class="card-subtitle">
                        Buy and Sell Crypto as you Like
                      </p>
                    </div>
                    <div class="ms-auto d-flex align-items-center">
                      <div class="dl">
                        <select class="form-select">
                          <option value="0" selected>Bitcoin</option>
                          <option value="1">Ethereum</option>
                          <option value="2">Ripple</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- title -->
                  <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#test4" role="tab"
                        aria-selected="true">Buy</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#test5" role="tab"
                        aria-selected="false">Sell</a>
                    </li>
                  </ul>
                  <div class="tab-content mt-3" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="test4" role="tabpanel" aria-labelledby="pills-home-tab">
                      <form>
                        <div class="mb-3">
                          <div class="input-group">
                            <span class="input-group-text"><i class="ti ti-coin-bitcoin fs-6"></i></span>
                            <input type="text" class="form-control" placeholder="Amount" />
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="input-group">
                            <span class="input-group-text">$</span>

                            <input type="text" class="form-control" placeholder="Price" />
                          </div>
                        </div>
                        <div class="form-group">
                          <button type="button" class="btn btn-primary">
                            Buy Bitcoin
                          </button>
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="test5" role="tabpanel" aria-labelledby="pills-profile-tab">
                      <form>
                        <div class="mb-3">
                          <div class="input-group">
                            <span class="input-group-text"><i class="ti ti-coin-bitcoin fs-6"></i></span>
                            <input type="text" class="form-control" placeholder="Amount" />
                          </div>
                        </div>
                        <div class="mb-3">
                          <div class="input-group">
                            <span class="input-group-text">$</span>

                            <input type="text" class="form-control" placeholder="Price" />
                          </div>
                        </div>
                        <div class="form-group">
                          <button type="button" class="btn btn-success">
                            Sell Bitcoin
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card poll-widget">
                <div class="card-body">
                  <h4 class="card-title">Poll of the week</h4>
                  <p class="card-subtitle mb-3">Here is the latest poll</p>
                  <p class="fw-bold text-muted">
                    What is your mobile app usage daily?
                  </p>
                  <ul class="list-style-none mt-3">
                    <li>
                      <div class="form-check">
                        <input type="radio" id="a" name="customRadio" class="form-check-input" />
                        <label class="form-check-label" for="a"><b class="me-1">A</b> 30 Minutes</label>
                      </div>
                    </li>
                    <li class="mt-3">
                      <div class="form-check">
                        <input type="radio" id="b" name="customRadio" class="form-check-input" checked />
                        <label class="form-check-label text-primary" for="b"><b class="me-1">B</b> More than 30
                          minutes</label>
                      </div>
                    </li>
                    <li class="mt-3">
                      <div class="form-check">
                        <input type="radio" id="c" name="customRadio" class="form-check-input" />
                        <label class="form-check-label" for="c"><b class="me-1">C</b> 1 Hour</label>
                      </div>
                    </li>
                    <li class="mt-3">
                      <div class="form-check">
                        <input type="radio" id="d" name="customRadio" class="form-check-input" />
                        <label class="form-check-label" for="d"><b class="me-1">D</b> More than 1 hour</label>
                      </div>
                    </li>
                  </ul>
                  <button class="btn btn-primary mt-3">Submit Answer</button>
                </div>
              </div>
              <!-- Card -->
              <div class="card">
                <div class="card-body pb-2">
                  <h4 class="card-title">Feeds</h4>
                </div>
                <ul class="feeds ps-0">
                  <div class="feed-item mb-2 py-2 pe-3 ps-4">
                    <div class="border-start border-2 border-info d-md-flex align-items-center">
                      <div class="d-flex align-items-center gap-6 ms-2">
                        <a href="javascript:void(0)"
                          class=" round-40 bg-info-subtle text-info rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                          <i class="ti ti-bell fs-6"></i>
                        </a>
                        <div class="text-truncate">
                          <span class="text-dark fw-medium">You have 4 pending tasks.</span>
                        </div>
                      </div>
                      <div class="
                          justify-content-end
                          text-truncate
                          ms-5 ms-md-auto
                          ps-4 ps-md-0
                        ">
                        <span class="fs-2 text-muted">Just Now</span>
                      </div>
                    </div>
                  </div>
                  <div class="feed-item mb-2 py-2 pe-3 ps-4">
                    <div class="border-start border-2 border-success d-md-flex align-items-center">
                      <div class="d-flex align-items-center gap-6 ms-2">
                        <a href="javascript:void(0)"
                          class=" round-40 bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                          <i class="ti ti-database fs-6"></i>
                        </a>
                        <div class="text-truncate">
                          <span class="text-dark fw-medium">Server #1 overloaded</span>
                        </div>
                      </div>
                      <div class="
                          justify-content-end
                          text-truncate
                          ms-5 ms-md-auto
                          ps-4 ps-md-0
                        ">
                        <span class="fs-2 text-muted">2 Hr Ago</span>
                      </div>
                    </div>
                  </div>
                  <div class="feed-item mb-2 py-2 pe-3 ps-4">
                    <div class="border-start border-2 border-warning d-md-flex align-items-center">
                      <div class="d-flex align-items-center gap-6 ms-2">
                        <a href="javascript:void(0)"
                          class=" round-40 bg-warning-subtle text-warning rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                          <i class="ti ti-map-pin fs-6"></i>
                        </a>
                        <div class="text-truncate">
                          <span class="text-dark fw-medium">New order received.</span>
                        </div>
                      </div>
                      <div class="
                          justify-content-end
                          text-truncate
                          ms-5 ms-md-auto
                          ps-4 ps-md-0
                        ">
                        <span class="fs-2 text-muted">31 May</span>
                      </div>
                    </div>
                  </div>
                  <div class="feed-item mb-2 py-2 pe-3 ps-4">
                    <div class="border-start border-2 border-danger d-md-flex align-items-center">
                      <div class="d-flex align-items-center gap-6 ms-2">
                        <a href="javascript:void(0)"
                          class=" round-40 bg-danger-subtle text-danger rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                          <i class="ti ti-microphone fs-6"></i>
                        </a>
                        <div class="text-truncate">
                          <span class="text-dark fw-medium">New user registered.</span>
                        </div>
                      </div>
                      <div class="
                          justify-content-end
                          text-truncate
                          ms-5 ms-md-auto
                          ps-4 ps-md-0
                        ">
                        <span class="fs-2 text-muted">30 May</span>
                      </div>
                    </div>
                  </div>
                  <div class="feed-item mb-2 py-2 pe-3 ps-4">
                    <div class="border-start border-2 border-primary d-md-flex align-items-center">
                      <div class="d-flex align-items-center gap-6 ms-2">
                        <a href="javascript:void(0)"
                          class=" round-40 bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center flex-shrink-0">
                          <i class="ti ti-cast fs-6"></i>
                        </a>
                        <div class="text-truncate">
                          <span class="text-dark fw-medium">New Version just arrived.</span>
                        </div>
                      </div>
                      <div class="
                          justify-content-end
                          text-truncate
                          ms-5 ms-md-auto
                          ps-4 ps-md-0
                        ">
                        <span class="fs-2 text-muted">27 May</span>
                      </div>
                    </div>
                  </div>
                </ul>
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