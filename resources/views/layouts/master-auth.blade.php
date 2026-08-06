<!DOCTYPE html>
<html lang="en" dir="ltr" data-bs-theme="light" data-color-theme="Blue_Theme" data-layout="vertical">
<head>
    @include('layouts.head')
    <title>@yield('title', config('app.name', 'ModernGrosir') . ' Admin')</title>
    @yield('css')
</head>
<body class="link-sidebar">
    <div class="preloader">
        <img src="{{ URL::asset('images/logos/favicon.svg') }}" alt="loader" class="lds-ripple img-fluid" width="50" />
    </div>

    @yield('pageContent')


    <div class="dark-transparent sidebartoggler"></div>
    @include('layouts.scripts2')
    @yield('scripts')
</body>
</html>
