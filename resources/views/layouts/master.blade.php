<!DOCTYPE html>
<html lang="en" dir="ltr" data-color-theme="Blue_Theme" data-layout="vertical">
<head>
    <script>
        const getSetting = (key, fallback) => localStorage.getItem(key) || fallback;
        const html = document.documentElement;
        
        html.setAttribute('data-bs-theme', getSetting('theme', 'light'));
        html.setAttribute('data-color-theme', getSetting('color-theme', 'Blue_Theme'));
        html.setAttribute('data-layout', getSetting('layout', 'vertical'));
        html.setAttribute('data-boxed-layout', getSetting('boxedLayout', 'true'));
        html.setAttribute('data-sidebar-type', getSetting('sidebarType', 'full'));
        html.setAttribute('dir', getSetting('direction', 'ltr'));
    </script>
    @include('layouts.head')
    <title>@yield('title', 'ModernGrosir Admin')</title>
    @yield('css')
</head>
<body class="link-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="loader-wrapper d-flex flex-column align-items-center justify-content-center">
            <img src="{{ URL::asset('images/logos/favicon.svg') }}" alt="loader" class="img-fluid pulse-animation" width="64" />
            <div class="mt-3 fs-3 fw-semibold text-primary">ModernGrosir</div>
        </div>
    </div>
    

    <div id="main-wrapper">

        <!-- Sidebar Start -->
        <aside class="left-sidebar with-vertical">
            <div>@include('layouts.sidebar')</div>
        </aside>
        <!-- Sidebar End -->

        <div class="page-wrapper">
            <!-- Header Start -->
            <header class="topbar">
                <div class="with-vertical">@include('layouts.header')</div>
                <div class="app-header with-horizontal">@include('layouts.horizontal-header')</div>
            </header>
            <!-- Header End -->
            
            <aside class="left-sidebar with-horizontal">
                @include('layouts.horizontal-sidebar')
            </aside>

            <div class="body-wrapper">
                <div class="container-fluid">
                    @yield('pageContent')
                </div>
            </div>
            @include('layouts.customizer')
        </div>

        <x-headers.dd-searchbar/>
        <x-headers.dd-shopping-cart/>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        
    <div class="dark-transparent sidebartoggler"></div>
    @include('layouts.scripts')
    
    @role('reseller')
        @include('partials.reseller-cart')
    @endrole
    
    @yield('scripts')
</body>
</html>
