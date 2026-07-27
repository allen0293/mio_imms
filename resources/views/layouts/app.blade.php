<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MIS Inventory System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

<div class="app-wrapper">

    {{-- Sidebar --}}
    @include('layouts.partials.sidebar')

    <div class="main-wrapper">

        {{-- Navbar --}}
        @include('layouts.partials.navbar')

        <main class="main-content">
            
            @yield('content')

        </main>

        {{-- Footer --}}
        @include('layouts.partials.footer')

    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('layouts.partials.alerts')
@include('layouts.partials.scripts')

</body>

</html>