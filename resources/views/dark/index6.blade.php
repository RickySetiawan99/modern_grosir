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
            <div class="col-xl-8">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title fw-semibold">Follow Artists</h4>
                  <p class="card-subtitle">Tips for Following Local Artists</p>
                  <div class="overflow-auto mt-4" data-simplebar>
                    <div class="hstack gap-9">
                      <a href="javascript:void(0)" class="text-center flex-shrink-0 ">
                        <div class="border border-2 border-primary rounded-circle">
                          <img src="{{ URL::asset('build/images/music/s1.jpg') }}" class="rounded-circle img-fluid m-1" alt="art"
                            width="55" />
                        </div>
                        <span class="d-block fs-3 mt-1  text-dark">Dualia</span>
                      </a>
                      <a href="javascript:void(0)" class="text-center flex-shrink-0 ">
                        <div class="border border-2 border-primary rounded-circle">
                          <img src="{{ URL::asset('build/images/music/s2.jpg') }}" class="rounded-circle img-fluid m-1" alt="art"
                            width="55" />
                        </div>
                        <span class="d-block fs-3 mt-1  text-dark">John</span>
                      </a>
                      <a href="javascript:void(0)" class="text-center flex-shrink-0 ">
                        <div class="border border-2 border-primary rounded-circle">
                          <img src="{{ URL::asset('build/images/music/s3.jpg') }}" class="rounded-circle img-fluid m-1" alt="art"
                            width="55" />
                        </div>
                        <span class="d-block fs-3 mt-1  text-dark">Smith</span>
                      </a>
                      <a href="javascript:void(0)" class="text-center flex-shrink-0 ">
                        <div class="border border-2 border-white rounded-circle">
                          <img src="{{ URL::asset('build/images/music/s4.jpg') }}" class="rounded-circle img-fluid m-1" alt="art"
                            width="55" />
                        </div>
                        <span class="d-block fs-3 mt-1  text-dark">Sia</span>
                      </a>
                      <a href="javascript:void(0)" class="text-center flex-shrink-0 ">
                        <div class="border border-2 border-white rounded-circle">
                          <img src="{{ URL::asset('build/images/music/s1.jpg') }}" class="rounded-circle img-fluid m-1" alt="art"
                            width="55" />
                        </div>
                        <span class="d-block fs-3 mt-1  text-dark">Adele</span>
                      </a>
                      <a href="javascript:void(0)" class="text-center flex-shrink-0 ">
                        <div class="border border-2 border-white rounded-circle">
                          <img src="{{ URL::asset('build/images/music/s2.jpg') }}" class="rounded-circle img-fluid m-1" alt="art"
                            width="55" />
                        </div>
                        <span class="d-block fs-3 mt-1  text-dark">Dualia</span>
                      </a>
                      <a href="javascript:void(0)" class="text-center flex-shrink-0 ">
                        <div class="border border-2 border-white rounded-circle">
                          <img src="{{ URL::asset('build/images/music/s3.jpg') }}" class="rounded-circle img-fluid m-1" alt="art"
                            width="55" />
                        </div>
                        <span class="d-block fs-3 mt-1  text-dark">Sia</span>
                      </a>
                      <a href="javascript:void(0)" class="text-center flex-shrink-0 ">
                        <div class="border border-2 border-white rounded-circle">
                          <img src="{{ URL::asset('build/images/music/s4.jpg') }}" class="rounded-circle img-fluid m-1" alt="art"
                            width="55" />
                        </div>
                        <span class="d-block fs-3 mt-1  text-dark">John</span>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title fw-semibold">Recently Played</h4>
                  <p class="card-subtitle">What's on My Playlist This Week?</p>
                  <div class="row mt-3">
                    <div class="col-md-4 col-sm-6">
                      <div class="card shadow-none border position-relative mb-md-0">
                        <div class="overflow-hidden rounded">
                          <a href="javascript:void(0)">
                            <img src="{{ URL::asset('build/images/music/album5.jpg') }}" class="rounded hover-img card-img"
                              alt="art" />
                          </a>
                        </div>
                        <div class="p-2 d-flex">
                          <div>
                            <h6 class="mt-2 mb-0 fw-semibold">Naach Meri Rani</h6>
                            <span class="fs-2 text-nowrap">Guru Randhawa</span>
                          </div>
                          <div class="ms-auto">
                            <a href="javascript:void(0)"
                              class="z-1 btn bg-white text-primary round-sm rounded-circle mt-n4 shadow-sm p-0 d-flex align-items-center justify-content-center">
                              <i class="ti ti-player-play text-primary fs-4"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                      <div class="card shadow-none border position-relative mb-md-0">
                        <div class="overflow-hidden rounded">
                          <a href="javascript:void(0)">
                            <div class="hover-img">
                              <img src="{{ URL::asset('build/images/music/album7.jpg') }}" class="rounded hover-img card-img"
                                alt="art" />
                            </div>
                          </a>
                        </div>
                        <div class="p-2 d-flex">
                          <div>
                            <h6 class="mt-2 mb-0 fw-semibold">Party Anthems</h6>
                            <span class="fs-2 text-nowrap">Arijit Singh</span>
                          </div>
                          <div class="ms-auto">
                            <a href="javascript:void(0)"
                              class="z-1 btn bg-white text-primary round-sm rounded-circle mt-n4 shadow-sm p-0 d-flex align-items-center justify-content-center">
                              <i class="ti ti-player-play text-primary fs-4"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                      <div class="card border shadow-none position-relative mb-0">
                        <div class="overflow-hidden rounded">
                          <a href="javascript:void(0)">
                            <div class="hover-img">
                              <img src="{{ URL::asset('build/images/music/album8.jpg') }}" class="rounded hover-img card-img"
                                alt="art" />
                            </div>
                          </a>
                        </div>
                        <div class="p-2 d-flex">
                          <div>
                            <h6 class="mt-2 mb-0 fw-semibold text-truncate">Badshah Party</h6>
                            <span class="fs-2 text-nowrap">Badshah</span>
                          </div>
                          <div class="ms-auto">
                            <a href="javascript:void(0)"
                              class="z-1 btn bg-white text-primary round-sm rounded-circle mt-n4 shadow-sm p-0 d-flex align-items-center justify-content-center">
                              <i class="ti ti-player-play text-primary fs-4"></i>
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card mb-0">
                    <div class="card-body p-4">
                      <h4 class="card-title">My Friends</h4>
                      <p class="card-subtitle">The Power of Friendship</p>
                      <div class="row gx-3 mt-4">
                        <div class="col-3">
                          <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" class="rounded img-fluid" alt="art" />
                        </div>
                        <div class="col-3">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded img-fluid" alt="art" />
                        </div>
                        <div class="col-3">
                          <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" class="rounded img-fluid" alt="art" />
                        </div>
                        <div class="col-3">
                          <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" class="rounded img-fluid" alt="art" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card">
                    <div class="card-body p-4">
                      <h4 class="card-title">Favourite Artists</h4>
                      <p class="card-subtitle">The Iconic Music of Prince</p>
                      <div class="row gx-3 mt-4">
                        <div class="col-3">
                          <img src="{{ URL::asset('build/images/music/s1.jpg') }}" class="rounded img-fluid" alt="art" />
                        </div>
                        <div class="col-3">
                          <img src="{{ URL::asset('build/images/music/s2.jpg') }}" class="rounded img-fluid" alt="art" />
                        </div>
                        <div class="col-3">
                          <img src="{{ URL::asset('build/images/music/s3.jpg') }}" class="rounded img-fluid" alt="art" />
                        </div>
                        <div class="col-3">
                          <img src="{{ URL::asset('build/images/music/s4.jpg') }}" class="rounded img-fluid" alt="art" />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title fw-semibold">Recent Search</h4>
                  <p class="card-subtitle">What's Next in the World of Search?</p>
                  <div class="hstack my-4 gap-3">
                    <a role="alert"
                      class="alert mb-0 py-2 badge bg-primary-subtle text-primary s rounded-pill d-flex align-items-center justify-content-between gap-2 ">Shiela
                      On7 <span data-bs-dismiss="alert">
                        <i class="ti ti-square-x fs-4"></i>
                      </span>
                    </a>
                    <a role="alert"
                      class="alert mb-0 py-2 badge bg-danger-subtle text-danger s rounded-pill d-flex align-items-center justify-content-between gap-2 ">Denny
                      Caknan <span data-bs-dismiss="alert">
                        <i class="ti ti-square-x fs-4"></i>
                      </span>
                    </a>
                  </div>
                  <div class="card bg-primary-subtle shadow-none mb-0">
                    <div class="card-body px-3 py-4">
                      <div class="text-center">
                        <div class="mplayer">
                          <div id="jp_container_N" class="jp-video-270p jp-state-no-volume">
                            <div class="jp-type-playlist">
                              <div id="jplayer_N" class="jp-jplayer hide"></div>
                              <div class="jp-gui">
                                <div class="jp-interface">
                                  <img src="{{ URL::asset('build/images/music/album3.jpg') }}" class="rounded poster" alt="album"
                                    width="100" />
                                  <h5 class="mt-3 mb-0 jp-title fw-semibold fs-5"></h5>
                                  <span class="opacity-75 fs-3 jp-artist"></span>
                                  <div class="jp-controls">
                                    <div>
                                      <a class="jp-repeat btn border-0 round-sm opacity-75 rounded-circle"
                                        title="repeat">
                                        <i class="ti ti-repeat fs-4"></i>
                                      </a>
                                      <a class="jp-repeat-off hide btn border-0 round-sm rounded-circle"
                                        title="repeat off">
                                        <i class="ti ti-repeat fs-4 text-primary"></i>
                                      </a>
                                    </div>
                                    <div>
                                      <a class="jp-previous btn border-0 round-sm opacity-75 rounded-circle">
                                        <i class="ti ti-chevrons-left fs-4"></i>
                                      </a>
                                    </div>
                                    <div>
                                      <a
                                        class="jp-play btn border-0 text-bg-white text-primary round-sm rounded-circle">
                                        <i class="ti ti-player-play fs-4"></i>
                                      </a>
                                      <a
                                        class="jp-pause btn border-0 text-bg-white text-primary round-sm rounded-circle">
                                        <i class="ti ti-player-pause"></i>
                                      </a>
                                    </div>
                                    <div>
                                      <a class="jp-next btn border-0 round-sm opacity-75 rounded-circle">
                                        <i class="ti ti-chevrons-right fs-4"></i>
                                      </a>
                                    </div>
                                    <div>
                                      <a class="jp-shuffle btn border-0 round-sm opacity-75 rounded-circle"
                                        title="shuffle">
                                        <i class="ti ti-arrows-shuffle-2 fs-4"></i>
                                      </a>
                                      <a class="jp-shuffle-off hide btn border-0 round-sm rounded-circle"
                                        title="shuffle off">
                                        <i class="ti ti-arrows-shuffle-2 fs-4 text-primary"></i>
                                      </a>
                                    </div>
                                  </div>
                                  <div class="jp-progress hidden-xs">
                                    <div class="jp-seek-bar w-100">
                                      <div class="jp-play-bar play-progress w-0"></div>
                                      <div class="jp-current-time current-time"></div>
                                      <div class="jp-duration duration"></div>
                                    </div>
                                  </div>
                                  <div>
                                    <a class="jp-mute " title="mute">
                                      <i class="ti ti-volume-3 text-muted fs-4"></i>
                                    </a>
                                    <a class="jp-unmute" title="unmute">
                                      <i class="ti ti-volume fs-4 text-primary"></i>
                                    </a>
                                  </div>
                                  <div class="jp-volume jp-music-volume">
                                    <div class="jp-volume-bar">
                                      <div class="jp-volume-bar-value"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="jp-playlist dropup" id="playlist">
                              <ul class="dropdown-menu bg-inverse m-b-0">
                                <li class="list-group-item"></li>
                              </ul>
                            </div>
                            <div class="jp-no-solution hide">
                              <span>Update Required</span> To play the media you will need to either update your browser
                              to a recent version or update your <a href="http://get.adobe.com/flashplayer/"
                                target="_blank">Flash plugin</a>.
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex align-items-center mt-3 p-3 bg-hover-light-black rounded border-bottom">
                        <div class="position-relative d-flex align-items-center">
                          <a href="javascript:void(0)" class="stretched-link "></a>
                          <img src="{{ URL::asset('build/images/music/album1.jpg') }}" width="45" class="rounded" alt="album" />
                          <div class="ms-3">
                            <h6 class="mb-0 fw-semibold">Viva Las</h6>
                            <span class="fs-2">Viva Las</span>
                          </div>
                        </div>
                        <div class="ms-auto">
                          <div class="dropdown">
                            <a class="" href="javascript:void(0)" id="m1" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <i class="ti ti-dots-vertical fs-4"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="m1">
                              <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-share text-muted me-1 fs-4"></i>Share </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-download text-muted me-1 fs-4"></i>Download </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-info-circle text-muted me-1 fs-4"></i>Get Song Info </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex align-items-center bg-hover-light-black rounded p-3 border-bottom">
                        <div class="position-relative d-flex align-items-center">
                          <a href="javascript:void(0)" class="stretched-link "></a>
                          <img src="{{ URL::asset('build/images/music/album2.jpg') }}" width="45" alt="album" class="rounded" />
                          <div class="ms-3">
                            <h6 class="mb-0 fw-semibold">As It Was</h6>
                            <span class="fs-2">As It Was</span>
                          </div>
                        </div>
                        <div class="ms-auto">
                          <div class="dropdown">
                            <a class="" href="javascript:void(0)" id="m2" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <i class="ti ti-dots-vertical fs-4"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="m2">
                              <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-share text-muted me-1 fs-4"></i>Share </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-download text-muted me-1 fs-4"></i>Download </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-info-circle text-muted me-1 fs-4"></i>Get Song Info </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex align-items-center p-3 bg-hover-light-black rounded">
                        <div class="position-relative d-flex align-items-center">
                          <a href="javascript:void(0)" class="stretched-link "></a>
                          <img src="{{ URL::asset('build/images/music/album4.jpg') }}" width="45" alt="album" class="rounded" />
                          <div class="ms-3">
                            <h6 class="mb-0 fw-semibold text-truncate w-75">RedTape Anthem</h6>
                            <span class="fs-2">RedTape Anthem</span>
                          </div>
                        </div>
                        <div class="ms-auto">
                          <div class="dropdown">
                            <a class="" href="javascript:void(0)" id="m3" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <i class="ti ti-dots-vertical fs-4"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="m3">
                              <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-share text-muted me-1 fs-4"></i>Share </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-download text-muted me-1 fs-4"></i>Download </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-info-circle text-muted me-1 fs-4"></i>Get Song Info </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="d-flex align-items-center p-3 bg-hover-light-black rounded border-bottom">
                        <div class="position-relative d-flex align-items-center">
                          <a href="javascript:void(0)" class="stretched-link "></a>
                          <img src="{{ URL::asset('build/images/music/album1.jpg') }}" width="45" class="rounded" alt="album" />
                          <div class="ms-3">
                            <h6 class="mb-0 fw-semibold">Viva Las</h6>
                            <span class="fs-2">Viva Las</span>
                          </div>
                        </div>
                        <div class="ms-auto">
                          <div class="dropdown">
                            <a class="" href="javascript:void(0)" id="m1" data-bs-toggle="dropdown"
                              aria-expanded="false">
                              <i class="ti ti-dots-vertical fs-4"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="m1">
                              <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-share text-muted me-1 fs-4"></i>Share </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-download text-muted me-1 fs-4"></i>Download </a>
                              </li>
                              <li>
                                <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="ti ti-info-circle text-muted me-1 fs-4"></i>Get Song Info </a>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4">
              <div class="card">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center">
                    <div>
                      <h4 class="card-title fw-semibold">Top 10 from this week</h4>
                      <p class="card-subtitle">Based on your preferences</p>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown">
                        <a class="" href="javascript:void(0)" id="t1" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ti ti-dots-vertical fs-4"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="t1">
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">
                              <i class="ti ti-share text-muted me-1 fs-4"></i>Share </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">
                              <i class="ti ti-download text-muted me-1 fs-4"></i>Download </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">
                              <i class="ti ti-info-circle text-muted me-1 fs-4"></i>Get Song Info </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4 overflow-auto gap-4 h-450" data-simplebar>
                    <a href="javascript:void(0)" class="mb-4 d-block">
                      <img src="{{ URL::asset('build/images/music/top10-1.jpg') }}" class="img-fluid rounded" alt="album" />
                    </a>
                    <a href="javascript:void(0)" class="mb-4 d-block">
                      <img src="{{ URL::asset('build/images/music/top10-2.jpg') }}" class="img-fluid rounded" alt="album" />
                    </a>
                    <a href="javascript:void(0)" class="d-block">
                      <img src="{{ URL::asset('build/images/music/top10-3.jpg') }}" class="img-fluid rounded" alt="album" />
                    </a>
                  </div>
                </div>
              </div>


            </div>
            <div class="col-md-6 col-xl-4">
              <div class="card">
                <div class="card-body p-4">
                  <div class="d-flex align-items-center">
                    <div>
                      <h4 class="card-title fw-semibold">Top Playlist</h4>
                      <p class="card-subtitle">Based on your choic</p>
                    </div>
                    <div class="ms-auto">
                      <div class="dropdown">
                        <a class="" href="javascript:void(0)" id="t2" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="ti ti-dots-vertical fs-4"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="t2">
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">
                              <i class="ti ti-share text-muted me-1 fs-4"></i>Share </a>
                          </li>
                          <li>
                            <a class="dropdown-item" href="javascript:void(0)">
                              <i class="ti ti-download text-muted me-1 fs-4"></i>Download </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="overflow-auto card mt-4 mb-0 shadow-none border h-450" data-simplebar>
                    <div class="hstack p-3 bg-hover-light-black position-relative border-bottom">
                      <a href="javascript:void(0)" class="stretched-link "></a>
                      <a class="" href="javascript:void(0)">
                        <i class="ti ti-player-play fs-5"></i>
                      </a>
                      <img src="{{ URL::asset('build/images/music/album1.jpg') }}" alt="top-1" width="40" class="rounded ms-3" />
                      <div class="ms-3">
                        <h6 class="mb-0">N95</h6>
                        <span class="fs-3">Kendrick Lamar</span>
                      </div>
                      <div class="ms-auto">
                        <a class="" href="javascript:void(0)">
                          <i class="ti ti-heart text-primary fs-5"></i>
                        </a>
                      </div>
                    </div>
                    <div class="hstack p-3 bg-hover-light-black position-relative border-bottom">
                      <a href="javascript:void(0)" class="stretched-link "></a>
                      <a class="" href="javascript:void(0)">
                        <i class="ti ti-player-play fs-5"></i>
                      </a>
                      <img src="{{ URL::asset('build/images/music/album2.jpg') }}" alt="top-1" width="40" class="rounded ms-3" />
                      <div class="ms-3">
                        <h6 class="mb-0">Women</h6>
                        <span class="fs-3">Doja Cat</span>
                      </div>
                      <div class="ms-auto">
                        <a class="" href="javascript:void(0)">
                          <i class="ti ti-heart text-primary fs-5"></i>
                        </a>
                      </div>
                    </div>
                    <div class="hstack p-3 bg-hover-light-black position-relative border-bottom">
                      <a href="javascript:void(0)" class="stretched-link "></a>
                      <a class="" href="javascript:void(0)">
                        <i class="ti ti-player-play fs-5"></i>
                      </a>
                      <img src="{{ URL::asset('build/images/music/album3.jpg') }}" alt="top-1" width="40" class="rounded ms-3" />
                      <div class="ms-3">
                        <h6 class="mb-0">Wait For U</h6>
                        <span class="fs-3">Future, Tems</span>
                      </div>
                      <div class="ms-auto">
                        <a class="" href="javascript:void(0)">
                          <i class="ti ti-heart text-muted fs-5"></i>
                        </a>
                      </div>
                    </div>
                    <div class="hstack p-3 bg-hover-light-black position-relative border-bottom">
                      <a href="javascript:void(0)" class="stretched-link "></a>
                      <a class="" href="javascript:void(0)">
                        <i class="ti ti-player-play fs-5"></i>
                      </a>
                      <img src="{{ URL::asset('build/images/music/album4.jpg') }}" alt="top-1" width="40" class="rounded ms-3" />
                      <div class="ms-3">
                        <h6 class="mb-0">Blinding Lights</h6>
                        <span class="fs-3">The Weekend</span>
                      </div>
                      <div class="ms-auto">
                        <a class="" href="javascript:void(0)">
                          <i class="ti ti-heart text-muted fs-5"></i>
                        </a>
                      </div>
                    </div>
                    <div class="hstack p-3 bg-hover-light-black position-relative border-bottom">
                      <a href="javascript:void(0)" class="stretched-link "></a>
                      <a class="" href="javascript:void(0)">
                        <i class="ti ti-player-play fs-5"></i>
                      </a>
                      <img src="{{ URL::asset('build/images/music/album5.jpg') }}" alt="top-1" width="40" class="rounded ms-3" />
                      <div class="ms-3">
                        <h6 class="mb-0">Cooped Up</h6>
                        <span class="fs-3">Roddy Ricch</span>
                      </div>
                      <div class="ms-auto">
                        <a class="" href="javascript:void(0)">
                          <i class="ti ti-heart text-primary fs-5"></i>
                        </a>
                      </div>
                    </div>
                    <div class="hstack p-3 bg-hover-light-black position-relative border-bottom">
                      <a href="javascript:void(0)" class="stretched-link "></a>
                      <a class="" href="javascript:void(0)">
                        <i class="ti ti-player-play fs-5"></i>
                      </a>
                      <img src="{{ URL::asset('build/images/music/album6.jpg') }}" alt="top-1" width="40" class="rounded ms-3" />
                      <div class="ms-3">
                        <h6 class="mb-0">N95</h6>
                        <span class="fs-3">Roddy Ricch</span>
                      </div>
                      <div class="ms-auto">
                        <a class="" href="javascript:void(0)">
                          <i class="ti ti-heart text-primary fs-5"></i>
                        </a>
                      </div>
                    </div>
                    <div class="hstack p-3 bg-hover-light-black position-relative">
                      <a href="javascript:void(0)" class="stretched-link "></a>
                      <a class="" href="javascript:void(0)">
                        <i class="ti ti-player-play fs-5"></i>
                      </a>
                      <img src="{{ URL::asset('build/images/music/album7.jpg') }}" alt="top-1" width="40" class="rounded ms-3" />
                      <div class="ms-3">
                        <h6 class="mb-0">Party Anthem</h6>
                        <span class="fs-3">Arijit Singh</span>
                      </div>
                      <div class="ms-auto">
                        <a class="" href="javascript:void(0)">
                          <i class="ti ti-heart text-primary fs-5"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>


            </div>
            <div class="col-md-6 col-xl-4">
              <div class="card">
                <div class="card-body p-4">
                  <h4 class="card-title fw-semibold">Most Popular this week</h4>
                  <p class="card-subtitle">Based on your preferences</p>
                  <div class="mt-4 card p-3 rounded shadow-none border">
                    <div class="d-flex align-items-center">
                      <div class="position-relative">
                        <img src="{{ URL::asset('build/images/music/album1.jpg') }}" class="rounded" alt="album" width="97" />
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                          <button class="btn btn-primary rounded-circle round p-0">
                            <i class="ti ti-player-play fs-5"></i>
                          </button>
                        </div>
                      </div>
                      <div class="ms-3">
                        <h6 class="mb-0 fs-5">Trending Songs</h6>
                        <span class="d-block fs-3 my-1">Top trending hits, refres..</span>
                        <small>Created by Gaana</small>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4 card p-3 rounded shadow-none border">
                    <div class="d-flex align-items-center">
                      <div class="position-relative">
                        <img src="{{ URL::asset('build/images/music/album2.jpg') }}" class="rounded" alt="album" width="97" />
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                          <button class="btn btn-primary rounded-circle round p-0">
                            <i class="ti ti-player-play fs-5"></i>
                          </button>
                        </div>
                      </div>
                      <div class="ms-3">
                        <h6 class="mb-0 fs-5">Trending Songs</h6>
                        <span class="d-block fs-3 my-1">Top trending hits, refres..</span>
                        <small>Created by Gaana</small>
                      </div>
                    </div>
                  </div>
                  <div class="mt-4 card mb-0 p-3 rounded shadow-none border">
                    <div class="d-flex align-items-center">
                      <div class="position-relative">
                        <img src="{{ URL::asset('build/images/music/album4.jpg') }}" class="rounded" alt="album" width="97" />
                        <div class="card-img-overlay d-flex align-items-center justify-content-center">
                          <button class="btn btn-primary rounded-circle round p-0">
                            <i class="ti ti-player-play fs-5"></i>
                          </button>
                        </div>
                      </div>
                      <div class="ms-3">
                        <h6 class="mb-0 fs-5">Trending Songs</h6>
                        <span class="d-block fs-3 my-1">Top trending hits, refres..</span>
                        <small>Created by Gaana</small>
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

    @@include("partials/header-components/dd-searchbar.html")
    @@include("partials/header-components/dd-shopping-cart.html")
  </div>
  <div class="dark-transparent sidebartoggler"></div>
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  @@include("partials/scripts.html")
  <script src="{{ URL::asset('build/js/jplayer/jplayer.js') }}"></script>
  <script src="{{ URL::asset('build/libs/jplayer/dist/jplayer/jquery.jplayer.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/jplayer/dist/add-on/jplayer.playlist.min.js') }}"></script>
</body>

</html>