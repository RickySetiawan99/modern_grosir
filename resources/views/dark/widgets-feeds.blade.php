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
          @@include("partials/breadcrumb.html", {"title": "Widgets-Feeds", "subtitle": 'Home'})
          <div class="row">
            <div class="col-md-6 col-lg-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/profile/user-11.jpg') }}" class="rounded-circle img-fluid" width="50" />
                      <div class="ms-3">
                        <h4 class="card-title">Andrew Grant</h4>
                        <p class="card-subtitle mb-0">Yestarday at 5:06 PM</p>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown">
                        <a href="javascript:void(0)" class="link" id="dropdownMenuButton" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          <i class="ti ti-dots fs-6 text-dark"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li><a class="dropdown-item" href="javascript:void(0)">Report</a></li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Turn on Post Notifications</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Copy Link</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Share to...</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Unfollow</a>
                          </li>
                          <li><a class="dropdown-item" href="javascript:void(0)">Mute</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <img src="{{ URL::asset('build/images/blog/blog-img5.jpg') }}" class="img-fluid rounded-1 mt-4" />
                  <div class="mt-4">
                    <p class="fs-4">
                      Your beauty is one of the things I like about you.😍 🥰<a href="javascript:void(0)">#beauty</a>
                      <a href="javascript:void(0)">#goa🏄🏽‍♀️</a> <a href="javascript:void(0)">#india</a>
                      <a href="javascript:void(0)">#happylife</a>
                    </p>
                  </div>
                  <div class="d-flex align-items-center">
                    <a href="javascript:void(0)" class="me-3">
                      <i class="ti ti-heart text-dark fs-7"></i>
                    </a>
                    <a href="javascript:void(0)" class="me-3">
                      <i class="ti ti-message-circle text-dark fs-7"></i>
                    </a>
                    <a href="javascript:void(0)" class="me-2">
                      <i class="ti ti-send text-dark fs-7"></i>
                    </a>
                    <div class="ms-auto">
                      <a href="javascript:void(0)">
                        <i class="ti ti-bookmark text-dark fs-7"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" class="rounded-circle img-fluid" width="50" />
                      <div class="ms-3">
                        <h4 class="card-title">Maria Hernandez</h4>
                        <p class="card-subtitle mb-0">
                          Angular, Reactjs, Vuejs
                        </p>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted fs-4 mt-4">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco.
                  </p>
                  <div class="d-flex align-items-center pb-3 border-bottom">
                    <a href="javascript:void(0)" class="
                        me-3
                        d-flex
                        align-items-center
                        link
                        fw-medium
                      ">
                      <i class="ti ti-heart text-danger fs-7"></i>
                      <span class="ms-1 text-dark">45</span>
                    </a>
                    <a href="javascript:void(0)" class="
                        me-3
                        d-flex
                        align-items-center
                        link
                        fw-medium
                      ">
                      <i class="ti ti-message-circle text-dark fs-7"></i>
                      <span class="ms-1 text-dark">12</span>
                    </a>
                  </div>
                  <div class="d-flex align-items-start mt-3">
                    <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" class="rounded-circle img-fluid" width="40" />
                    <div class="ms-3 w-100">
                      <h6 class="card-title mb-0">Andrew Grant</h6>
                      <div class="form-floating my-3">
                        <input type="text" class="form-control form-input-bg" id="floatingInput"
                          placeholder="name@example.com" />
                        <label for="floatingInput">Write comment...</label>
                      </div>
                      <div class="text-end">
                        <button type="button" class="btn btn-primary">Post</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="comment-widgets">
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row mt-0 p-3">
                    <div class="p-2">
                      <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" alt="user" width="50"
                        class="rounded-circle" />
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="fw-medium">James Anderson</h6>
                      <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </span>
                      <div class="comment-footer">
                        <div class="text-muted">April 14, 2024</div>
                      </div>
                    </div>
                  </div>
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row p-3">
                    <div class="p-2">
                      <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" alt="user" width="50"
                        class="rounded-circle" />
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="fw-medium">Michael Jorden</h6>
                      <span class="mb-3 d-block">Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </span>
                      <div class="comment-footer">
                        <div class="text-muted">April 14, 2024</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle img-fluid" width="50" />
                      <div class="ms-3">
                        <h4 class="card-title">John Smith</h4>
                        <p class="card-subtitle mb-0">Yestarday at 5:06 PM</p>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown">
                        <a href="javascript:void(0)" class="link" id="dropdownMenuButton" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          <i class="ti ti-dots fs-6 text-dark"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li><a class="dropdown-item" href="javascript:void(0)">Report</a></li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Turn on Post Notifications</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Copy Link</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Share to...</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Unfollow</a>
                          </li>
                          <li><a class="dropdown-item" href="javascript:void(0)">Mute</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted fs-4 mt-4">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.
                  </p>
                  <div class="d-flex align-items-center">
                    <a href="javascript:void(0)" class="me-3">
                      <i class="ti ti-heart text-dark fs-7"></i>
                    </a>
                    <a href="javascript:void(0)" class="me-3">
                      <i class="ti ti-message-circle text-dark fs-7"></i>
                    </a>
                    <a href="javascript:void(0)" class="me-2">
                      <i class="ti ti-send text-dark fs-7"></i>
                    </a>
                    <div class="ms-auto">
                      <a href="javascript:void(0)">
                        <i class="ti ti-bookmark text-dark fs-7"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" class="rounded-circle img-fluid" width="50" />
                      <div class="ms-3">
                        <h4 class="card-title">Ritesh Deshmukh</h4>
                        <p class="card-subtitle mb-0">Today at 6:30 AM</p>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown">
                        <a href="javascript:void(0)" class="link" id="dropdownMenuButton" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          <i class="ti ti-dots fs-6 text-dark"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li><a class="dropdown-item" href="javascript:void(0)">Report</a></li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Turn on Post Notifications</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Copy Link</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Share to...</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Unfollow</a>
                          </li>
                          <li><a class="dropdown-item" href="javascript:void(0)">Mute</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4">
                    <div class="embed-responsive embed-responsive-16by9">
                      <iframe class="embed-responsive-item rounded" width="100%" height="350"
                        src="https://www.youtube.com/embed/tgbNymZ7vqY" allowfullscreen="allowfullscreen"></iframe>
                    </div>
                  </div>
                  <div class="mt-4">
                    <p class="fs-4">
                      Your beauty is one of the things I like about you.😍 🥰<a href="javascript:void(0)">#beauty</a>
                      <a href="javascript:void(0)">#goa🏄🏽‍♀️</a> <a href="javascript:void(0)">#india</a>
                      <a href="javascript:void(0)">#happylife</a>
                    </p>
                  </div>
                  <div class="d-flex align-items-center">
                    <a href="javascript:void(0)" class="me-3">
                      <i class="ti ti-heart text-dark fs-7"></i>
                    </a>
                    <a href="javascript:void(0)" class="me-3">
                      <i class="ti ti-message-circle text-dark fs-7"></i>
                    </a>
                    <a href="javascript:void(0)" class="me-2">
                      <i class="ti ti-send text-dark fs-7"></i>
                    </a>
                    <div class="ms-auto">
                      <a href="javascript:void(0)">
                        <i class="ti ti-bookmark text-dark fs-7"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/profile/user-7.jpg') }}" class="rounded-circle img-fluid" width="50" />
                      <div class="ms-3">
                        <h4 class="card-title">Ritesh Deshmukh</h4>
                        <p class="card-subtitle mb-0">Today at 6:30 AM</p>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown">
                        <a href="javascript:void(0)" class="link" id="dropdownMenuButton" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          <i class="ti ti-dots fs-6 text-dark"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li><a class="dropdown-item" href="javascript:void(0)">Report</a></li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Turn on Post Notifications</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Copy Link</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Share to...</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Unfollow</a>
                          </li>
                          <li><a class="dropdown-item" href="javascript:void(0)">Mute</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <p class="fs-4 mt-3">
                    New Wireless headphone with 50% off...!
                  </p>
                  <div class="mt-4 text-center">
                    <a href="javascript:void(0)" class="link">
                      <div class="p-3 border rounded-1">
                        <div class="mt-n2 text-end mb-2">
                          <i class="ti ti-external-link fs-8 text-dark"></i>
                        </div>
                        <img src="{{ URL::asset('build/images/products/s4.jpg') }}" class="img-fluid" />
                      </div>
                    </a>
                  </div>
                  <div class="mt-4">
                    <h5>Sony Headphone</h5>
                    <span class="text-muted d-block fs-4">Noise One Wireless Bluetooth Headset</span>
                    <a href="javascript:void(0)"
                      class="text-info fs-4 fw-medium">https://www.flipkart.com/search?q=headphone&otracker=search&otracker1=search&marketplace=FLIPKART&as-show=on&as=off</a>
                  </div>
                  <div class="d-flex align-items-center mt-3">
                    <a href="javascript:void(0)" class="me-3">
                      <i class="ti ti-heart text-dark fs-7"></i>
                    </a>
                    <a href="javascript:void(0)" class="me-3">
                      <i class="ti ti-message-circle text-dark fs-7"></i>
                    </a>
                    <a href="javascript:void(0)" class="me-2">
                      <i class="ti ti-send text-dark fs-7"></i>
                    </a>
                    <div class="ms-auto">
                      <a href="javascript:void(0)">
                        <i class="ti ti-bookmark text-dark fs-7"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" class="rounded-circle img-fluid" width="50" />
                      <div class="ms-3">
                        <h4 class="card-title">Maria Hernandez</h4>
                        <p class="card-subtitle mb-0">
                          Angular, Reactjs, Vuejs
                        </p>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted fs-4 mt-4">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco.
                  </p>
                  <div class="d-flex align-items-center pb-3 border-bottom">
                    <a href="javascript:void(0)" class="
                        me-3
                        d-flex
                        align-items-center
                        link
                        fw-medium
                      ">
                      <i class="ti ti-heart text-danger fs-7"></i>
                      <span class="ms-1 text-dark">45</span>
                    </a>
                    <a href="javascript:void(0)" class="
                        me-3
                        d-flex
                        align-items-center
                        link
                        fw-medium
                      ">
                      <i class="ti ti-message-circle text-dark fs-7"></i>
                      <span class="ms-1 text-dark">12</span>
                    </a>
                  </div>
                  <div class="form-floating my-3">
                    <input type="text" class="form-control form-input-bg" id="floatingInput1"
                      placeholder="name@example.com" />
                    <label for="floatingInput1">Reply</label>
                  </div>
                  <div class="text-end">
                    <button type="button" class="btn btn-primary">Reply</button>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                      <img src="{{ URL::asset('build/images/profile/user-6.jpg') }}" class="rounded-circle img-fluid" width="50" />
                      <div class="ms-3">
                        <h4 class="card-title">Ritesh Deshmukh</h4>
                        <p class="card-subtitle mb-0">Today at 6:30 AM</p>
                      </div>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown">
                        <a href="javascript:void(0)" class="link" id="dropdownMenuButton" data-bs-toggle="dropdown"
                          aria-expanded="false">
                          <i class="ti ti-dots fs-6 text-dark"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <li><a class="dropdown-item" href="javascript:void(0)">Report</a></li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Turn on Post Notifications</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Copy Link</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Share to...</a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">Unfollow</a>
                          </li>
                          <li><a class="dropdown-item" href="javascript:void(0)">Mute</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <p class="fs-4 mt-3">
                    Shows off his favourite features of the new Polestar 2.
                    Excited!<a href="javascript:void(0)">#PolestarCars</a> <a href="javascript:void(0)">#cars</a>
                    <a href="javascript:void(0)">#india</a> <a href="javascript:void(0)">#Polestar2</a>
                  </p>
                  <div class="mt-4 text-center">
                    <a href="javascript:void(0)" class="link">
                      <div class="p-3 border rounded-1">
                        <div class="mt-n2 text-end mb-2">
                          <i class="ti ti-external-link fs-8 text-dark"></i>
                        </div>
                        <img src="{{ URL::asset('build/images/products/s1.jpg') }}" class="img-fluid" />
                      </div>
                    </a>
                  </div>
                  <div class="mt-4">
                    <h5>Polestar 2</h5>
                    <span class="text-muted d-block fs-4">5-door all-electric fastback</span>
                    <a href="javascript:void(0)" class="text-info fs-4 fw-medium">https://www.polestar.com/us/pole-star-2/</a>
                  </div>
                  <div class="d-flex align-items-center mt-3">
                    <a href="javascript:void(0)" class="me-3">
                      <i class="ti ti-heart text-dark fs-7"></i>
                    </a>
                    <a href="javascript:void(0)" class="me-3">
                      <i class="ti ti-message-circle text-dark fs-7"></i>
                    </a>
                    <a href="javascript:void(0)" class="me-2">
                      <i class="ti ti-send text-dark fs-7"></i>
                    </a>
                    <div class="ms-auto">
                      <a href="javascript:void(0)">
                        <i class="ti ti-bookmark text-dark fs-7"></i>
                      </a>
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