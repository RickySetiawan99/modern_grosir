@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

          @include('layouts.breadcrumb', ['title' => 'Blog', 'subtitle' => 'Home'])
          <div class="row">
            <div class="col-md-6 col-lg-8">
              <div class="card blog blog-img-one position-relative overflow-hidden hover-img">
                <div class="card-body position-relative">
                  <div class="d-flex flex-column justify-content-between h-100">
                    <div class="d-flex align-items-start justify-content-between">
                      <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="Mollie Underwood">
                        <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" alt="modernize-img" class="rounded-circle img-fluid"
                          width="40" height="40">
                      </div>
                      <span class="badge text-bg-primary fs-2 fw-semibold">Gadget</span>
                    </div>
                    <div>
                      <a href="/dark/blog-detail"
                        class="fs-7 my-4 fw-semibold text-white d-block lh-sm text-primary">Early Black Friday
                        Amazon deals: cheap TVs, headphones, laptops</a>
                      <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                          <i class="ti ti-eye fs-5"></i>
                          6006
                        </div>
                        <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                          <i class="ti ti-message-2 fs-5"></i>
                          3
                        </div>
                        <div class="d-flex align-items-center gap-1 text-white fw-normal ms-auto">
                          <i class="ti ti-point"></i>
                          <small>Fri, Jan 13</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card blog blog-img-two position-relative overflow-hidden hover-img">
                <div class="card-body position-relative">
                  <div class="d-flex flex-column justify-content-between h-100">
                    <div class="d-flex align-items-start justify-content-between">
                      <div class="position-relative" data-bs-toggle="tooltip" data-bs-placement="top"
                        data-bs-title="Francisco Quinn">
                        <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" alt="modernize-img" class="rounded-circle img-fluid"
                          width="40" height="40">
                      </div>
                      <span class="badge text-bg-primary fs-2 fw-semibold">Health</span>
                    </div>
                    <div>
                      <a href="/dark/blog-detail"
                        class="fs-7 my-4 fw-semibold text-white d-block lh-sm">Presented by Max
                        Rushden with Barry Glendenning, Philippe Auclair</a>
                      <div class="d-flex align-items-center gap-4">
                        <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                          <i class="ti ti-eye fs-5"></i>
                          713
                        </div>
                        <div class="d-flex align-items-center gap-2 text-white fs-3 fw-normal">
                          <i class="ti ti-message-2 fs-5"></i>
                          3
                        </div>
                        <div class="d-flex align-items-center gap-1 text-white fw-normal ms-auto">
                          <i class="ti ti-point"></i>
                          <small>Wed, Jan 18</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card overflow-hidden hover-img">
                <div class="position-relative">
                  <a href="/dark/blog-detail"><img src="{{ URL::asset('build/images/blog/blog-img6.jpg') }}"
                      class="card-img-top" alt="modernize-img"></a>
                  <span
                    class="badge text-bg-light fs-2 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                    min Read</span>
                  <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" alt="modernize-img"
                    class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                    height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Addie Keller">
                </div>
                <div class="card-body p-4">
                  <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm  mt-3">Gadget</span>
                  <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary" href="/dark/blog-detail">As yen
                    tumbles, gadget-loving Japan goes
                    for iPhones</a>
                  <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>9,125</div>
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>3</div>
                    <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Mon, Jan 16
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card overflow-hidden hover-img">
                <div class="position-relative">
                  <a href="/dark/blog-detail"><img src="{{ URL::asset('build/images/blog/blog-img11.jpg') }}"
                      class="card-img-top" alt="modernize-img"></a>
                  <span
                    class="badge text-bg-light fs-2 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                    min Read</span>
                  <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" alt="modernize-img"
                    class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                    height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Walter Palmer">
                </div>
                <div class="card-body p-4">
                  <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm  mt-3">Social</span>
                  <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary" href="/dark/blog-detail">Intel loses
                    bid to revive antitrust case
                    against patent foe Fortress</a>
                  <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>4,150</div>
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>38</div>
                    <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Sun, Jan 15
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card overflow-hidden hover-img">
                <div class="position-relative">
                  <a href="/dark/blog-detail"><img src="{{ URL::asset('build/images/blog/blog-img8.jpg') }}"
                      class="card-img-top" alt="modernize-img"></a>
                  <span
                    class="badge text-bg-light fs-2 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                    min Read</span>
                  <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" alt="modernize-img"
                    class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                    height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Miguel Kennedy">
                </div>
                <div class="card-body p-4">
                  <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm  mt-3">Health</span>
                  <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary" href="/dark/blog-detail">COVID
                    outbreak deepens as more lockdowns
                    loom in China</a>
                  <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>9,480</div>
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>12</div>
                    <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Sat, Jan 14
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card overflow-hidden hover-img">
                <div class="position-relative">
                  <a href="/dark/blog-detail"><img src="{{ URL::asset('build/images/blog/blog-img5.jpg') }}"
                      class="card-img-top" alt="modernize-img"></a>
                  <span
                    class="badge text-bg-light fs-2 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                    min Read</span>
                  <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" alt="modernize-img"
                    class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                    height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Esther Lindsey">
                </div>
                <div class="card-body p-4">
                  <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm  mt-3">Lifestyle</span>
                  <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary" href="/dark/blog-detail">Streaming
                    video way before it was cool, go
                    dark tomorrow</a>
                  <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>2252</div>
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>3</div>
                    <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Sat, Jan 14
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card overflow-hidden hover-img">
                <div class="position-relative">
                  <a href="/dark/blog-detail"><img src="{{ URL::asset('build/images/blog/blog-img3.jpg') }}"
                      class="card-img-top" alt="modernize-img"></a>
                  <span
                    class="badge text-bg-light fs-2 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                    min Read</span>
                  <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" alt="modernize-img"
                    class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                    height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Leroy Greer">
                </div>
                <div class="card-body p-4">
                  <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm  mt-3">Design</span>
                  <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary" href="/dark/blog-detail">Apple is
                    apparently working on a new
                    ‘streamlined’ accessibility</a>
                  <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>5860</div>
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>38</div>
                    <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Fri, Jan 13
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card overflow-hidden hover-img">
                <div class="position-relative">
                  <a href="/dark/blog-detail"><img src="{{ URL::asset('build/images/blog/blog-img2.jpg') }}"
                      class="card-img-top" alt="modernize-img"></a>
                  <span
                    class="badge text-bg-light fs-2 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                    min Read</span>
                  <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" alt="modernize-img"
                    class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                    height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tommy Butler">
                </div>
                <div class="card-body p-4">
                  <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm  mt-3">Lifestyle</span>
                  <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary" href="/dark/blog-detail">After
                    Twitter Staff Cuts, Survivors Face
                    ‘Radio Silence</a>
                  <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>6315</div>
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>12</div>
                    <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Wed, Jan 11
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card overflow-hidden hover-img">
                <div class="position-relative">
                  <a href="/dark/blog-detail"><img src="{{ URL::asset('build/images/blog/blog-img4.jpg') }}"
                      class="card-img-top" alt="modernize-img"></a>
                  <span
                    class="badge text-bg-light fs-2 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                    min Read</span>
                  <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" alt="modernize-img"
                    class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                    height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Donald Holmes">
                </div>
                <div class="card-body p-4">
                  <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm  mt-3">Design</span>
                  <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary" href="/dark/blog-detail">Why Figma is
                    selling to Adobe for $20
                    billion</a>
                  <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>7570</div>
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>38</div>
                    <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Wed, Jan 11
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-4">
              <div class="card overflow-hidden hover-img">
                <div class="position-relative">
                  <a href="/dark/blog-detail"><img src="{{ URL::asset('build/images/blog/blog-img1.jpg') }}"
                      class="card-img-top" alt="modernize-img"></a>
                  <span
                    class="badge text-bg-light fs-2 lh-sm mb-9 me-9 py-1 px-2 fw-semibold position-absolute bottom-0 end-0">2
                    min Read</span>
                  <img src="{{ URL::asset('build/images/profile/user-6.jpg') }}" alt="modernize-img"
                    class="img-fluid rounded-circle position-absolute bottom-0 start-0 mb-n9 ms-9" width="40"
                    height="40" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Eric Douglas">
                </div>
                <div class="card-body p-4">
                  <span class="badge text-bg-light fs-2 py-1 px-2 lh-sm  mt-3">Gadget</span>
                  <a class="d-block my-4 fs-5 text-dark fw-semibold link-primary" href="/dark/blog-detail">Garmins
                    Instinct Crossover is a rugged
                    hybrid smartwatch</a>
                  <div class="d-flex align-items-center gap-4">
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-eye text-dark fs-5"></i>6763</div>
                    <div class="d-flex align-items-center gap-2"><i class="ti ti-message-2 text-dark fs-5"></i>12</div>
                    <div class="d-flex align-items-center fs-2 ms-auto"><i class="ti ti-point text-dark"></i>Tue, Jan 10
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <nav aria-label="...">
            <ul class="pagination justify-content-center mb-0 mt-4">
              <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center"
                  href="javascript:void(0)"><i class="ti ti-chevron-left"></i></a>
              </li>
              <li class="page-item active" aria-current="page">
                <a class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center"
                  href="javascript:void(0)">1</a>
              </li>
              <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                  href="javascript:void(0)">2</a>
              </li>
              <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                  href="javascript:void(0)">3</a>
              </li>
              <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                  href="javascript:void(0)">4</a>
              </li>
              <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                  href="javascript:void(0)">5</a>
              </li>
              <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                  href="javascript:void(0)">...</a>
              </li>
              <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center"
                  href="javascript:void(0)">10</a>
              </li>
              <li class="page-item">
                <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center"
                  href="javascript:void(0)"><i class="ti ti-chevron-right"></i></a>
              </li>
            </ul>
          </nav>
@endsection