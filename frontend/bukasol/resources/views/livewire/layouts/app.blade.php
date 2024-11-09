<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Poppins Font -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS (Bootstrap 5.3.3) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome 6.6.0 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles

    <style>
        html,
        body {
            height: 100dvh;
            min-height: 100dvh;
            max-height: 100dvh;
            width: 100dvw;
            min-width: 100dvw;
            max-width: 100dvw;
            overflow: auto
        }

        @media (max-width: 768px) {
            body {
                font-size: 14px;
            }
        }
    </style>

    @stack('styles')
</head>

<body class="p-0 m-0">
    <div class="p-0 m-0 w-100 h-100">
        <!-- Main Content -->
        <main class="p-0 m-0 d-flex flex-column" style="min-height: 100%">
            @yield('content')
        </main>

        <!-- Footer Component -->
        <div class="position-absolute bottom-0 start-50 translate-middle-x w-100 p-0 m-0">
            @livewire('footer')
        </div>
    </div>

    <!-- Scripts -->

    <!-- LiveWire Scripts -->
    @livewireScripts

    <!-- Bootstrap JS (Bootstrap 5.3.3) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Font Awesome 6.6.0 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js" integrity="sha512-6sSYJqDreZRZGkJ3b+YfdhB3MzmuP9R7X1QZ6g5aIXhRvR1Y/N/P47jmnkENm7YL3oqsmI6AK+V6AD99uWDnIw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Additional Scripts -->
    @stack('scripts')
</body>

</html>
