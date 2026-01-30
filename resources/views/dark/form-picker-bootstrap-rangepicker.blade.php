<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  @@include("partials/head.html")
  <title>Modernize Bootstrap Admin</title>
  <link rel="stylesheet" href="{{ URL::asset('build/libs/daterangepicker/daterangepicker.css') }}">
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
          @@include("partials/breadcrumb.html", {"title": "Bootstrap-Rangepicker", "subtitle": 'Home'})
          <div class="card">
            <div class="card-body">
              <!-- Default Daterange Picker -->
              <h4 class="card-title">Default Daterange Picker</h4>
              <p class="card-subtitle mb-3">
                This rangepicker is used for when you want to choose start
                date to end date.
              </p>
              <div class="input-group mb-3">
                <input type="text" class="form-control daterange" />

                <span class="input-group-text">
                  <i class="ti ti-calendar fs-5"></i>
                </span>
              </div>
              <!-- Date And Time -->
              <h4 class="card-title mt-4">Date and Time</h4>
              <p class="card-subtitle mb-3">
                This picker is used for when you want to choose start date
                to end date with particuler time for both start date and end
                date.
              </p>
              <div class="input-group mb-3">
                <input type="text" class="form-control datetime" />

                <span class="input-group-text">
                  <i class="ti ti-calendar fs-5"></i>
                </span>
              </div>
              <!-- 24 hour Time Picker with Seconds -->
              <h4 class="card-title mt-4">Seconds with 24 hour Time</h4>
              <p class="card-subtitle mb-3">
                This picker is used for when you want to choose start date
                to end date with particuler time for both start date and end
                date and to choose specific second from 24 hours.
              </p>
              <div class="input-group mb-3">
                <input type="text" class="form-control timeseconds" />

                <span class="input-group-text">
                  <i class="ti ti-calendar fs-5"></i>
                </span>
              </div>
              <!-- Separate Date Picker -->
              <h4 class="card-title mt-4">Separate Date Picker</h4>
              <p class="card-subtitle mb-3">
                In this picker, there is separate dropdown for select
                direct month and also select year so you can easily move to
                particuler date.
              </p>
              <div class="input-group mb-3">
                <input type="text" class="form-control singledate" />

                <span class="input-group-text">
                  <i class="ti ti-calendar fs-5"></i>
                </span>
              </div>
              <!-- Auto Apply Date Range -->
              <h4 class="card-title mt-4">Auto Apply Date Range</h4>
              <p class="card-subtitle mb-3">
                In this picker,automatically apply a new date range as soon
                as two dates or a predefined range is selected.
              </p>
              <div class="input-group mb-3">
                <input type="text" class="form-control autoapply" />

                <span class="input-group-text">
                  <i class="ti ti-calendar fs-5"></i>
                </span>
              </div>
              <!-- Not Connected Calendars -->
              <h4 class="card-title mt-4">Not Connected Calenders</h4>
              <p class="card-subtitle mb-3">
                In this picker,both calender are not linked with each
                other.When both calender will disabled, the two calendars
                can be individually advanced and display any month/year.
              </p>
              <div class="input-group mb-3">
                <input type="text" class="form-control linkedCalendars" />

                <span class="input-group-text">
                  <i class="ti ti-calendar fs-5"></i>
                </span>
              </div>
              <!-- Date Limitation -->
              <h4 class="card-title mt-4">Limit on Date</h4>
              <p class="card-subtitle mb-3">
                In this picker,maximum timespan between deadline dates.
              </p>
              <div class="input-group mb-3">
                <input type="text" class="form-control dateLimit" />

                <span class="input-group-text">
                  <i class="ti ti-calendar fs-5"></i>
                </span>
              </div>
              <!-- With Dropdown -->
              <h4 class="card-title mt-4">With Dropdown</h4>
              <p class="card-subtitle mb-3">
                In this picker,there is separate dropdown for select direct
                month and also select year so you can easily move to
                particuler date.
              </p>
              <div class="input-group mb-3">
                <input type="text" class="form-control showdropdowns" />

                <span class="input-group-text">
                  <i class="ti ti-calendar fs-5"></i>
                </span>
              </div>
              <!-- With Week Numbers -->
              <h4 class="card-title mt-4">With Week Numbers</h4>
              <p class="card-subtitle mb-3">
                In this picker,there is separate week numbers from start
                date to end date.
              </p>
              <div class="input-group mb-3">
                <input type="text" class="form-control showweeknumbers" />

                <span class="input-group-text">
                  <i class="ti ti-calendar fs-5"></i>
                </span>
              </div>
              <!-- Predefined Ranges -->
              <h4 class="card-title mt-4">Predefined Ranges</h4>
              <p class="card-subtitle mb-3">
                In this picker,there is separate options like select
                today's date,last 7 days,last 30 days, this month, last
                month and custom range select as per your requirement.
              </p>
              <div class="input-group mb-3">
                <input type="text" class="form-control dateranges" />

                <span class="input-group-text">
                  <i class="ti ti-calendar fs-5"></i>
                </span>
              </div>
              <!-- With All Show Calendar -->
              <h4 class="card-title mt-4">With All Show Calendar</h4>
              <p class="card-subtitle mb-3">
                In this picker,with all above options which are mention in
                predefined ranges- show the calendar.
              </p>
              <div class="input-group mb-3">
                <input type="text" class="form-control shawCalRanges" />

                <span class="input-group-text">
                  <i class="ti ti-calendar fs-5"></i>
                </span>
              </div>
              <!-- Language Localization -->
              <h4 class="card-title mt-4">Language Localization</h4>
              <p class="card-subtitle mb-3">
                In this picker, change the language of the calendar.
              </p>
              <div class="input-group mb-3">
                <input type="text" class="form-control localeRange" />

                <span class="input-group-text">
                  <i class="ti ti-calendar fs-5"></i>
                </span>
              </div>
              <!-- Open Picker on top -->
              <h4 class="card-title mt-4">Open Picker on top</h4>
              <p class="card-subtitle mb-3">
                In this picker,calendar will open on top of the
                form-control.
              </p>
              <div class="input-group mb-3">
                <input type="text" class="form-control drops" />

                <span class="input-group-text">
                  <i class="ti ti-calendar fs-5"></i>
                </span>
              </div>
              <!-- Custom Button Options -->
              <h4 class="card-title mt-4">Custom Button Options</h4>
              <p class="card-subtitle mb-3">
                In this picker,you can add your button options or style.
              </p>
              <div class="input-group mb-3">
                <input type="text" class="form-control buttonClass" />

                <span class="input-group-text">
                  <i class="ti ti-calendar fs-5"></i>
                </span>
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
  <script src="{{ URL::asset('build/js/extra-libs/moment/moment.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ URL::asset('build/js/forms/daterangepicker-init.js') }}"></script>
</body>

</html>