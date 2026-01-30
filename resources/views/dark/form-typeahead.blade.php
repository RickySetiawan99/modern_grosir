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
          @@include("partials/breadcrumb.html", {"title": "Typeahead", "subtitle": 'Home'})
          <div class="card">
            <div class="border-bottom title-part-padding">
              <h4 class="card-title mb-0">The Basics</h4>
            </div>
            <div class="card-body">
              <p class="card-subtitle mb-3">
                When initializing a <code>typeahead</code>, you pass the
                plugin method one or more datasets. The source of a dataset
                is responsible for computing a set of suggestions for a
                given query.
              </p>
              <div id="the-basics">
                <input class="typeahead form-control" type="text" placeholder="Countries" />
              </div>
            </div>
          </div>
          <div class="card">
            <div class="border-bottom title-part-padding">
              <h4 class="card-title mb-0">Bloodhound</h4>
            </div>
            <div class="card-body">
              <p class="card-subtitle mb-3">
                For more advanced use cases, rather than implementing the
                source for your dataset yourself, you can take advantage of
                <code>Bloodhound</code>, the
                <code>typeahead.js</code> suggestion engine. Bloodhound is
                stack, flexible, and offers advanced functionalities such as
                prefetching, intelligent caching, fast lookups, and
                backfilling with remote data.
              </p>
              <div id="bloodhound">
                <input class="typeahead form-control" type="text" placeholder="Countries" />
              </div>
            </div>
          </div>
          <div class="card">
            <div class="border-bottom title-part-padding">
              <h4 class="card-title mb-0">Prefetch</h4>
            </div>
            <div class="card-body">
              <p class="card-subtitle mb-3">
                Prefetched data is fetched and processed on initialization.
                If the browser supports local storage, the processed data
                will be cached there to prevent additional network requests
                on subsequent page loads.
              </p>
              <div id="prefetch">
                <input class="typeahead form-control" type="text" placeholder="Countries" />
              </div>
            </div>
          </div>
          <div class="card">
            <div class="border-bottom title-part-padding">
              <h4 class="card-title mb-0">Default Suggestion</h4>
            </div>
            <div class="card-body">
              <p class="card-subtitle mb-3">
                Default suggestions can be shown for empty queries by
                setting the <code>minLength</code> option to 0 and having
                the source return suggestions for empty queries.
              </p>
              <div id="default-suggestion">
                <input class="typeahead form-control" type="text" placeholder="Countries" />
              </div>
            </div>
          </div>
          <div class="card">
            <div class="border-bottom title-part-padding">
              <h4 class="card-title mb-0">Scrollable Dropdown Menu</h4>
            </div>
            <div class="card-body">
              <p class="card-subtitle mb-3">
                To change the height of your dropdown menu, just wrap your
                input in some <code>div</code> with
                <code>custom css</code> styles and change necessary css
                properties or change it in css directly.
              </p>
              <div id="scrollable-dropdown-menu" class="scrollable-dropdown">
                <input class="typeahead form-control" type="text" placeholder="Countries" />
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
  <script src="{{ URL::asset('build/libs/typeahead.js/dist/typeahead.jquery.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/typeahead.js/dist/bloodhound.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/forms/typeahead/typeahead.init.js') }}"></script>
</body>

</html>