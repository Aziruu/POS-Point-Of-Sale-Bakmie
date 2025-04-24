<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    
    {{-- Navbar --}}
    @include('partials.navbar')

    {{-- Sidebar --}}
    @include('partials.sidebar')

    {{-- Content --}}
    <div class="content-wrapper p-3">
        @yield('content')
    </div>

    {{-- Footer --}}
    @include('partials.footer')

</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
