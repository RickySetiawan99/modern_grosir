<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="@yield('theme', 'light')" data-color-theme="Blue_Theme" data-layout="vertical">
<head>
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
    
    <style>
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99999;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .pulse-animation {
            animation: pulse-loader 2s infinite ease-in-out;
        }
        @keyframes pulse-loader {
            0% { transform: scale(0.95); opacity: 0.8; }
            50% { transform: scale(1.1); opacity: 1; }
            100% { transform: scale(0.95); opacity: 0.8; }
        }
    </style>
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
    </div>
    <div class="dark-transparent sidebartoggler"></div>
    @include('layouts.scripts')
    @yield('scripts')
</body>
</html>
