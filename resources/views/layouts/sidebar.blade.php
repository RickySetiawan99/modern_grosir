
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="brand-logo d-flex align-items-center justify-content-between">
      <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
        <img src="{{ URL::asset('images/logos/logo-dark.svg') }}" class="dark-logo" alt="Logo-Dark" height="50" />
        <img src="{{ URL::asset('images/logos/logo-light.svg') }}" class="light-logo" alt="Logo-Light" height="50" />
      </a>
      <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
        <i class="ti ti-x"></i>
      </a>
    </div>

    <nav class="sidebar-nav scroll-sidebar" data-simplebar>
      <ul id="sidebarnav">
        <!-- ---------------------------------- -->
        <!-- ModernGrosir Modules -->
        <!-- ---------------------------------- -->
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">MANAGEMENT</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" aria-expanded="false">
            <span>
              <i class="ti ti-layout-dashboard"></i>
            </span>
            <span class="hide-menu">Dashboard</span>
          </a>
        </li>

        @role('admin')
        <!-- Master Data Submenu -->
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow {{ request()->is('admin/master/products*', 'admin/master/categories*', 'admin/master/units*', 'admin/master/suppliers*', 'admin/master/warehouses*', 'admin/master/reseller-tiers*') ? 'active' : '' }}" href="javascript:void(0)" aria-expanded="false">
            <span>
              <i class="ti ti-database"></i>
            </span>
            <span class="hide-menu">Master Data</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level {{ request()->is('admin/master/products*', 'admin/master/categories*', 'admin/master/units*', 'admin/master/suppliers*', 'admin/master/warehouses*', 'admin/master/reseller-tiers*') ? 'show' : '' }}">
            <li class="sidebar-item">
              <a href="{{ route('master.products.index') }}" class="sidebar-link {{ request()->is('admin/master/products*') ? 'active' : '' }}">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Products</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('master.categories.index') }}" class="sidebar-link {{ request()->is('admin/master/categories*') ? 'active' : '' }}">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Categories</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('master.units.index') }}" class="sidebar-link {{ request()->is('admin/master/units*') ? 'active' : '' }}">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Units</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('master.suppliers.index') }}" class="sidebar-link {{ request()->is('admin/master/suppliers*') ? 'active' : '' }}">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Suppliers</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('master.warehouses.index') }}" class="sidebar-link {{ request()->is('admin/master/warehouses*') ? 'active' : '' }}">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Warehouses</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a href="{{ route('master.reseller-tiers.index') }}" class="sidebar-link {{ request()->is('admin/master/reseller-tiers*') ? 'active' : '' }}">
                <div class="round-16 d-flex align-items-center justify-content-center">
                  <i class="ti ti-circle"></i>
                </div>
                <span class="hide-menu">Reseller Tiers</span>
              </a>
            </li>
          </ul>
        </li>
        @endrole

        @hasanyrole('admin|cashier')
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">INVENTORY & SALES</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('admin/inventory*') ? 'active' : '' }}" href="{{ route('inventory.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-package"></i>
            </span>
            <span class="hide-menu">Stock Levels</span>
          </a>
        </li>
        @role('admin')
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('admin/pricing*') ? 'active' : '' }}" href="{{ route('pricing.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-currency-dollar"></i>
            </span>
            <span class="hide-menu">Tiered Pricing</span>
          </a>
        </li>
        @endrole
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('admin/pos*') ? 'active' : '' }}" href="{{ route('pos.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-shopping-cart"></i>
            </span>
            <span class="hide-menu">POS (Retail)</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('admin/transactions*') ? 'active' : '' }}" href="{{ route('transactions.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-file-dollar"></i>
            </span>
            <span class="hide-menu">Transactions</span>
          </a>
        </li>
        @endhasanyrole

        @role('admin')
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">ACCESS CONTROL</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('admin/master/users*') ? 'active' : '' }}" href="{{ route('master.users.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-user-check"></i>
            </span>
            <span class="hide-menu">Staff Users</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('admin/master/roles*') ? 'active' : '' }}" href="{{ route('master.roles.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-lock-access"></i>
            </span>
            <span class="hide-menu">Roles & Permissions</span>
          </a>
        </li>

        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">PARTNERS</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('admin/master/resellers*') ? 'active' : '' }}" href="{{ route('master.resellers.index') }}" aria-expanded="false">
            <span>
              <i class="ti ti-users"></i>
            </span>
            <span class="hide-menu">Reseller Accounts</span>
          </a>
        </li>
        @endrole
        
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">SETTINGS</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link {{ request()->is('admin/account-settings*') ? 'active' : '' }}" href="{{ route('profile.settings') }}" aria-expanded="false">
            <span>
              <i class="ti ti-user-circle"></i>
            </span>
            <span class="hide-menu">Account Setting</span>
          </a>
        </li>
        <li class="nav-small-cap">
          <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
          <span class="hide-menu">OTHERS</span>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" aria-expanded="false">
            <span>
              <i class="ti ti-logout"></i>
            </span>
            <span class="hide-menu">Logout</span>
          </a>
        </li>
      </ul>
    </nav>
