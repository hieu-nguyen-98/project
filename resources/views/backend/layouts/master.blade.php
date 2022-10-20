<!DOCTYPE html>
<html lang="en">
    <head>
        @include('backend.layouts.head')
    </head>
    <body class="sb-nav-fixed">
        @include('backend.layouts.nav')
        <div id="layoutSidenav">
            @include('backend.layouts.sidebar')
            <div id="layoutSidenav_content">
                @yield('content')
                @include('backend.layouts.footer')
            </div>
        </div>
        @include('backend.layouts.scripts')
    </body>
</html>