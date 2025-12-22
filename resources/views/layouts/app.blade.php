<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title') Spleca</title>
   
</head>

<body>

    <!-- Topbar -->
    @include('layouts.header-link')

        @include('layouts.nav-bar')

    <!-- MAIN CONTENT AREA -->
    <main class="content-wrapper">
        @yield('content')

    </main>

    <!-- Footer -->

    @include('layouts.footer')

    @yield('scripts')
</body>
</html>
