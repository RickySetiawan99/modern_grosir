<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  @@include("partials/head.html")
  <title>Modernize Bootstrap Admin</title>
  <link rel="stylesheet" href="{{ URL::asset('build/libs/@claviska/jquery-minicolors/jquery.minicolors.css') }}">
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
          @@include("partials/breadcrumb.html", {"title": "Colorpicker", "subtitle": 'Home'})
          <div class="card">
            <div class="border-bottom title-part-padding">
              <h4 class="card-title mb-0">Control Types</h4>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label" for="hue-demo">Hue (default)</label>
                <input type="text" id="hue-demo" class="form-control demo" data-control="hue" value="#ff6161" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="saturation-demo">Saturation</label>
                <input type="text" id="saturation-demo" class="form-control demo" data-control="saturation"
                  value="#0088cc" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="brightness-demo">Brightness</label>
                <input type="text" id="brightness-demo" class="form-control demo" data-control="brightness"
                  value="#00ffff" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="wheel-demo">Wheel</label>
                <input type="text" id="wheel-demo" class="form-control demo" data-control="wheel" value="#ff99ee" />
              </div>
            </div>
          </div>
          <div class="card">
            <div class="border-bottom title-part-padding">
              <h4 class="card-title mb-0">Input Modes</h4>
            </div>
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label" for="text-field">Text field</label>
                <br />
                <input type="text" id="text-field" class="form-control demo" value="#70c24a" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="hidden-input">Hidden Input</label>
                <br />
                <input type="hidden" id="hidden-input" class="demo" value="#db913d" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="inline">Inline</label>
                <br />
                <input type="text" id="inline" class="form-control demo" data-inline="true" value="#4fc8db" />
              </div>
            </div>
          </div>
          <div class="card">
            <div class="border-bottom title-part-padding">
              <h4 class="card-title mb-0">Positions</h4>
            </div>
            <div class="card-body">
              <p class="card-subtitle mb-3">
                Valid positions include bottom left, bottom right, top left,
                and top right.
              </p>
              <div class="row">
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label" for="position-bottom-left">bottom left (default)</label>
                    <input type="text" id="position-bottom-left" class="form-control demo"
                      data-position="bottom left" value="#0088cc" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="position-top-left">top left</label>
                    <input type="text" id="position-top-left" class="form-control demo" data-position="top left"
                      value="#0088cc" />
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="mb-3">
                    <label class="form-label" for="position-bottom-right">bottom right</label>
                    <input type="text" id="position-bottom-right" class="form-control demo"
                      data-position="bottom right" value="#0088cc" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="position-top-right">top right</label>
                    <input type="text" id="position-top-right" class="form-control demo" data-position="top right"
                      value="#0088cc" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="border-bottom title-part-padding">
              <h4 class="card-title mb-0">RGB(A)</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="rgb">RGB</label>
                    <p class="card-subtitle mb-3">
                      RGB input can be assigned by setting the
                      <code>format</code> option to <code>rgb</code>.
                    </p>
                    <input type="text" id="rgb" class="form-control demo" data-format="rgb"
                      value="rgb(33, 147, 58)" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="rgba">RGBA</label>
                    <p class="card-subtitle mb-3">
                      RGBA input can be assigned by setting the
                      <code>format</code> option to <code>rgb</code> and
                      <code>opacity</code> option to <code>true</code>.
                    </p>
                    <input type="text" id="rgba" class="form-control demo" data-format="rgb" data-opacity=".5"
                      value="rgba(52, 64, 158, 0.5)" />
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="border-bottom title-part-padding">
              <h4 class="card-title mb-0">Different Styles</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="opacity">Opacity</label>
                    <p class="card-subtitle mb-3">
                      Opacity can be assigned by including the
                      <code>data-opacity</code> attribute or by setting the
                      <code>opacity</code> option to <code>true</code>.
                    </p>
                    <input type="text" id="opacity" class="form-control demo" data-opacity=".5" value="#766fa8" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="keywords">Keywords</label>
                    <p class="card-subtitle mb-3">
                      CSS-wide keywords can be assigned by setting the
                      <code>keywords</code> option to a comma-separated list
                      of valid keywords:
                      <code>transparent, initial, inherit</code>.
                    </p>
                    <input type="text" id="keywords" class="form-control demo"
                      data-keywords="transparent, initial, inherit" value="transparent" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="default-value">Default Value</label>
                    <p class="card-subtitle mb-3">
                      This field has a default value assigned to it, so it
                      will never be empty.
                    </p>
                    <input type="text" id="default-value" class="form-control demo" data-defaultValue="#ff6600" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="letter-case">Letter Case</label>
                    <p class="card-subtitle mb-3">
                      This field will always be uppercase.
                    </p>
                    <input type="text" id="letter-case" class="form-control demo" data-letterCase="uppercase"
                      value="#abcdef" />
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="input-group">Input Groups</label>
                    <p class="card-subtitle mb-3">
                      Example using Bootstrap's input groups.
                    </p>
                    <div class="input-group">
                      <input type="text" id="input-group" class="form-control demo" value="#ff0000" />

                      <button class="btn btn-primary" type="button">
                        Button
                      </button>

                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="more-input-group">More Input Groups</label>
                    <p class="card-subtitle mb-3">
                      Input group example with addon.
                    </p>
                    <div class="input-group mb-3">

                      <span class="input-group-text" id="basic-addon3">Color</span>

                      <input type="text" id="more-input-group" class="form-control demo" value="#ff0000" />

                      <button class="btn btn-primary " type="button">
                        Button
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="letter-case">Swatches</label>
                    <p class="card-subtitle mb-3">
                      Example with swatches.
                    </p>
                    <input type="text" id="swatches" class="form-control demo"
                      data-swatches="#ef9a9a|#90caf9|#a5d6a7|#fff59d|#ffcc80|#bcaaa4|#eeeeee|#f44336|#2196f3|#4caf50|#ffeb3b|#ff9800|#795548|#9e9e9e"
                      value="#abcdef" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label class="form-label" for="letter-case">Swatches and opacity</label>
                    <p class="card-subtitle mb-3">
                      Example with swatches and opacity.
                    </p>
                    <input type="text" id="swatches" class="form-control demo" data-format="rgb" data-opacity="1"
                      data-swatches="#fff|#000|#f00|#0f0|#00f|#ff0|rgba(0,0,255,0.5)"
                      value="rgba(14, 206, 235, .5)" />
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
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  @@include("partials/scripts.html")
  <script src="{{ URL::asset('build/libs/jquery-asColor/dist/jquery-asColor.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/jquery-asGradient/dist/jquery-asGradient.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/@claviska/jquery-minicolors/jquery.minicolors.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/plugins/colorpicker-init.js') }}"></script>
</body>

</html>