<!--  Mobilenavbar -->
<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar"
  aria-labelledby="offcanvasWithBothOptionsLabel">
  <nav class="sidebar-nav scroll-sidebar">
    <div class="offcanvas-header justify-content-between">
      <img src="{{ URL::asset('build/images/logos/favicon.ico') }}" alt="modernize-img" class="img-fluid" />
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body h-n80" data-simplebar="" data-simplebar>
      <ul id="sidebarnav">
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
            <span>
              <i class="ti ti-apps"></i>
            </span>
            <span class="hide-menu">Apps</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level my-3">
            <li class="sidebar-item py-2">
              <a href="/main/app-chat" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ URL::asset('build/images/svgs/icon-dd-chat.svg') }}" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">Chat Application</h6>
                  <span class="fs-2 d-block text-muted">New messages arrived</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item py-2">
              <a href="/main/app-invoice" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ URL::asset('build/images/svgs/icon-dd-invoice.svg') }}" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">Invoice App</h6>
                  <span class="fs-2 d-block text-muted">Get latest invoice</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item py-2">
              <a href="/main/app-cotact" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ URL::asset('build/images/svgs/icon-dd-mobile.svg') }}" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">Contact Application</h6>
                  <span class="fs-2 d-block text-muted">2 Unsaved Contacts</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item py-2">
              <a href="/main/app-email" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ URL::asset('build/images/svgs/icon-dd-message-box.svg') }}" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">Email App</h6>
                  <span class="fs-2 d-block text-muted">Get new emails</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item py-2">
              <a href="/main/page-user-profile" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ URL::asset('build/images/svgs/icon-dd-cart.svg') }}" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">User Profile</h6>
                  <span class="fs-2 d-block text-muted">learn more information</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item py-2">
              <a href="/main/app-calendar" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ URL::asset('build/images/svgs/icon-dd-date.svg') }}" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">Calendar App</h6>
                  <span class="fs-2 d-block text-muted">Get dates</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item py-2">
              <a href="/main/app-contact2" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ URL::asset('build/images/svgs/icon-dd-lifebuoy.svg') }}" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">Contact List Table</h6>
                  <span class="fs-2 d-block text-muted">Add new contact</span>
                </div>
              </a>
            </li>
            <li class="sidebar-item py-2">
              <a href="/main/app-notes" class="d-flex align-items-center">
                <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                  <img src="{{ URL::asset('build/images/svgs/icon-dd-application.svg') }}" alt="modernize-img" class="img-fluid"
                    width="24" height="24" />
                </div>
                <div>
                  <h6 class="mb-1 bg-hover-primary">Notes Application</h6>
                  <span class="fs-2 d-block text-muted">To-do and Daily tasks</span>
                </div>
              </a>
            </li>
            <ul class="px-8 mt-7 mb-4">
              <li class="sidebar-item mb-3">
                <h5 class="fs-5 fw-semibold">Quick Links</h5>
              </li>
              <li class="sidebar-item py-2">
                <a class="fw-semibold text-dark" href="/main/page-pricing">Pricing Page</a>
              </li>
              <li class="sidebar-item py-2">
                <a class="fw-semibold text-dark" href="/main/authentication-login">Authentication
                  Design</a>
              </li>
              <li class="sidebar-item py-2">
                <a class="fw-semibold text-dark" href="/main/authentication-register">Register Now</a>
              </li>
              <li class="sidebar-item py-2">
                <a class="fw-semibold text-dark" href="/main/authentication-error">404 Error Page</a>
              </li>
              <li class="sidebar-item py-2">
                <a class="fw-semibold text-dark" href="/main/app-notes">Notes App</a>
              </li>
              <li class="sidebar-item py-2">
                <a class="fw-semibold text-dark" href="/main/page-user-profile">User Application</a>
              </li>
              <li class="sidebar-item py-2">
                <a class="fw-semibold text-dark" href="/main/page-account-settings">Account Settings</a>
              </li>
            </ul>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="/main/app-chat" aria-expanded="false">
            <span>
              <i class="ti ti-message-dots"></i>
            </span>
            <span class="hide-menu">Chat</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="/main/app-calendar" aria-expanded="false">
            <span>
              <i class="ti ti-calendar"></i>
            </span>
            <span class="hide-menu">Calendar</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="/main/app-email" aria-expanded="false">
            <span>
              <i class="ti ti-mail"></i>
            </span>
            <span class="hide-menu">Email</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>
</div>