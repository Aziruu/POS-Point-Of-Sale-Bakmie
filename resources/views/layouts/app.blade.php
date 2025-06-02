<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html>

<head>
    <title>POS Point Of Sell Warmindo</title>
</head>

<body>
    @include('dashboard.header')

    <div class="content-wrapper">
        @yield('content')
    </div>

    @include('dashboard.footer')
</body>

</html>