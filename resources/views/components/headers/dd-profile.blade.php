<div class="profile-dropdown position-relative" data-simplebar>
  <div class="py-3 px-7 pb-0">
    <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
  </div>
  <div class="d-flex align-items-center py-9 mx-7 border-bottom">
    <img src="{{ Auth::user()?->avatar ? asset(Auth::user()->avatar) : URL::asset('build/images/profile/user-1.jpg')}}" class="rounded-circle" width="80" height="80"
      alt="modernize-img" style="object-fit: cover;" />
    <div class="ms-3">
      <h5 class="mb-1 fs-3">{{ Auth::user()?->name ?? 'Guest' }}</h5>
      <span class="mb-1 d-block text-capitalize">{{ Auth::user()?->roles->pluck('name')->first() ?? 'User' }}</span>
      <p class="mb-0 d-flex align-items-center gap-2">
        <i class="ti ti-mail fs-4"></i> {{ Auth::user()?->email ?? 'no-email' }}
      </p>
    </div>
  </div>
  <div class="message-body">
    <a href="{{ route('profile.settings') }}" class="py-8 px-7 mt-8 d-flex align-items-center">
      <span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">
        <img src="{{ URL::asset('build/images/svgs/icon-account.svg') }}" alt="modernize-img" width="24" height="24" />
      </span>
      <div class="w-100 ps-3">
        <h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>
        <span class="fs-2 d-block text-body-secondary">Account Settings</span>
      </div>
    </a>
  </div>
  <div class="d-grid py-4 px-7 pt-8">
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-outline-primary">Log Out</a>
  </div>
</div>