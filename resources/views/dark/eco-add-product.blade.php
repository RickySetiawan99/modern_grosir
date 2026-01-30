<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  @@include("partials/head.html")
  <title>Modernize Bootstrap Admin</title>

  <link rel="stylesheet" href="{{ URL::asset('build/libs/quill/dist/quill.snow.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('build/libs/dropzone/dist/min/dropzone.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('build/libs/select2/dist/css/select2.min.css') }}">
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
          @@include("partials/breadcrumb.html", {"title": "Add Product", "subtitle": 'Home'})
          <div class="row">
            <div class="col-lg-8 ">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center mb-7">
                    <h4 class="card-title">General</h4>

                    <button class="navbar-toggler border-0 shadow-none d-md-none" type="button"
                      data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                      <i class="ti ti-menu fs-5 d-flex"></i>
                    </button>
                  </div>
                  <form action="" class="form-horizontal">
                    <div class="mb-4">
                      <label class="form-label">Product Name <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" value="Product Name">
                      <p class="fs-2">A product name is required and recommended to be unique.</p>
                    </div>
                    <div>
                      <label class="form-label">Description</label>
                      <div id="editor">
                      </div>
                      <p class="fs-2 mb-0">Set a description to the product for better visibility.</p>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-7">Media</h4>

                  <form action="#" class="dropzone dz-clickable mb-2">
                    <div class="dz-default dz-message"><button class="dz-button" type="button">Drop files here
                        to upload</button></div>
                  </form>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-7">Variation</h4>

                  <form action="">
                    <label class="form-label">Add Product Variations</label>
                    <div class="email-repeater mb-3">
                      <div data-repeater-list="repeater-group">
                        <div data-repeater-item class="row mb-3">
                          <div class="col-md-4">
                            <select class="select2 form-control">
                              <option>Color</option>
                              <option selected>Size</option>
                              <option>Material</option>
                              <option>Style</option>
                            </select>
                          </div>
                          <div class="col-md-4 mt-3 mt-md-0">
                            <input type="text" class="form-control" placeholder="Variation" />
                          </div>
                          <div class="col-md-2 mt-3 mt-md-0">
                            <button data-repeater-delete="" class="btn bg-danger-subtle text-danger" type="button">
                              <i class="ti ti-x fs-5 d-flex"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                      <button type="button" data-repeater-create=""
                        class="btn bg-primary-subtle text-primary ">
                        <span class="fs-4 me-1">+</span>
                        Add another variation
                      </button>
                    </div>
                  </form>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-7">Pricing</h4>

                  <form>
                    <div class="mb-7">
                      <label class="form-label">Base Price <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" value="Product Price">
                      <p class="fs-2">Set the product price.</p>
                    </div>
                    <div class="mb-7">
                      <label class="form-label">Discount Type</label>
                      <nav>
                        <div class="nav nav-tabs justify-content-between align-items-center gap-9" id="nav-tab"
                          role="tablist">
                          <label for="radio1"
                            class="form-check-label form-check p-3  border gap-2 rounded-2 d-flex flex-fill justify-content-center cursor-pointer"
                            id="customControlValidation2" id="nav-home-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-home" aria-controls="nav-home">
                            <input type="radio" class="form-check-input" name="new-products" id="radio1" checked>
                            <span class="fs-4 text-dark">No Discount</span>
                          </label>
                          <label for="radio2"
                            class="form-check-label p-3 form-check border gap-2 rounded-2 d-flex flex-fill justify-content-center cursor-pointer"
                            id="customControlValidation2" id="nav-profile-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-profile" aria-controls="nav-profile">
                            <input type="radio" class="form-check-input" name="new-products" id="radio2">
                            <span class="fs-4 text-dark">Percentage %</span>
                          </label>
                          <label for="radio3"
                            class="form-check-label form-check p-3 border gap-2 rounded-2 d-flex flex-fill justify-content-center cursor-pointer"
                            id="customControlValidation2" id="nav-contact-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-contact" aria-controls="nav-contact">
                            <input type="radio" class="form-check-input" name="new-products" id="radio3">
                            <span class="fs-4 text-dark">Fixed Price</span>
                          </label>
                        </div>
                      </nav>
                      <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade mt-7" id="nav-profile" role="tabpanel"
                          aria-labelledby="nav-profile-tab" tabindex="0">
                          <form class="mt-3">
                            <div class="form-group">
                              <label class="form-label">Set Discount Percentage <span
                                  class="text-danger">*</span></label>
                              <input type="range" class="form-range" id="customRange1" min="0" max="100" step="10">
                              <p class="fs-2">Set a percentage discount to be applied on this product.</p>
                            </div>
                          </form>
                        </div>
                        <div class="tab-pane fade mt-7" id="nav-contact" role="tabpanel"
                          aria-labelledby="nav-contact-tab" tabindex="0">
                          <div class="mb-7">
                            <label class="form-label">Fixed Discounted Price <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Discounted Price">
                            <p class="fs-2">Set the discounted product price. The product will be reduced at the
                              determined fixed price.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-4">
                          <label class="form-label">
                            Tax Class <span class="text-danger">*</span></label>
                          <select class="form-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected="">Select an option</option>
                            <option value="1">Tax Free</option>
                            <option value="2">Taxable Goods</option>
                            <option value="3">Downloadable Products</option>
                          </select>
                          <p class="fs-2">Set the product tax class.</p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-4">
                          <label class="form-label">VAT Amount (%) <span class="text-danger">*</span></label>
                          <input type="text" class="form-control" value="">
                          <p class="fs-2">Set the product VAT about.</p>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="form-actions mb-5">
                <button type="submit" class="btn btn-primary">
                  Save changes
                </button>
                <button type="button" class="btn bg-danger-subtle text-danger ms-6">
                  Cancel
                </button>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="offcanvas-md offcanvas-end overflow-auto" tabindex="-1" id="offcanvasRight"
                aria-labelledby="offcanvasRightLabel">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title mb-7">Thumbnail</h4>
                    <form action="#" class="dropzone dz-clickable mb-2">
                      <div class="dz-default dz-message"><button class="dz-button" type="button">Drop Thumbnail here
                          to upload</button></div>
                    </form>
                    <p class="fs-2 text-center mb-0">
                      Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted.
                    </p>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                      <h4 class="card-title">Status</h4>
                      <div class="p-2 h-100 bg-success rounded-circle"></div>
                    </div>
                    <form action="" class="form-horizontal">
                      <div>
                        <select class="form-select mr-sm-2  mb-2" id="inlineFormCustomSelect">
                          <option selected="">Published</option>
                          <option value="1">Draft</option>
                          <option value="2">Sheduled</option>
                          <option value="3">Inactive</option>
                        </select>
                        <p class="fs-2 mb-0">
                          Set the product status.
                        </p>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title mb-7">Product Details</h4>
                    <div class="mb-3">
                      <label class="form-label">Categories</label>
                      <select class="select2 form-control" multiple="multiple">
                        <option value="">Computer</option>
                        <option value="">Watches</option>
                        <option value="">Headphones</option>
                        <option value="">Beauty</option>
                        <option value="">Fashion</option>
                        <option value="">Footwear</option>
                      </select>
                      <p class="fs-2 mb-0">
                        Add product to a category.
                      </p>
                    </div>
                    <button type="button" class="btn bg-primary-subtle text-primary ">
                      <span class="fs-4 me-1">+</span>
                      Create New Category
                    </button>
                    <div class="mt-7">
                      <label class="form-label">Tags</label>
                      <select class="select2 form-control" multiple="multiple">
                        <option value="">New</option>
                        <option value="">trending</option>
                        <option value="">Headphones</option>
                        <option value="">Beauty</option>
                        <option value="">Fashion</option>
                        <option value="">Footwear</option>
                      </select>
                      <p class="fs-2 mb-0">
                        Add product to a category.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title mb-7">Product Template</h4>
                    <form action="" class="form-horizontal">
                      <div>
                        <label class="form-label text-nowrap">Select a product template</label>
                        <select class="form-select mr-sm-2  mb-2" id="inlineFormCustomSelect">
                          <option selected="">Default Template</option>
                          <option value="1">Fashion</option>
                          <option value="2">Office Stationary</option>
                          <option value="3">Electronics</option>
                        </select>
                        <p class="fs-2 mb-0">
                          Assign a template from your current theme to define how a single product is displayed.
                        </p>
                      </div>
                    </form>
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
  <script src="{{ URL::asset('build/libs/quill/dist/quill.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/forms/quill-init.js') }}"></script>
  <script src="{{ URL::asset('build/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/select2/dist/js/select2.full.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/select2/dist/js/select2.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/forms/select2.init.js') }}"></script>
  <script src="{{ URL::asset('build/libs/jquery.repeater/jquery.repeater.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/forms/repeater-init.js') }}"></script>
</body>

</html>