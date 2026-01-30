<!-- Sidebar scroll-->
<div>
  <!-- Sidebar navigation-->
  <nav id="sidebarnavh" class="sidebar-nav scroll-sidebar container-fluid">
    <ul id="sidebarnav">
      <!-- ============================= -->
      <!-- Home -->
      <!-- ============================= -->
      <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Home</span>
      </li>
      <!-- =================== -->
      <!-- Dashboard -->
      <!-- =================== -->
      <li class="sidebar-item">
        <a class="sidebar-link has-arrow {{ request()->is('main/index', '/main/index2', '/main/index3', '/main/index4', '/main/index5', '/main/index6') ? 'selected' : '' }} " href="javascript:void(0)" aria-expanded="false">
          <span>
            <i class="ti ti-home-2"></i>
          </span>
          <span class="hide-menu">Dashboard</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/index') ? 'selected' : '' }}" href="/main/index">
              <i class="ti ti-aperture"></i>
              <span class="hide-menu">Modern</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/index2') ? 'selected' : '' }}" href="/main/index2">
              <i class="ti ti-shopping-cart"></i>
              <span class="hide-menu">eCommerce</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/index3') ? 'selected' : '' }}" href="/main/index3">
              <i class="ti ti-currency-dollar"></i>
              <span class="hide-menu">NFT</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/index4') ? 'selected' : '' }}" href="/main/index4">
              <i class="ti ti-cpu"></i>
              <span class="hide-menu">Crypto</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/index5') ? 'selected' : '' }}" href="/main/index5">
              <i class="ti ti-activity-heartbeat"></i>
              <span class="hide-menu">General</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/index6') ? 'selected' : '' }}" href="/main/index6">
              <i class="ti ti-playlist"></i>
              <span class="hide-menu">Music</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- ============================= -->
      <!-- Apps -->
      <!-- ============================= -->
      <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Apps</span>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link two-column has-arrow {{ request()->is('main/app-calendar', '/main/app-kanban', '/main/app-chat', '/main/app-email', '/main/app-contact', '/main/app-contact2', '/main/app-notes', '/main/app-invoice', '/main/page-user-profile', '/main/blog-posts', '/main/blog-detail', '/main/eco-shop', '/main/eco-shop-detail', '/main/eco-product-list', '/main/eco-checkout', '/main/eco-add-product', '/main/eco-edit-product') ? 'selected' : '' }}" href="javascript:void(0)" aria-expanded="false">
     
          <span>
            <i class="ti ti-archive"></i>
          </span>
          <span class="hide-menu">Apps</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/app-calendar') ? 'selected' : '' }}" href="/main/app-calendar">
              <i class="ti ti-calendar"></i>
              <span class="hide-menu">Calendar</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/app-kanban') ? 'selected' : '' }}" href="/main/app-kanban">
              <i class="ti ti-layout-kanban"></i>
              <span class="hide-menu">Kanban</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/app-chat') ? 'selected' : '' }}" href="/main/app-chat">
              <i class="ti ti-message-dots"></i>
              <span class="hide-menu">Chat</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/app-email') ? 'selected' : '' }}" href="/main/app-email" aria-expanded="false">
              <span>
                <i class="ti ti-mail"></i>
              </span>
              <span class="hide-menu">Email</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/app-contact') ? 'selected' : '' }}" href="/main/app-contact">
              <i class="ti ti-phone"></i>
              <span class="hide-menu">Contact Table</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/app-contact2') ? 'selected' : '' }}" href="/main/app-contact2">
              <i class="ti ti-list-details"></i>
              <span class="hide-menu">Contact List</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/app-notes') ? 'selected' : '' }}" href="/main/app-notes">
              <i class="ti ti-notes"></i>
              <span class="hide-menu">Notes</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/app-invoice') ? 'selected' : '' }}" href="/main/app-invoice">
              <i class="ti ti-file-text"></i>
              <span class="hide-menu">Invoice</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/page-user-profile') ? 'selected' : '' }}" href="/main/page-user-profile">
              <i class="ti ti-user-circle"></i>
              <span class="hide-menu">User Profile</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/blog-posts') ? 'selected' : '' }}" href="/main/blog-posts">
              <i class="ti ti-article"></i>
              <span class="hide-menu">Posts</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/blog-detail') ? 'selected' : '' }}" href="/main/blog-detail">
              <i class="ti ti-details"></i>
              <span class="hide-menu">Detail</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/eco-shop') ? 'selected' : '' }}" href="/main/eco-shop">
              <i class="ti ti-shopping-cart"></i>
              <span class="hide-menu">Shop</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/eco-shop-detail') ? 'selected' : '' }}" href="/main/eco-shop-detail">
              <i class="ti ti-basket"></i>
              <span class="hide-menu">Shop Detail</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/eco-product-list') ? 'selected' : '' }}" href="/main/eco-product-list">
              <i class="ti ti-list-check"></i>
              <span class="hide-menu">List</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/eco-checkout') ? 'selected' : '' }}" href="/main/eco-checkout">
              <i class="ti ti-brand-shopee"></i>
              <span class="hide-menu">Checkout</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/eco-add-product') ? 'selected' : '' }}" href="/main/eco-add-product">
              <i class="ti ti-file-plus"></i>
              <span class="hide-menu">Add Product</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/eco-edit-product') ? 'selected' : '' }}" href="/main/eco-edit-product">
              <i class="ti ti-file-pencil"></i>
              <span class="hide-menu">Edit Product</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- ============================= -->
      <!-- PAGES -->
      <!-- ============================= -->
      <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">PAGES</span>
      </li>
      <li class="sidebar-item">
        <a class="sidebar-link has-arrow {{ request()->is('main/page-faq', '/main/page-account-settings', '/main/page-pricing', '/main/widgets-cards', '/main/widgets-banners', '/main/widgets-charts') ? 'selected' : '' }}" href="javascript:void(0)" aria-expanded="false">
          <span>
            <i class="ti ti-notebook"></i>
          </span>
          <span class="hide-menu">Pages</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/page-faq') ? 'selected' : '' }}" href="/main/page-faq">
              <i class="ti ti-help"></i>
              <span class="hide-menu">FAQ</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/page-account-settings') ? 'selected' : '' }}" href="/main/page-account-settings">
              <i class="ti ti-user-circle"></i>
              <span class="hide-menu">Account Setting</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/page-pricing') ? 'selected' : '' }}" href="/main/page-pricing">
              <i class="ti ti-currency-dollar"></i>
              <span class="hide-menu">Pricing</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/widgets-cards') ? 'selected' : '' }}" href="/main/widgets-cards">
              <i class="ti ti-cards"></i>
              <span class="hide-menu">Card</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/widgets-banners') ? 'selected' : '' }}" href="/main/widgets-banners">
              <i class="ti ti-ad"></i>
              <span class="hide-menu">Banner</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/widgets-charts') ? 'selected' : '' }}" href="/main/widgets-charts">
              <i class="ti ti-chart-bar"></i>
              <span class="hide-menu">Charts</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a href="/landingpage/index {{ request()->is('landingpage/index') ? 'selected' : '' }}" class="sidebar-link">
              <i class="ti ti-app-window"></i>
              <span class="hide-menu">Landing Page</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- ============================= -->
      <!-- UI -->
      <!-- ============================= -->
      <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">UI</span>
      </li>
      <!-- =================== -->
      <!-- UI Elements -->
      <!-- =================== -->
      <li class="sidebar-item mega-dropdown">
        <a class="sidebar-link has-arrow {{ request()->is('main/ui-accordian', '/main/ui-badge', '/main/ui-buttons', '/main/ui-dropdowns', '/main/ui-modals', '/main/ui-tab', '/main/ui-tooltip-popover', '/main/ui-notification', '/main/ui-progressbar', '/main/ui-pagination', '/main/ui-typography', '/main/ui-bootstrap-ui', '/main/ui-breadcrumb', '/main/ui-offcanvas', '/main/ui-lists', '/main/ui-grid', '/main/ui-carousel', '/main/ui-scrollspy', '/main/ui-spinner', '/main/ui-link') ? 'selected' : '' }}" href="javascript:void(0)" aria-expanded="false">
          <span class="rounded-3">
            <i class="ti ti-layout-grid"></i>
          </span>
          <span class="hide-menu">UI</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-accordian') ? 'selected' : '' }}" href="/main/ui-accordian">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Accordian</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-badge') ? 'selected' : '' }}" href="/main/ui-badge">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Badge</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-buttons') ? 'selected' : '' }}" href="/main/ui-buttons">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Buttons</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-dropdowns') ? 'selected' : '' }}" href="/main/ui-dropdowns">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Dropdowns</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-modals') ? 'selected' : '' }}" href="/main/ui-modals">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Modals</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-tab') ? 'selected' : '' }}" href="/main/ui-tab">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Tab</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-tooltip-popover') ? 'selected' : '' }}" href="/main/ui-tooltip-popover">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Tooltip & Popover</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-notification') ? 'selected' : '' }}" href="/main/ui-notification">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Alerts</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-progressbar') ? 'selected' : '' }}" href="/main/ui-progressbar">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Progressbar</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-pagination') ? 'selected' : '' }}" href="/main/ui-pagination">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Pagination</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-typography') ? 'selected' : '' }}" href="/main/ui-typography">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Typography</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-bootstrap-ui') ? 'selected' : '' }}" href="/main/ui-bootstrap-ui">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Bootstrap UI</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-breadcrumb') ? 'selected' : '' }}" href="/main/ui-breadcrumb">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Breadcrumb</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-offcanvas') ? 'selected' : '' }}" href="/main/ui-offcanvas">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Offcanvas</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-lists') ? 'selected' : '' }}" href="/main/ui-lists">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Lists</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-grid') ? 'selected' : '' }}" href="/main/ui-grid">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Grid</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-carousel') ? 'selected' : '' }}" href="/main/ui-carousel">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Carousel</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-scrollspy') ? 'selected' : '' }}" href="/main/ui-scrollspy">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Scrollspy</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-spinner') ? 'selected' : '' }}" href="/main/ui-spinner">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Spinner</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/ui-link') ? 'selected' : '' }}" href="/main/ui-link">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Link</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- ============================= -->
      <!-- Forms -->
      <!-- ============================= -->
      <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Forms</span>
      </li>
      <!-- =================== -->
      <!-- Forms -->
      <!-- =================== -->
      <li class="sidebar-item">
        <a class="sidebar-link two-column has-arrow {{ request()->is('main/form-inputs', '/main/form-input-groups', '/main/form-input-grid', '/main/form-checkbox-radio', '/main/form-bootstrap-switch', '/main/form-select2', '/main/form-basic', '/main/form-vertical', '/main/form-horizontal', '/main/form-actions', '/main/form-row-separator', '/main/form-bordered', '/main/form-detail', '/main/form-wizard', '/main/form-editor-quill') ? 'selected' : '' }}" href="javascript:void(0)" aria-expanded="false">
          <span class="rounded-3">
            <i class="ti ti-file-text"></i>
          </span>
          <span class="hide-menu">Forms</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
          <!-- form elements -->
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/form-inputs') ? 'selected' : '' }}" href="/main/form-inputs">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Forms Input</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/form-input-groups') ? 'selected' : '' }}" href="/main/form-input-groups">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Input Groups</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/form-input-grid') ? 'selected' : '' }}" href="/main/form-input-grid">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Input Grid</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/form-checkbox-radio') ? 'selected' : '' }}" href="/main/form-checkbox-radio">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Checkbox & Radios</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/form-bootstrap-switch') ? 'selected' : '' }}" href="/main/form-bootstrap-switch">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Bootstrap Switch</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/form-select2') ? 'selected' : '' }}" href="/main/form-select2">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Select2</span>
            </a>
          </li>
          <!-- form inputs -->
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/form-basic') ? 'selected' : '' }}" href="/main/form-basic">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Basic Form</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/form-vertical') ? 'selected' : '' }}" href="/main/form-vertical">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Form Vertical</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/form-horizontal') ? 'selected' : '' }}" href="/main/form-horizontal">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Form Horizontal</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/form-actions') ? 'selected' : '' }}" href="/main/form-actions">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Form Actions</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/form-row-separator') ? 'selected' : '' }}" href="/main/form-row-separator">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Row Separator</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/form-bordered') ? 'selected' : '' }}" href="/main/form-bordered">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Form Bordered</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/form-detail') ? 'selected' : '' }}" href="/main/form-detail">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Form Detail</span>
            </a>
          </li>
          <!-- form wizard -->
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/form-wizard') ? 'selected' : '' }}" href="/main/form-wizard">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Form Wizard</span>
            </a>
          </li>
          <!-- Quill Editor -->
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/form-editor-quill') ? 'selected' : '' }}" href="/main/form-editor-quill">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Quill Editor</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- ============================= -->
      <!-- Tables -->
      <!-- ============================= -->
      <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Tables</span>
      </li>
      <!-- =================== -->
      <!-- Bootstrap Table -->
      <!-- =================== -->
      <li class="sidebar-item">
        <a class="sidebar-link has-arrow {{ request()->is('main/table-basic', '/main/table-dark-basic', '/main/table-sizing', '/main/table-layout-coloured', '/main/table-datatable-basic', '/main/table-datatable-api', '/main/table-datatable-advanced') ? 'selected' : '' }}" href="javascript:void(0)" aria-expanded="false">
          <span class="rounded-3">
            <i class="ti ti-layout-sidebar"></i>
          </span>
          <span class="hide-menu">Tables</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/table-basic') ? 'selected' : '' }}" href="/main/table-basic">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Basic Table</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/table-dark-basic') ? 'selected' : '' }}" href="/main/table-dark-basic">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Dark Basic Table</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/table-sizing') ? 'selected' : '' }}" href="/main/table-sizing">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Sizing Table</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/table-layout-coloured') ? 'selected' : '' }}" href="/main/table-layout-coloured">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Coloured Table</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/table-datatable-basic') ? 'selected' : '' }}" href="/main/table-datatable-basic">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Basic Initialisation</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/table-datatable-api') ? 'selected' : '' }}" href="/main/table-datatable-api">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">API</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/table-datatable-advanced') ? 'selected' : '' }}" href="/main/table-datatable-advanced">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Advanced Initialisation</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- ============================= -->
      <!-- Charts -->
      <!-- ============================= -->
      <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Charts</span>
      </li>
      <!-- =================== -->
      <!-- Apex Chart -->
      <!-- =================== -->
      <li class="sidebar-item">
        <a class="sidebar-link has-arrow {{ request()->is('main/chart-apex-line', '/main/chart-apex-area', '/main/chart-apex-bar', '/main/chart-apex-pie', '/main/chart-apex-radial', '/main/chart-apex-radar') ? 'selected' : '' }}" href="javascript:void(0)" aria-expanded="false">
          <span class="rounded-3">
            <i class="ti ti-chart-pie"></i>
          </span>
          <span class="hide-menu">Charts</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/chart-apex-line') ? 'selected' : '' }}" href="/main/chart-apex-line">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Line Chart</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/chart-apex-area') ? 'selected' : '' }}" href="/main/chart-apex-area">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Area Chart</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/chart-apex-bar') ? 'selected' : '' }}" href="/main/chart-apex-bar">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Bar Chart</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/chart-apex-pie') ? 'selected' : '' }}" href="/main/chart-apex-pie">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Pie Chart</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/chart-apex-radial') ? 'selected' : '' }}" href="/main/chart-apex-radial">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Radial Chart</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/chart-apex-radar') ? 'selected' : '' }}" href="/main/chart-apex-radar">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Radar Chart</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- ============================= -->
      <!-- Icons -->
      <!-- ============================= -->
      <li class="nav-small-cap">
        <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
        <span class="hide-menu">Icons</span>
      </li>
      <!-- =================== -->
      <!-- Tabler Icon -->
      <!-- =================== -->
      <li class="sidebar-item">
        <a class="sidebar-link has-arrow {{ request()->is('main/icon-tabler', '/main/icon-solar') ? 'selected' : '' }}" href="javascript:void(0)" aria-expanded="false">
          <span class="rounded-3">
            <i class="ti ti-archive"></i>
          </span>
          <span class="hide-menu">Icon</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/icon-tabler') ? 'selected' : '' }}" href="/main/icon-tabler">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Tabler Icon</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ request()->is('main/icon-solar') ? 'selected' : '' }}" href="/main/icon-solar">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Solar Icon</span>
            </a>
          </li>
        </ul>
      </li>
      <!-- multi level -->
      <li class="sidebar-item">
        <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
          <span class="rounded-3">
            <iconify-icon icon="solar:airbuds-case-minimalistic-line-duotone" class="ti"></iconify-icon>
          </span>
          <span class="hide-menu">Multi DD</span>
        </a>
        <ul aria-expanded="false" class="collapse first-level">
          <li class="sidebar-item">
            <a href="/docs/index" class="sidebar-link">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Documentation</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a href="javascript:void(0)" class="sidebar-link">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Page 1</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a href="javascript:void(0)" class="sidebar-link has-arrow">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Page 2</span>
            </a>
            <ul aria-expanded="false" class="collapse second-level">
              <li class="sidebar-item">
                <a href="javascript:void(0)" class="sidebar-link">
                  <i class="ti ti-circle"></i>
                  <span class="hide-menu">Page 2.1</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="javascript:void(0)" class="sidebar-link">
                  <i class="ti ti-circle"></i>
                  <span class="hide-menu">Page 2.2</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a href="javascript:void(0)" class="sidebar-link">
                  <i class="ti ti-circle"></i>
                  <span class="hide-menu">Page 2.3</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="sidebar-item">
            <a href="javascript:void(0)" class="sidebar-link">
              <i class="ti ti-circle"></i>
              <span class="hide-menu">Page 3</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- End Sidebar navigation -->
</div>
<!-- End Sidebar scroll-->