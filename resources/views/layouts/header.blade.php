<!-- ---------------------------------- -->
<!-- Start Vertical Layout Header -->
<!-- ---------------------------------- -->
<nav class="navbar navbar-expand-lg p-0">
  <ul class="navbar-nav">
    <li class="nav-item nav-icon-hover-bg rounded-circle ms-n2">
      <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="nav-item nav-icon-hover-bg rounded-circle d-none d-lg-flex">
      <a class="nav-link" href="javascript:void(0)" data-bs-toggle="modal"
        data-bs-target="#exampleModal">
        <i class="ti ti-search"></i>
      </a>
    </li>
  </ul>

  <ul class="navbar-nav quick-links d-none d-lg-flex align-items-center">
    <!-- ------------------------------- -->
    <!-- start apps Dropdown -->
    <!-- ------------------------------- -->
    <li class="nav-item nav-icon-hover-bg rounded w-auto dropdown d-none d-lg-block mx-0">
      <div class="hover-dd">
        <a class="nav-link" href="javascript:void(0)">
          Apps<span class="mt-1"><i class="ti ti-chevron-down fs-3"></i></span>
        </a>
        <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
          <x-headers.dd-apps/>
        </div>
      </div>
    </li>
    <!-- ------------------------------- -->
    <!-- end apps Dropdown -->
    <!-- ------------------------------- -->
    <li class="nav-item dropdown-hover d-none d-lg-block">
      <a class="nav-link" href="main/app-chat">Chat</a>
    </li>
    <li class="nav-item dropdown-hover d-none d-lg-block">
      <a class="nav-link" href="main/app-calendar">Calendar</a>
    </li>
    <li class="nav-item dropdown-hover d-none d-lg-block">
      <a class="nav-link" href="main/app-email">Email</a>
    </li>
  </ul>

  <div class="d-block d-lg-none py-4">
    <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
      <img src="{{ URL::asset('images/logos/logo-dark.svg') }}" class="dark-logo" alt="Logo-Dark" height="35" />
      <img src="{{ URL::asset('images/logos/logo-light.svg') }}" class="light-logo" alt="Logo-Light" height="35" />
    </a>
  </div>
  <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse"
    data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <i class="ti ti-dots fs-7"></i>
  </a>
  <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
    <div class="d-flex align-items-center justify-content-between">
      <a href="javascript:void(0)" class="nav-link nav-icon-hover-bg rounded-circle mx-0 ms-n1 d-flex d-lg-none align-items-center justify-content-center"
        type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar"
        aria-controls="offcanvasWithBothOptions">
        <i class="ti ti-align-justified fs-7"></i>
      </a>
      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
        <!-- ------------------------------- -->
        <!-- start language Dropdown -->
        <!-- ------------------------------- -->
        <li class="nav-item nav-icon-hover-bg rounded-circle">
          <a class="nav-link moon dark-layout" href="javascript:void(0)">
            <i class="ti ti-moon moon"></i>
          </a>
          <a class="nav-link sun light-layout" href="javascript:void(0)">
            <i class="ti ti-sun sun"></i>
          </a>
        </li>
        <li class="nav-item nav-icon-hover-bg rounded-circle dropdown">
          <a class="nav-link" href="javascript:void(0)" id="drop2"
            aria-expanded="false">
            <img src="{{ URL::asset('build/images/svgs/icon-flag-en.svg') }}" alt="modernize-img" width="20px" height="20px"
              class="rounded-circle object-fit-cover round-20" />
          </a>
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
            <div class="message-body">
              <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                <div class="position-relative">
                  <img src="{{ URL::asset('build/images/svgs/icon-flag-en.svg') }}" alt="modernize-img" width="20px" height="20px"
                    class="rounded-circle object-fit-cover round-20" />
                </div>
                <p class="mb-0 fs-3">English (UK)</p>
              </a>
              <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                <div class="position-relative">
                  <img src="{{ URL::asset('build/images/svgs/icon-flag-cn.svg') }}" alt="modernize-img" width="20px" height="20px"
                    class="rounded-circle object-fit-cover round-20" />
                </div>
                <p class="mb-0 fs-3">中国人 (Chinese)</p>
              </a>
              <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                <div class="position-relative">
                  <img src="{{ URL::asset('build/images/svgs/icon-flag-fr.svg') }}" alt="modernize-img" width="20px" height="20px"
                    class="rounded-circle object-fit-cover round-20" />
                </div>
                <p class="mb-0 fs-3">français (French)</p>
              </a>
              <a href="javascript:void(0)" class="d-flex align-items-center gap-2 py-3 px-4 dropdown-item">
                <div class="position-relative">
                  <img src="{{ URL::asset('build/images/svgs/icon-flag-sa.svg') }}" alt="modernize-img" width="20px" height="20px"
                    class="rounded-circle object-fit-cover round-20" />
                </div>
                <p class="mb-0 fs-3">عربي (Arabic)</p>
              </a>
            </div>
          </div>
        </li>
        <!-- ------------------------------- -->
        <!-- end language Dropdown -->
        <!-- ------------------------------- -->

        <!-- ------------------------------- -->
        <!-- start shopping cart Dropdown -->
        <!-- ------------------------------- -->
        <li class="nav-item nav-icon-hover-bg rounded-circle">
          <a class="nav-link position-relative" href="javascript:void(0)" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
            <i class="ti ti-basket"></i>
            <span class="popup-badge rounded-pill bg-danger text-white fs-2">2</span>
          </a>
        </li>
        <!-- ------------------------------- -->
        <!-- end shopping cart Dropdown -->
        <!-- ------------------------------- -->

        <!-- ------------------------------- -->
        <!-- start notification Dropdown -->
        <!-- ------------------------------- -->
        <li class="nav-item nav-icon-hover-bg rounded-circle dropdown">
          <a class="nav-link position-relative" href="javascript:void(0)" id="drop2"
            aria-expanded="false">
            <i class="ti ti-bell-ringing"></i>
            <div class="notification bg-primary rounded-circle"></div>
          </a>
          <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
            <x-headers.dd-notification/>
          </div>
        </li>
        <!-- ------------------------------- -->
        <!-- end notification Dropdown -->
        <!-- ------------------------------- -->

        <!-- ------------------------------- -->
        <!-- start profile Dropdown -->
        <!-- ------------------------------- -->
        <li class="nav-item dropdown">
          <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
            <div class="d-flex align-items-center">
              <div class="user-profile-img">
                <img src="{{ Auth::user()->avatar ? asset(Auth::user()->avatar) : URL::asset('build/images/profile/user-1.jpg') }}" class="rounded-circle" width="35" height="35"
                  alt="modernize-img" style="object-fit: cover;" />
              </div>
            </div>
          </a>
          <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
            <x-headers.dd-profile/>
          </div>
        </li>
        <!-- ------------------------------- -->
        <!-- end profile Dropdown -->
        <!-- ------------------------------- -->
      </ul>
    </div>
  </div>
</nav>
<!-- ---------------------------------- -->
<!-- End Vertical Layout Header -->
<!-- ---------------------------------- -->

<!-- ------------------------------- -->
<!-- apps Dropdown in Small screen -->
<!-- ------------------------------- -->
<x-headers.dd-apps-mobile/>