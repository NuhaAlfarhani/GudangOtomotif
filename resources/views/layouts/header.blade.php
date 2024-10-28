<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Storage Warehouse</title>

    <link rel ="icon" type="image/png/jpg" href="{{ asset('assets')}}/images/Hino-logo-2048x2048.png">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/css/index-style.css">
    <script src="{{ asset('assets') }}/js/jquery-3.2.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
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