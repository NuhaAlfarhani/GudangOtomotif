<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Storage Warehouse</title>

    <link rel ="icon" type="image/png/jpg" href="{{ asset('assets')}}/images/Hino-logo-2048x2048.png">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/index-style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">

    @include('components.navbar')

    <div id="layoutSidenav">
        @include('components.sidenav')
        @yield('content')
    </div>

    @include('layouts.footer')

</body>
</html>