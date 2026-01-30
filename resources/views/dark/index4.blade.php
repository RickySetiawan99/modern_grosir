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
          <div class="row">
            <div class="col-sm-6 col-xl-3">
              <div class="card bg-primary-subtle shadow-none">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center">
                    <div class="round rounded text-bg-primary d-flex align-items-center justify-content-center">
                      <i class="cc BTC text-white fs-7" title="BTC"></i>
                    </div>
                    <h6 class="mb-0 ms-3">BTC</h6>
                    <div class="ms-auto text-primary d-flex align-items-center">
                      <i class="ti ti-trending-up text-primary fs-6 me-1"></i>
                      <span class="fs-2 fw-bold">+ 2.30%</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-4">
                    <h3 class="mb-0 fw-semibold fs-7">0.1245</h3>
                    <span class="fw-bold">$1,015.00</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card bg-danger-subtle shadow-none">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center">
                    <div class="round rounded text-bg-danger d-flex align-items-center justify-content-center">
                      <i class="cc ETH text-white fs-7" title="ETH"></i>
                    </div>
                    <h6 class="mb-0 ms-3">ETH</h6>
                    <div class="ms-auto text-danger d-flex align-items-center">
                      <i class="ti ti-trending-up text-danger fs-6 me-1"></i>
                      <span class="fs-2 fw-bold">+ 3.20%</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-4">
                    <h3 class="mb-0 fw-semibold fs-7">0.5620</h3>
                    <span class="fw-bold">$2,110.00</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card bg-success-subtle shadow-none">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center">
                    <div class="round rounded text-bg-success d-flex align-items-center justify-content-center">
                      <i class="cc LTC text-white fs-7" title="LTC"></i>
                    </div>
                    <h6 class="mb-0 ms-3">LTC</h6>
                    <div class="ms-auto text-info d-flex align-items-center">
                      <i class="ti ti-trending-down text-success fs-6 me-1"></i>
                      <span class="fs-2 fw-bold text-success">+ 3.20%</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-4">
                    <h3 class="mb-0 fw-semibold fs-7">1.200</h3>
                    <span class="fw-bold">$1,100.00</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-xl-3">
              <div class="card bg-warning-subtle shadow-none">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center">
                    <div class="round rounded text-bg-warning d-flex align-items-center justify-content-center">
                      <i class="cc XRP text-white fs-7" title="XRP"></i>
                    </div>
                    <h6 class="mb-0 ms-3">XRP</h6>
                    <div class="ms-auto text-info d-flex align-items-center">
                      <i class="ti ti-trending-down text-warning fs-6 me-1"></i>
                      <span class="fs-2 fw-bold text-warning">+ 2.20%</span>
                    </div>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-4">
                    <h3 class="mb-0 fw-semibold fs-7">1.150</h3>
                    <span class="fw-bold">$2,150.00</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-9">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title fw-semibold">Featured BTCs</h4>
                  <p class="card-subtitle">The Top BTCs for New Investors</p>
                  <div class="row mt-4">
                    <div class="col-md-4">
                      <div class="card overflow-hidden shadow-none border card-hover mb-4 mb-md-0">
                        <img src="{{ URL::asset('build/images/crypto/c1.jpg') }}" alt="img" />
                        <div class="card-body p-4">
                          <div class="d-flex align-items-center justify-content-between">
                            <div>
                              <h6 class="mb-0 fs-5 fw-semibold">Els Idunn</h6>
                              <span>els@email</span>
                            </div>
                            <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" alt="user1" width="35"
                              class="rounded-circle" />
                          </div>
                          <div class="d-flex align-items-start justify-content-between mt-3">
                            <span>Price</span>
                            <div class="text-end">
                              <h5 class="mb-0 fs-5 fw-semibold">
                                <i class="cc BTC" title="BTC"></i> 0.25 BTC
                              </h5>
                              <span class="fs-3">$21,23,000</span>
                            </div>
                          </div>
                          <div class="d-flex align-items-start justify-content-between mt-3">
                            <span>
                              <i class="ti ti-clock-hour-4 me-1 fs-4"></i>5d 16h </span>
                            <span>
                              <i class="ti ti-eye fs-4 me-1"></i>2.5k </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card overflow-hidden shadow-none border card-hover mb-4 mb-md-0">
                        <img src="{{ URL::asset('build/images/crypto/c2.jpg') }}" alt="img" />
                        <div class="card-body p-4">
                          <div class="d-flex align-items-center justify-content-between">
                            <div>
                              <h6 class="mb-0 fs-5 fw-semibold">Liam William</h6>
                              <span>lian@email</span>
                            </div>
                            <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" alt="user1" width="35"
                              class="rounded-circle" />
                          </div>
                          <div class="d-flex align-items-start justify-content-between mt-3">
                            <span>Price</span>
                            <div class="text-end">
                              <h5 class="mb-0 fs-5 fw-semibold">
                                <i class="cc ETH" title="ETH"></i> 1.42 ETH
                              </h5>
                              <span class="fs-3">$15,000</span>
                            </div>
                          </div>
                          <div class="d-flex align-items-start justify-content-between mt-3">
                            <span>
                              <i class="ti ti-clock-hour-4 me-1 fs-4"></i>3d 1h </span>
                            <span>
                              <i class="ti ti-eye fs-4 me-1"></i>1.2k </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="card overflow-hidden shadow-none border card-hover mb-4 mb-md-0">
                        <img src="{{ URL::asset('build/images/crypto/c3.jpg') }}" alt="img" />
                        <div class="card-body p-4">
                          <div class="d-flex align-items-center justify-content-between">
                            <div>
                              <h6 class="mb-0 fs-5 fw-semibold">John Smith</h6>
                              <span>john@email</span>
                            </div>
                            <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" alt="user1" width="35"
                              class="rounded-circle" />
                          </div>
                          <div class="d-flex align-items-start justify-content-between mt-3">
                            <span>Price</span>
                            <div class="text-end">
                              <h5 class="mb-0 fs-5 fw-semibold">
                                <i class="cc XRP" title="XRP"></i> 0.25 XRP
                              </h5>
                              <span class="fs-3">$61,25,000</span>
                            </div>
                          </div>
                          <div class="d-flex align-items-start justify-content-between mt-3">
                            <span>
                              <i class="ti ti-clock-hour-4 me-1 fs-4"></i>2d 11h </span>
                            <span>
                              <i class="ti ti-eye fs-4 me-1"></i>5.3k </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body pb-2">
                  <div class="d-md-flex align-items-center gap-3 justify-content-between mb-3">
                    <div>
                      <h4 class="card-title fw-semibold">Your Investments</h4>
                      <p class="card-subtitle">What Are the Risks of Investing?</p>
                    </div>
                    <div class="d-flex align-items-center gap-3 mt-4 mt-md-0">
                      <div class="dropdown">
                        <button class="btn bg-primary-subtle dropdown-toggle" type="button" id="invest1"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="cc BTC me-1" title="BTC"></i> BTC </button>
                        <ul class="dropdown-menu" aria-labelledby="invest1">
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">
                              <i class="cc ETH me-1" title="ETH"></i> ETH </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">
                              <i class="cc LTC me-1" title="LTC"></i> LTC </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">
                              <i class="cc XRP me-1" title="XRP"></i> XRP </a>
                          </li>
                        </ul>
                      </div>
                      <span
                        class="round bg-primary flex-shrink-0 rounded-circle text-white d-flex align-items-center justify-content-center">
                        <i class="ti ti-repeat fs-6"></i>
                      </span>
                      <div class="dropdown">
                        <button class="btn bg-danger-subtle dropdown-toggle" type="button" id="invest2"
                          data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="cc ETH me-1" title="ETH"></i> ETH </button>
                        <ul class="dropdown-menu" aria-labelledby="invest2">
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">
                              <i class="cc BTC me-1" title="BTC"></i> BTC </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">
                              <i class="cc ETH me-1" title="ETH"></i> ETH </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">
                              <i class="cc LTC me-1" title="LTC"></i> LTC </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div id="investments" class="mx-n8"></div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 mt-4 mt-md-0">
              <div class="card">
                <div class="card-body p-4">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link rounded active" data-bs-toggle="tab" href="#home" role="tab">
                        <span>Buy</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link rounded" data-bs-toggle="tab" href="#profile" role="tab">
                        <span>Sell</span>
                      </a>
                    </li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content mt-4">
                    <div class="tab-pane active" id="home" role="tabpanel">
                      <form>
                        <span class="d-block mb-1">Amount</span>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control  border-end-0"
                            aria-label="Text input with dropdown button" value="0.20125" />
                          <button class="btn btn-sm arrow-none p-0 border-top border-bottom border-end border-0"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="bg-danger-subtle text-danger p-6 rounded">
                              <span> USD </span>
                              <i class="ti ti-chevron-down ms-1 fs-4"></i>
                            </span>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">INR</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">CLP</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">AMD</a>
                            </li>
                          </ul>
                        </div>
                        <span class="d-block mb-1">Amount</span>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control  border-end-0"
                            aria-label="Text input with dropdown button" value="0.20125" />
                          <button class="btn btn-sm arrow-none p-0 border-top border-bottom border-end border-0"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="bg-primary-subtle text-primary p-6 rounded">
                              <span> BTC </span>
                              <i class="ti ti-chevron-down ms-1 fs-4"></i>
                            </span>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">LTC</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">XRP</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">ETH</a>
                            </li>
                          </ul>
                        </div>
                        <button class="btn btn-primary w-100">Buy BTC</button>
                      </form>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel">
                      <form>
                        <span class="d-block mb-1">Amount</span>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control  border-end-0"
                            aria-label="Text input with dropdown button" value="0.20125" />
                          <button class="btn btn-sm arrow-none p-0 border-top border-bottom border-end border-0"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="bg-danger-subtle text-danger p-6 rounded">
                              <span> USD </span>
                              <i class="ti ti-chevron-down ms-1 fs-4"></i>
                            </span>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">INR</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">CLP</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">AMD</a>
                            </li>
                          </ul>
                        </div>
                        <span class="d-block mb-1">Amount</span>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control  border-end-0"
                            aria-label="Text input with dropdown button" value="0.20125" />
                          <button class="btn btn-sm arrow-none p-0 border-top border-bottom border-end border-0"
                            type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="bg-primary-subtle text-primary p-6 rounded">
                              <span> BTC </span>
                              <i class="ti ti-chevron-down ms-1 fs-4"></i>
                            </span>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">LTC</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">XRP</a>
                            </li>
                            <li>
                              <a class="dropdown-item" href="javascript:void(0)">ETH</a>
                            </li>
                          </ul>
                        </div>
                        <button class="btn btn-danger w-100">Sell BTC</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body p-4">
                  <div class="mb-9">
                    <h4 class="card-title fw-semibold">Converter</h4>
                    <p class="card-subtitle">The Future of Quick Transfers</p>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control  border-end-0" aria-label="Text input with dropdown button"
                      value="$1000" />
                    <button class="btn arrow-none p-0 border-top border-bottom border-end border-0" type="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="bg-primary-subtle text-primary p-6 rounded">
                        <span> USD </span>
                        <i class="ti ti-chevron-down ms-1 fs-4"></i>
                      </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="dropdown-item" href="javascript:void(0)">Action</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                      </li>
                      <li>
                        <hr class="dropdown-divider" />
                      </li>
                      <li>
                        <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                      </li>
                    </ul>
                  </div>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control  border-end-0" aria-label="Text input with dropdown button"
                      value="0.20125" />
                    <button class="btn arrow-none p-0 border-top border-bottom border-end border-0" type="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      <span class="bg-danger-subtle text-danger p-6 rounded">
                        <span> ETH </span>
                        <i class="ti ti-chevron-down ms-1 fs-4"></i>
                      </span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="dropdown-item" href="javascript:void(0)">Action</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                      </li>
                      <li>
                        <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                      </li>
                      <li>
                        <hr class="dropdown-divider" />
                      </li>
                      <li>
                        <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                      </li>
                    </ul>
                  </div>
                  <button class="btn btn-primary w-100">Convert</button>
                </div>
              </div>
              <div class="card">
                <div class="card-body p-4">
                  <h4 class="card-title fw-semibold">Quick Transfer</h4>
                  <p class="card-subtitle">The History of Converters</p>
                  <div class="d-flex align-items-center gap-2 mt-4 mb-3">
                    <a href="javascript:void(0)">
                      <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" class="rounded-circle" alt="t1"
                        width="40" />
                    </a>
                    <a href="javascript:void(0)">
                      <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" alt="t2"
                        width="40" />
                    </a>
                    <a href="javascript:void(0)">
                      <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" class="rounded-circle" alt="t3"
                        width="40" />
                    </a>
                    <a href="javascript:void(0)">
                      <div
                        class="round-40 rounded-circle bg-primary-subtle text-primary d-flex align-items-center justify-content-center">
                        <i class="ti ti-plus fs-4"></i>
                      </div>
                    </a>
                  </div>
                  <span class="d-block mb-1">To</span>
                  <div class="mb-3">
                    <span
                      class="badge px-2 d-inline-flex align-items-center bg-primary-subtle text-primary rounded-pill fs-3">
                      <img src="{{ URL::asset('build/images/profile/user-1.jpg') }}" class="rounded-circle me-1" alt="user1"
                        width="30" /> John </span>
                  </div>
                  <span class="d-block mb-1">Amount</span>
                  <div class="input-group rounded">
                    <input type="text" class="form-control  border-end-0" aria-label="Text input with dropdown button"
                      value="$1000" />
                    <button class="btn p-0 border-top border-bottom border-end border-0" type="button">
                      <span class=" btn btn-primary m-1 rounded"> Transfer <i class="ti ti-arrow-right fs-4"></i>
                      </span>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title fw-semibold">Trade History</h4>
                  <p class="card-subtitle">Trade and the Age of Exploration</p>
                  <div class="table-responsive mt-4">
                    <table class="table table-borderless text-nowrap align-middle mb-0">
                      <tbody>
                        <tr class="bg-light">
                          <td class="rounded-start bg-transparent">
                            <div class="d-flex align-items-center gap-3">
                              <div>
                                <i class="cc BTC fs-7"></i>
                              </div>
                              <div>
                                <h6 class="mb-0">Bitcoin</h6>
                                <span class="fs-3">BTC</span>
                              </div>
                            </div>
                          </td>
                          <td class="bg-transparent"> $981.1254 <i class="ti ti-chevron-down text-danger ms-1 fs-4"></i>
                          </td>
                          <td class="bg-transparent">
                            <i class="cc ETC me-1 text-primary fs-5" title="ETC"></i> 0.23125
                          </td>
                          <td class="bg-transparent">$1.23560 B</td>
                          <td class="bg-transparent">04 Feb 2024</td>
                          <td class="text-end rounded-end bg-transparent">
                            <span class="badge bg-danger">transfer</span>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="6"></td>
                        </tr>
                        <tr class="bg-light">
                          <td class="rounded-start bg-transparent">
                            <div class="d-flex align-items-center gap-3">
                              <div>
                                <i class="cc ETH fs-7"></i>
                              </div>
                              <div>
                                <h6 class="mb-0">Ethereum</h6>
                                <span class="fs-3">ETH</span>
                              </div>
                            </div>
                          </td>
                          <td class="bg-transparent"> $450.1254 <i class="ti ti-chevron-down text-danger ms-1 fs-4"></i>
                          </td>
                          <td class="bg-transparent">
                            <i class="cc ETC me-1 text-primary fs-5" title="ETC"></i> 0.45000
                          </td>
                          <td class="bg-transparent">$3.23560 B</td>
                          <td class="bg-transparent">09 Mar 2024</td>
                          <td class="text-end rounded-end bg-transparent">
                            <span class="badge bg-primary">sell</span>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="6"></td>
                        </tr>
                        <tr class="bg-light">
                          <td class="rounded-start bg-transparent">
                            <div class="d-flex align-items-center gap-3">
                              <div>
                                <i class="cc LTC fs-7"></i>
                              </div>
                              <div>
                                <h6 class="mb-0">Litecoin</h6>
                                <span class="fs-3">LTC</span>
                              </div>
                            </div>
                          </td>
                          <td class="bg-transparent"> $100.1254 <i class="ti ti-chevron-up text-success ms-1 fs-4"></i>
                          </td>
                          <td class="bg-transparent">
                            <i class="cc BTC me-1 text-danger fs-5" title="BTC"></i> 0.56012
                          </td>
                          <td class="bg-transparent">$2.45620 B</td>
                          <td class="bg-transparent">12 Dec 2024</td>
                          <td class="text-end rounded-end bg-transparent">
                            <span class="badge bg-success">buy</span>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="6"></td>
                        </tr>
                        <tr class="bg-light">
                          <td class="rounded-start bg-transparent">
                            <div class="d-flex align-items-center gap-3">
                              <div>
                                <i class="cc XRP fs-7"></i>
                              </div>
                              <div>
                                <h6 class="mb-0">XRP</h6>
                                <span class="fs-3">XRP</span>
                              </div>
                            </div>
                          </td>
                          <td class="bg-transparent"> $450.1254 <i class="ti ti-chevron-down text-danger ms-1 fs-4"></i>
                          </td>
                          <td class="bg-transparent">
                            <i class="cc ETC me-1 text-primary fs-5" title="ETC"></i> 0.45000
                          </td>
                          <td class="bg-transparent">$3.23560 B</td>
                          <td class="bg-transparent">01 Aug 2024</td>
                          <td class="text-end rounded-end bg-transparent">
                            <span class="badge bg-danger">transfer</span>
                          </td>
                        </tr>
                      </tbody>
                    </table>
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
  <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/dashboards/dashboard4.js') }}"></script>
</body>

</html>