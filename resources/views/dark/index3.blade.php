<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">

<head>
  @@include("partials/head.html")
  <title>Modernize Bootstrap Admin</title>
  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="../node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
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
            <div class="col-xl-8 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-body p-4">
                  <h4 class="card-title fw-semibold">Top Collectibles</h4>
                  <p class="card-subtitle">The Beginner's Guide to Collectible Items</p>
                  <div class="owl-carousel collectibles-carousel owl-theme mt-9">
                    <div class="item">
                      <div class="card overflow-hidden mb-4 mb-md-0 shadow-none border">
                        <div class="position-relative">
                          <img src="{{ URL::asset('build/images/nft/1.jpg') }}" class="img-fluid w-100" alt="1" />
                          <div class="card-img-overlay">
                            <div class="text-end">
                              <span class="badge bg-dark-subtle rounded-pill fs-2">04h 09m 12s</span>
                            </div>
                          </div>
                        </div>
                        <div class="p-9 text-start">
                          <h6 class="fw-semibold fs-4">Geo Runners</h6>
                          <div class="d-flex align-items-center mt-3 justify-content-between">
                            <div class="fs-3">Volume</div>
                            <h6 class="mb-0">
                              <i class="cc ETH" title="ETH"></i>
                              <span class="text-dark fw-bold">10.1</span> ETH
                            </h6>
                          </div>
                          <a href="javascript:void(0)" class="btn btn-primary w-100 mt-3">Place a Bid</a>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="card overflow-hidden mb-4 mb-md-0 shadow-none border">
                        <div class="position-relative">
                          <img src="{{ URL::asset('build/images/nft/5.jpg') }}" class="img-fluid w-100" alt="1" />
                          <div class="card-img-overlay">
                            <div class="text-end">
                              <span class="badge bg-dark-subtle rounded-pill fs-2">02h 10m 30s</span>
                            </div>
                          </div>
                        </div>
                        <div class="p-9 text-start">
                          <h6 class="fw-semibold fs-4">Cube Runner</h6>
                          <div class="d-flex align-items-center mt-3 justify-content-between">
                            <div class="fs-3">Volume</div>
                            <h6 class="mb-0">
                              <i class="cc ETH" title="ETH"></i>
                              <span class="text-dark fw-bold">10.1</span> ETH
                            </h6>
                          </div>
                          <a href="javascript:void(0)" class="btn btn-primary w-100 mt-3">Place a Bid</a>
                        </div>
                      </div>
                    </div>
                    <div class="item">
                      <div class="card overflow-hidden mb-4 mb-md-0 shadow-none border">
                        <div class="position-relative">
                          <img src="{{ URL::asset('build/images/nft/3.jpg') }}" class="img-fluid w-100" alt="1" />
                          <div class="card-img-overlay">
                            <div class="text-end">
                              <span class="badge bg-dark-subtle rounded-pill fs-2">01h 02m 10s</span>
                            </div>
                          </div>
                        </div>
                        <div class="p-9 text-start">
                          <h6 class="ffw-semibold fs-4">Algo cube</h6>
                          <div class="d-flex align-items-center mt-3 justify-content-between">
                            <div class="fs-3">Volume</div>
                            <h6 class="mb-0">
                              <i class="cc ETH" title="ETH"></i>
                              <span class="text-dark fw-bold">10.1</span> ETH
                            </h6>
                          </div>
                          <a href="javascript:void(0)" class="btn btn-primary w-100 mt-3">Place a Bid</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-body p-4">
                  <h4 class="card-title fw-semibold">My Wallets</h4>
                  <p class="card-subtitle">Smart Wallets for the Digital Age</p>
                  <div class="card overflow-hidden mt-9">
                    <img src="{{ URL::asset('build/images/backgrounds/my-card.jpg') }}" alt="bg-card" height="220">
                    <div class="card-img-overlay text-white">
                      <div class="d-flex align-items-start flex-column h-100">
                        <div>
                          <img src="{{ URL::asset('build/images/nft/mastercard.png') }}" width="40" alt="mastercard" />
                          <span class="opacity-75 fs-2 d-block mt-3">CARD NUMBER</span>
                          <h4 class="text-white fw-normal">2500 1520 2315 4500</h4>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-auto w-100">
                          <div>
                            <span class="opacity-75 fs-2 text-uppercase">Card Holder Name</span>
                            <h6 class="text-white mb-0">HR John</h6>
                          </div>
                          <div>
                            <span class="opacity-75 fs-2 text-uppercase">Expires On</span>
                            <h6 class="text-white mb-0">09/25</h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card shadow-none mb-0">
                    <div class="card-body p-0">
                      <div class="d-flex align-items-center mb-3">
                        <h2 class="fw-semibold mb-0">$1,206.89</h2>
                        <div class="ms-auto">
                          <div class="dropdown">
                            <a class="text-decoration-none" href="javascript:void(0)" id="balance-dd"
                              data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="ti ti-dots fs-4"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="balance-dd">
                              <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-share me-1 fs-4"></i>Share </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-download me-1 fs-4"></i>Download </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-info-circle me-1 fs-4"></i>Get Info </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex align-items-center">
                        <span class="ms-1">
                          <i class="ti ti-arrow-up-left text-success"></i>
                        </span>
                        <span class="text-dark fs-3 fw-bold ms-1">USD 420,000</span>
                        <span class="text-success fw-bold fs-3 ms-2">(59,11%)</span>
                      </div>
                      <button class="btn bg-primary-subtle text-primary w-100 mt-3"> View Balance </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-8 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4 class="card-title fw-semibold">Top NFT</h4>
                      <p class="card-subtitle">How to Buy and Sell NFTs</p>
                    </div>
                    <div class="dropdown">
                      <button class="btn btn-light" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="flag-icon flag-icon-us me-1" title="us"></i> USD <i
                          class="ti ti-chevron-down ms-1"></i>
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li>
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="flag-icon flag-icon-us me-1" title="us"></i> USD </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="flag-icon flag-icon-in me-1" title="in" id="in"></i> INR </a>
                        </li>
                        <li>
                          <a class="dropdown-item" href="javascript:void(0)">
                            <i class="flag-icon flag-icon-fr me-1" title="fr" id="fr"></i> FRF </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="card mt-4 mb-0 shadow-none">
                    <div class="table-responsive">
                      <table class="table mb-0 align-middle text-nowrap">
                        <thead>
                          <tr>
                            <th class="ps-0">Collection</th>
                            <th>Volume</th>
                            <th>24h</th>
                            <th>Floor Price</th>
                          </tr>
                        </thead>
                        <tbody class="text-dark ">
                          <tr>
                            <td class="ps-0">
                              <div class="d-flex align-items-center gap-3 fw-semibold">
                                <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" class="rounded-circle" alt="user"
                                  width="45" /> Alan Walker Origins
                              </div>
                            </td>
                            <td>
                              <i class="cc ETH" title="ETH"></i> 18,670.21
                            </td>
                            <td class="text-danger">-20.38%</td>
                            <td>$6.8k</td>
                          </tr>
                          <tr>
                            <td class="ps-0">
                              <div class="d-flex align-items-center gap-3 fw-semibold">
                                <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" alt="user"
                                  width="45" /> The StarSharks NFTs
                              </div>
                            </td>
                            <td>
                              <i class="cc ETH" title="ETH"></i> 15,880.20
                            </td>
                            <td class="text-success">+15.14%</td>
                            <td>$5.8k</td>
                          </tr>
                          <tr>
                            <td class="ps-0">
                              <div class="d-flex align-items-center gap-3 fw-semibold">
                                <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" class="rounded-circle" alt="user"
                                  width="45" /> Sacred Realm
                              </div>
                            </td>
                            <td>
                              <i class="cc ETH" title="ETH"></i> 14,920.20
                            </td>
                            <td class="text-danger">-10.25%</td>
                            <td>$5.2k</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 d-flex align-items-strech">
              <div class="card w-100">
                <img src="{{ URL::asset('build/images/nft/nft-bg.jpg') }}" class="card-img" alt="nft" />
                <div class="p-4 mt-n4 text-center">
                  <div class="position-relative mt-n4">
                    <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" alt="nft"
                      class="rounded-circle border border-3 border-white" width="50" />
                  </div>
                  <div>
                    <h6 class="mb-0 fw-semibold mt-2">The Cat X Takaish</h6>
                  </div>
                  <div class="d-flex align-items-center justify-content-between mt-2 pb-3 border-bottom">
                    <div class="text-start">
                      <span class="fs-3">Volume</span>
                      <h6 class="mb-0 fw-semibold">90,015.90 USD</h6>
                    </div>
                    <div class="text-end">
                      <span class="fs-3">Floor Price</span>
                      <h6 class="mb-0 fw-semibold">40.00 USD</h6>
                    </div>
                  </div>
                  <div class="d-flex align-items-center gap-3 pt-3">
                    <div class="round text-bg-light d-flex align-items-center justify-content-center rounded-circle">
                      <i class="cc ETH fs-6"></i>
                    </div>
                    <div>
                      <h6 class="mb-0 fw-semibold">1.23 ETH</h6>
                      <span class="fs-2">$12,000</span>
                    </div>
                    <div class="ms-auto text-end">
                      <span class="text-danger">-6.8%</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4 class="card-title fw-semibold">Recent Transactions</h4>
                      <p class="card-subtitle">Examining the Risks of Recent Transactions</p>
                    </div>
                    <a href="javascript:void(0)"
                      class="text-dark fs-6 position-relative nav-icon-hover z-index-5 text-decoration-none"><i
                        class="ti ti-dots-vertical"></i></a>
                  </div>
                  <div class="card shadow-none mb-0 mt-3">
                    <div class="d-flex align-items-center gap-3 py-3 border-bottom">
                      <div class="round text-bg-light d-flex align-items-center justify-content-center rounded-circle">
                        <i class="cc ETH fs-6"></i>
                      </div>
                      <div>
                        <h6 class="mb-0 fw-semibold">1.23 ETH</h6>
                        <span class="fs-2">$12,000</span>
                      </div>
                      <div class="ms-auto text-end">
                        <span class="text-danger">-6.8%</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 py-3 border-bottom">
                      <div class="round text-bg-light d-flex align-items-center justify-content-center rounded-circle">
                        <i class="cc BTC fs-6"></i>
                      </div>
                      <div>
                        <h6 class="mb-0 fw-semibold">5.23 BTC</h6>
                        <span class="fs-2">$5,000</span>
                      </div>
                      <div class="ms-auto text-end">
                        <span class="text-success">+2.30%</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 py-3">
                      <div class="round text-bg-light d-flex align-items-center justify-content-center rounded-circle">
                        <i class="cc XRP fs-6"></i>
                      </div>
                      <div>
                        <h6 class="mb-0 fw-semibold">9.20 XRP</h6>
                        <span class="fs-2">$6,200</span>
                      </div>
                      <div class="ms-auto text-end">
                        <span class="text-danger">-1.0%</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center justify-content-between">
                    <div>
                      <h4 class="card-title fw-semibold">Trending Creator</h4>
                      <p class="card-subtitle">The Benefits of Being a Trending Creator</p>
                    </div>
                    <a href="javascript:void(0)"
                      class="text-dark fs-6 position-relative nav-icon-hover z-index-5 text-decoration-none"><i
                        class="ti ti-dots-vertical"></i></a>
                  </div>
                  <div class="card shadow-none mt-3 mb-0">
                    <div class="d-flex align-items-center gap-3 py-3 border-bottom">
                      <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" class="rounded-circle" alt="user"
                        width="40" />
                      <div>
                        <h6 class="mb-0 fw-semibold">Project Solona</h6>
                        <span class="fs-2">12.200 Items</span>
                      </div>
                      <div class="ms-auto text-end">
                        <h6 class="mb-0 fw-semibold">$300,000+</h6>
                        <span class="fs-2">Total USD</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 py-3 border-bottom">
                      <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" alt="user"
                        width="40" />
                      <div>
                        <h6 class="mb-0 fw-semibold">The Aston Lix</h6>
                        <span class="fs-2">10.150 Items</span>
                      </div>
                      <div class="ms-auto text-end">
                        <h6 class="mb-0 fw-semibold">$250,000+</h6>
                        <span class="fs-2">Total USD</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center gap-3 py-3">
                      <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" class="rounded-circle" alt="user"
                        width="40" />
                      <div>
                        <h6 class="mb-0 fw-semibold">Barly X Dipa</h6>
                        <span class="fs-2">10.100 Items</span>
                      </div>
                      <div class="ms-auto text-end">
                        <h6 class="mb-0 fw-semibold">$230,000+</h6>
                        <span class="fs-2">Total USD</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="card">
                <div class="card-body p-4">
                  <h4 class="card-title fw-semibold">Recent History</h4>
                  <p class="card-subtitle">The Impact of 9/11 on the World</p>
                  <div class="card shadow-none mt-9 mb-0">
                    <div class="table-responsive">
                      <table class="table text-nowrap align-middle mb-0">
                        <thead>
                          <tr>
                            <th class="ps-0">Item</th>
                            <th>Event</th>
                            <th>From - To</th>
                            <th>Amount</th>
                            <th>Value</th>
                            <th>Date</th>
                            <th>Link</th>
                          </tr>
                        </thead>
                        <tbody class="text-dark ">
                          <tr>
                            <td class="ps-0 text-truncate">
                              <img src="{{ URL::asset('build/images/nft/g1.webp') }}" class="rounded img-fluid me-2" width="50"
                                alt="user" />
                              <span class="fw-semibold">Quantum Ape</span>
                            </td>
                            <td>
                              <span class="badge bg-primary-subtle text-primary">Purchase</span>
                            </td>
                            <td>
                              <div class="d-flex align-items-center gap-2">
                                <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" width="25" alt="user1"
                                  class="rounded-circle" />
                                <span class="fs-3">John</span>
                                <span>
                                  <i class="ti ti-arrow-right text-success fs-4"></i>
                                </span>
                                <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" width="25" alt="user1"
                                  class="rounded-circle" />
                                <span class="fs-3">Deo</span>
                              </div>
                            </td>
                            <td>4</td>
                            <td>
                              <i class="cc ETH" title="ETH"></i> 16 ETH
                            </td>
                            <td>13 July, 2024</td>
                            <td>
                              <div class="dropdown">
                                <a class="text-decoration-none" href="javascript:void(0)" id="nft2"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="ti ti-dots fs-4"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="nft2">
                                  <li>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)">
                                      <i class="ti ti-link me-1 fs-6"></i>https://www.abc.com/sfsdf767s </a>
                                  </li>
                                </ul>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="ps-0 text-truncate">
                              <img src="{{ URL::asset('build/images/nft/g2.webp') }}" class="rounded img-fluid me-2" alt="n1"
                                width="50" />
                              <span class="fw-semibold">Bored Ape</span>
                            </td>
                            <td>
                              <span class="badge bg-danger-subtle text-danger">Transfer</span>
                            </td>
                            <td>
                              <div class="d-flex align-items-center gap-2">
                                <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" width="25" alt="user1"
                                  class="rounded-circle" />
                                <span class="fs-3">Liam</span>
                                <span>
                                  <i class="ti ti-arrow-left text-danger fs-4"></i>
                                </span>
                                <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" width="25" alt="user1"
                                  class="rounded-circle" />
                                <span class="fs-3">Noah</span>
                              </div>
                            </td>
                            <td>4</td>
                            <td>
                              <i class="cc ETH" title="ETH"></i> 8 ETH
                            </td>
                            <td>1 Aug, 2024</td>
                            <td>
                              <div class="dropdown">
                                <a class="text-decoration-none" href="javascript:void(0)" id="ns11"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="ti ti-dots fs-4"></i>
                                </a>
                                <ul class="dropdown-menu">
                                  <li>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)">
                                      <i class="ti ti-link me-1 fs-6"></i>https://www.abc.com/sfsdf767s </a>
                                  </li>
                                </ul>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="ps-0 text-truncate">
                              <img src="{{ URL::asset('build/images/nft/g3.webp') }}" class="rounded img-fluid me-2" alt="n2"
                                width="50" />
                              <span class="fw-semibold">Space Ape</span>
                            </td>
                            <td>
                              <span class="badge bg-success-subtle text-success">List</span>
                            </td>
                            <td>
                              <div class="d-flex align-items-center gap-2">
                                <img src="{{ URL::asset('build/images/profile/user-6.jpg') }}" width="25" alt="user1"
                                  class="rounded-circle" />
                                <span class="fs-3">Oliver</span>
                                <span>
                                  <i class="ti ti-arrow-left text-danger fs-4"></i>
                                </span>
                                <img src="{{ URL::asset('build/images/profile/user-7.jpg') }}" width="25" alt="user1"
                                  class="rounded-circle" />
                                <span class="fs-3">Elijah</span>
                              </div>
                            </td>
                            <td>4</td>
                            <td>
                              <i class="cc ETH" title="ETH"></i> 9 ETH
                            </td>
                            <td>12 Jan, 2024</td>
                            <td>
                              <div class="dropdown">
                                <a class="text-decoration-none" href="javascript:void(0)" id="dd3"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="ti ti-dots fs-4"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dd3">
                                  <li>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)">
                                      <i class="ti ti-link me-1 fs-6"></i>https://www.abc.com/sfsdf767s </a>
                                  </li>
                                </ul>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td class="border-0 ps-0 text-truncate">
                              <img src="{{ URL::asset('build/images/nft/g4.webp') }}" class="rounded img-fluid me-2" width="50"
                                alt="n1" />
                              <span class="fw-semibold">Fancy Bears</span>
                            </td>
                            <td class="border-0">
                              <span class="badge bg-primary-subtle text-primary">Purchase</span>
                            </td>
                            <td class="border-0">
                              <div class="d-flex align-items-center gap-2">
                                <img src="{{ URL::asset('build/images/profile/user-8.jpg') }}" width="25" alt="user1"
                                  class="rounded-circle" />
                                <span class="fs-3">James</span>
                                <span>
                                  <i class="ti ti-arrow-right text-success fs-4"></i>
                                </span>
                                <img src="{{ URL::asset('build/images/profile/user-9.jpg') }}" width="25" alt="user1"
                                  class="rounded-circle" />
                                <span class="fs-3">Lucas</span>
                              </div>
                            </td>
                            <td class="border-0">4</td>
                            <td class="border-0">
                              <i class="cc ETH" title="ETH"></i> 10 ETH
                            </td>
                            <td class="border-0">1 Feb, 2024</td>
                            <td class="border-0">
                              <div class="dropdown">
                                <a class="text-decoration-none" href="javascript:void(0)" id="nft3"
                                  data-bs-toggle="dropdown" aria-expanded="false">
                                  <i class="ti ti-dots fs-4"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="nft3">
                                  <li>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)">
                                      <i class="ti ti-link me-1 fs-6"></i>https://www.abc.com/sfsdf767s </a>
                                  </li>
                                </ul>
                              </div>
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
      </div>
      @@include("partials/customizer.html")
    </div>

    @@include("partials/header-components/dd-searchbar.html")
    @@include("partials/header-components/dd-shopping-cart.html")
  </div>
  <div class="dark-transparent sidebartoggler"></div>
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  @@include("partials/scripts.html")
  <script src="{{ URL::asset('build/libs/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/dashboards/dashboard3.js') }}"></script>
</body>

</html>